@extends('layouts.main')
@section('title')
    Tarifs
@endsection

@section('content')
    <main class="py-12">
        <div class="flex justify-center">
            <h1 class="mt-6 text-4xl md:text-left sm:text-6xl md:text-5xl lg:text-6xl montserrat_bold">Des formules <span
                class="text-red-500 montserrat_bold">vos besoins</span>.</h1>
        </div>
        <x-container class="mt-12">
            <div class="grid gap-6 grid-cols-1 md:grid-cols-3">


                {{-- FREE PLAN --}}


                <div class="p-4 max-w-sm mx-auto rounded-lg border-2 border-green-500 hover:shadow-md sm:p-8">
                    <h5 class="mb-4 text-xl text-center text-gray-900 font-semibold">Formule standard</h5>
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
                        class="text-white transition-colors bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-blue-200 dark:focus:ring-blue-900 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full text-center">Choose
                        plan</button>
                </div>


                {{-- SILVER PLAN --}}


                <div class="p-4 max-w-sm mx-auto rounded-lg border-2 border-gray-500 hover:shadow-md sm:p-8">
                    <h5 class="mb-4 text-xl text-center text-gray-900 font-semibold">Formule silver</h5>
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
                        class="text-white transition-colors bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-blue-200 dark:focus:ring-blue-900 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full text-center">Choose
                        plan</button>
                </div>


                {{-- GOLD PLAN --}}


                <div class="p-4 max-w-sm mx-auto rounded-lg border-2 border-yellow-400 hover:shadow-md sm:p-8">
                    <h5 class="mb-4 text-xl text-center text-gray-900 font-semibold">Formule silver</h5>
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
                        class="text-white transition-colors bg-yellow-400 hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-blue-200 dark:focus:ring-blue-900 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full text-center">Choose
                        plan</button>
                </div>
                
            </div>
        </x-container>
    </main>
@endsection