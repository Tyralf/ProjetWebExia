@extends('layouts.app')

@section('title')
    Boutique
@endsection

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-body">
                <form method="post" action="insertProduct">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <input required="required" placeholder="Nom du produit" type="text" name = "name"class="form-control" />
                    </div>
                    <div class="form-group">
                        <input required="required" placeholder="Description" type="text" name = "description" class="form-control" />
                    </div>
                    <div class="form-group">
                        <input required="required" placeholder="Prix" type="text" name = "price" class="form-control" />
                    </div>
                    <div class="form-group">
                        <input required="required" placeholder="Url" type="text" name = "imageurl" class="form-control" />
                    </div>
                    <button type="submit">Enregistrer</button>
                </form>

            </div>
        </div>
    </div>


@endsection