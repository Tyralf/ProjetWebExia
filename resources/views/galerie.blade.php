@extends('layouts.galerielayout')

@section('body')
    <div class="row">
        @if(count($photos) > 0)
            <div class="col-md-12 text-center" >
                <a href="{{ url('/galerie/create') }}" class="btn btn-primary" role="button">
                    Add New Image
                </a>
                <hr />
                @include('error-notification')
            </div>
        @endif
        @forelse($photos as $photo)
            <div class="col-md-3">
                <div class="thumbnail">
                    <img src="{{asset($photo->file)}}" />
                    <div class="caption">
                        <h3>{{$photo->caption}}</h3>
                        <p>{!! substr($photo->description, 0,100) !!}</p>
                        <p>
                        <div class="row text-center" style="padding-left:1em;">
                            <a href="{{ url('/galerie/'.$photo->id.'/edit') }}" class="btn btn-warning pull-left">Edit</a>
                            <span class="pull-left">&nbsp;</span>
                            {!! Form::open(['url'=>'/galerie/'.$photo->id, 'class'=>'pull-left']) !!}
                            {!! Form::hidden('_method', 'DELETE') !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick'=>'return confirm(\'Are you sure?\')']) !!}
                            {!! Form::close() !!}
                        </div>
                        </p>
                    </div>
                </div>
            </div>
        @empty
            <p>No images yet, <a href="{{ url('/galerie/create') }}">add a new one</a>?</p>
        @endforelse
    </div>
    <div align="center">{!! $photos->render() !!}</div>
@stop