@extends('layouts.app2')
@section('title')
    @if($post)
        {{ $post->titre }}
        @if(!Auth::guest() && ($post->ID_Author == Auth::user()->id || Auth::user()->is_admin()))
            <button class="btn" style="float: right"><a href="{{ url('edit/'.$post->slug)}}">Edit Post</a></button>
        @endif
    @else
        Page does not exist
    @endif
@endsection
@section('title-meta')
    <p>{{ $post->created_at->format('M d,Y \a\t h:i a') }} By <a href="{{ url('/user/'.$post->ID_Author)}}">{{ $post->author->name }}</a></p>
@endsection
@section('content')
    @if($post)
        <div>
            {!! $post->body !!}
        </div>
        <div>
            <h2>Leave a comment</h2>
        </div>
        @if(Auth::guest())
            <p>Login to Comment</p>
        @else
            <div class="panel-body">
                <form method="post" action="/comment/add">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="ID_Activite" value="{{ $post->id }}">
                    <input type="hidden" name="slug" value="{{ $post->slug }}">
                    <div class="form-group">
                        <textarea required="required" placeholder="Enter comment here" name = "commentaire" class="form-control"></textarea>
                    </div>
                    <input type="submit" name='post_comment' class="btn btn-success" value = "Post"/>
                </form>
            </div>
        @endif
        <div>
            @if($comments)
                <ul style="list-style: none; padding: 0">
                    @foreach($comments as $comment)
                        <li class="panel-body">
                            <div class="list-group">
                                <div class="list-group-item">
                                    <h3>{{ $comment->name }}</h3>
                                    <p>{{ date('M d,Y \a\t h:i a', strtotime($comment->created_at)) }}</p>
                                </div>
                                <div class="list-group-item">
                                    <p>{{ $comment->commentaire }}</p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    @else
        404 error
    @endif
@endsection