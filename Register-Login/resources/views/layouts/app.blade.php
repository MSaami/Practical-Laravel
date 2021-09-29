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
    <title>@yield('title')</title>
</head>

<body>
    <!-- Nav Menu -->
   @include('partials.navbar') 
   @if (session('mustVerifyEmail'))
   <div class="alert alert-danger text-center">
      @lang('auth.you must verify your email' , ['link' => route('auth.email.send.verification')]) 
   </div>
   @endif
   @if (session('verificationEmailSent'))
   <div class="alert alert-success text-center">
       @lang('auth.verification email sent')
   </div>
   @endif
    <div class="container">
        @yield('content')
    </div>
</body>

</html>
