@extends('layouts.galerielayout')

@section('body')
    @include('error-notification')
    {!! Form::model($photo,['url' => '/galerie/'.$photo->id, 'method' => 'PUT', 'files'=>true]) !!}

    <img src="{{ asset($image->file) }}" height="150" />
    <div class="form-group">
        <label for="userfile">Image File</label>
        {!! Form::file('userfile',null,['class'=>'form-control']) !!}
    </div>


    <div class="form-group">
        <label for="ID_Activite">ID Activité</label>
        {!! Form::textarea('ID_Activite',null,['class'=>'form-control']) !!}
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{ url('/galerie') }}" class="btn btn-warning">Cancel</a>

    {!! Form::close() !!}
@stop