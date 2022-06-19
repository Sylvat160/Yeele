@extends('layouts.website-main')
@section('title')
    Tarifs
@endsection
@section('additionnalStyle')
@endsection

@section('content')
    <main class="py-12">
        <x-website-container class="grid grid-flow-col grid-cols-12 gap-2">
            <div class="col-span-12 col-start-1 md:col-span-6 flex justify-center items-center sm:text-left">
                <h1 class="text-4xl text-center md:text-left sm:text-6xl md:text-5xl lg:text-6xl montserrat_bold">Des formules raisonnables et adaptées <span
                    class="text-red-500 montserrat_bold">vos besoins</span>.</h1>
            </div>
            <div
                class="col-span-12 col-start-1 md:col-start-7 md:col-span-6 order-first md:order-last h-fit flex justify-center items-center">
                <img src="{{ asset('images/illustrations/man_deciding.svg') }}" alt="Vue d'ensemble de fonctionnalité"
                    class="w-52 h-52 sm:w-96 sm:h-96 md:w-80 md:h-80 lg:w-96 lg:h-96 lg:ml-12">
            </div>
        </x-website-container>
        <x-website-container class="mt-12">
            <div class="grid gap-6 grid-cols-1 lg:grid-cols-3">


                {{-- FREE PLAN --}}


                <div class="p-4 max-w-sm md:max-width-xl lg:max-w-sm mx-auto rounded-lg border-2 border-green-500 hover:shadow-md sm:p-8 card">
                    <h5 class="mb-4 text-xl text-center text-gray-900 font-semibold">Formule Free</h5>
                    <div class="w-fit flex items-baseline text-gray-900 mx-auto">
                        <span class="text-4xl font-extrabold tracking-tight">0</span>
                        <span class="text-2xl font-extrabold tracking-tight">FCFA</span>
                        <span class="ml-1 text-xl font-normal text-gray-500">/mois</span>
                    </div>
                
                    <ul role="list" class="my-7 space-y-5">
                        <li class="flex space-x-3">
                
                            <svg class="flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-normal leading-tight text-green-500">5 participants/évènement</span>
                        </li>
                        <li class="flex space-x-3">
                
                            <svg class="flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-normal leading-tight text-green-500">Panneau d'administration</span>
                        </li>
                        <li class="flex space-x-3">
                
                            <svg class="flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-normal leading-tight text-green-500">Suivie</span>
                        </li>
                        <li class="flex space-x-3 line-through decoration-gray-300">
                
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-normal leading-tight text-gray-300">Espace collaboratif</span>
                        </li>
                        <li class="flex space-x-3 line-through decoration-gray-300">
                
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-normal leading-tight text-gray-300">Customisation</span>
                        </li>
                        <li class="flex space-x-3 line-through decoration-gray-300">
                
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-normal leading-tight text-gray-300">Toutes les fonctionnalités</span>
                        </li>
                    </ul>
                    <a href="{{ route('register', "Free") }}"
                        class="text-white transition-colors bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-blue-200 dark:focus:ring-blue-900 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full text-center">Démarrer avec ce formule</a>
                </div>


                {{-- SILVER PLAN --}}


                <div class="p-4 max-w-sm md:max-width-xl lg:max-w-sm mx-auto rounded-lg border-2 border-gray-500 hover:shadow-md sm:p-8 card">
                    <h5 class="mb-4 text-xl text-center text-gray-900 font-semibold">Formule Silver</h5>
                    <div class="w-fit flex items-baseline text-gray-900 mx-auto">
                        <span class="text-4xl font-extrabold tracking-tight">25.000</span>
                        <span class="text-2xl font-extrabold tracking-tight">FCFA</span>
                        <span class="ml-1 text-xl font-normal text-gray-500">/mois</span>
                    </div>
                
                    <ul role="list" class="my-7 space-y-5">
                        <li class="flex space-x-3">
                
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-300">20 participants/évènement</span>
                        </li>
                        <li class="flex space-x-3">
                
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-300">Panneau d'administration</span>
                        </li>
                        <li class="flex space-x-3">
                
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-normal leading-tight text-gray-500">Suivie</span>
                        </li>
                        <li class="flex space-x-3">
                
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-normal leading-tight text-gray-500">Espace collaboratif</span>
                        </li>
                        <li class="flex space-x-3 line-through decoration-gray-300">
                
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-normal leading-tight text-gray-300">Customisation</span>
                        </li>
                        <li class="flex space-x-3 line-through decoration-gray-300">
                
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-normal leading-tight text-gray-300">Toutes les fonctionnalités</span>
                        </li>
                    </ul>
                    <a href="{{ route('register', "Silver") }}" 
                        class="text-white transition-colors bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-blue-200 dark:focus:ring-blue-900 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full text-center">Démarrer avec ce formule</a>
                </div>


                {{-- GOLD PLAN --}}


                <div class="p-2 max-w-sm lg:max-w-sm mx-auto rounded-lg border-2 border-yellow-400 hover:shadow-md sm:px-4 sm:py-8 card">
                    <h5 class="mb-4 text-xl text-center text-gray-900 font-semibold">Formule Gold</h5>
                    <div class="w-fit flex items-baseline text-gray-900 mx-auto">
                        <span class="text-4xl font-extrabold tracking-tight">50.000</span>
                        <span class="text-2xl font-extrabold tracking-tight">FCFA</span>
                        <span class="ml-1 text-xl font-normal text-gray-500">/mois</span>
                    </div>
                
                    <ul role="list" class="my-7 space-y-5">
                        <li class="flex space-x-3">
                
                            <svg class="flex-shrink-0 w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-normal leading-tight text-yellow-400">+5000 participants/évènement</span>
                        </li>
                        <li class="flex space-x-3">
                
                            <svg class="flex-shrink-0 w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-normal leading-tight text-yellow-400 dark:text-gray-300">Panneau d'administration</span>
                        </li>
                        <li class="flex space-x-3">
                
                            <svg class="flex-shrink-0 w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-normal leading-tight text-yellow-400">Suivie</span>
                        </li>
                        <li class="flex space-x-3">
                
                            <svg class="flex-shrink-0 w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-normal leading-tight text-yellow-400">Espace collaboratif</span>
                        </li>
                        <li class="flex space-x-3">
                
                            <svg class="flex-shrink-0 w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-normal leading-tight text-yellow-400">Customisation</span>
                        </li>
                        <li class="flex space-x-3">
                
                            <svg class="flex-shrink-0 w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-normal leading-tight text-yellow-400">Toutes les fonctionnalités</span>
                        </li>
                    </ul>
                    <a href="{{ route('register', "Gold") }}"
                        class="text-white transition-colors bg-yellow-400 hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-blue-200 dark:focus:ring-blue-900 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full text-center">Démarrer avec ce formule</a>
                </div>
                
            </div>
        </x-website-container>
        <div class="my-12 w-full md:w-3/4 m-auto">
            <div class="w-11/12 bg-red-300 border-2 border-red-400 md:w-3/4 rounded-xl m-auto p-6">
                <h1 class="text-3xl text-center montserrat_bold">Votre évènement nécessite t-il d'autres fonctionnalités additionnelles? </h1>
                <div class="mt-6 py-6 text-center">
                    <a href="{{ route('website.contact') }}" class="py-4 px-8 font-semibold text-white bg-red-500 transition-all hover:bg-red-600  rounded-xl">Contactez-nous</a>
                </div>
            </div>
        </div>
    </main>
@endsection