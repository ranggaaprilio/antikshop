<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Tables\Products;
use App\Forms\CreateProductForm;
use App\Models\ProductImage;
use ProtoneMedia\Splade\Facades\Toast;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($paginate = 10)
    {
        //return view
        return view('product.index', [
            //add pagination
            'products' => Products::class,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create', [
            'form' => CreateProductForm::class,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        try {

            $fileName = null;

        //create product
        $result=Product::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'price' => $request->price,
            'stock' => $request->stok,
            'category_id' => $request->category_id,
            // 'image' => $fileName,
            'active' => 1, //default active
            'description' => $request->description,
        ]);

        //check if product created
        if ($result) {
            ///has file
            if ($request->hasFile('images')) {
                //loop through images
                foreach ($request->file('images') as $file) {
                    //store file
                    $file->store('public/products');
                    //getFileName
                    $fileName = $file->hashName();
                    //create product image
                    ProductImage::create([
                        'product_id' => $result->id,
                        'path' => $fileName,
                    ]);

                }

            }
            Toast::title('Product create successfully')->success()->autoDismiss(15);;
            return redirect()->route('product.index');
        }

        throw new \Exception('Failed to create product');

        }catch (\Exception $e) {
            //return error message
            Toast::title('Failed to create product')->danger()->autoDismiss(15);
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
