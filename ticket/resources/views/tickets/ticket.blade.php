@extends('layouts.app')

@section('title', 'پیام')

@section('content')
<div class="justify-content-center">
    <div class="mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{$ticket->title}}
                    @if($ticket->isClosed())
                    <span class="btn btn-danger float-right btn-sm" >بسته شده</span>
                    @else
                    <a class="btn btn-danger float-right btn-sm" href="{{route('ticket.close', $ticket)}}">بستن</a>
                    @endif
                </div>
                <div class="card-body">
                    <p class="card-text">{{$ticket->text}}</p>
                    @if($ticket->hasFile())
                    <a href="{{$ticket->file()}}">دانلود پیوست</a>
                    @endif
                </div>
                <div class="card-footer text-muted">
                    {{$ticket->created_at}} توسط {{$ticket->user->name}}
                </div>
            </div>
        </div>

        @foreach($ticket->replies as $reply) 
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-body">
                    <p class="card-text">{{$reply->text}}</p>
                </div>
                <div class="card-footer text-muted">
                    {{$reply->created_at}} توسط {{$reply->repliable->name}}
                </div>
            </div>
        </div>
        @endforeach
        @if(!$ticket->isClosed())
        <div class="col-md-8">
            <form class="mt-5" action="{{route("reply.create", $ticket)}}" method="post">
                @csrf
                <div class="form-group">
                    <textarea name='text' class="form-control" placeholder="متن پیام خود را وارد کنید... " id="exampleFormControlTextarea1" rows="6"></textarea>
                </div>
                <button class="btn btn-primary">ارسال</button>
            </form> 
        </div>
        @endif

    </div>

</div>


@endsection


