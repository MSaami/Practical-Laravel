@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6 mt-5">
        @include('partials.alerts')
        <form action="{{route('topic.store')}}" method='post'>
            @csrf
            <div class="form-group">
                <label for="title">عنوان مطلب</label>
                <input type="text" class="form-control" id="title" name="title" >
            </div>
            <div class="form-group">
                <label for="text">متن</label>
                <textarea class="form-control" id="text" rows="6" name="text"></textarea>
            </div>
            <button type='submit' class='btn btn-primary'>ارسال</button>
        </form>
    </div>
</div>
@endsection
