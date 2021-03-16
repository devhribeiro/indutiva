<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Indutiva') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('plugins/fontawesome-free')}}/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{url('plugins/icheck-bootstrap')}}/icheck-bootstrap.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- fullCalendar -->
    <link rel="stylesheet" href="{{url('plugins/fullcalendar')}}/main.min.css">
    <script src="{{url('plugins/fullcalendar')}}/main.min.js"></script>
    <!-- <link rel="stylesheet" href="{{url('plugins/fullcalendar-interaction')}}/main.min.css"> -->
    <link rel="stylesheet" href="{{url('plugins/fullcalendar-daygrid')}}/main.min.css">
    <link rel="stylesheet" href="{{url('plugins/fullcalendar-timegrid')}}/main.min.css">
    <link rel="stylesheet" href="{{url('plugins/fullcalendar-bootstrap')}}/main.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('css')}}/adminlte.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="sidebar-mini control-sidebar-slide-open text-sm">

    @yield('content')

    <!-- jQuery -->
    <script src="{{url('plugins/jquery')}}/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{url('plugins/bootstrap/js')}}/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{url('js')}}/adminlte.min.js"></script>
    <script src="{{url('js')}}/main.js"></script>
</body>

</html>
