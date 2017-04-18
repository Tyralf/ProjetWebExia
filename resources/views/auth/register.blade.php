@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('Nom') ? ' has-error' : '' }}">
                            <label for="Nom" class="col-md-4 control-label">Nom</label>

                            <div class="col-md-6">
                                <input id="Nom" type="text" class="form-control" name="Nom" value="{{ old('Nom') }}" required autofocus>

                                @if ($errors->has('Nom'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Nom') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('Prenom') ? ' has-error' : '' }}">
                            <label for="Prenom" class="col-md-4 control-label">Prenom</label>

                            <div class="col-md-6">
                                <input id="Prenom" type="text" class="form-control" name="Prenom" value="{{ old('Prenom') }}" required autofocus>

                                @if ($errors->has('Prenom'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Prenom') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('Email') ? ' has-error' : '' }}">
                            <label for="Email" class="col-md-4 control-label">E-Mail </label>

                            <div class="col-md-6">
                                <input id="Email" type="Email" class="form-control" name="Email" value="{{ old('Email') }}" required>

                                @if ($errors->has('Email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Mot de passe</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmer Mot de Passe</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div>

                                <p>
                                    Choix de l'ecole :<br />
                                    <input type="radio" name="ecole" value="1" id="Exia" /> <label for="Exia">Exia</label><br />
                                    <input type="radio" name="ecole" value="2" id="Ei" /> <label for="Ei">Ei</label><br />

                                </p>

                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
