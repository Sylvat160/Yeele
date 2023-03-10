<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yeele | Evènement non trouvé!</title>
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="w-full min-h-screen py-4 sm:py-0 bg-gray-100 flex flex-col justify-center items-center">
        <div class="pt-4 pb-8">
            <img src="{{ asset('logo.png') }}" alt="Yeele" class="w-32 mx-auto">
        </div>
        <div class="bg-white w-11/12 rounded-lg border border-gray-200 shadow-sm" style="max-width: 500px;">
            <div class="py-2">
                <img src="{{ asset('images/illustrations/event_not_found.svg') }}" alt="E-mail envoyé" class="w-48 mx-auto">
            </div>
            <div class="mb-2">
                <h1 class="text-xl text-center font-bold">Evènement non trouvé!</h1>
            </div>
            <div class="my-4 px-4">
                <p class="text-md text-center">L'évènement auquel vous voudrez vous inscrire n'existe plus. Veuillez contacter le gestionnaire de l'évènement pour plus d'informations.</p>
            </div>
            <div class="mt-4 py-2  border-t">
                <p class="text-sm text-center text-gray-500">&copy; Copyright - Horinfo - Tous les drois réservés.</p>
            </div>
        </div>
    </div>
</body>

</html>
