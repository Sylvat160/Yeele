<?php

namespace App\Http\Controllers\AppControllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentAccountController extends Controller
{
    public function create($event_uid) {
        $event_menu = true;
        $event = Event::find($event_uid);

        return view('app.payment_account-create', compact('event_menu', 'event'));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'event_payment_method' => 'required',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'phone' => 'required|phone'
        ], [
            'required' => "Ce champ est obligatoire.",
            'string' => "Ce champ ne doit contenir autre qu'une chaîne de caractères."
        ]);
    }

    public function update(Request $request, $uid) {

    }

    public function destroy($uid) {

    }
}
