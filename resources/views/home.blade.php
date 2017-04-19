@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Profil</div>

                <div class="panel-body">

                    @if(Auth::user()->ID_Type_User == 3)
                    Bienvenu sur votre profil Admin : {{ Auth::user()->prenom }} !

                        <div class="panel-body">Voulez vous ajouter une image ?</div>
                        {!! Form::open(['url' => 'photo', 'files' => true]) !!}
                        <div class="form-group {!! $errors->has('image') ? 'has-error' : '' !!}">
                            {!! Form::file('image', ['class' => 'form-control']) !!}
                            {!! $errors->first('image', '<small class="help-block">:message</small>') !!}
                        </div>
                        {!! Form::submit('Mettre en ligne', ['class' => 'btn btn-info pull-right']) !!}
                        {!! Form::close() !!}
                </div>



                <div class="panel-body">Voulez vous ajouter un Article ?</div>

                <div class="panel-body">
                    {!! Form::open(['url' => 'Article']) !!}
                    <div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
                        {!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Titre']) !!}
                        {!! $errors->first('nom', '<small class="help-block">:message</small>') !!}
                    </div>

                    <div class="form-group {!! $errors->has('texte') ? 'has-error' : '' !!}">
                        {!! Form::textarea ('texte', null, ['class' => 'form-control', 'placeholder' => 'Texte']) !!}
                        {!! $errors->first('texte', '<small class="help-block">:message</small>') !!}
                    </div>
                    {!! Form::submit('Mettre en ligne', ['class' => 'btn btn-info pull-right']) !!}
                    {!! Form::close() !!}
                </div>
                        @else()
                        Bienvenu sur votre profil : {{ Auth::user()->prenom }} !
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
