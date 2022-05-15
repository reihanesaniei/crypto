<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Template Main CSS File -->
    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">

    <!-- Template Main CSS File -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    {{--  Fontawesome--}}
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <script src="/js/app.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <title>Saniei</title>
</head>
<body>
    <div id="app">
        @include('partial.header')
        @yield('content')
        @include('partial.footer')
    </div>

</body>


</html>
