@extends('layouts.main')
@section('title') Accueil @endsection

@section('content')
    <x-container class="mt-12 grid grid-flow-col grid-cols-12 gap-2">
        <div class="col-span-12 col-start-1 md:col-span-6">
            <h1 class="text-5xl lg:text-6xl font-semibold">Un outil de gestion d'évènement <span class="text-red-500">simple</span>, <span class="text-red-500">rapide</span> et <span class="text-red-500">intuitif</span>.</h1>
            <p class="mt-8 mb-12 text-lg sm:text-xl lg:text-2xl">Notre plateforme vous propose un large choix de fonctionnalités pour répondre au mieux à vos besoins.</p>
            <a href="#" class="py-4 px-6 font-semibold text-white bg-red-500 rounded-xl">Démarrer une formule</a>
        </div>
        <div class="col-span-12 col-start-1 md:col-start-7 md:col-span-6 order-first md:order-last h-fit flex justify-center">
            <img src="{{ asset('images/hero.jpg') }}" alt="Hero" class=" w-96 h-96 rounded-full hero">
        </div>
    </x-container>
@endsection