<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4 flex justify-between">
                       <h3 class="font-bold text-2xl">Create Product</h3>
                    </div>
                    <div>
                        <form action="{{route('product.store')}}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="sr-only">Product Name</label>
                                <input type="text" name="name" id="name" placeholder="Your Product name" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror" value="{{old('name')}}">
                                @error('name')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            {{-- slug --}}
                            <div class="mb-4">
                                <label for="slug" class="sr-only">Slug</label>
                                <input type="text" name="slug" id="slug" placeholder="Your Product slug" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('slug') border-red-500 @enderror" value="{{old('slug')}}">
                                @error('slug')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            {{-- price --}}
                            <div class="mb-4">
                                <label for="price" class="sr-only">Price</label>
                                <input type="number" name="price" id="price" placeholder="Your Product price" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('price') border-red-500 @enderror" value="{{old('price')}}">
                                @error('price')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            {{-- stock --}}
                            <div class="mb-4">
                                <label for="stock" class="sr-only">Stock</label>
                                <input type="number" name="stock" id="stock" placeholder="Your Product stock" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('stock') border-red-500 @enderror" value="{{old('stock')}}">
                                @error('stock')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            {{-- categories --}}
                            <div class="mb-4">
                                <label for="categories" class="sr-only">Categories</label>
                                <select name="categories" id="categories" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('categories') border-red-500 @enderror" aria-placeholder="Please Select Categories">
                                    <option value="" class="text-slate-700">Please Select Categories</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('categories')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            {{-- upload multiple image--}}
                            <div class="mb-4">
                                <label for="image" class="sr-only">Image</label>
                                <input type="file" name="image[]" id="image" placeholder="Your Product image" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('image') border-red-500 @enderror" value="{{old('image')}}" multiple>
                                {{-- create image view when upload image --}}
                                <div class="flex justify-center">
                                    <div class="flex flex-wrap justify-center" id="preview"></div>
                                </div>

                                @error('image')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            {{-- description --}}
                            <div class="mb-4">
                                <label for="description" class="sr-only">Description</label>
                                <textarea name="description" id="description" cols="30" rows="4" placeholder="Your description" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('description') border-red-500 @enderror">{{old('description')}}</textarea>
                                @error('description')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Add Product</button>
                            <button type="cancel" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"><Link href="{{route('product.index')}}">Back</Link></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
