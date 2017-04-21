@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"> Profil de {{Auth::user()->prenom}}</div>

                    <div class="panel-body">


                    <!-- <img src="/img/avatars/{{Auth::user()->avatar}}"style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                    <form enctype="multipart/form-data" action="/profil" mehod="Photo>
                        <label>Update Profil Image</label>
                        <input type="file" name="avatar">
             Photo      <input type=hidden" name="_token" value="Image...">
                        <input type="submit" class="pull-right btn btn-sm btn-primary">

                    </form>
-->
                        @if(Auth::user()->ID_Type_User == 3)

                            Bienvenu sur votre profil Admin : {{ Auth::user()->prenom }} !


                            <form enctype="multipart/form-data" action="/profil" mehod="POST">
                                <label>Ajouter une image</label>
                                <input type="file" name="avatar">
                                <input type=hidden" name="_token" value="Image...">
                                <input type="submit" class="pull-right btn btn-sm btn-primary">

                            </form>

                    </div>




                    <div class="panel-body">
                    <form action="/new-post" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <input required="required" value="{{ old('titre') }}" placeholder="Enter title here" type="text" name = "titre"class="form-control" />
                        </div>
                        <div class="form-group">
                            <textarea name='body'class="form-control">{{ old('body') }}</textarea>
                        </div>
                        <input type="submit" name='publish' class="btn btn-info pull-right" value = "Publish"/>
                        <input type="submit" name='save' class="btn btn-info pull-right" value = "Save Draft" />

                    </form>
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
