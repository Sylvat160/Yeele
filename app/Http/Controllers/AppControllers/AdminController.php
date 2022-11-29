<?php

namespace App\Http\Controllers\AppControllers;

use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users_list', [
            'users' => User::where('role_id', '2')->get()
        ]);
    }

    public function events(){
        return view('admin.all_events' , ['events' => Event::all()]);
    }

    public function userDetails($uid){
        $user = User::where('uid', $uid)->first();
        return view('admin.user_details', ['user' => $user]);
    }
    public function userOrders($uid){
        $user = User::where('uid', $uid)->first();
        return view('admin.user_commands', ['user' => $user]);
    }
    public function userEvents($uid){
        return view('admin.user_events', ['user' => User::where('uid', $uid)->first()]);
    }

    // Events Status
    public function currentEvents(){
        $events = Event::where([
            ['start_date_time', '<=' , now()],
            ['end_date_time', '>=' , now()]
            ])->get();
        return view('admin.current_events', compact('events'));
    }
    public function endEvents(){
        $events = Event::where('end_date_time', '<' , now())->get();
        return view('admin.event_status.end_events', compact('events'));
    }
    public function upcomingEvents(){
        $events = Event::where('start_date_time', '>' , now())->get();
        return view('admin.event_status.upcoming_events', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
