@extends('layouts.app')
@section('title' , 'Panel')
@section('content')
    
<div class="row justify-content-center">
	<div class="col-md-4 mt-5">
		@include('panel.menu')
	</div>
	<div class="col-md-8 mt-5">
        @include('partials.alerts')
        @yield('panel')
    </div>
@endsection