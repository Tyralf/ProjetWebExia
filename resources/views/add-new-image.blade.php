@extends('layouts.galerielayout')

@section('body')
    @include('error-notification')
    {!! Form::open(['url'=>'/galerie', 'method'=>'POST', 'files'=>'true']) !!}

    <div class="form-group">
        <label for="userfile">Photo</label>
        <input type="file" class="form-control" name="userfile">
    </div>

    <div class="form-group">
        <label for="ID_Activite">Activite</label>
        <input type="text" class="form-control" name="NomActivite">
    </div>


    <button type="submit" class="btn btn-primary">Upload</button>
    <a href="{{ url('/galerie') }}" class="btn btn-warning">Cancel</a>

    {!! Form::close() !!}
@stop