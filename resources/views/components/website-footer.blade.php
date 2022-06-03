<footer class="p-4 sm:p-6">
    <div class="md:flex md:justify-between">
        <div class="w-72 mb-6 md:mb-0" style="max-width: 280px;">
            <a href="https://flowbite.com" class="flex items-center">
                <img src="{{asset('logo.png ')}}" class="mr-3 h-8" alt="FlowBite Logo">
            </a>
            <p class="mt-4 text-gray-500">Un produit de Horinfo.</p>
        </div>
        <div class="grid grid-cols-2 gap-8 md:gap-4 md:grid-cols-4 lg:gap-6">
            <div>
                <h2 class="mb-6 text-sm text-red-500 font-semibold uppercase">Liens</h2>
                <ul class="text-gray-600">
                    <li class="mb-4">
                        <a href="{{ route('website.home') }}" class="hover:underline">Accueil</a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('website.features') }}" class="hover:underline">Fonctionnalités</a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('website.prices') }}" class="hover:underline">Tarifs</a>
                    </li>
                    <li>
                        <a href="{{ route('website.contact') }}" class="hover:underline">Contact</a>
                    </li>
                </ul>
            </div>
            <div>
                <h2 class="mb-6 text-sm text-red-500 font-semibold uppercase">Nous suivre</h2>
                <ul class="text-gray-600">
                    <li class="mb-4">
                        <a href="https://www.facebook.com/HorinfoBurkinaFaso" class="hover:underline ">Facebook</a>
                    </li>
                    <li class="mb-4">
                        <a href="https://www.linkedin.com/company/horinfo/?viewAsMember=true" class="hover:underline">Linkedin</a>
                    </li>
                    <li>
                        <a href="https://twitter.com/Horinfo" class="hover:underline">Twitter</a>
                    </li>
                </ul>
            </div>
            <div>
                <h2 class="mb-6 text-sm text-red-500 font-semibold uppercase">Informations légales</h2>
                <ul class="text-gray-600">
                    <li class="mb-4">
                        <a href="#" class="hover:underline">Politique de confidentialité</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline">Termes et Conditions d'utlisation</a>
                    </li>
                </ul>
            </div>
            <div>
                <h2 class="mb-6 text-sm text-red-500 font-semibold uppercase">Contactez-nous</h2>
                <ul class="text-gray-600">
                    <li class="mb-4">
                        <a href="tel:+226 25 39 21 73" class="hover:underline text-sm sm:text-base">
                            <span>+226 25 39 21 73</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="tel:+226 70 26 95 43" class="hover:underline text-sm sm:text-base">
                            <span>+226 70 26 95 43</span>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="mailto:horinfo@horinfo.com" class="hover:underline text-sm sm:text-base">
                            <span>horinfo@horinfo.com</span>
                        </a>
                    </li> --}}
                </ul>
            </div>
        </div>
    </div>
    <hr class="my-6 border-gray-200 sm:mx-auto lg:my-8">
    <div class="sm:flex sm:items-center sm:justify-between">
        <span class="text-sm text-gray-500 sm:text-center">© 2022 <a href="https://flowbite.com"
                class="hover:underline">Yeele</a>. Tous droits réservés.
        </span>
        <div class="flex mt-4 space-x-6 sm:justify-center sm:mt-0">
            <a href="https://www.facebook.com/HorinfoBurkinaFaso" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                <ion-icon name="logo-facebook" class="w-5 h-5"></ion-icon>
            </a>
            <a href="https://www.linkedin.com/company/horinfo/?viewAsMember=true" class="text-gray-500 hover:text-gray-900">
                <ion-icon name="logo-linkedin" class="w-5 h-5"></ion-icon>          
            </a>
            <a href="https://twitter.com/Horinfo" class="text-gray-500 hover:text-gray-900">
                <ion-icon name="logo-twitter" class="w-5 h-5"></ion-icon>
            </a>
        </div>
    </div>
</footer>
