@extends('layouts.main')
@section('title')
    Contact
@endsection

@section('content')
    <main class="my-12">
        <x-container class="grid gap-6 md:gap-12 grid-cols-1 md:grid-cols-2">
            <div>
                <h1 class="text-4xl text-center md:text-left sm:text-5xl montserrat_bold">Contactez-nous!</h1>
                <h5 class="mt-4 text-2xl text-center md:text-left sm:text-3xl font-semibold">
                    Des <span class="text-red-500 font-semibold">questions</span>? <span class="text-red-500 font-semibold">Un commentaire</span>? Ou voudrez-vous juste entrer en contact avec nous? ecrivez-nous 👉🏽!
                </h5>
                <div class="mt-6">
                    <img src="{{ asset('images/illustrations/contact_us.svg') }}" alt="Vue d'ensemble de fonctionnalité"
                        class="w-72 h-72 md:w-80 md:h-80 lg:ml-12 mx-auto">
                </div>
            </div>
            <div class="px-4 md:px-0">
                <div class="p-4 rounded-lg border border-gray-200 shadow-md sm:p-6">
                    <form class="space-y-6" action="#">
                        <div class="grid gap-4 grid-cols-1 md:grid-cols-2">
                            <div>
                                <label for="lastname" class="block mb-2 text-sm font-medium text-gray-900">Nom: </label>
                                <input type="text" name="lastname" id="lastname"
                                    class="bg-gray-50 outline-none border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                                    placeholder="ex: Traoré, Diallo" required>
                            </div>
                            <div>
                                <label for="firstname" class="block mb-2 text-sm font-medium text-gray-900">Prénom: </label>
                                <input type="text" name="firstname" id="firstname"
                                    class="bg-gray-50 outline-none border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                                    placeholder="ex: Samuel, Issouf" required>
                            </div>
                            <div class="col-span-2">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Adresse e-mail: </label>
                                <input type="email" name="email" id="email"
                                    class="bg-gray-50 outline-none border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                                    placeholder="ex: exemple@gmail.com" required>
                            </div>
                            <div>
                                <label for="organization" class="block mb-2 text-sm font-medium text-gray-900">Organisme: </label>
                                <input type="text" name="organization" id="organization"
                                    class="bg-gray-50 outline-none border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                                    placeholder="Nom de votre organisme" required>
                            </div>
                            <div>
                                <label for="subject" class="block mb-2 text-sm font-medium text-gray-900">Object: </label>
                                <input type="text" name="subject" id="subject"
                                    class="bg-gray-50 outline-none border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                                    placeholder="Ce pourquoi vous nous contacter" required>
                            </div>
                            <div class="col-span-2">
                                <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Message: </label>
                                <textarea name="message" id="message"
                                    class="bg-gray-50 outline-none border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                                    placeholder="Votre message ..." rows="7" required></textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </x-container>
    </main>
@endsection
