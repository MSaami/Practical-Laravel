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
    <a class="btn btn-info  mr-2" href="/login">ورود</a>
    <a class="btn btn-info mr-2" href="/register">ثبت نام</a>
    @endguest
    @auth
    <ul class="navbar-nav">
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            {{Auth::user()->name}}
        </a>
        <div class="dropdown-menu logout-btn" aria-labelledby="navbarDropdown">

            <a onclick="event.preventDefault();document.getElementById('logout-form').submit()" class="dropdown-item" href="#">خروج</a>
        </div>
        <form id="logout-form" action="/logout" method="POST" style="display: none;">
            @csrf
        </form>
        </li>
    </ul>
    @endauth
    </div>
</nav>
