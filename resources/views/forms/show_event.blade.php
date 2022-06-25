<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yeele | Fiche d'inscription</title>
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="w-100 min-h-screen py-4 bg-gray-100/2">
        <div class="pt-4 pb-8">
            <img src="{{ asset('logo.png') }}" alt="Yeele" class="w-32 mx-auto">
        </div>
        <div class="bg-slate-100 w-11/12 rounded-lg border border-gray-200 shadow-sm mx-auto"
            style="max-width: 550px; @if ($event->bg_color !== '#000000') background: {{ $event->bg_color }} @endif; color: {{ $event->text_color }};">
            <div class="p-4 text-center font-semibold">
                <h1>PRÉSENTATION DE L'ÉVÈNEMENT</h1>
            </div>
            <div class="px-4 border-b">
                <img src="{{ asset("storage/$event->image") }}" width="400" height="600"
                    alt="{{ $event->name }}" class="mx-auto">
            </div>
            @if($event->counter_active)
                <div class="border-b">
                    @if ($event->participants->count())
                    <div class="w-full py-4 text-center">
                        <h1 class="text-xl text-center font-semibold">
                            <span>{{ $event->participants->count() }}</span>
                            <span> participant(s) inscrits.</span>
                        </h1>
                    </div>
                    @else
                        <div class="w-full py-4 text-center">
                            <h1 class="text-xl text-center font-semibold">Il n'existe aucun participant inscrit pour l'instant.
                            </h1>
                        </div>
                    @endif
                </div>
            @endif
            <div class="border-b">
                <div class="py-4">
                    <h1 class="text-2xl font-semibold text-center">DESCRIPTIONS</h1>
                </div>
                <div class="py-4 text-center">
                    <?= $event->description ?>
                </div>
            </div>
            <div class="border-b">
                <div class="py-4">
                    <h1 class="text-2xl font-semibold text-center">DATES</h1>
                </div>
                <div class="py-2 mx-auto" style="width: fit-content;">
                    @if (now() < new DateTime($event->start_date_time))
                        <div class="px-10 py-3 bg-green-300 text-center rounded" style="color: #000 !important"
                            id="timer_container" data-start_datetime="{{ $event->start_date_time }}">
                            <span>L'évènement débute dans: </span>
                            <p class="font-semibold" id="datetime_placeholder"></p>
                        </div>
                    @elseif(now() > new DateTime($event->start_date_time) && now() < new DateTime($event->end_date_time))
                        <div class="px-10 py-3 bg-yellow-300 rounded" style="color: #000 !important">
                            L'évènement est en cours!
                        </div>
                    @else
                        <div class="px-10 py-3 bg-red-300 rounded" style="color: #000 !important">
                            L'évènement est expiré!
                        </div>
                    @endif
                </div>
                <div class="py-2 mx-auto" style="width: fit-content;">
                    <div class="mb-5 flex flex-col md:flex-row items-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                        <span class="font-semibold ml-2">Date et heure de début : </span>
                        <span
                            class="ml-2">{{ date_format(new DateTime($event->start_date_time), 'd/m/Y à H:i') }}</span>
                    </div>
                    <div class="mb-5 flex flex-col md:flex-row items-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                        <span class="font-semibold ml-2">Date et heure de fin : </span>
                        <span
                            class="ml-2">{{ date_format(new DateTime($event->end_date_time), 'd/m/Y à H:i') }}</span>
                    </div>
                    <div class="flex flex-col md:flex-row text-center items-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                        <span class="font-semibold ml-2">Date et heure de fin des inscriptions : </span>
                        <span
                            class="ml-2">{{ date_format(new DateTime($event->signup_date_time), 'd/m/Y à H:i') }}</span>
                    </div>
                </div>
            </div>
            <div class="border-b">
                <div class="py-4">
                    <h1 class="text-xl text-center font-semibold">Lien d'inscription</h1>
                    <div class="w-full my-4">
                        <p class="text-sm text-center" id="link" style="text-overflow: ">{{ Request::url() }}
                        </p>
                    </div>
                    <div>
                        <button data-tooltip-target="tooltip-click" data-clipboard-text="{{ Request::url() }}"
                            data-tooltip-trigger="click" type="button"
                            class="text-white bg-red-500 focus:bg-red-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center flex items-center mx-auto"
                            id="copy_btn">
                            <span class="mr-2">Copier le lien</span>
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3">
                                </path>
                            </svg>
                        </button>
                        <div id="tooltip-click" role="tooltip"
                            class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            Lien copié
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-b">
                <div class="py-4">
                    <h1 class="text-2xl font-semibold text-center">LOCALISATION</h1>
                </div>
                <div class="w-full py-2 mx-auto">
                    <div class="mb-5">
                        <h3 class="text-xl font-semibold text-center">{{ $event->location }}</h3>
                    </div>
                    <div class="w-11/12 mx-auto" style="overflow-x: hidden;">
                        <?= $event->map_html; ?>
                    </div>
                </div>
            </div>
            @if(now() < new DateTime($event->signup_date_time))
            <div class="my-4">
                <a href="{{ route('form', $event->uid) }}" class="text-white bg-red-500 focus:bg-red-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center flex items-center mx-auto" style="width: fit-content;">
                    Je m'inscris
                </a>
            </div>
            @endif
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        document.querySelector('iframe').style.width = "100%"
    </script>
</body>

</html>
