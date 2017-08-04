@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><a href="">{{$thread->creator->name}}</a> - {{$thread->title}}</div>
                    <div class="panel-body">
                        <div class="body">{{$thread->body}}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach($thread->replies as $reply)
                    @include('threads.reply')
                @endforeach
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if(auth()->check())
                <form method="post" action="{{route('replyToThread', $thread)}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <textarea name="body" class="form-control" id="body" rows="5" placeholder="Have something to say?"></textarea>
                    </div>
                    <button class="btn btn-primary">Submit Comment</button>
                </form>
                @else
                <div> <p class="text-center">Please <a href="{{ route('login') }}">LogIn</a> to reply</p> </div>
                @endif
            </div>
        </div>

    </div>
@endsection
