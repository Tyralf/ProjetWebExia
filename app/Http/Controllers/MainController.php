<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;

class MainController extends Controller
{

    public function boutique()
    {
        $products = Product::all();
        return view('boutique',['products' => $products]);

    }
}