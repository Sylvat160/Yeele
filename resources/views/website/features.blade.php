@extends('layouts.main')
@section('title')
    Fonctionnalités
@endsection

@section('content')
    <x-website-container class="mt-12 grid grid-flow-col grid-cols-12 gap-2">
        <div class="col-span-12 col-start-1 md:col-span-6 flex justify-center items-center sm:text-left">
            <h1 class="text-4xl text-center md:text-left sm:text-6xl md:text-5xl lg:text-6xl montserrat_bold">Facilitez-vous la tache avec des
                fonctionnalités <span class="text-green-500 montserrat_bold">adaptés</span> et <span
                    class="text-red-500 montserrat_bold">personnalisable</span>.</h1>
        </div>
        <div
            class="col-span-12 col-start-1 md:col-start-7 md:col-span-6 order-first md:order-last h-fit flex justify-center items-center">
            <img src="{{ asset('images/illustrations/features_overview.svg') }}" alt="Vue d'ensemble de fonctionnalité"
                class="w-52 h-52 sm:w-96 sm:h-96 md:w-80 md:h-80 lg:w-96 lg:h-96 lg:ml-12">
        </div>
    </x-website-container>
    <main class="my-12">
        <div>
            <x-website-container class="mb-12 grid gap-4 md:gap-6 grid-cols-1 sm:grid-cols-2 md:grid-cols-3">
                <x-website-feature
                title="Personnalisation"
                text="Personnalisation basique du formulaire d'inscription et plus selon le formule choisi." />
                <x-website-feature
                    title="Système d'envoi de mail"
                    text="Vous audrez droit à un système d'envoi de mail à vos participant lors et après leur inscription." />
                <x-website-feature
                title="Système de suivi de vos évènements"
                text="Vous pourrai faire un suivi précis de vos différents évènements créés" />
                <x-website-feature
                title="Diverve moyen de paiement"
                text="Une diversité de modes de paiement ( virement bancaire, sur place, mobile paiement, à la réception de la facture, etc...)" />
                <x-website-feature
                title="Système de suivi des participants"
                text="Vue en temps réel de la liste des participants
                (consultation, édition, export…)" />
                <x-website-feature
                title="Gestion des tarifs"
                text="Gestion de la grille tarifaire (insertion des prix en fonction de la quantité d’inscriptions par exemple)" />
            </x-website-container>
        </div>
        <div class="bg-gray-100 py-12 mb-12">
            <h1 class="text-2xl md:text-4xl text-center montserrat_bold">Vous aurez à votre disposition</h1>
            <x-website-container class="mt-12 grid gap-6 md:grid-cols-3 grid-cols-1">
                <div>
                    <img src="{{ asset('images/icons/dashboard.svg') }}" alt="Tableau de bord" class="w-20 h-20 mx-auto">
                    <h1 class="mt-4 text-xl font-semibold text-center">Un espace administrateur facile d'utilisation.</h1>
                </div>
                <div>
                    <img src="{{ asset('images/icons/statistics.svg') }}" alt="Tableau de bord" class="w-20 h-20 mx-auto">
                    <h1 class="mt-4 text-xl font-semibold text-center">Un système de suivi en temps réels.</h1>
                </div>
                <div>
                    <img src="{{ asset('images/icons/security.svg') }}" alt="Tableau de bord" class="w-20 h-20 mx-auto">
                    <h1 class="mt-4 text-xl font-semibold text-center">Un service à 100% sécurisé.</h1>
                </div>
            </x-website-container>
        </div>

    </main>
@endsection
