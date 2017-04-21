@extends('layouts.app2')
@section('title')
    Page d'inscription
@endsection
@section('content')
    <!--
    <form method="post" action='{{ url("/inscrire") }}'>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="post_id" value="{{ $post->id }}{{ old('ID_Activite') }}">
        <div class="form-group">
            <input required="required" placeholder="Enter title here" type="text" name = "titre" class="form-control" value="@if(!old('titre')){{$post->titre}}@endif{{ old('titre') }}"/>
        </div>
        <div class="form-group">
    <textarea name='body'class="form-control">
      @if(!old('body'))
            {!! $post->body !!}
        @endif
        {!! old('body') !!}
    </textarea>
        </div>
        @if($post->active == '1')
            <input type="submit" name='publish' class="btn btn-success" value = "Update"/>
        @else
            <input type="submit" name='publish' class="btn btn-success" value = "Publish"/>
        @endif
        <input type="submit" name='save' class="btn btn-default" value = "Save As Draft" />
        <a href="{{  url('delete/'.$post->id.'?_token='.csrf_token()) }}" class="btn btn-danger">Delete</a>
    </form>
    -->

    @if($inscris)
        <ul style="list-style: none; padding: 0">
            @foreach($inscris as $inscrit)
                <li class="panel-body">
                    <div class="list-group">
                        <div class="list-group-item">
                            <h3>Inscription au : {{ $inscrit->titre }}</h3>

                        </div>
                        <div class="list-group-item">
                            <h4>{{ $inscrit->titre }}</h4>
                            Auteur : {{ $inscrit->name }} <br/>
                            Description : {{ $inscrit->body }}<br/>



                            <br/>
                            <form method="post" action='{{ url("/inscrire") }}'>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="ID_User" value="{{Auth::user()->id}}">
                                <input type="hidden" name="ID_Activite" value="{{ $inscrit->id }}">
                                <input type="hidden" name="Slug" value="{{ $inscrit->slug }}">

                                <input type="submit" name='inscription' class="btn btn-success" value = "S'inscrire"/>
                            </form>


                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
@endsection