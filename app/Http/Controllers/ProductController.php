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
        ->fields([
            Input::make('name')->class('mt-4')->label('Name of Product'),
            Input::make('slug')->class('mt-4')->label('Slug'),
            Input::make('price')->class('mt-4')->label('Price'),
            Input::make('stok')->class('mt-4')->label('Stok'),
            Select::make('category_id')->class('mt-4')->label('Category')->options(Category::all()->pluck('name', 'id')->toArray()),
            File::make('image')->multiple()->filepond()->class('mt-4')->label('Upload Your Image'),
            Textarea::make('description')->class('mt-4')->label('Description'),
            Submit::make()->class('mt-5')->label('Create'),
        ]);
        $categories = Category::all();
        return view('product.create', [
            'form' => $form,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        //
        // dd($request->all());

        //get image from request
        $image = $request->file('image');

        dd($image);
        //get image name
        $imageName = time().'.'.$image->extension();
        //move image to public folder
        $image->move(public_path('images'), $imageName);



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
