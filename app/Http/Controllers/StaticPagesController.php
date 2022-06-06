<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    public function home() {
        return view('website.home');
    }

    public function features() {
        return view('website.features');
    }

    public function prices() {
        return view('website.prices');
    }

    public function contact() {
        return view('website.contact');
    }

    public function login() {
        return view('app.auth.login');
    }

    public function register() {
        return view('app.auth.register');
    }

    public function verify() {
        return view('app.auth.verify-email');
    }

    public function reset() {
        return view('app.auth.reset');
    }
}
