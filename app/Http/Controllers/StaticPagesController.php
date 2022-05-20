<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    public function home() {
        return view('home');
    }

    public function features() {
        return "I'm the features page.";
    }

    public function prices() {
        return "I'm the prices page.";
    }

    public function contact() {
        return "I'm the contact page.";
    }
}
