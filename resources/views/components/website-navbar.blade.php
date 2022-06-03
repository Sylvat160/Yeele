<div class="w-full h-fit py-2">
    <div class="container flex px-6 md:px-0 justify-between items-center mx-auto">
        <img src="{{ asset('logo.png') }}" alt="Yeele" width="125" height="100">
        <nav class="text-base hidden md:block">
            @foreach ($links as $name => $link)
                <a
                 href="{{ $link['path'] }}" 
                 class="px-4 transition-colors font-semibold{{ isset($link['active']) ? ' text-red-500' : null }} hover:text-red-500">{{ $name }}</a>
            @endforeach
            <a href="{{ route('app.login') }}" class="py-3 px-5 font-semibold text-white bg-red-500 transition-all hover:bg-red-600  rounded-xl">Se connecter</a>
        </nav>
        <div class="flex items-center md:hidden">
            <button type="button" class="bg-red-100 rounded-md p-2 inline-flex items-center justify-center text-red-500 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-red-500" aria-expanded="false" id="show_menu_btn">
              <span class="sr-only">Ouvrir le menu</span>
              <!-- Heroicon name: outline/menu -->
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
              </svg>
            </button>
          </div>
    </div>
</div>

<div class="w-full h-screen bg-black/50 absolute z-10 top-0 inset-x-0 p-2 transition transform origin-top-right hidden" id="mobile_menu">
    <div class="rounded-lg shadow-md bg-white ring-1 ring-black ring-opacity-5 overflow-hidden">
      <div class="px-5 pt-4 flex items-center justify-between">
        <div>
          <img class="h-8 w-auto" src="{{ asset('logo.png') }}" alt="">
        </div>
        <div class="-mr-2">
          <button type="button" class="bg-red-100 rounded-md p-2 inline-flex items-center justify-center text-red-500 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-red-500" id="close_menu_btn">
            <span class="sr-only">Fermer le menu</span>
            <!-- Heroicon name: outline/x -->
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
      <div class="px-2 py-6 space-y-1">
        @foreach ($links as $name => $link)
                <a
                 href="{{ $link['path'] }}" 
                 class="px-4 py-2 block transition-colors font-semibold{{ isset($link['active']) ? ' text-red-500' : null }} hover:text-red-500">{{ $name }}</a>
            @endforeach
            <a href="{{ route('app.login') }}" class="py-3 px-5 block font-semibold text-white bg-red-500 transition-all hover:bg-red-600  rounded-xl">Se connecter</a>
    </div>
  </div>
</div>