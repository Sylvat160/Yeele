<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yeele | Mail de modification envoyé</title>
    <link rel="shortcut icon" href="{{ asset('logo.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>

    <div class="w-full min-h-screen py-4 sm:py-0 bg-gray-100 flex justify-center items-center">
        <div class="bg-white w-11/12 rounded-lg border border-gray-200 shadow-sm" style="max-width: 750px;">
            <div class="py-2">
                <img src="{{ asset('images/illustrations/mail_sent.svg') }}" alt="E-mail envoyé" class="w-48 mx-auto">
            </div>
            <div class="mb-2">
                <h1 class="text-xl text-center font-bold">Mail envoyé!</h1>
            </div>
            <div class="my-4 px-4">
                <p class="text-md text-center">Nous venons de vous envoyer un mail contenant un lien vers la page de modification de votre mot de passe.</p>
            </div>
            <div class="mt-4 py-2  border-t">
                <p class="text-sm text-center text-gray-500">&copy; Copyright - Horinfo - Tous les drois réservés.</p>
            </div>
        </div>
    </div>
</body>

</html>
