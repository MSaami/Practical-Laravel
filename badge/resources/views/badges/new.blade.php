@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6 mt-5">
        @include('partials.alerts')
        <form action="{{route('badge.store')}}" method='post'>
            @csrf
            <div class="form-group">
                <label for="name">عنوان مدال</label>
                <input type="text" class="form-control" id="name" name="title" >
            </div>
            <div class="form-group">
                <label for="required_number">حد نصاب</label>
                <input type="number" class="form-control" id="required_number" name="required_number">
            </div>
            <div class="form-group">
                <label for="icon_url"> آیکون</label>
                <input type="url" class="form-control" id="icon_url" name="icon_url">
            </div>
            <div class="form-group">
                <label for="type"> نوع</label>
                <select id="type" name="type" class="form-control">
                    <option value="0">XP</option>
                    <option value="1">تاپیک</option>
                    <option value="2">پاسخ</option>
                </select>
            </div>
            <div class="form-group">
                <label for="description">توضیحات</label>
                <textarea class="form-control" id="description" rows="6" name="description"></textarea>
            </div>
            <button type='submit' class='btn btn-primary'>ارسال</button>
        </form>
    </div>
</div>
@endsection
