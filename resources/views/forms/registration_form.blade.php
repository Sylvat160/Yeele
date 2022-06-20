<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yeele | Formulaire d'inscription</title>
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

            <div class="p-4 border-b text-center font-semibold">
                <h1>INSCRIPTION</h1>
            </div>
            @if ($message = Session::get('error'))
                <div class="p-4">
                    <div id="alert-2" class="flex p-4 bg-red-100 rounded-lg dark:bg-red-200" role="alert">
                        <svg class="flex-shrink-0 w-5 h-5 text-red-700 dark:text-red-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                        <div class="ml-3 text-sm font-medium text-red-700 dark:text-red-800">
                          {{$message}}
                        </div>
                        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-100 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-red-200 dark:text-red-600 dark:hover:bg-red-300" data-dismiss-target="#alert-2" aria-label="Close">
                          <span class="sr-only">Close</span>
                          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                      </div>
                </div>
                {{Session::forget('error')}}
            @endif
            <form class="px-4 py-8" action="{{ route('submit_form') }}" method="POST">
                @csrf
                <input type="hidden" name="event_uid" value="{{ $event->uid }}" required>
                <div class="mb-3">
                    <label for="lastname" class="block mb-2 text-sm font-semibold text-gray-900">
                        <span>Nom</span>
                        <span class="text-red-600">*</span>
                    </label>
                    <input type="text" name="lastname" id="lastname"
                        class="bg-gray-50 outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                        placeholder="ex: Traoré, Diallo" required>
                    @error('lastname')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="firstname" class="block mb-2 text-sm font-semibold text-gray-900">
                        <span>Prénom</span>
                        <span class="text-red-600">*</span>
                    </label>
                    <input type="text" name="firstname" id="firstname"
                        class="bg-gray-50 outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                        placeholder="ex: Samuel, Issouf" required>
                    @error('firstname')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="block mb-2 text-sm font-semibold text-gray-900">
                        <span>Adresse e-mail</span>
                        <span class="text-red-600">*</span>
                    </label>
                    <input type="email" name="email" id="email"
                        class="bg-gray-50 outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                        placeholder="ex: exemple@gmail.com" required>
                    @error('email')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                class="font-medium">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="phone" class="block mb-2 text-sm font-semibold text-gray-900">
                        <span>Téléphone</span>
                        <span class="text-red-600">*</span>
                    </label>
                    <input type="number" name="phone" id="phone"
                        class="bg-gray-50 outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                        placeholder="ex: (+226) XXXXXXXX" required>
                    @error('phone')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                class="font-medium">{{ $message }}</p>
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
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                class="font-medium">{{ $message }}</p>
                    @enderror
                </div>

                @if($event->eventPrices->count())
                    <div class="mb-3">
                        <label for="price" class="block mb-2 text-sm font-semibold text-gray-900">
                            <span>Tarif</span>
                            <span class="text-red-600">*</span>
                        </label>
                        <select name="price" id="price"
                            class="bg-gray-50 outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                            required>
                            <option class="hidden">Selectionner un tarif</option>
                            @foreach ($event->eventPrices as $price)
                                <option value="{{ $price->value }}">{{ $price->label }} ({{ $price->value }}
                                    FCFA)</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="payment_method" class="block mb-2 text-sm font-semibold text-gray-900">
                            <span>Mode de paiement</span>
                            <span class="text-red-600">*</span>
                        </label>
                        <select name="payment_method" id="payment_method"
                            class="bg-gray-50 outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                            required>
                            <option class="hidden">Selectionner un mode de paiement</option>
                            @foreach ($event->event_payment_methods as $method)
                                <option value="{{ $method->name }}">{{ $method->name }}</option>
                            @endforeach
                        </select>
                    </div>
                @endif

                @if($event->fields->count())
                    <div>
                        <label for="field_uid" class="block mb-2 text-sm font-semibold text-gray-900">
                            <span>Chosissez dans la liste</span>
                            <span class="text-red-600">*</span>
                        </label>
                        <select name="field_uid" id="field_uid"
                            class="bg-gray-50 outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                            required>
                            <option class="hidden">Choisissez une valeur du champ libre</option>
                            @foreach ($event->fields as $field)
                                <option value="{{ $field->uid }}">{{ $field->name }} : {{ $field->value }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @endif

                @if ($event->form)
                    <div id="additional_fields_container" data-fields="{{ $event->form->data }}"></div>
                @endif

                @if (now() < new DateTime($event->signup_date_time))
                    <div class="mt-8">
                        <button type="submit"
                            class="text-white bg-red-500 focus:bg-red-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center flex items-center mx-auto"
                            style="width: fit-content;">
                            Soumettre
                        </button>
                    </div>
                @endif
            </form>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('app_assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('app_assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="https://formbuilder.online/assets/js/form-render.min.js"></script>
    <script src="{{ asset('js/show_formbuilder_field.js') }}"></script>
</body>

</html>
