<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yeele | Formulaire d'inscription</title>
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/cinetpay.js') }}"></script>
</head>

<body>

    <div class="w-auto min-h-screen py-4 bg-gray-100/2">
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
                        <svg class="flex-shrink-0 w-5 h-5 text-red-700 dark:text-red-800" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <div class="ml-3 text-sm font-medium text-red-700 dark:text-red-800">
                            {{ $message }}
                        </div>
                        <button type="button"
                            class="ml-auto -mx-1.5 -my-1.5 bg-red-100 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-red-200 dark:text-red-600 dark:hover:bg-red-300"
                            data-dismiss-target="#alert-2" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                {{ Session::forget('error') }}
            @endif
            <form class="px-4 py-8" action="{{ route('submit_form') }}" method="POST" id="registration" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="event_uid" value="{{ $event->uid }}" required>
                <div class="mb-3">
                    <label for="civility" class="block mb-2 text-sm font-semibold text-gray-900">
                        <span>Civilité</span>
                        <span class="text-red-600">*</span>
                    </label>
                    <select name="civility" id="civility"
                        class="bg-gray-50 outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                        required>
                        <option class="hidden" selected>Selectionner votre civilité</option>
                        <option value="Monsieur">Monsieur</option>
                        <option value="Madame">Madame</option>
                        <option value="Mademoiselle">Mademoiselle</option>
                    </select>
                    @error('civility')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="lastname" class="block mb-2 text-sm font-semibold text-gray-900">
                        <span>Nom</span>
                        <span class="text-red-600">*</span>
                    </label>
                    <input type="text" name="lastname" id="lastname"
                        class="bg-gray-50 outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                        placeholder="ex: Traoré, Diallo" required>
                    @error('lastname')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                class="font-medium">{{ $message }}
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
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                class="font-medium">{{ $message }}
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

                @if ($event->fields->count())
                    <div class="mb-3">
                        <label for="field_uid" class="block mb-2 text-sm font-semibold text-gray-900">
                            <span>Chosissez dans la liste</span>
                            <span class="text-red-600">*</span>
                        </label>
                        <select name="field_uid" id="field_uid"
                            class="bg-gray-50 outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                            required>
                            <option class="hidden">Choisissez une valeur du champ libre</option>
                            @foreach ($event->fields as $field)
                                <option value="{{ $field->uid }}">
                                    {{ $field->name }} : {{ $field->value }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @endif

                @if ($event->form)
                    @foreach ($fields as $field)
                        @switch($field['type'])
                            @case('header')
                                <div class="mb-3">
                                    <{{ $field['subtype'] }}>{{ $field['label'] }}</{{ $field['subtype'] }}>
                                </div>
                            @break

                            @case('select')
                                <div class="mb-3">
                                    @isset($field['label'])
                                        <label for="{{ $field['name'] }}" class="block mb-2 text-sm font-semibold text-gray-900">
                                            <span>{{ $field['label'] }}</span>
                                            @if ($field['required'])
                                                <span class="text-red-600">*</span>
                                            @endif
                                        </label>
                                    @endisset
                                    <select name="{{ $field['name'] }}" id="{{ $field['name'] }}"
                                        class="bg-gray-50 outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                                        @if ($field['required']) required @endif>
                                        @isset($field['placeholder'])
                                            <option class="hidden" value="" selected>{{ $field['placeholder'] }}</option>
                                        @endisset
                                        @foreach ($field['values'] as $option)
                                            <option value="{{ $option['value'] }}">{{ $option['label'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @break

                            @case('textarea')
                                <div class="mb-3">
                                    @isset($field['label'])
                                        <label for="{{ $field['name'] }}" class="block mb-2 text-sm font-semibold text-gray-900">
                                            <span>{{ $field['label'] }}</span>
                                            @if ($field['required'])
                                                <span class="text-red-600">*</span>
                                            @endif
                                        </label>
                                    @endisset
                                    <textarea name="{{ $field['name'] }}" id="{{ $field['name'] }}" cols="30" rows="5"
                                        @isset($field['placeholder']) placeholder="{{ $field['placeholder'] }}" @endisset
                                        @if ($field['required']) required @endif>@isset($field['value']) {{ $field['value'] }} @endisset</textarea>
                                </div>
                            @break

                            @case('text')
                                <div class="mb-3">
                                    @isset($field['label'])
                                        <label for="{{ $field['name'] }}" class="block mb-2 text-sm font-semibold text-gray-900">
                                            <span>{{ $field['label'] }}</span>
                                            @if ($field['required'])
                                                <span class="text-red-600">*</span>
                                            @endif
                                        </label>
                                    @endisset
                                    <input type="{{ $field['subtype'] }}" name="{{ $field['name'] }}"
                                        id="{{ $field['name'] }}"
                                        class="bg-gray-50 outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                                        @isset($field['placeholder']) placeholder="{{ $field['placeholder'] }}" @endisset
                                        @isset($field['value']) value="{{ $field['value'] }}" @endisset
                                        @if ($field['required']) required @endif>
                                </div>
                            @break

                            @case('number')
                                <div class="mb-3">
                                    @isset($field['label'])
                                        <label for="{{ $field['name'] }}" class="block mb-2 text-sm font-semibold text-gray-900">
                                            <span>{{ $field['label'] }}</span>
                                            @if ($field['required'])
                                                <span class="text-red-600">*</span>
                                            @endif
                                        </label>
                                    @endisset
                                    <input type="number"
                                        @isset($field['min']) min="{{ $field['min'] }}" @endisset
                                        @isset($field['max']) min="{{ $field['max'] }}" @endisset
                                        name="{{ $field['name'] }}" id="{{ $field['name'] }}"
                                        class="bg-gray-50 outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                                        @isset($field['placeholder']) placeholder="{{ $field['placeholder'] }}" @endisset
                                        @isset($field['value']) value="{{ $field['value'] }}" @endisset
                                        @if ($field['required']) required @endif>
                                </div>
                            @break

                            @case('date')
                                <div class="mb-3">
                                    <div>
                                        @isset($field['label'])
                                            <label for="{{ $field['name'] }}"
                                                class="block mb-2 text-sm font-semibold text-gray-900">
                                                <span>{{ $field['label'] }}</span>
                                                @if ($field['required'])
                                                    <span class="text-red-600">*</span>
                                                @endif
                                            </label>
                                        @endisset
                                        <input type="date" name="{{ $field['name'] }}" id="{{ $field['name'] }}"
                                            class="bg-gray-50 outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                                            @isset($field['placeholder']) placeholder="{{ $field['placeholder'] }}" @endisset
                                            @isset($field['value']) value="{{ $field['value'] }}" @endisset
                                            @if ($field['required']) required @endif>
                                    </div>
                                </div>
                            @break
                            @case('file')
                                <div class="mb-3">
                                    <div>
                                        @isset($field['label'])
                                            <label for="{{ $field['name'] }}"
                                                class="block mb-2 text-sm font-semibold text-gray-900">
                                                <span>{{ $field['label'] }}</span>
                                                @if ($field['required'])
                                                    <span class="text-red-600">*</span>
                                                @endif
                                            </label>
                                        @endisset
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="{{ $field['name'] }}">@isset($field['placeholder']) {{ $field['placeholder'] }} @endisset</label>
                                        <input class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="{{ $field['name'] }}" name="{{ $field['name'] }}" type="file" @if ($field['required']) required @endif>
                                    </div>
                                </div>
                            @break
                            @case('checkbox-group')
                                <div class="mb-3">
                                    <div class="is-checkbox-group" @if($field['required']) data-is-required="true" @endif>
                                            <input type="hidden" name="{{ $field['name'] }}">
                                        @isset($field['label'])
                                            <label for="{{ $field['name'] }}"
                                                class="block mb-2 text-sm font-semibold text-gray-900">
                                                <span>{{ $field['label'] }}</span>
                                                @if ($field['required'])
                                                    <span class="text-red-600">*</span>
                                                @endif
                                            </label>
                                        @endisset
                                        @foreach ($field['values'] as $value)
                                            <div class="flex items-center mb-4">
                                                <input id="{{ $value['label'] }}" type="checkbox" value="{{ $value['value'] }}" class="w-4 h-4 text-red-600 bg-gray-100 rounded border-gray-300 focus:ring-red-500" @if($value['selected'] === true) checked @endif>
                                                <label for="{{ $value['label'] }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $value['label'] }}</label>
                                            </div>
                                        @endforeach
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500 font-medium checkbox-group-error"></p>
                                    </div>
                                </div>
                            @break
                        @endswitch
                    @endforeach
                @endif

                @if ($event->eventPrices->count())
                    <div class=" w-full mb-3">
                        <label for="price" class="block mb-2 text-sm font-semibold text-gray-900">
                            <span>Tarif</span>
                            <span class="text-red-600">*</span>
                        </label>
                        @if ($event->multiple_prices_active)
                            <input type="hidden" name="prices" value="[]" required>
                            <button id="prices_btn" data-dropdown-toggle="prices" data-dropdown-placement="bottom"
                                class="bg-gray-50 inline-flex items-center justify-between outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 w-full p-2.5"
                                type="button">Choisissez vos tarifs <svg class="ml-2 w-4 h-4" aria-hidden="true"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg></button>
                            <div id="prices" class="hidden sm:w-96 z-10 bg-white rounded shadow">
                                <ul class="overflow-y-auto p-2 w-full h-fit text-sm text-gray-700"
                                    aria-labelledby="dropdownSearchButton">
                                    @foreach ($event->eventPrices as $price)
                                        <li class="mb-1 flex justify-between items-center">
                                            <div class="w-full flex items-center p-2 rounded hover:bg-gray-100">
                                                <input id="{{ $price->uid }}" type="checkbox"
                                                    value="{{ $price->uid }}" data-value="{{ $price->value }}"
                                                    class="w-4 h-4 checked:bg-red-500 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-red-300 price">
                                                <label for="{{ $price->uid }}"
                                                    class="ml-2 w-fit text-sm font-medium text-gray-900 rounded dark:text-gray-300">{{ $price->label }}
                                                    ({{ $price->value . ' FCFA' }})
                                                </label>
                                            </div>
                                            @if ($event->prices_quantity_active)
                                                <div>
                                                    <input type="number" min="1"
                                                        class="w-16 sm:w-20 bg-gray-50 inline-flex items-center justify-between outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 p-2.5 quantity_input"
                                                        value="1" data-target-price="#{{ $price->uid }}"
                                                        disabled>
                                                </div>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @else
                            <select name="price" id="price"
                                class="bg-gray-50 outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                                required>
                                <option class="hidden">Sélectionner un tarif</option>
                                @if ($event->eventPrices->count() > 1)
                                    @foreach ($event->eventPrices as $price)
                                        <option value="{{ $price->value }}">{{ $price->label }}
                                            ({{ $price->value . ' FCFA' }}
                                            FCFA)
                                        </option>
                                    @endforeach
                                @else
                                    <option value="{{ $event->eventPrices->first()->value }}" selected>
                                        {{ $event->eventPrices->first()->value . ' FCFA' }}</option>
                                @endif
                            </select>
                        @endif
                    </div>
                    <input type="hidden" name="payment_status" value="0" required>
                    <div class="mb-3">
                        <label for="payment_method" class="block mb-2 text-sm font-semibold text-gray-900">
                            <span>Mode de paiement</span>
                            <span class="text-red-600">*</span>
                        </label>
                        <select name="payment_method" id="payment_method"
                            class="bg-gray-50 outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                            disabled="true"
                            required>
                            @if ($event->event_payment_methods->count() > 1)
                                <option value="" class="hidden">Selectionner un mode de paiement</option>
                                @foreach ($event->event_payment_methods as $method)
                                    <option value="{{ $method->name }}">{{ $method->name }}</option>
                                @endforeach
                            @elseif($event->event_payment_methods->count() === 1)
                                <option value="{{ $event->event_payment_methods->first()->name }}" selected>
                                    {{ $event->event_payment_methods->first()->name }}</option>
                            @endif
                        </select>
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                            class="font-medium" id="pm_error"></span></p>
                    </div>
                    @if ($event->custom['hasDirectPayment'])
                        @if ($event->event_payment_methods->count() === 1)
                            <button type="button" id="paymentBtn"
                            class="text-white bg-red-500 focus:bg-red-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center flex items-center mx-auto"
                            style="width: fit-content;">
                            Effectuer le paiement
                        </button>
                        @endif
                        <div class="mb-3" id="payment_container"
                            data-payment-methods="{{ json_encode($event->custom['directPaymentMethod']) }}">

                        </div>
                    @endif
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
</body>
</html>