@extends('layouts.app')

@section('title' , __('auth.login'))


@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">
        @include('partials.alerts')
        <div class="card">
            <div class="card-header">
                        @lang('auth.login with magic link')
            </div>
            <div class="card-body">
            <form method="POST" action="{{route('auth.magic.send.token')}}">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="email">@lang('auth.email')</label>
                        <div class="col-sm-9">
                            <input type="email" name="email" class="form-control" id="email" value="{{old('email')}}"
                                aria-describedby="emailHelp" placeholder="@lang('auth.enter your email')">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-check offset-sm-3">
                            <input type="checkbox" class="form-check-input" name="remember" id="remember">
                            <label class="form-check-label" for="remember"><small>@lang('auth.remember me')</small></label>
                        </div>
                    </div>
                    <div class="col-sm-9 offset-sm-3">
                        @include('partials.validation-errors')
                    </div>
                    <div class="offset-sm-3">
                    <button type="submit" class="btn btn-primary">@lang('auth.send magic link')</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection

