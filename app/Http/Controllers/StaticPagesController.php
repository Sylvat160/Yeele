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
        return "I'm the contact page.";
    }
}
