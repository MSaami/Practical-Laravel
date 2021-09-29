<html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{asset('css/bootstraprtl-v4.css')}}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        @yield('links')
        <script src="{{asset('js/app.js')}}"></script>
        <title>@yield('title' , 'Laravel')</title>
    </head>

    <body>
        <!-- Nav Menu -->
        @include('partials.navbar')
        <div class="container">
            @yield('content')
        </div>
    </body>

    <script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
    </script>
</html>
