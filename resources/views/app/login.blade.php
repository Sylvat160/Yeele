<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yeele | Connexion</title>
    <link rel="shortcut icon" href="{{ asset('logo.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>

    <div class="w-100 min-h-screen py-4 sm:py-0 bg-gray-100 flex justify-center items-center">
        <div class="bg-white w-11/12 rounded-lg border border-gray-200 shadow-sm" style="max-width: 500px;">
            <div class="py-4 border-b">
                <img src="{{ asset('logo.png') }}" alt="Yeele" class="w-32 mx-auto">
            </div>
            <div class="my-4">
                <h1 class="text-xl text-center font-medium">Connexion au compte</h1>
            </div>
            <div class="my-4">
                <form action="#" method="POST">
                    <div class="px-4 mb-4">
                        <label for="email" class="block mb-2 text-lg font-semibold text-gray-900">Adresse e-mail:
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <input type="email" id="email" name="email"
                                class="bg-gray-50 transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full pl-10 p-2.5"
                                placeholder="Ex: exemple@gmail.com" required>
                        </div>
                    </div>
                    <div class="px-4 mb-4">
                        <label for="password" class="block mb-2 text-lg font-semibold text-gray-900">Mot de passe:
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            </div>
                            <input type="password" id="password" name="password"
                                class="bg-gray-50 transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full pl-10 p-2.5"
                                placeholder="Entrez votre mot de passe" required>
                        </div>
                    </div>
                    <div class="mt-8 text-center">
                        <button type="submit" class="py-3 px-6 font-semibold text-white bg-red-500 transition-all hover:bg-red-600 rounded-xl">Se connecter</button>
                    </div>
                </form>
            </div>
            <div class="pb-4 text-center">
                <a href="{{ route('reset') }}" class="text-red-500 hover:text-red-600 font-semibold block">Mot de passe oublié?</a>
                <span>ou</span>
                <a href="{{ route('register') }}" class="text-red-500 hover:text-red-600 font-semibold block">S'inscrire</a>
            </div>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
