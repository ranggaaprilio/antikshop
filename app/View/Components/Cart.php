<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Product;

class Cart extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        //get the cart data from the session
        $cartSession = session()->get('cart');



        //get data products with images from the database
        $cart = [];
        $subtotal = 0;
        if ($cartSession) {
            foreach ($cartSession as $key => $value) {
                $product = Product::with('images')->find($value['product_id']);
                if (!$product) {
                    continue;
                }
                //calculate the subtotal
                $subtotal += $product->price * $value['product_qty'];
                $cart[] = [
                    'request_id' => $key, //add request_id to the cart array to use it in the remove from cart functionality
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => number_format($product->price, 2),
                    'quantity' => $value['product_qty'],
                    'description' => $product->description,
                    'image' => $product->images->first()->path
                ];
            }


        }

        return view('components.cart', [
            'carts' => $cart,
            'subtotal' => number_format($subtotal, 2)

        ]);
    }
}
