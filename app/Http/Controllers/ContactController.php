<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        return view('website.contact');
    }

    public function send(Request $request) {
        dd($request->all());
    }
}
