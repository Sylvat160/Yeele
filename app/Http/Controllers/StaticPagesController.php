<?php

namespace App\Http\Controllers;

use App\Models\Plan;
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

    public function register($plan = null) {
        if($plan) $selectedPlan = Plan::where('name', $plan)->first() || null;
        else $selectedPlan = null;
        return view('app.auth.register', compact('selectedPlan'));
    }

    public function verify() {
        return view('app.auth.verify-email');
    }

    public function reset() {
        return view('app.auth.reset');
    }
}
