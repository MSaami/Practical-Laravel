@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6 mt-5">
        @include('partials.alerts')
        <form action="{{route('ticket.create')}}" method='post' enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">عنوان مطلب</label>
                <input type="text" class="form-control" id="title" name="title" >
            </div>
                <div class="form-group">
                    <label for="department">بخش</label>
                    <select class="form-control" id="department" name="department">
                        <option value="0">فنی</option>
                        <option value="1">مالی</option>
                        <option value="2">پشتیبانی</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="priority">اولویت</label>
                    <select class="form-control" id="priority" name="priority">
                        <option value="0">پایین</option>
                        <option value="1">متوسط</option>
                        <option value="2">بالا</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="text">متن</label>
                    <textarea class="form-control" id="text" rows="6" name="text"></textarea>
                </div>
                <div class="form-group">
                    <label for="">پیوست</label>
                    <div class="custom-file">
                        <input type="file" name="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">فایل را انتخاب کنید</label>
                    </div>
                </div>
                <button type='submit' class='btn btn-primary'>ارسال</button>
        </form>
    </div>
</div>
@endsection
