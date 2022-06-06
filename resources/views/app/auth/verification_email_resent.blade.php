<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yeele | Mail renvoyé</title>
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
                <h1 class="text-xl text-center font-bold">Mail de vérification renvoyé!</h1>
            </div>
            <div class="mt-6 mb-8">
                <p class="text-red-500 text-center">Vous n'avez toujours pas réçu de mail ?</p>
                <div class="mt-6 text-center">
                    <form action="{{ route('email.resend_verification_mail') }}" method="POST">
                        @csrf
                        <button class="py-4 px-6 font-semibold text-white bg-red-500 transition-all hover:bg-red-600 rounded-xl">Renvoyer le mail</button>
                    </form>
                </div>
            </div>
            <div class="mt-4 py-2  border-t">
                <p class="text-sm text-center text-gray-500">&copy; Copyright - Horinfo - Tous les drois réservés.</p>
            </div>
        </div>
    </div>
</body>

</html>
