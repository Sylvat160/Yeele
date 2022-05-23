@extends('layouts.main')
@section('title') Accueil @endsection

@section('content')
    <x-container class="mt-10 grid grid-flow-col grid-cols-12 gap-2">
        <div class="col-span-6">
            <h1 class="text-6xl font-semibold" style="line-height: 5rem;">Un outil de gestion d'évènement <span class="text-red-500">simple</span>, <span class="text-red-500">rapide</span> et <span class="text-red-500">intuitif</span>.</h1>
            <p class="mt-4 text-2xl">Notre plateforme vous propose un large choix de fonctionnalités pour répondre au mieux à vos besoins.</p>
            <a href="#" class="mt-10 py-3 px-5 font-semibold text-white bg-red-500 rounded-xl">Se connecter</a>
        </div>
    </x-container>
@endsection