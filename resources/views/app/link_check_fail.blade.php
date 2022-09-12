<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yeele | Il y'a un problème</title>
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
                <img src="{{ asset('images/illustrations/forbidden_illustration.svg') }}" alt="Interdiction de poursuivre" class="w-48 mx-auto">
            </div>
            <div class="mb-2">
                <h1 class="text-xl text-center font-bold">Il y'a un problème!</h1>
            </div>
            <div class="my-4 px-4">
                <p class="text-md text-center">Vous n'êtes pas autorisé à poursuivre. <strong>{{ Session::get('error') }}</strong></p>
            </div>
            <div class="mt-4 py-2  border-t">
                <p class="text-sm text-center text-gray-500">&copy; Copyright - Horinfo - Tous les drois réservés.</p>
            </div>
        </div>
    </div>
</body>

</html>
