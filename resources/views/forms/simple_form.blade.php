<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yeele | Formulaire d'inscription</title>
    <link rel="shortcut icon" href="{{ asset('logo.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>

    <div class="w-100 min-h-screen py-4 bg-gray-100/2">
        <div class="pt-4 pb-8">
            <img src="{{ asset('logo.png') }}" alt="Yeele" class="w-32 mx-auto">
        </div>
        <div class="bg-slate-100 w-11/12 rounded-lg border border-gray-200 shadow-sm mx-auto"
            style="max-width: 550px; @if ($event->bg_color !== '#000000') background: {{ $event->bg_color }} @endif; color: {{ $event->text_color }};">

            <div class="p-4 border-b text-center font-semibold">
                <h1>INSCRIPTION</h1>
            </div>
            <div class="px-4 py-8">
                <div class="mb-3">
                    <label for="lastname" class="block mb-2 text-sm font-semibold text-gray-900">
                        <span>Nom</span>
                        <span class="text-red-600">*</span>
                    </label>
                    <input type="text" name="lastname" id="lastname"
                        class="bg-gray-50 outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                        placeholder="ex: Traoré, Diallo" @if($value = old('lastname')) value="{{ $value }}" @endif required>
                        @error('lastname')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
                        @enderror
                </div>
                <div class="mb-3">
                    <label for="firstname" class="block mb-2 text-sm font-semibold text-gray-900">
                        <span>Prénom</span>
                        <span class="text-red-600">*</span>
                    </label>
                    <input type="text" name="firstname" id="firstname"
                        class="bg-gray-50 outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                        placeholder="ex: Samuel, Issouf" @if($value = old('firstname')) value="{{ $value }}" @endif required>
                        @error('firstname')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
                        @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="block mb-2 text-sm font-semibold text-gray-900">
                        <span>Adresse e-mail</span>
                        <span class="text-red-600">*</span> 
                    </label>
                    <input type="email" name="email" id="email"
                        class="bg-gray-50 outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                        placeholder="ex: exemple@gmail.com" @if($value = old('email')) value="{{ $value }}" @endif required>
                        @error('email')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
                        @enderror
                </div>
                <div class="mb-3">
                    <label for="civility" class="block mb-2 text-sm font-semibold text-gray-900">
                        <span>Civilité</span>
                        <span class="text-red-600">*</span>
                    </label>
                    <select name="civility" id="civility"
                        class="bg-gray-50 outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                        required>
                        <option class="hidden" selected>Selectionner votre civilité</option>
                        <option value="Masculin">Monsieur</option>
                        <option value="Feminin">Madame</option>
                        <option value="Mademoiselle">Mademoiselle</option>
                    </select>
                    @error('civility')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="phone" class="block mb-2 text-sm font-semibold text-gray-900">
                        <span>Téléphone</span>
                        <span class="text-red-600">*</span>
                    </label>
                    <input type="number" name="phone" id="phone"
                        class="bg-gray-50 outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                        placeholder="ex: (+226) XXXXXXXX" @if($value = old('phone')) value="{{ $value }}" @endif required>
                        @error('phone')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
                        @enderror
                </div>
                @if($event->eventPrices->count())
                    <div class="mb-3">
                        <label for="price" class="block mb-2 text-sm font-semibold text-gray-900">
                            <span>Tarif</span>
                            <span class="text-red-600">*</span>
                        </label>
                        <select name="civility" id="civility"
                            class="bg-gray-50 outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                            required>
                            <option class="hidden">Selectionner un tarif</option>
                            @foreach ($event->eventPrices as $price)
                                <option value="{{ $price->value }}">{{ $price->label }} ({{ $price->value }} FCFA)</option>
                            @endforeach
                        </select>
                        @error('price')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="paymentMethod" class="block mb-2 text-sm font-semibold text-gray-900">
                            <span>Mode de paiement</span>
                            <span class="text-red-600">*</span>
                        </label>
                        <select name="paymentMethod" id="paymentMethod"
                            class="bg-gray-50 outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                            required>
                            <option class="hidden">Selectionner un mode de paiement</option>
                            @foreach ($event->event_payment_methods as $method)
                                <option value="{{ $method->name }}">{{ $method->name }}</option>
                            @endforeach
                        </select>
                        @error('price')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                @endif
            </div>
        </div>
    </div>

</body>

</html>