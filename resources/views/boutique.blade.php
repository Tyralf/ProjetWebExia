@extends('layouts.app')

@section('title')
    Boutique
@endsection

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @foreach ($products as $product)
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail" >
                            <img src={{$product->imageurl}} class="img-responsive">
                            <div class="caption">
                                <p>{{$product->description}}</p>
                                <div class="row" style="text-align: center">
                                    <div class="col-md-5 col-xs-6">
                                        <h3>{{$product->name}}</h3>
                                    </div>
                                    <div class="col-md-6 col-xs-6 price">
                                        <h3>
                                            <label>€{{$product->price}}</label>
                                        </h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="{{ route('product.addToCart', ['id' => $product->id]) }}" type="button" id="buttonAdd">
                                            <span class="fa fa-shopping-cart"></span> Acheter
                                        </a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @if(!Auth::guest() && ($product->author_id == Auth::user()->id || Auth::user()->is_admin()))
            <button class="btn"><a href="/createProduct">Rajouter un produit</a></button>
        @endif
    </div>

@endsection

