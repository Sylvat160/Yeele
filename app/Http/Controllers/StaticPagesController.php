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
    
    public function policy() {
        return view('website.policy');
    }
    
    public function terms() {
        return view('website.terms');
    }

    public function login() {
        return view('app.auth.login');
    }

    public function register($plan = null) {
        $selectedPlan = Plan::where('name', $plan)->first();
        return view('app.auth.register', compact('selectedPlan'));
    }

    public function verify() {
        return view('app.auth.verify-email');
    }

    public function reset() {
        return view('app.auth.reset');
    }
}
