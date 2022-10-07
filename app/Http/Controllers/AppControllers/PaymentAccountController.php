<?php

namespace App\Http\Controllers\AppControllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\PaymentAccount;
use App\Rules\Phone;
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
            'phone' => ['required', new Phone]
        ], [
            'required' => "Ce champ est obligatoire.",
            'string' => "Ce champ ne doit contenir autre qu'une chaîne de caractères."
        ]);

        if($validator->fails()) {
        return redirect()->back()->withErrors($validator);
        }
        PaymentAccount::create([
            'event_payment_method_uid' => $request->event_payment_method,
            'receiver_firstname' => $request->firstname,
            'receiver_lastname' => $request->lastname,
            'receiver_phone' => $request->phone,
        ]);

        return redirect()->back()->with('success', "Le compte a été ajouté avec succès.");
    }

    public function destroy($uid) {
        PaymentAccount::destroy($uid);
        return redirect()->back()->with('success', "Le compte a été supprimé avec succès.");
    }
}
