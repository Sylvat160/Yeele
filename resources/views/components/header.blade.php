<div class="w-full h-fit py-2 bg-orange-400">
    <div class="container flex justify-between items-center mx-auto">
        <img src="{{ asset('logo.png') }}" alt="Yeele" width="125" height="100">
        <nav class="text-base">
            @foreach ($links as $name => $link)
                <a
                 href="{{ $link['path'] }}" 
                 class="px-4 font-semibold{{ $link['active'] ?? null }}">{{ $name }}</a>
            @endforeach
        </nav>
    </div>
</div>                 