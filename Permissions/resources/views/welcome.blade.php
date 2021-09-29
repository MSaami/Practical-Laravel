@extends('layouts.app')


@section('title' , __('users.main page'))


@section('content')

<div class="flex-center course-title position-ref full-height">
            <div class="content">
                @include('partials.alerts')
                <div class="title m-b-md">
                    @lang('users.manage users')
                </div>
                <div class="library-title">
                    @lang('users.practical laravel')
                </div>
            </div>
        </div>

@endsection
