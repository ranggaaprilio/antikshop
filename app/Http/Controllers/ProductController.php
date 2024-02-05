<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use ProtoneMedia\Splade\FormBuilder\Input;
use ProtoneMedia\Splade\FormBuilder\Select;
use ProtoneMedia\Splade\FormBuilder\File;
use ProtoneMedia\Splade\FormBuilder\Textarea;
use ProtoneMedia\Splade\FormBuilder\Submit;
use ProtoneMedia\Splade\SpladeForm;
use ProtoneMedia\Splade\FileUploads\HandleSpladeFileUploads;
use App\Models\Product;
use App\Tables\Products;
use App\Models\Category;

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
        //
        $form = SpladeForm::make()
        ->action(route('product.store'))
        //add multipart/form-data enctype
        ->fields([
            Input::make('name')->class('mt-4')->label('Name of Product'),
            Input::make('slug')->class('mt-4')->label('Slug'),
            Input::make('price')->class('mt-4')->label('Price'),
            Input::make('stok')->class('mt-4')->label('Stok'),
            Select::make('category_id')->class('mt-4')->label('Category')->options(Category::all()->pluck('name', 'id')->toArray()),
            File::make('images[]')->multiple()->filepond()->preview()->class('mt-4')->label('Upload Your Product Image'),
            Textarea::make('description')->class('mt-4')->label('Description'),
            Submit::make()->class('mt-5')->label('Create'),
        ]);
        return view('product.create', [
            'form' => $form,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $fileName = null;
        //has file
        if ($request->hasFile('images')) {
            //loop through images
            foreach ($request->file('images') as $file) {
                //store file
                $file->store('public/products');
                //getFileName
                $fileName = $file->hashName();
            }

        }

        //create product
        Product::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'price' => $request->price,
            'stock' => $request->stok,
            'category_id' => $request->category_id,
            // 'image' => $fileName,
            'active' => 1, //default active
            'description' => $request->description,
        ]);

        //redirect
        return redirect()->route('product.index');


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
