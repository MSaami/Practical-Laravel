@extends('layouts.app')


@section('title' , __('public.main page'))


@section('content')

<div class="flex-center course-title position-ref full-height">
            <div class="content">
                @include('partials.alerts')
                <div class="title m-b-md">
                    @lang('public.register & login system')
                </div>
                <div class="library-title">
                    @lang('public.practical laravel')
                </div>
            </div>
        </div>

@endsection
