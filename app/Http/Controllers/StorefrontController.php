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

        //format price
        foreach($products as $product){
            $product->price = number_format($product->price, 2);
        }

        // dd($products);
        return view('storefront.index',compact('products'));
    }

    public function addToCart(Request $request){
        //get existing cart from session
        $cart = session()->get('cart');
        //merge existing cart with new product
        $cart[$request->request_id] = $request->all();
        //store updated cart in session
        session()->put('cart', $cart);
        //redirect back to the page
        return back()->with('success', 'Product added to cart successfully!');
    }

    public function removeFromCart(Request $request){
        //get existing cart from session
        $cart = session()->get('cart');
        //remove product from cart
        unset($cart[$request->request_id]);
        //store updated cart in session
        session()->put('cart', $cart);
        //redirect back to the page
        return back()->with('success', 'Product removed from cart successfully!');
    }
}
