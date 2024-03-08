<div>
    <!-- navbar component-->
    <x-storefront.navbar />
    <!-- banner -->
    <div class="bg-cover bg-no-repeat bg-center py-36 px-20" style="background-image: url('/images/banner.jpg');">
        <div class="container">
            <h1 class="text-6xl text-white font-medium mb-4 capitalize">
                best collection for <br> Investment
            </h1>
            <p class="text-white">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aperiam <br>
                accusantium perspiciatis, sapiente
                magni eos dolorum ex quos dolores odio</p>
            <div class="mt-12">
                <a href="#" class="bg-blue-500 border border-blue-500  border-4 text-white px-8 py-3 font-medium
                rounded-md">Shop Now</a>
            </div>
        </div>
    </div>
    <!-- ./banner -->

    <!-- new arrival -->
    <div class="container pb-16  mt-5 pl-5">
        <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">top new arrival</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            @foreach ($products as $product)
            <div class="bg-white shadow rounded overflow-hidden group">
                <div class="relative">
                    @if(@$product->images[0])
                    <img src={{asset('storage/products/'.$product->images[0]->path)}} alt="product 1" class="w-full">
                    @endif
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center
                justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                        {{-- <a href="#"
                            class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                            title="view product">
                            <i class="fas fa-magnifying-glass"></i>
                        </a>
                        <a href="#"
                            class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                            title="add to wishlist">
                            <i class="fa-solid fa-heart"></i>
                        </a> --}}
                    </div>
                </div>
                <div class="pt-4 pb-3 px-4">
                    <a href="#">
                        <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">
                            {{$product->name}}</h4>
                    </a>
                    <div class="flex items-baseline mb-1 space-x-2">
                        <p class="text-xl text-primary font-semibold">Rp. {{$product->price}}</p>
                    </div>
                    <div class="flex items-start flex-col">
                        <div class="text-sm text-gray-500 ">Desc : {{$product->description}}</div>
                        <div class="text-xs text-gray-500 ">Stok : {{$product->stock}}</div>
                    </div>
                </div>
                <form method="POST" action={{ route('storefront.addToCart') }}>
                    @csrf
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <input type="hidden" name="product_name" value="{{$product->name}}">
                    <input type="hidden" name="product_price" value="{{$product->price}}">
                    <input type="hidden" name="product_qty" value="1">
                    <button type="submit"
                        class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Add
                        to cart</button>
                </form>

            </div>
            @endforeach

        </div>
    </div>
    <!-- ./new arrival -->

    <!-- ./footer -->

    <!-- copyright -->
    <div class="bg-gray-800 py-4">
        <div class="container flex items-center justify-between">
            <p class="text-white">&copy; Ecommerce - All Right Reserved</p>
        </div>
    </div>
    <!-- ./copyright -->
</div>
