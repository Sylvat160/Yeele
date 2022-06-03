<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ env('APP_NAME', 'Yeele') }} | @yield('title')</title>
  @yield('additionnalStyle')
  <link rel="stylesheet" href="{{ asset('app_assets/dist/css/adminlte.min.css') }}">
</head>
<body class="sidebar-mini layout-fixed" style="height: auto;">

  @yield('main')
  
</body>
</html>