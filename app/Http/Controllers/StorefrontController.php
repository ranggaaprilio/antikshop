<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use product model
use App\Models\Product;
//use Redirect
use Illuminate\Support\Facades\Redirect;

class StorefrontController extends Controller
{
    //
    private $rekening = [
        'BCA' => '1234567890',
        'BSI' => '1234567890',
        'BJB' => '1234567890',
    ];

    public function index()
    {
        //get 4 last products from database with category and images
        $products = Product::with('category', 'images')->latest()->take(2)->get();
        $allProducts = Product::with('category', 'images')->get();

        //format price
        foreach($products as $product){
            $product->price = number_format($product->price, 2);
        }


        foreach($allProducts as $productData){
            if($productData->price){
                $productData->price = number_format($productData->price, 2);
            }
        }

        // dd($products);
        return view('storefront.index',compact('products','allProducts'));
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

    public function cart(){
         //get the cart data from the session
         $cartSession = session()->get('cart');



         //get data products with images from the database
         $carts = [];
         $subtotal = 0;
         if ($cartSession) {
             foreach ($cartSession as $key => $value) {
                 $product = Product::with('images')->find($value['product_id']);
                 if (!$product) {
                     continue;
                 }
                 //calculate the subtotal
                 $subtotal += $product->price * $value['product_qty'];
                 $carts[] = [
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
        return view('storefront.cart',compact('carts','subtotal'));
    }

    public function order(Request $request){


        //validate the request
        $validated = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'payment_option' => 'required',

        ]);

        //mapping $request->all()




        //get the cart data from the session
        $cartSession = session()->get('cart');
        //get data products with images from the database
        $carts = [];
        $subtotal = 0;
        if ($cartSession) {
            foreach ($cartSession as $key => $value) {
                $product = Product::with('images')->find($value['product_id']);
                if (!$product) {
                    continue;
                }
                //calculate the subtotal
                $subtotal += $product->price * $value['product_qty'];
                $carts[] = [
                    'request_id' => $key, //add request_id to the cart array to use it in the remove from cart functionality
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => number_format($product->price, 2),
                    'quantity' => $value['product_qty'],
                    'description' => $product->description,
                ];
            }
        }
        $order = [
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'carts' => $carts,
            'subtotal' => number_format($subtotal, 2)
        ];

        $message = "Hallo saya ingin memesan produk sebagai berikut: \n";
        $message .= "Nama: ".$order['name']."\n";
        $message .= "Phone: ".$order['phone']."\n";
        $message .= "Alamat: ".$order['address']."\n";
        $message .= "-----------------------------------\n";
        $message .= "Produk yang dipesan: \n";
        $message .= "-----------------------------------\n";
        foreach($order['carts'] as $cart){
            $message .= "Nama Produk: ".$cart['name']."\n";
            $message .= "Harga: ".$cart['price']."\n";
            $message .= "Jumlah: ".$cart['quantity']."\n";
            $message .= "Deskripsi: ".$cart['description']."\n";
            $message .= "-----------------------------------\n";
        }
        $message .= "Total: ".$order['subtotal']."\n";

        $message .= "Pembayaran Melalui: Bank ".$request->payment_option." (".$this->rekening[strtoupper($request->payment_option)].")\n";
        $message .= "Silahkan segera konfirmasi pembayaran anda ke nomor ".env('WA_NUMBER')."\n";

        $waNumber = env('WA_NUMBER');

        // dd($message);

        //clean the cart
        session()->forget('cart');

        //send the message to the whatsapp
        $url = "https://api.whatsapp.com/send?phone=".$waNumber."&text=".urlencode($message);
        return redirect()->away($url);

    }

    public function detail($id){
        $product = Product::with('category', 'images')->find($id);
        $product->price = number_format($product->price, 2);
        return view('storefront.detail',compact('product'));
    }
}
