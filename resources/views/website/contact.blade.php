@extends('layouts.website-main')
@section('title')
    Contact
@endsection

@section('content')
    <main class="my-12">
        <x-website-container class="grid gap-6 md:gap-12 grid-cols-1 md:grid-cols-2">
            <div>
                <h1 class="text-4xl text-center md:text-left sm:text-5xl montserrat_bold">Contactez-nous!</h1>
                <h5 class="mt-4 text-2xl text-center md:text-left sm:text-2xl lg:text-3xl font-semibold">
                    Des <span class="text-red-500 font-semibold">questions</span>? <span class="text-red-500 font-semibold">Un
                        commentaire</span>? Ou voudrez-vous juste entrer en contact avec nous? ecrivez-nous <span
                        class="hidden md:inline">👉🏽</span>!
                </h5>
                <div class="mt-6">
                    <img src="{{ asset('images/illustrations/contact_us.svg') }}" alt="Vue d'ensemble de fonctionnalité"
                        class="w-72 h-72 md:w-96 md:h-80 lg:ml-12 mx-auto">
                </div>
            </div>
            <div class="px-4 md:px-0">
                <div class="p-4 rounded-lg border border-gray-200 shadow-md sm:p-6">
                    @if ($message = Session::get('success'))
                    <div class="p-4">
                        <div id="alert-2" class="flex p-4 bg-green-100 rounded-lg" role="alert">
                            <svg class="flex-shrink-0 w-5 h-5 text-green-700" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                            <div class="ml-3 text-sm font-medium text-green-700">
                              {{$message}}
                            </div>
                            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8" data-dismiss-target="#alert-2" aria-label="Close">
                              <span class="sr-only">Close</span>
                              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </button>
                          </div>
                    </div>
                    {{Session::forget('success')}}
                    @endif
                    <form class="space-y-6" action="{{ route('website.contact.send') }}" method="POST">
                        @csrf
                        <div class="grid gap-4 grid-cols-1 md:grid-cols-2">
                            <div class="col-span-2 md:col-auto">
                                <label for="lastname" class="block mb-2 text-sm font-semibold text-gray-900">Nom: </label>
                                <input type="text" name="lastname" id="lastname"
                                    class="bg-gray-50 outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                                    placeholder="ex: Traoré, Diallo" required>
                                    @error('lastname')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-2 md:col-auto">
                                <label for="firstname" class="block mb-2 text-sm font-semibold text-gray-900">Prénom:
                                </label>
                                <input type="text" name="firstname" id="firstname"
                                    class="bg-gray-50 outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                                    placeholder="ex: Samuel, Issouf" required>
                                    @error('firstname')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-2">
                                <label for="email" class="block mb-2 text-sm font-semibold text-gray-900">Adresse e-mail:
                                </label>
                                <input type="email" name="email" id="email"
                                    class="bg-gray-50 outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                                    placeholder="ex: exemple@gmail.com" required>
                                    @error('email')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-2 md:col-auto">
                                <label for="organization" class="block mb-2 text-sm font-semibold text-gray-900">Organisme:
                                </label>
                                <input type="text" name="organization" id="organization"
                                    class="bg-gray-50 outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                                    placeholder="Nom de votre organisme" required>
                                    @error('organization')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-2 md:col-auto">
                                <label for="subject" class="block mb-2 text-sm font-semibold text-gray-900">Object:
                                </label>
                                <input type="text" name="subject" id="subject"
                                    class="bg-gray-50 outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                                    placeholder="Ce pourquoi vous nous contacter" required>
                                    @error('subject')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-2">
                                <label for="message" class="block mb-2 text-sm font-semibold text-gray-900">Message:
                                </label>
                                <textarea name="message" id="message"
                                    class="bg-gray-50 outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                                    placeholder="Votre message ..." rows="7" required></textarea>
                                    @error('message')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-2 md:col-auto">
                                @captcha
                            </div>
                            <div class="col-span-2 md:col-auto">
                                <label for="captcha" class="block mb-2 text-sm font-semibold text-gray-900">Captcha:
                                </label>
                                <input type="text" id="captcha" class="bg-gray-50 outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full p-2.5" name="captcha" autocomplete="off" placeholder="Entrez le captcha" required>
                                @error('captcha')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-2 mt-4 text-center">
                                <button type="submit"
                                    class="py-3 px-12 font-semibold text-white bg-red-500 transition-all hover:bg-red-600 rounded-xl">Envoyer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </x-website-container>
    </main>
@endsection