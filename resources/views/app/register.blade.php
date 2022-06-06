<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yeele | Inscription</title>
    <link rel="shortcut icon" href="{{ asset('logo.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>

    <div class="w-100 min-h-screen py-4 bg-gray-100 flex justify-center items-center">
        <div class="bg-white w-11/12 rounded-lg border border-gray-200 shadow-sm" style="max-width: 600px;">
            <div class="py-4 border-b">
                <img src="{{ asset('logo.png') }}" alt="Yeele" class="w-32 mx-auto">
            </div>
            <div class="my-4">
                <h1 class="text-xl text-center font-medium">Créer un compte</h1>
            </div>
            <div class="my-4 px-4">
                <form class="space-y-6" action="{{ route('app.register') }}" method="POST">
                    @csrf
                    <div class="grid gap-4 grid-cols-1 md:grid-cols-2">
                        <div class="col-span-2 md:col-auto">
                            <label for="lastname" class="block mb-2 text-sm font-semibold text-gray-900">Nom: </label>
                            <input type="text" name="lastname" id="lastname"
                                class="bg-gray-50 outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                                placeholder="ex: Traoré, Diallo" required>
                                @error('lastname')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
                                @enderror
                        </div>
                        <div class="col-span-2 md:col-auto">
                            <label for="firstname" class="block mb-2 text-sm font-semibold text-gray-900">Prénom: </label>
                            <input type="text" name="firstname" id="firstname"
                                class="bg-gray-50 outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                                placeholder="ex: Samuel, Issouf" required>
                                @error('firstname')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
                                @enderror
                        </div>
                        <div class="col-span-2">
                            <label for="email" class="block mb-2 text-sm font-semibold text-gray-900">Adresse e-mail: </label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                                placeholder="ex: exemple@gmail.com" required>
                                @error('email')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
                                @enderror
                        </div>
                        <div class="col-span-2">
                            <label for="confirm_email" class="block mb-2 text-sm font-semibold text-gray-900">Confirmation de l'adresse e-mail: </label>
                            <input type="email" name="confirm_email" id="confirm_email"
                                class="bg-gray-50 outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                                placeholder="ex: exemple@gmail.com" required>
                                @error('confirm_email')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
                                @enderror
                        </div>
                        <div class="col-span-2 md:col-auto">
                            <label for="phone" class="block mb-2 text-sm font-semibold text-gray-900">Numéro de téléphone: </label>
                            <input type="text" name="phone" id="phone"
                                class="bg-gray-50 outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                                placeholder="ex: (+226) XX XX XX XX" required>
                                @error('phone')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
                                @enderror
                        </div>
                        <div class="col-span-2 md:col-auto">
                            <label for="organization" class="block mb-2 text-sm font-semibold text-gray-900">Organisme: </label>
                            <input type="text" name="organization" id="organization"
                                class="bg-gray-50 outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                                placeholder="Nom de votre organisme" required>
                                @error('organization')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
                                @enderror
                        </div>
                        <div class="col-span-2">
                            <label for="gender" class="block mb-2 text-sm font-semibold text-gray-900">Genre: </label>
                            <select name="gender" id="gender"
                                class="bg-gray-50 outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                                required>
                                <option class="hidden" selected>Selectionner votre genre</option>
                                <option value="Masculin">Masculin</option>
                                <option value="Feminin">Féminin</option>
                            </select>
                            @error('gender')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-span-2 md:col-auto">
                            <label for="password" class="block mb-2 text-sm font-semibold text-gray-900">Mot de passe: </label>
                            <input type="password" name="password" id="password"
                                class="bg-gray-50 outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                                placeholder="Entrez votre mot de passe" required>
                            @error('password')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-span-2 md:col-auto">
                            <label for="confirm_password" class="block mb-2 text-sm font-semibold text-gray-900">Confirmation mot de passe: </label>
                            <input type="password" name="confirm_password" id="confirm_password"
                                class="bg-gray-50 outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                                placeholder="Confirmez votre mot de passe" required>
                            @error('confirm_password')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-span-2 mt-8 text-center">
                            <button type="submit" class="py-3 px-12 font-semibold text-white bg-red-500 transition-all hover:bg-red-600 rounded-xl">S'inscrire</button>
                        </div>
                        <div class="col-span-2 py-2 text-center">
                            <span>ou</span>
                            <a href="{{ route('login') }}" class="text-red-500 hover:text-red-600 font-semibold block">Déja inscrit?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
