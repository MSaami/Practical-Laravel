<nav class="navbar navbar-expand-lg navbar-light bg-light ">
    <a class="navbar-brand" href="#">
        <img src="{{asset('img/logo.png')}}" width="30" height="30" class="d-inline-block align-top" alt="">
        آکادمی
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="auth-btn collapse justify-content-end navbar-collapse">
        @guest
    <a class="btn btn-info  mr-2" href="{{route('auth.login.form')}}">@lang('public.login')</a>
    <a class="btn btn-info mr-2" href="{{route('auth.register.form')}}">@lang('public.register')</a>
        @endguest
        @auth
 <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    {{Auth::user()->name}}
                </a>
                <div class="dropdown-menu logout-btn" aria-labelledby="navbarDropdown">
                <a href="{{route('auth.two.factor.toggle.form')}}" class="dropdown-item">@lang('auth.two factor authentication')</a>
                <a class="dropdown-item" href="{{route('auth.logout')}}">@lang('auth.logout')</a>
                </div>
       </li>
</ul>
        @endauth
    </div>
</nav>
