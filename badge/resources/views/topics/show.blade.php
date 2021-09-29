@extends('layouts.app')

@section('title', 'مقاله')

@section('content')
<div class="justify-content-center">
    <div class="mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{$topic->title}}
                </div>
                <div class="card-body">
                    <p class="card-text">{{$topic->text}}</p>
                </div>
                <div class="card-footer text-muted">
                    ارسال شده توسط {{$topic->user->name}}  در {{$topic->created_at}}
                </div>
            </div>
        </div>

        @foreach($topic->replies as $reply) 
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-body">
                    <p class="card-text">{{$reply->text}}</p>
                </div>
                <div class="card-footer text-muted">
                    ارسال شده توسط {{$reply->user->name}} در {{$reply->created_at}}
                </div>
            </div>
        </div>
        @endforeach
        <div class="col-md-8">
            <form class="mt-5" action="{{route('reply.store', $topic->id)}}" method="post">
                @csrf
                <div class="form-group">
                    <textarea name='text' class="form-control" placeholder="متن پیام خود را وارد کنید... " id="exampleFormControlTextarea1" rows="6"></textarea>
                </div>
                <button class="btn btn-primary">ارسال</button>
            </form> 
        </div>
    </div>

</div>


@endsection


