@extends('layouts.app')

@section('title' , 'آپلود فایل')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-6 mt-5">
        <div>
            @include('partials.alerts')
        </div>
        <div class="card">
            <div class="card-header">
                آپلود فایل
            </div>
            <div class="card-body">
                <form action="{{route('file.new')}}"  method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="custom-file mb-3">
                            <input type="file" name="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">فایل خود را انتخاب کنید</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="is-private" name="is-private">
                            <label class="custom-control-label" for="is-private">به صورت خصوصی آپلود شود</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class='text-center'>
                            <button type="submit" class="btn btn-primary">آپلود فایل</button>
                        </div>
                    </div>
                    <div class="form-group">
                        @include('partials.validation')
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
