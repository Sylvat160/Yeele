<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Event;
use App\Models\Participant;
use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    public function home() {
        $total = (string) Participant::all()->count();
        $firstChar = substr($total, 0, 1);
        $number = $firstChar . implode('', array_fill(0, strlen($total) - 1, 0));
        if(strlen($number) < 4) $number = "1000";
        $comingupEvent = Event::where('start_date_time', '>', now())->orderBy('start_date_time', 'asc')->get();
        $currentEvent = Event::where('start_date_time', '<', now())->where('end_date_time', '>', now())->orderBy('start_date_time', 'asc')->get();
        return view('website.home', compact('number' , 'comingupEvent', 'currentEvent'));
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
