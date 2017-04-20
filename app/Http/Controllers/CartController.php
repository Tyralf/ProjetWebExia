<?php

namespace App\Http\Controllers;

use App\Cart;
use Session;
use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests;

class CartController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

//    public function getBoutique(){
//        $products = Product::all();
//        return view('boutique',['products' => $products]);
//    }

    public function addItem (Request $request, $id){
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
        return redirect()->route('product.index');

    }

    public function getCart(){
        if(!Session::has('cart')){
            return view('shoppingCart', ['products' => null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shoppingCart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);

    }

    public function getReduceOne($id){

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceOne($id);

        if(count($cart->items) >0){
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return redirect()->route('product.shoppingCart');


    }

    public function getRemoveItem($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if(count($cart->items) >0){
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return redirect()->route('product.shoppingCart');

    }

}