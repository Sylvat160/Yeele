<?php

namespace App\Http\Controllers\AppControllers;

use Carbon\Carbon;
use App\Models\Type;
use App\Models\User;
use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app.event-index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $types = Type::all();
        return view('app.event-create', compact('categories', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\EventRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        $currentCommandIsGold = auth()->user()->custom['currentCommand'] && auth()->user()->custom['currentCommand']->plan_id === 2;
        if($currentCommandIsGold && !isset($request->chosen_form)) {
            return redirect()->back()->with('error', "La sélection du type de formulaire est obligatoire.")->withInput($request->except('_token'));
        }
        $data = array_merge(
            $request->validated(),
            [
                'user_uid' => auth()->user()->uid,
                'counter_active' => $request->counter_active ?? false,
                'chosen_form' => $request->chosen_form ?? false,
                'bg_color' => $request->bg_color,
                'text_color' => $request->text_color
            ],
        );

        if($file = $request->file('image')) {
            $storagePath = $file->store('public/events');
            $imagePath = str_replace('public/', '', $storagePath); 
            $data['image'] = $imagePath;
        }

        $data['start_date_time'] = $this->format($data['start_date_time']);
        $data['end_date_time'] = $this->format($data['end_date_time']);
        $data['signup_end_date_time'] = $this->format($data['signup_end_date_time']);

        $newEvent = Event::create($data);
        
        return redirect()->route('event.index')->with('success', "L'évènement \"$newEvent->name\" a été ajouté!");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $uid
     * @return \Illuminate\Http\Response
     */
    public function show($uid)
    {
        $event_menu = true;
        $event = Event::find($uid);
        $paymentMethods = $event->event_payment_methods;
        $payment_total = $event->participants->sum('price');

        $madePayments = $event->participants->filter(function($participant) {
            return $participant->payment_status === 1 || $participant->payment_reference !== null;
        })->sum('price');


        return view('app.event-show', compact('event', 'event_menu' , 'payment_total' , 'paymentMethods', 'madePayments'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  string $uid
     * @return \Illuminate\Http\Response
     */
    public function edit($uid)
    {
        $event = Event::find($uid);
        $categories = Category::all();
        $types = Type::all();
        return view('app.event-edit', compact('event', 'categories', 'types'));
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
        $event = Event::find($uid);
        $data = $request->except('_token', '_method'); 
        if($file = $request->file('image')) {
            $storagePath = $file->store('public/events');
            $imagePath = str_replace('public/', '', $storagePath); 
            $data['image'] = $imagePath;
        }
        if(!isset($request->counter_active)) $data['counter_active'] = 0;
        $event->update($data);
        return redirect()->route('event.show', $event->uid)->with('success', "Votre évènement a été modifié avec succès!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string $uid
     * @return \Illuminate\Http\Response
     */
    public function destroy($uid)
    {
        Event::destroy($uid);
        return redirect()->back()->with('success', "La suppression de l'évènement a été un succès!");
    }

    /**
     * Format coming request datetime input to DateTime instance
     * 
     * @param  string  $datetime
     * @return Carbon\Carbon;
     */
    
    protected function format($datetime) {
        $modified_datetime = str_replace('/', '-', $datetime);
        $newDateTime = new Carbon($modified_datetime);
        return $newDateTime;
    }

    
}
