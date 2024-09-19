<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
}
