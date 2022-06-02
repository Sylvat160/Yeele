@extends('layouts.main')
@section('title')
    Tarifs
@endsection

@section('content')
    <main class="py-12">
        <x-container class="grid grid-flow-col grid-cols-12 gap-2">
            <div class="col-span-12 col-start-1 md:col-span-6 flex justify-center items-center sm:text-left">
                <h1 class="text-4xl text-center md:text-left sm:text-6xl md:text-5xl lg:text-6xl montserrat_bold">Des formules raisonnables et adaptées <span
                    class="text-red-500 montserrat_bold">vos besoins</span>.</h1>
            </div>
            <div
                class="col-span-12 col-start-1 md:col-start-7 md:col-span-6 order-first md:order-last h-fit flex justify-center items-center">
                <img src="{{ asset('images/illustrations/man_deciding.svg') }}" alt="Vue d'ensemble de fonctionnalité"
                    class="w-52 h-52 sm:w-96 sm:h-96 md:w-80 md:h-80 lg:w-96 lg:h-96 lg:ml-12">
            </div>
        </x-container>
        <x-container class="mt-12">
            <div class="grid gap-6 grid-cols-1 md:grid-cols-3">


                {{-- FREE PLAN --}}


                <div class="p-4 max-w-sm mx-auto rounded-lg border-2 border-green-500 hover:shadow-md sm:p-8">
                    <h5 class="mb-4 text-xl text-center text-gray-900 font-semibold">Formule Standard</h5>
                    <div class="w-fit flex items-baseline text-gray-900 mx-auto">
                        <span class="text-5xl font-extrabold tracking-tight">Free</span>
                    </div>
                
                    <ul role="list" class="my-7 space-y-5">
                        <li class="flex space-x-3">
                
                            <svg class="flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-normal leading-tight text-green-500">2 team members</span>
                        </li>
                        <li class="flex space-x-3">
                
                            <svg class="flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-normal leading-tight text-green-500">20GB Cloud storage</span>
                        </li>
                        <li class="flex space-x-3">
                
                            <svg class="flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-normal leading-tight text-green-500">Integration help</span>
                        </li>
                        <li class="flex space-x-3 line-through decoration-gray-300">
                
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-normal leading-tight text-gray-300">Sketch Files</span>
                        </li>
                        <li class="flex space-x-3 line-through decoration-gray-300">
                
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-normal leading-tight text-gray-300">API Access</span>
                        </li>
                        <li class="flex space-x-3 line-through decoration-gray-300">
                
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-normal leading-tight text-gray-300">Complete documentation</span>
                        </li>
                        <li class="flex space-x-3 line-through decoration-gray-300">
                
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-normal leading-tight text-gray-300">24×7 phone &amp; email support</span>
                        </li>
                    </ul>
                    <button type="button"
                        class="text-white transition-colors bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-blue-200 dark:focus:ring-blue-900 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full text-center">Démarrer avec ce formule</button>
                </div>


                {{-- SILVER PLAN --}}


                <div class="p-4 max-w-sm mx-auto rounded-lg border-2 border-gray-500 hover:shadow-md sm:p-8">
                    <h5 class="mb-4 text-xl text-center text-gray-900 font-semibold">Formule Silver</h5>
                    <div class="w-fit flex items-baseline text-gray-900 mx-auto">
                        <span class="text-5xl font-extrabold tracking-tight">25.000</span>
                        <span class="text-3xl font-extrabold tracking-tight">FCFA</span>
                    </div>
                
                    <ul role="list" class="my-7 space-y-5">
                        <li class="flex space-x-3">
                
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-300">2 team members</span>
                        </li>
                        <li class="flex space-x-3">
                
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-300">20GB Cloud storage</span>
                        </li>
                        <li class="flex space-x-3">
                
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-normal leading-tight text-gray-500">Integration help</span>
                        </li>
                        <li class="flex space-x-3 line-through decoration-gray-300">
                
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-normal leading-tight text-gray-300">Sketch Files</span>
                        </li>
                        <li class="flex space-x-3 line-through decoration-gray-300">
                
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-normal leading-tight text-gray-300">API Access</span>
                        </li>
                        <li class="flex space-x-3 line-through decoration-gray-300">
                
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-normal leading-tight text-gray-300">Complete documentation</span>
                        </li>
                        <li class="flex space-x-3 line-through decoration-gray-300">
                
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-normal leading-tight text-gray-300">24×7 phone &amp; email support</span>
                        </li>
                    </ul>
                    <button type="button"
                        class="text-white transition-colors bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-blue-200 dark:focus:ring-blue-900 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full text-center">Démarrer avec ce formule</button>
                </div>


                {{-- GOLD PLAN --}}


                <div class="p-4 max-w-sm mx-auto rounded-lg border-2 border-yellow-400 hover:shadow-md sm:p-8">
                    <h5 class="mb-4 text-xl text-center text-gray-900 font-semibold">Formule Gold</h5>
                    <div class="w-fit flex items-baseline text-gray-900 mx-auto">
                        <span class="text-5xl font-extrabold tracking-tight">50.000</span>
                        <span class="text-3xl font-extrabold tracking-tight">FCFA</span>
                    </div>
                
                    <ul role="list" class="my-7 space-y-5">
                        <li class="flex space-x-3">
                
                            <svg class="flex-shrink-0 w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-normal leading-tight text-yellow-400">2 team members</span>
                        </li>
                        <li class="flex space-x-3">
                
                            <svg class="flex-shrink-0 w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-normal leading-tight text-yellow-400 dark:text-gray-300">20GB Cloud storage</span>
                        </li>
                        <li class="flex space-x-3">
                
                            <svg class="flex-shrink-0 w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-normal leading-tight text-yellow-400">Integration help</span>
                        </li>
                        <li class="flex space-x-3 line-through decoration-gray-300">
                
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-normal leading-tight text-gray-300">Sketch Files</span>
                        </li>
                        <li class="flex space-x-3 line-through decoration-gray-300">
                
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-normal leading-tight text-gray-300">API Access</span>
                        </li>
                        <li class="flex space-x-3 line-through decoration-gray-300">
                
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-normal leading-tight text-gray-300">Complete documentation</span>
                        </li>
                        <li class="flex space-x-3 line-through decoration-gray-300">
                
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-normal leading-tight text-gray-300">24×7 phone &amp; email support</span>
                        </li>
                    </ul>
                    <button type="button"
                        class="text-white transition-colors bg-yellow-400 hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-blue-200 dark:focus:ring-blue-900 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full text-center">Démarrer avec ce formule</button>
                </div>
                
            </div>
        </x-container>
        <div class="my-12 w-full md:w-3/4 m-auto">
            <div class="w-11/12 bg-red-300 border-2 border-red-400 md:w-3/4 rounded-xl m-auto p-6">
                <h1 class="text-3xl text-center montserrat_bold">Votre évènement nécessite t-il d'autre fonctionnalités additionnelles? </h1>
                <div class="mt-6 py-6 text-center">
                    <a href="{{ route('contact') }}" class="py-4 px-8 font-semibold text-white bg-red-500 transition-all hover:bg-red-600  rounded-xl">Contactez-nous</a>
                </div>
            </div>
        </div>
    </main>
@endsection