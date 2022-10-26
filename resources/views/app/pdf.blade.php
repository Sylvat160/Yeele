<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
    <title> PDF </title>
</head>

<body>
    <section >
        <div class="container ml-8" id="subscription">

            <div class="flex items-center justify-center ">
                <div class="p-4 w-full  ">
                    <!--light mode - text and icons-->
                    <div class="p-2 text-gray-900 bg-white rounded-lg shadow-lg font-medium capitalize">
                        <section class="flex items-center  justify-center bg-white">
                            <div class="mx-auto max-w-[43rem]">
                                <div class="text-center">
                                    {{-- <p class="text-lg font-medium leading-8 text-red-600/95">YEELE-EVENT</p> <br /> --}}
                                    <div class="flex items-center justify-center">
                                        <img src="{{asset('images/logo.png')}}" width="200">
                                    </div>
                                    <h1 class="mt-3 text-[3.5rem] font-bold leading-[4rem] tracking-tight text-black"> inscription à un evenement</h1>
                                    <p class="mt-3 text-lg leading-relaxed text-slate-400">Yeele,un outil de gestion d'évènement, <span style="color:#f05252;">simple</span> ,<span style="color:#f05252;">rapide</span> et <span style="color:#f05252;">intuitif</span> .</p>

                                </div>


                            </div>
                        </section>

                        <div class="">


                            <div class"py-16 bg-zinc-900">
                                <div class="container m-auto px-6">

                                    <div class="lg:flex justify-between items-center">
                                        <div class="lg:w-6/12 lg:p-0 p-7">
                                            <h1 class="sm:text-5xl text-4xl text-black font-medium leading-tight mb-5 capitalize">{{ $participant->civility . ' ' .  $participant->lastname . ' ' . $participant->firstname }} </h1>

                                            <p class="text-xl text-red-400">
                                                votre inscription a l'evenement {{ $participant->event->name }} est reussie. <br /> Gardez ce document en lieu sûr , il pourrait vous être utile en cas de besoin.
                                            </p>

                                            <div class="py-5 flex gap-x-4">
                                                <a class="text-white border px-5 py-2 border-white rounded-lg border-t-2 border-l-2">Projects</a>
                                                <a class="text-white border px-5 py-2 border-white rounded-lg border-t-2 border-l-2">Social Links</a>
                                            </div>
                                        </div>
                                        <div class="lg:w-4/12 rounded-full scale-100 rounded-lg ">
                                            {{-- <img class="" alt="sahil logo" width="350" height="350" src="{{asset('images/qr-code.png')}}" /> --}}
                                            <img class="" alt="sahil logo" width="350" height="350" src="{{ asset("participants_qr_codes/$participant->firstname . "_" . $participant->lastname . $participant->id") }}" />


                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="p-4 w-full lg:w-1/3">
                            <!--light mode - text and icons-->
                            <div class="p-2 text-gray-900 bg-white rounded-lg shadow-lg font-medium capitalize">
                                <span class="px-2 mr-2 border-r border-gray-800">
                                    <img src="{{asset('images/HI.png')}}" alt="alt placeholder" class="w-8 h-8 -mt-1 inline mx-auto">
                                </span>
                                <span class="px-2 py-1 cursor-pointer hover:bg-gray-200 hover:text-gray-700 text-sm rounded mb-5">
                                    <i class="w-8 fab fa-facebook p-2 bg-gray-200 rounded-full">
                                    </i>

                                    <span class="mx-1">HorInfo</span>
                                </span>
                                <span class="px-2 py-1 cursor-pointer hover:bg-gray-200 hover:text-gray-700 text-sm rounded mb-5">
                                    <i class="w-8 fab fa-linkedin p-2 bg-gray-200 rounded-full">
                                    </i>
                                    <span class="mx-1">HorInfo</span>
                                </span>

                            </div>

                        </div>

                        <p class="float-right relative bottom-10 right-10 font-serif">
                            Participant n°: {{ $participant->id }}
                        </p>

                    </div>


                </div>

            </div>

        </div>
    </section>

    {{-- <button type="button" onclick="generatePDF()" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Dark</button> --}}


    <script src="{{ asset('js/tailwind.js') }}"></script>
    <script src="{{ asset('js/html2pdf.min.js') }}"></script>
    <script>
        function generatePDF() {
            // Choose the element that our invoice is rendered in.
            const element = document.getElementById("subscription");
            // Choose the element and save the PDF for our user.
            const opt = {
                margin: 1
                , filename: 'YeeleEvent.pdf'
                , image: {
                    type: 'jpeg'
                    , quality: 0.98
                }
                , html2canvas: {
                    scale: 4
                    , scrollY: 0
                , }
                , jsPDF: {
                    format: 'a4'
                    , orientation: 'l'
                }
            };
            html2pdf()
                .set(opt)
                .from(element)
                .save();
        }

    </script>
</body>

</html>
