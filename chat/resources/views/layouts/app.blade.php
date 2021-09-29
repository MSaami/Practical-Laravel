<html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{asset('css/bootstraprtl-v4.css')}}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        @yield('links')
        <title>@yield('title' , 'Laravel')</title>
    </head>

    <body>
        <!-- Nav Menu -->
        @include('partials.navbar')
        <div id="app">
            @yield('content')
        </div>
    </body>
    <script>

window.user = {!!
    json_encode([
            'authenticated'=> auth()->check(),
            'id'=> auth()->check() ? auth()->user()->id : null,
            'name'=> auth()->check() ? auth()->user()->name : null
            ])
    !!}



    </script>
    <script src="{{asset('js/app.js')}}" defer></script>
</html>
