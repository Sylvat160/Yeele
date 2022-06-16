<?php

namespace App\Http\Controllers\AppControllers;

use App\Http\Controllers\Controller;
use App\Models\Command;
use App\Models\PaymentMethod;
use App\Models\Plan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app.command-index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $payment_methods = PaymentMethod::all();
        return view('app.command-create', compact('payment_methods'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $uid
     * @return \Illuminate\Http\Response
     */
    public function edit($uid)
    {
        $command = Command::where('uid', $uid)->first();
        $plans = Plan::all();
        $payment_methods = PaymentMethod::all();
        return view('app.command-edit', compact('command', 'plans', 'payment_methods'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param string $uid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uid)
    {
        $command = Command::where('uid', $uid)->first();
        $validator = Validator::make(
            $request->all(),
            [
                'plan_id' => 'required',
                'duration' => 'required|integer',
                'payment_method_id' => 'required'
            ],
            [
                'required' => "Ce champ est obligatoire.",
                'integer' => "Ce champ doit conténir un entier."
            ]
            );

        if($validator->fails()) return redirect()->back()->withErrors($validator);
        $startDateTime = new Carbon();
        $endDateTime = new Carbon($startDateTime);
        $endDateTime->addMonths($request->duration);
        $data = array_merge(
            $request->except('_token', '_method', 'duration'), 
            [
                'active' => true,
                'start_date_time' => $startDateTime,
                'end_date_time' => $endDateTime
            ]
        );
        
        $command->update($data);
        return redirect()->route('app.home')->with('success', "Votre commande a été mise à jour.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
