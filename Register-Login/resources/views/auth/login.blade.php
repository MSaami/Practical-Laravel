@extends('layouts.app')
@section('links')
     <script src="https://www.google.com/recaptcha/api.js?hl=fa" async defer></script>
@endsection

@section('title' , __('auth.login'))


@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">
        @include('partials.alerts')
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-7">
                        @lang('auth.login')
                    </div>
                <div class="col-sm-5 text-right"><a href="{{route('auth.magic.login.form')}}"><small>@lang('auth.login with magic link')</small></a></div>
                </div>
            </div>
            <div class="card-body">
            <form method="POST" action="{{route('auth.login')}}">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="email">@lang('auth.email')</label>
                        <div class="col-sm-9">
                            <input type="email" name="email" class="form-control" id="email" value="{{old('email')}}"
                                aria-describedby="emailHelp" placeholder="@lang('auth.enter your email')">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="password">@lang('auth.password')</label>
                        <div class="col-sm-9">
                            <input type="password" name="password" class="form-control" id="password"
                                placeholder="@lang('auth.enter your password')">
                        </div>
                    </div>

                    <div class="offset-sm-3">
                        @include('partials.recaptcha')
                    </div>
                    <div class="form-group row">
                        <div class="form-check offset-sm-3">
                            <input type="checkbox" class="form-check-input" name="remember" id="remember">
                            <label class="form-check-label" for="remember"><small>@lang('auth.remember me')</small></label>
                        </div>
                        <div class="form-check">
                        <a href="{{route('auth.password.forget.form')}}"><small>@lang('auth.forget your password?')</small></a>
                        </div>
                    </div>
                    <div class="offset-sm-3">
                        @include('partials.validation-errors')
                    </div>
                    <div class="offset-sm-3">
                    <button type="submit" class="btn btn-primary">@lang('auth.login')</button>
                    <a href="{{route('auth.login.provider.redirect' , 'google')}}" class="btn btn-danger">@lang('auth.login with google')</a>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection