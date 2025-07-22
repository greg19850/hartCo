<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function submitContactForm(Request $request){

        // dd($request->{'event-date'});
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'event' => 'required|string|max:255',
            'event-date' => 'required|date_format:d/m/Y',
            'guests' => 'required|integer|min:1',
            'message' => 'required|string|max:2000',
            'location' => 'required|string|max:500',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Please check the form for errors.');
        }

        try{
            // Send email
            Mail::to(config('mail.contact_email', 'your-email@example.com'))
                ->send(new ContactFormMail($request->all()));

            return back()->with('success', 'Thank you for your message! We\'ll get back to you soon.');
        }catch(\Exception $e){
            return back()
                ->withInput()
                ->with('error', 'Sorry, there was an error sending your message. Please try again.');
        }
    }
}
