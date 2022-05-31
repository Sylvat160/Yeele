<div class="w-full h-fit py-2">
    <div class="container flex justify-between items-center mx-auto">
        <img src="{{ asset('logo.png') }}" alt="Yeele" width="125" height="100">
        <nav class="text-base hidden md:block">
            @foreach ($links as $name => $link)
                <a
                 href="{{ $link['path'] }}" 
                 class="px-4 font-semibold{{ isset($link['active']) ? ' text-red-500' : null }}">{{ $name }}</a>
            @endforeach
            <a href="#" class="py-3 px-5 font-semibold text-white bg-red-500 transition-all hover:bg-red-600  rounded-xl">Se connecter</a>
        </nav>
    </div>
</div>