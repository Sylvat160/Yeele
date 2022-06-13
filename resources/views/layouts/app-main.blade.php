<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Yeele | @yield('title')</title>

    <link rel="stylesheet" href="{{ asset('app_assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet"
        href="{{ asset('app_assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app_assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app_assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app_assets/plugins/jqvmap/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app_assets/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app_assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app_assets/plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('app_assets/plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{asset("logo.png")}}" alt="Yeele" height="40" width="100">
        </div>

        <x-app-navbar />

        <x-app-sidebar showeventmenu="{{ isset($event_menu) }}" event="{{ $event->uid }}" />

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                      <h1 class="m-0">@yield('bigTitle')</h1>
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

        <x-app-footer />

    <script src="{{ asset('app_assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('app_assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="{{ asset('app_assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('app_assets/plugins/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('app_assets/plugins/sparklines/sparkline.js') }}"></script>
    <script src="{{ asset('app_assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <script src="{{ asset('app_assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('app_assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('app_assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('app_assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('app_assets/dist/js/adminlte.js') }}"></script>
        @yield('additional_script')

        <script>
            const currentPage = document.querySelector(`a[data-path="{{ Request::path() }}"]`)
            if(currentPage) currentPage.classList.add('active')

            $(function() {
                const path = window.location.pathname.split('/').pop()
                current_event_page = $(`a[data-event_menu_path="${path}"]`)
                if (current_event_page) {
                    current_event_page.addClass('active')
                }
            })
        </script>
</body>

</html>