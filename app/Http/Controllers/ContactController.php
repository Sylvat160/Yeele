<?php

namespace App\Http\Controllers;

use App\Mail\WebsiteMails\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index() {
        return view('website.contact');
    }

    public function send(Request $request) {
        $validator = Validator::make($request->all(),
        [
            'lastname' => 'required',
            'firstname' => 'required',
            'email' => 'required|email',
            'organization' => 'required',
            'subject' => 'required',
            'message' => 'required',
            'captcha' => 'required|captcha'
        ], [
            'required' => "Ce champ est obligatoire.",
            'email' => 'Vous devez fournir une adresse e-mail.',
            'captcha' => "Captcha incorrect."
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        Mail::to('yeele@horinfo.com')->send(new ContactMail($request->except('_token', 'captcha')));
        return redirect()->back()->with('success', "Votre message a été envoyé. Nous vous reviendrons dans peu.");
    }
}
