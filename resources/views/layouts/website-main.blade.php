<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME', 'Yeele') }} | @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('logo.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .hero {
            box-shadow: 0 0 0 30px #f74343,
                0 0 0 50px #f05252;
        }

        .montserrat_bold {
            font-family: MontserratBold;
        }

        .partner img {
            filter: grayscale(1);
        }

    </style>

    @yield('additionnalStyle')
</head>

<body>

    <x-website-navbar />

    @yield('content')

    <x-website-footer />

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    @yield('additionnalScript')
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
