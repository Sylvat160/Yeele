<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Yeele | @yield('title')</title>

    <link rel="shortcut icon" href="{{ asset('logo.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('app_assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('app_assets/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app_assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{asset("logo.png")}}" alt="Yeele" height="60" width="100">
        </div>

        @include('admin.Layouts.header')

        @include('admin.Layouts.sidebar')

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('bigTitle')</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                                <li class="breadcrumb-item active">@yield('pageName')</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    @yield('main')
                </div>
            </section>

        </div>
    </div>

        

        <script src="{{ asset('app_assets/plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('app_assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <script src="{{ asset('app_assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('app_assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
        <script src="{{ asset('app_assets/dist/js/adminlte.js') }}"></script>
        <script src="{{ asset('app_assets/dist/js/pages/dashboard.js') }}"></script>
        @yield('additional_script')

        <script>
            document.querySelector(`a[data-path^="{{ Request::path() }}"]`).classList.add('active')
        </script>
</body>

</html>