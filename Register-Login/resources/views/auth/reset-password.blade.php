@extends('layouts.app')


@section('title' , __('auth.reset password'))


@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">
        @include('partials.alerts')
        <div class="card">
            <div class="card-header">
                @lang('auth.reset password')
            </div>
            <div class="card-body">
            <form method="POST" action="{{route('auth.password.reset')}}">
                    @csrf
                <input type="hidden" name="token" value="{{$token}}">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="email">@lang('auth.email')</label>
                        <div class="col-sm-9">
                        <input type="email" name="email" class="form-control" id="email" readonly value="{{$email}}" 
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
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="password_confirmation">@lang('auth.confirm password')</label>
                        <div class="col-sm-9">
                            <input type="password" name="password_confirmation" class="form-control"
                                id="password_confirmation" placeholder="@lang('auth.confirm your password')">
                        </div>
                    </div>
                    <div class="col-sm-9 offset-sm-3">
                        @include('partials.validation-errors')
                    </div>
                    <button type="submit" class="btn btn-primary">@lang('auth.reset password')</button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection
