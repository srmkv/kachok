<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin</title>

    <link href="{{asset('dist/images/logo.svg')}}" rel="shortcut icon">
    <link rel="stylesheet" href="{{asset('dist/css/app.css')}}" />


</head>
<body class="login">
<div class="container sm:px-10">
    <div class="block xl:grid grid-cols-2 gap-4">
        @yield('content')
    </div>
</div>

    <script src="{{asset('dist/js/app.js')}}"></script>
</body>
</html>
