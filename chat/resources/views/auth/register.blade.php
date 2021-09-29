@extends('layouts.app')
@section('title' , __('auth.register user'))
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 mt-5">
        @include('partials.alerts')
        <div class="card">
            <div class="card-header">
                @lang('auth.register user')
            </div>
            <div class="card-body">
                <form method="POST" action="/register">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="email">@lang('auth.email')</label>
                        <div class="col-sm-9">
                            <input type="email" name="email" class="form-control" id="email" value="{{old('email')}}"
                            aria-describedby="emailHelp" placeholder="@lang('auth.enter your email')">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="name">@lang('auth.name')</label>
                        <div class="col-sm-9">
                            <input value="{{old('name')}}" type="text" name="name" class="form-control" id="name"
                            placeholder="@lang('auth.enter your name')">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="password">@lang('auth.password')</label>
                        <div class="col-sm-9">
                            <input  type="password" name="password" class="form-control" id="password"
                            placeholder="@lang('auth.enter your password')">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="password_confirmation">@lang('auth.confirm password')</label>
                        <div class="col-sm-9">
                            <input  type="password" name="password_confirmation" class="form-control"
                            id="password_confirmation" placeholder="@lang('auth.confirm your password')">
                        </div>
                    </div>
                    <div class="offset-sm-3">
                        @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                            <div class="small mb-2">
                                <li class="text-danger">{{$error}}</li>
                            </div>
                            @endforeach
                        </ul>
                        @endif
                    </div>                    <button type="submit" class="btn btn-primary">@lang('auth.register')</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection