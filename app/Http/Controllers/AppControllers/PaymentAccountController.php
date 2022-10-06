<?php

namespace App\Http\Controllers\AppControllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class PaymentAccountController extends Controller
{
    public function create($event_uid) {
        $event_menu = true;
        $event = Event::find($event_uid);

        return view('app.payment_account-create', compact('event_menu', 'event'));
    }

    public function store(Request $request) {
        
    }

    public function update(Request $request, $uid) {

    }

    public function destroy($uid) {

    }
}
