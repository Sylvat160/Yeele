<?php

namespace App\Http\Controllers\AppControllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventPaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventPaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param string $event_uid
     * @return \Illuminate\Http\Response
     */
    public function index($event_uid)
    {
        $event_menu = true;
        $event = Event::find($event_uid);
        return view('app.event-payment-method', compact('event_menu', 'event'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'event_uid' => 'required'
            ],
            [
                'required' => "Ce champ est obligatoire.",
            ]
            );

            if($validator->fails()) {
                return redirect()->back()->with('add_price_error', true)->withErrors($validator);
            }
            EventPaymentMethod::create($request->except('_token'));
            return redirect()->back()->with('success', "Un mode de paiement a été ajouté!");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string $uid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uid)
    {
        $eventPaymentMethod = EventPaymentMethod::find($uid);
        $eventPaymentMethod->update($request->except('_token'));
        return redirect()->back()->with('success', " Un mode paiement a été modifié.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string $uid
     * @return \Illuminate\Http\Response
     */
    public function destroy($uid)
    {
        EventPaymentMethod::destroy($uid);
        return redirect()->back()->with('success', "Un mode de paiement a été supprimé.");
    }
}
