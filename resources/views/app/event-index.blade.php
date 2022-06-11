@extends('layouts.app-main')
@section('title')
    Mes évènements
@endsection
@section('bigTitle')
    Mes évènements
@endsection

@section('main')
    <h5 class="text-center">Total de vos évènements: {{ Auth::user()->events->count() }}</h5>
    <div class="mt-2 row">
        @foreach (Auth::user()->events->sortDesc() as $event)
            <div 
            @switch(Auth::user()->events->count())
                @case(1)
                class="col-8"
                    @break
                @case(2)
                class="col-6"
                    @break
            
                @default
                class="col-4"
            @endswitch
            >
                
            </div>
        @endforeach
    </div>
@endsection