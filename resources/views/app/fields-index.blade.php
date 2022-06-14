@extends('layouts.app-main')
@section('title')
    Mode de paiement à l'évènement "{{ $event->name }}"
@endsection
@section('bigTitle')
    Mode de paiement à "{{ $event->name }}"
@endsection

@section('main')
    @include('extras.success_message')

    

@endsection