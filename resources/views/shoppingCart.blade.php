@extends('layouts.app')

@section('title')
    Panier
@endsection

@section('sidebar')

@endsection

@section('content')
    @if(Session::has('cart'))
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div id="tableauProduct">
                        <table>
                            <tr>
                                <th>Produit</th>
                                <th>Prix Unitaire</th>
                                <th>Prix</th>
                                <th>Quantité</th>
                                <th>Action</th>
                            </tr>
                            @foreach($products as $product)

                                <tr>
                                    <td> {{ $product['item']['name'] }}</td>
                                    <td> {{ $product['item']['price'] }}€</td>
                                    <td>{{ $product['price'] }}€</td>
                                    <td>{{ $product['qty'] }}</td>
                                    <td><div class="btn-group">
                                            <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Modifier cet article
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="{{ route('product.reduceOne', ['id' => $product['item']['id']]) }}">Réduire de 1</a> </li>
                                                <li><a href="{{ route('product.remove', ['id' => $product['item']['id']]) }}">Supprimer ces articles</a> </li>
                                                <li><a href="{{ route('product.addOne', ['id' => $product['item']['id']]) }}">Augmenter de 1</a> </li>
                                            </ul>
                                        </div></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div>
                        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                            <strong>Total: {{ $totalPrice }}€</strong>
                        </div>
                    </div>

                    <div>
                        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                            <button type="button" >Procéder au paiement</button>
                            <form action="{{ url('/boutique') }}">
                                <input type="submit" value="Continuer le Shopping" />
                            </form>
                        </div>
                    </div>
                    @else
                        <div>
                            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                                <h2>Pas d'objet dans le panier !</h2>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>


@endsection
