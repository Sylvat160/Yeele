<?php

namespace App\Http\Controllers\AppControllers;

use App\Http\Controllers\Controller;
use App\Models\Command;
use App\Models\PaymentMethod;
use App\Models\Plan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
        $plans = Plan::all();
        $payment_methods = PaymentMethod::all();
        return view('app.command-create', compact('plans', 'payment_methods'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validated($request);
        if($validator->fails()) return redirect()->back()->withErrors($validator);
        $lastCommand = auth()->user()->commands->last();
        
        if($lastCommand) {
            $startDate_time = new Carbon($lastCommand->end_date_time);
            $startDate_time->addDay();
            $endDate_time = new Carbon($startDate_time);
        } else {
            $startDate_time = new Carbon();
            $endDate_time = new Carbon($startDate_time);
        }
        $endDate_time->addMonths($request->duration);
        $command = Command::create([
            'user_uid' => auth()->user()->uid,
            'uid' => Str::uuid(),
            'plan_id' => $request->plan,
            'duration' => $request->duration,
            'payment_method_id' => $request->payment_method,
            'start_date_time' => $startDate_time,
            'end_date_time' => $endDate_time
        ]);

        return redirect()->route('app.home')->with('success', "Votre commande a été prise en compte.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $command_uid
     * @return \Illuminate\Http\Response
     */
    public function edit($command_uid)
    {
        $command = Command::where('uid', $command_uid)->first();
        $plans = Plan::all();
        $payment_methods = PaymentMethod::all();
        return view('app.command-edit', compact('command', 'plans', 'payment_methods'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $uid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uid)
    {
        $validator = $this->validated($request);
        if($validator->failed()) {
            return redirect()->back()->withErrors($validator);
        }

        $command = Command::where('uid', $uid)->first();
        $startDate_time = new Carbon($command->start_date);
        $endDate_time = new Carbon($startDate_time);
        $endDate_time->addMonths($request->duration);
        
        $command->update([
                'plan_id' => $request->plan,
                'duration' => $request->duration,
                'payment_method_id' => $request->payment_method,
                'start_date_time' => $startDate_time,
                'end_date_time' => $endDate_time
                ]);
        return redirect()->route('app.home')->with('success', "Votre commande est à jour!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $command = Command::where('uid', $id)->first();
        Command::destroy($command->id);
        return redirect()->back()->with('success', "Votre commande a été supprimée avec succès!");
    }

    protected function validated(Request $request) {
        if((int) $request->plan === 1) {
            $validator = Validator::make(
                $request->all(),
                [
                    'plan' => 'required',
                    'duration' => 'required|integer',
                ],
                [
                    'required' => "Ce champ est obligatoire",
                    'integer' => "Ce champ ne doit avoir pour valeur qu'un nombre."
                ]
                );
        } else {
            $validator = Validator::make(
                $request->all(),
                [
                    'plan' => 'required',
                    'duration' => 'required|integer',
                    'payment_method' => 'required'
                ],
                [
                    'required' => "Ce champ est obligatoire",
                    'integer' => "Ce champ ne doit avoir pour valeur qu'un nombre."
                ]
                );
        }

        return $validator;
    }
}
