@extends('layouts.app')

@section('title' , __('auth.forgot password'))


@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">
        @include('partials.alerts')
        <div class="card">
            <div class="card-header">
                @lang('auth.forgot password')
            </div>
            <div class="card-body">
            <form method="POST" action="{{route('auth.password.forget')}}">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="email">@lang('auth.email')</label>
                        <div class="col-sm-9">
                            <input type="email" name="email" class="form-control" id="email" value="{{old('email')}}"
                                aria-describedby="emailHelp" placeholder="@lang('auth.enter your email')">
                        </div>
                    </div>
                    <div class="col-sm-9 offset-sm-3">
                        @include('partials.validation-errors')
                    </div>
                    <button type="submit" class="btn btn-primary">@lang('auth.request reset password')</button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection
