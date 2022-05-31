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
    <main class="mt-4 md:mt-12 py-6">
        <div class="mt-6 py-4 bg-gray-200">
            <x-container class="flex justify-around md:justify-center items-center">
                <div class="col-span-3 partner">
                    <img src="{{ asset('images/brands/logo_lion.png') }}" class="w-40 sm:w-60 md:w-auto md:mx-5" alt="Logo du club des lions">
                </div>
                <div class="col-span-3 partner">
                    <img src="{{ asset('images/brands/logo_FTD.png') }}" class="w-40 sm:w-60 md:w-96 md:mx-20" alt="Logo de Fortandem">
                </div>
            </x-container>
        </div>
        <x-container class="my-12">
            <div class="w-11/12 py-12 m-auto">
                <h1 class="text-4xl text-center sm:text-5xl montserrat_bold">Des fonctionnalités adaptés pour vous faciliter les inscriptions lors de vos <span class="text-green-500 montserrat_bold">énèvenements</span>.</h1>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2">
                <div class="mt-6 grid gap-6 sm:grid-cols-2">
                    <div class="flex">
                        <img src="{{ asset('images/icons/congress.svg') }}" alt="Congrès, séminaires, Salon professionnel, teams building" class="w-24 mx-auto">
                        <div>
                            <h1 class="mt-4 text-xl font-semibold">Congrès, séminaires</h1>
                            <p class="lg:text-sm xl:text-base">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                    <div class="flex">
                        <img src="{{ asset('images/icons/meeting.svg') }}" alt="Réunion, Assemblée générale" class="w-24 mx-auto">
                        <div>
                            <h1 class="mt-4 text-xl font-semibold">Réunions, assemblée</h1>
                            <p class="lg:text-sm xl:text-base">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                    <div class="flex">
                        <img src="{{ asset('images/icons/training.svg') }}" alt="Session de formation" class="w-24 mx-auto">
                        <div>
                            <h1 class="mt-4 text-xl font-semibold">Session de formation</h1>
                            <p class="lg:text-sm xl:text-base">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                    <div class="flex">
                        <img src="{{ asset('images/icons/wedding.svg') }}" alt="Mariage" class="w-24 mx-auto">
                        <div>
                            <h1 class="mt-4 text-lg font-semibold">Mariage</h1>
                            <p class="lg:text-sm xl:text-base">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                    <div class="flex">
                        <img src="{{ asset('images/icons/birthday.svg') }}" alt="Anniversaire" class="w-24 mx-auto">
                        <div>
                            <h1 class="mt-4 text-lg font-semibold">Anniversaire</h1>
                            <p class="lg:text-sm xl:text-base">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                    <div class="flex">
                        <img src="{{ asset('images/icons/party.svg') }}" alt="Spectacle" class="w-24 mx-auto">
                        <div>
                            <h1 class="mt-4 text-lg font-semibold">Spectacle</h1>
                            <p class="lg:text-sm xl:text-base">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center items-center">
                    <img src="{{ asset('images/illustrations/typing_hands.svg') }}" alt="Femme tapant sur un clavier" class="w-4/5">
                </div>
            </div>
        </x-container>
        <div class="my-12 py-12 w-full md:w-3/4 m-auto">
            <h1 class="text-4xl sm:text-5xl text-center montserrat_bold">Nous avons enrégistré plus de <span class="text-red-500 montserrat_bold">5000</span> inscriptions évènementielles.</h1>
        </div>
        <div class="bg-red-200">
            <x-container>
                <figure class="relative flex flex-col-reverse bg-slate-50 rounded-lg p-6 dark:bg-slate-800 dark:highlight-white/5"><blockquote class="mt-6 text-slate-700 dark:text-slate-300"><p>Have been working with CSS for over ten years and Tailwind just makes my life easier. It is still CSS and you use flex, grid, etc. but just quicker to write and maintain.</p></blockquote><figcaption class="flex items-center space-x-4"><img src="/_next/static/media/debbie-obrien.fd2a06311039f2d0bf1828d36c209714.jpg" alt="" class="flex-none w-14 h-14 rounded-full object-cover" loading="lazy"><div class="flex-auto"><div class="text-base text-slate-900 font-semibold dark:text-slate-300"><a href="https://twitter.com/debs_obrien/status/1243255468241420288" tabindex="0" class=""><span class="absolute inset-0"></span>Debbie O'Brien</a></div><div class="mt-0.5">Senior Program Manager at Microsoft</div></div></figcaption></figure>
            </x-container>
        </div>
    </main>
@endsection