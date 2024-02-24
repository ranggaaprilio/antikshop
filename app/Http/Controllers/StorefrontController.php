<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use product model
use App\Models\Product;

class StorefrontController extends Controller
{
    //
    public function index()
    {
        //get 4 last products from database with category and images
        $products = Product::with('category', 'images')->latest()->take(2)->get();

        // dd($products);
        return view('storefront.index',compact('products'));
    }
}
