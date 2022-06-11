<?php

namespace App\Http\Controllers\AppControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\Event;

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
        // $response = Http::get(env('COUNTRY_NOW_SPACE_API'));
        // $data = $response->json()['data'];
        // $countries = array_map(fn($country) => $country['country'], $data);
        $categories = Category::all();
        return view('app.event-create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\EventRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        $currentCommandIsGold = auth()->user()->custom['currentCommand']->plan_id === 2;
        if($currentCommandIsGold && !$request->chosen_form) {
            return redirect()->back()->with('chosen_form', "Ce champ est obligatoire.");
        }
        $data = array_merge(
            $request->validated(),
            [
                'user_uid' => auth()->user()->uid,
                'counter_active' => $request->counter_active ?? false,
                'chosen_form' => $request->chosen_form ?? false
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
        
        return redirect()->route('app.home')->with('success', "L'évènement \"$newEvent->name\" a été ajouté!");
        
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        return view('app.event-edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
