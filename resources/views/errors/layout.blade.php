<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
        <link href="{{asset('dist/images/logondv.svg')}}" rel="shortcut icon">
        <link rel="stylesheet" href="{{asset('dist/css/app.css')}}" />
    </head>
    <body class="py-5">
    <div class="container">
        <!-- BEGIN: Error Page -->
        <div class="error-page flex flex-col lg:flex-row items-center justify-center h-screen text-center lg:text-left">
            <div class="-intro-x lg:mr-20">
                <img alt="Midone - HTML Admin Template" class="h-48 lg:h-auto" src="{{asset('dist/images/error-illustration.svg')}}">
            </div>
            <div class="text-white mt-10 lg:mt-0">
                <div class="intro-x text-8xl font-medium">@yield('code')</div>
                <div class="intro-x text-xl lg:text-3xl font-medium mt-5">@yield('message').</div>
                <a href="{{route('home')}}" class="intro-x btn py-3 px-4 text-white border-white dark:border-darkmode-400 dark:text-slate-200 mt-10">Back to Home</a>
            </div>
        </div>
        <!-- END: Error Page -->
    </div>
    <script src="{{asset('dist/js/app.js')}}"></script>
    </body>
</html>
