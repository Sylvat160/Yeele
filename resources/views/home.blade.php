@extends('layouts.main')
@section('title') Accueil @endsection

@section('content')
    <x-container class="mt-12 grid grid-flow-col grid-cols-12 gap-2">
        <div class="my-10 col-span-12 col-start-1 md:col-span-6 text-center sm:text-left">
            <h1 class="text-4xl sm:text-6xl md:text-5xl lg:text-6xl font-semibold">Un outil de gestion d'évènement <span class="text-red-500">simple</span>, <span class="text-red-500">rapide</span> et <span class="text-red-500">intuitif</span>.</h1>
            <p class="mt-8 mb-12 text-lg sm:text-xl lg:text-2xl">Notre plateforme vous propose un large choix de fonctionnalités pour répondre au mieux à vos besoins.</p>
            <a href="#" class="py-4 px-6 font-semibold text-white bg-red-500 rounded-xl">Démarrer une formule</a>
        </div>
        <div class="my-10 col-span-12 col-start-1 md:col-start-7 md:col-span-6 order-first md:order-last h-fit flex justify-center items-center hero_block">
            <img src="{{ asset('images/hero.jpg') }}" alt="Hero" class="w-52 h-52 sm:w-96 sm:h-96 md:w-80 md:h-80 lg:w-96 lg:h-96 lg:ml-12 rounded-full hero">
        </div>
    </x-container>
    <main class="mt-12 py-12">
        <h1 class="text-3xl text-center">Il nous ont fait confiance</h1>
        <x-container class="mt-12 flex justify-around md:justify-center items-center">
            <div class="col-span-3 partner">
                <img src="{{ asset('images/logo_lion.png') }}" class="w-40 sm:w-60 md:w-auto md:mx-5" alt="Logo du club des lions">
            </div>
            <div class="col-span-3 partner">
                <img src="{{ asset('images/logo_FTD.png') }}" class="w-40 sm:w-60 md:w-96 md:mx-20" alt="Logo de Fortandem">
            </div>
        </x-container>
    </main>
@endsection