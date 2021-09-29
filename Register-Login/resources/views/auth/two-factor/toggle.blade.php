@extends('layouts.app')

@section('title' , __('auth.two factor authentication'))


@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">
        @include('partials.alerts')
        <div class="card">
            <div class="card-header">
                @lang('auth.two factor authentication')
            </div>
            @if (Auth::user()->hasTwoFactor())
            <div class="card-body text-center">
                <div>
                    <small>
                        @lang('auth.two factor is active' , ['number' => Auth::user()->phone_number])
                    </small>
                </div>
            <a href="{{route('auth.two.factor.deactivate')}}" class="btn btn-primary mt-5">@lang('auth.deactivate')</a>
            </div>
            @else
            <div class="card-body text-center">
                <div>
                    <small>
                        @lang('auth.two factor is inactive' , ['number' => Auth::user()->phone_number])
                    </small>
                </div>
                <a href="{{route('auth.two.factor.activate')}}" class="btn btn-primary mt-5">@lang('auth.activate')</a>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection
