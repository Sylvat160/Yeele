@extends('layouts.website-main')
@section('title')
    Accueil
@endsection

@section('additionnalStyle')
    <link rel="stylesheet" href="{{ asset('app_assets/plugins/fontawesome/css/all.min.css') }}">
    {{-- <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"  > --}}
     <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/carousssel.css')}}">


    <style>
        .hero_block {
            background: url(../images/backgrounds/hero_bg.png) no-repeat;
            background-position: right;
            background-size: contain;
        }

        @media (max-width: 767px) {
            .hero_block {
                background: none;
            }
        }

        

    </style>
@endsection

@section('content')
    <x-website-container class="mt-12 grid grid-flow-col grid-cols-12 gap-2">
        <div class="my-10 col-span-12 col-start-1 md:col-span-6 text-center sm:text-left">
            <h1 class="text-4xl sm:text-6xl md:text-5xl lg:text-6xl montserrat_bold big_title">Un outil de gestion
                d'évènement <span class="text-red-500 montserrat_bold">simple</span>, <span
                    class="text-red-500 montserrat_bold">rapide</span> et <span
                    class="text-red-500 montserrat_bold">intuitif</span>.</h1>
            <p class="mt-8 mb-8 text-lg sm:text-xl lg:text-2xl">Notre plateforme vous propose un large choix de
                fonctionnalités pour répondre au mieux à vos besoins.</p>
            <a href="{{ route('website.prices') }}"
                class="py-4 px-6 font-semibold text-white bg-red-500 transition-all hover:bg-red-600 rounded-xl">Démarrer
                une formule</a>
        </div>
        <div
            class="my-10 col-span-12 col-start-1 md:col-start-7 md:col-span-6 order-first md:order-last h-fit flex justify-center items-center hero_block">
            <img src="{{ asset('images/hero.jpg') }}" alt="Hero"
                class="w-52 h-52 sm:w-96 sm:h-96 md:w-80 md:h-80 lg:w-96 lg:h-96 lg:ml-12 rounded-full hero">
        </div>
    </x-website-container>
    
    <section class="event-bg">
        <h1 class="mx-12 my-10 text-gray-700 text-3xl text-center sm:text-5xl montserrat_bold text-center" style="font-family: 'Dancing Script', cursive, sans-serif;">

            Evenements en cours
        </h1>
        <div class="container mx-auto w-full overflow-hidden relative">
            <div class="w-full h-full absolute">
                <div class="w-1/4 h-full absolute z-50 left-0" style="background: linear-gradient(to right, #edf2f7 0%, rgba(255, 255, 255, 0) 100%);"></div>
                <div class="w-1/4 h-full absolute z-50 right-0" style="background: linear-gradient(to left, #edf2f7 0%, rgba(255, 255, 255, 0) 100%);"></div>
            </div>

            <div class="carousel-items flex items-center justify-center " style="width: fit-content; animation: carouselAnim 30s infinite alternate linear;">

                @forelse($currentEvent as $event)
                    
                <div class="carousel-focus flex items-center flex-col relative bg-white mx-5 my-10 px-4 py-3 rounded-lg shadow-lg" style="width: 270px;">
                    {{-- <svg class="fill-current text-teal-400 hover:text-teal-500 cursor-pointer h-12 w-12 absolute top-0 right-0 mt-2 -mr-5" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                        <path d="M11.5 0C17.847 0 23 5.153 23 11.5S17.847 23 11.5 23 0 17.847 0 11.5 5.153 0 11.5 0zm0 1C17.295 1 22 5.705 22 11.5S17.295 22 11.5 22 1 17.295 1 11.5 5.705 1 11.5 1zm.5 10h6v1h-6v6h-1v-6H5v-1h6V5h1v6z" /></svg> --}}
                    <!-- <button class="absolute top-0 right-0 bg-teal-400 rounded-full px-1 py-0 font-bold text-lg">+</button> -->
                    <span class="text-black font-bold text-xl mb-3"> {{$event->name}} </span>
                    <img class="h-16 w-16 rounded-full shadow-2xl" src="https://pbs.twimg.com/profile_images/830533062807191552/TbkWKnnv_400x400.jpg" alt="Img">
                    <p class="mt-3 text-gray-600 text-center"> {{ $event->description }} </p>
                    <button class="mt-4 mb-2 bg-red-400 rounded-full px-12 py-1 text-gray-100 font-semibold hover:bg-red-600 focus:outline-none"> <a href="{{route('show_event_form',$event->uid)}}"> Details </a> </button>


                </div>
                @empty
                    
                <div class="carousel-focus flex items-center flex-col relative bg-white mx-5 my-10 px-4 py-3 rounded-lg shadow-lg" style="width: 270px;">
                    <!-- <button class="absolute top-0 right-0 bg-teal-400 rounded-full px-1 py-0 font-bold text-lg">+</button> -->
                    <span class="text-black font-bold text-xl mb-3">Evenements</span>
                    <img src="{{ asset('images/illustrations/empty.svg') }}" width="100" alt="Aucun évènement enregistré">
                    <p class="mt-3 text-gray-600 text-center"> Aucun evenement </p>
                </div>
                @endforelse

                

                
                

                
            </div>

        </div>


    </section>

    <section >
        <h1 class="mx-12 my-10 text-gray-700 text-3xl  sm:text-5xl montserrat_bold text-center" style="font-family: 'Dancing Script', cursive, sans-serif;">

            Evenements a venir
        </h1>
        <div class="container mx-auto w-full overflow-hidden relative">
            <div class="w-full h-full absolute">
                <div class="w-1/4 h-full absolute z-50 left-0" style="background: linear-gradient(to right, #edf2f7 0%, rgba(255, 255, 255, 0) 100%);"></div>
                <div class="w-1/4 h-full absolute z-50 right-0" style="background: linear-gradient(to left, #edf2f7 0%, rgba(255, 255, 255, 0) 100%);"></div>
            </div>

            <div class="carousel-items flex items-center justify-center" style="width: fit-content; animation: carouselAnim 20s infinite alternate linear;">

                @forelse($comingupEvent as $event)

                <div class="carousel-focus flex items-center flex-col relative bg-white mx-5 my-10 px-4 py-3 rounded-lg shadow-lg" style="width: 270px;">
                    <!-- <button class="absolute top-0 right-0 bg-teal-400 rounded-full px-1 py-0 font-bold text-lg">+</button> -->
                    <span class="text-teal-400 font-bold text-xl mb-3"> {{$event->name}} </span>
                    <img class="h-16 w-16 rounded-full shadow-2xl" src="https://pbs.twimg.com/profile_images/830533062807191552/TbkWKnnv_400x400.jpg" alt="Img">
                    <p class="mt-3 text-gray-600 text-center"> {{ $event->description }} </p>
                    <button class="mt-4 mb-2 bg-red-400 rounded-full px-12 py-1 text-gray-100 font-semibold hover:bg-red-600 focus:outline-none"> <a href="{{route('show_event_form',$event->uid)}}"> Details </a> </button>

                </div>
                @empty

                <div class="carousel-focus flex items-center flex-col relative bg-white mx-5 my-10 px-4 py-3 rounded-lg shadow-lg" style="width: 270px;">
                    <!-- <button class="absolute top-0 right-0 bg-teal-400 rounded-full px-1 py-0 font-bold text-lg">+</button> -->
                    <span class="text-black font-bold text-xl mb-3">Evenements</span>
                    <img src="{{ asset('images/illustrations/empty.svg') }}" width="100"  alt="Aucun évènement enregistré">

                    <p class="mt-3 text-gray-600 text-center"> Aucun evenement </p>
                    
                </div>
                @endforelse







            </div>

        </div>


    </section>

    <main class="mt-4 md:mt-12 py-6">
        <div class="mt-6 py-4 bg-gray-100">
            <x-website-container class="flex justify-around md:justify-center items-center">
                <div class="col-span-3 partner">
                    <img src="{{ asset('images/brands/fanion.png') }}" class="w-32 h-40 sm:w-40 sm:h-52 md:mx-5"
                        alt="Logo du club des lions">
                </div>
                <div class="col-span-3 partner">
                    <img src="{{ asset('images/brands/femi.png') }}" class="w-40 sm:w-60 md:w-96 md:mx-20"
                        alt="Logo de Fortandem">
                </div>
            </x-website-container>
        </div>
        <x-website-container class="my-12">
            <div class="w-11/12 py-12 m-auto">
                <h1 class="text-3xl text-center sm:text-5xl montserrat_bold">Gérer facilement 
                    les inscriptions de vos différents <span class="text-green-500 montserrat_bold">énèvenements</span>.
                </h1>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2">
                <div class="mt-6 grid gap-6 sm:grid-cols-2">
                    <div class="w-80 md:w-auto px-6 sm:px-0 mx-auto">
                        <img src="{{ asset('images/icons/congress.svg') }}"
                            alt="Congrès, séminaires, Salon professionnel, teams building" class="w-24 mx-auto">
                        <div class="text-center">
                            <h1 class="mt-4 text-xl font-semibold">Congrès, séminaires</h1>
                            <p class="lg:text-sm xl:text-base">Facilitez-vous l'organisation de vos différents congrès, séminaires ou de vos conférences.</p>
                        </div>
                    </div>
                    <div class="w-80 md:w-auto px-6 sm:px-0 mx-auto">
                        <img src="{{ asset('images/icons/meeting.svg') }}" alt="Réunion, Assemblée générale"
                            class="w-24 mx-auto">
                        <div class="text-center">
                            <h1 class="mt-4 text-xl font-semibold">Réunions, assemblée</h1>
                            <p class="lg:text-sm xl:text-base">Gérer facilement les inscriptions lors de vos différents réunions et assemblées.</p>
                        </div>
                    </div>
                    <div class="w-80 md:w-auto px-6 sm:px-0 mx-auto">
                        <img src="{{ asset('images/icons/training.svg') }}" alt="Session de formation"
                            class="w-24 mx-auto">
                        <div class="text-center">
                            <h1 class="mt-4 text-xl font-semibold">Session de formation</h1>
                            <p class="lg:text-sm xl:text-base">Planifier sa formation ne s'est jamais révélé aussi facile que sur cette plateforme.</p>
                        </div>
                    </div>
                    <div class="w-80 md:w-auto px-6 sm:px-0 mx-auto">
                        <img src="{{ asset('images/icons/wedding.svg') }}" alt="Mariage" class="w-24 mx-auto">
                        <div class="text-center">
                            <h1 class="mt-4 text-lg font-semibold">Mariage</h1>
                            <p class="lg:text-sm xl:text-base">Un mariage réussi est un mariage bien organisé. Yeele vous facilite la gestion de vos des différents comités et vos invités.</p>
                        </div>
                    </div>
                    <div class="w-80 md:w-auto px-6 sm:px-0 mx-auto">
                        <img src="{{ asset('images/icons/birthday.svg') }}" alt="Anniversaire" class="w-24 mx-auto">
                        <div class="text-center">
                            <h1 class="mt-4 text-lg font-semibold">Anniversaire</h1>
                            <p class="lg:text-sm xl:text-base">Souvent vous vous voyez débordé par le nombre d'invités présent dans vos anniversaires et vous avez du mal à gérer ce monde.</p>
                        </div>
                    </div>
                    <div class="w-80 md:w-auto px-6 sm:px-0 mx-auto">
                        <img src="{{ asset('images/icons/party.svg') }}" alt="Spectacle" class="w-24 mx-auto">
                        <div class="text-center">
                            <h1 class="mt-4 text-lg font-semibold">Spectacle</h1>
                            <p class="lg:text-sm xl:text-base">Concerts, Cinéma, Théâtres, Défilé de mode, Karaoké...</p>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center items-center">
                    <img src="{{ asset('images/illustrations/typing_hands.svg') }}" alt="Femme tapant sur un clavier"
                        class="w-4/5">
                </div>
            </div>
        </x-website-container>
        <div class="my-12 py-12 md:w-3/4 m-auto">
            <h1 class="text-3xl sm:text-5xl text-center montserrat_bold">Nous avons enrégistré plus de <span
                    class="text-red-500 montserrat_bold">{{$number}}</span> inscriptions évènementielles.</h1>
        </div>
        {{-- <div class="py-12 bg-slate-100">
            <div class="w-full md:w-3/4 m-auto">
                <h1 class="text-3xl sm:text-4xl text-center font-semibold">Quelques avis sur <span
                        class="text-red-500 montserrat_bold"><span
                            class="text-green-500 montserrat_bold">Y</span>eele</span></h1>
            </div>
            <x-website-container class="mt-12 px-4 lg:px-0 grid gap-6 grid-cols-1 lg:grid-cols-3">
                <x-website-testimony />
                <x-website-testimony />
                <x-website-testimony />
            </x-website-container>
        </div> --}}
        <div class="my-12 w-full md:w-3/4 m-auto">
            <div class="w-11/12 bg-red-300 border-2 border-red-400 md:w-3/4 rounded-xl m-auto p-6">
                <h1 class="text-4xl text-center montserrat_bold">Avez-vous des questions ou vous avez juste bésoins d'aide?
                </h1>
                <div class="mt-6 py-6 text-center">
                    <a href="{{ route('website.contact') }}"
                        class="py-4 px-8 font-semibold text-white bg-red-500 transition-all hover:bg-red-600  rounded-xl">Contactez-nous</a>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('additionalScript')
<script src="{{asset('js/tailwind.js')}}" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>


@endsection

