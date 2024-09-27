<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AdminAuthController extends Controller
{

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            // echo '<pre>'; print_r($data); die;

            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required|max:30',
            ];

            $messages = [
                'email.required' => 'Email is required',
                'email.email' => 'Email is invalid',
                'password.required' => 'Password is required',
                'password.max' => 'Password is too long',
            ];

            $this->validate($request, $rules, $messages);

            if (Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])) {
                return redirect(route('cms.showCmsHome'));
            }else{
                return redirect()->back()->with('error_message', 'Invalid Email or Password');
            }
        }

        return view('cms.cmsLogin');
    }

    public function logout(){
        Session::flush();
        Auth::guard('admin')->logout();
        return redirect(route('homepage'));
    }

    public function updatePassword(Request $request){
        $data = $request->all();
        if(Hash::check($data['current_password'],Auth::guard('admin')->user()['password'])){
            Admin::where('id', Auth::guard('admin')->user()['id'])->update(['password' => bcrypt($data['new_password'])]);

            return redirect()->back()->with('success', 'Password updated successfully');
        }else{
            return redirect()->back()->with('error', 'Your current password is incorrect');
        }
    }

    public function forgetPassword(){
        return view('cms.forgetPassword');
    }

    public function forgetPasswordPost(Request $request){
        $rules = [
            'email' => 'required|email|exists:admins',
        ];

        $messages = [
            'email.required' => 'Email is required',
            'email.email' => 'Email is invalid',
            'email.exists' => 'Email does not exist',
        ];

        $this->validate($request, $rules, $messages);

        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token
        ]);

        Mail::send('emails.forget-password', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset your admin password');
        });

        return redirect()->back()->with('success', 'We have e-mailed your password reset link!');
    }

    public function resetPassword($token){
        return view('cms.newPassword', compact('token'));
    }

    public function resetPasswordPost(Request $request){
        $rules = [
            'token' => 'required',
            'email' => 'required|email|exists:admins',
            'new_password' => 'required|min:6|confirmed',
            'new_password_confirmation' => 'required',
        ];

        $messages = [
            'email.required' => 'Email is required',
            'email.email' => 'Email is invalid',
            'email.exists' => 'Email does not exist',
            'password.required' => 'Password is required',
            'password.min' => 'New password cannot be less than 6 characters',
            'new_password.confirmed' => 'Passwords do not match',
            'new_password_confirmation.required' => 'Confirm Password is required',
        ];

        $this->validate($request, $rules, $messages);

        $updatePassword = DB::table('password_resets')->where([
            'email' => $request->email,
            'token' => $request->token
        ])->first();

        if(!$updatePassword){
            return redirect()->back()->with('error', 'Invalid details');
        }

        Admin::where('email', $request->email)->update(['password' => bcrypt($request->new_password)]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();

        return redirect()->to(route('cms.login'))->with('success', 'Password updated successfully');
    }
}
