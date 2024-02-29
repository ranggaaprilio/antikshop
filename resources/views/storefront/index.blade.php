<div>
      <!-- header -->
  <header class="py-4 shadow-sm bg-white">
    <div class="container flex items-center justify-between">
        <a href="route('storefront.index')" class="no-underline">
            <span class="text-2xl font-medium text-gray-800 px-5">Antik Store</span>
        </a>

        <div class="w-full max-w-xl relative flex">
            <span class="absolute left-4 top-3 text-lg text-gray-400">
                <i class="fa-solid fa-magnifying-glass"></i>
            </span>
            <input type="text" name="search" id="search"
                class="w-full border border-primary border-r-0 pl-12 py-3 pr-3 rounded-l-md focus:outline-none hidden md:flex"
                placeholder="search">
            <button
                class="bg-red-700 border border-red-700 text-white px-8 rounded-r-md hover:bg-transparent items-center transition hidden md:flex">Search</button>
        </div>

        <div class="flex items-center space-x-4">
            {{-- <a href="#" class="text-center text-gray-700 hover:text-primary transition relative">
                <div class="text-2xl">
                    <i class="fa-regular fa-heart"></i>
                </div>
                <div class="text-xs leading-3">Wishlist</div>
                <div
                    class="absolute right-0 -top-1 w-5 h-5 rounded-full flex items-center justify-center bg-primary text-white text-xs">
                    8</div>
            </a> --}}
            <button onclick="openPopUp()" class="text-center text-gray-700 hover:text-primary transition relative">
                <div class="text-2xl">
                    <i class="fas fa-shopping-cart"></i>

                </div>
                <div class="text-xs leading-3">Keranjang</div>
                <div
                    class="absolute -right-3 -top-1 w-5 h-5 rounded-full flex items-center justify-center bg-primary text-white text-xs">
                    2</div>
            </button>
            {{-- <a href="#" class="text-center text-gray-700 hover:text-primary transition relative">
                <div class="text-2xl">
                    <i class="fa-regular fa-user"></i>
                </div>
                <div class="text-xs leading-3">Account</div>
            </a> --}}
        </div>
    </div>
</header>
<!-- ./header -->

<!-- navbar -->
<nav class="bg-gray-800">
    <div class="container flex">
        <div class="px-8 py-4 bg-primary md:flex items-center cursor-pointer relative group hidden">
            <span class="text-white">
              <i class="fa-solid fa-bars"></i>
            </span>
            <span class="capitalize ml-2 text-white hidden">All Categories</span>

            <!-- dropdown -->
            <div
                class="absolute w-fit left-0 top-full bg-white shadow-md py-3 divide-y divide-gray-300 divide-dashed opacity-0 group-hover:opacity-100 transition duration-300 invisible group-hover:visible">
                <a href="#" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                    {{-- <img src="assets/images/icons/sofa.svg" alt="sofa" class="w-5 h-5 object-contain"> --}}
                    <span class="ml-6 text-gray-600 text-sm">Emas</span>
                </a>
                {{-- <a href="#" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                    <img src="assets/images/icons/terrace.svg" alt="terrace" class="w-5 h-5 object-contain">
                    <span class="ml-6 text-gray-600 text-sm">Terarce</span>
                </a>
                <a href="#" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                    <img src="assets/images/icons/bed.svg" alt="bed" class="w-5 h-5 object-contain">
                    <span class="ml-6 text-gray-600 text-sm">Bed</span>
                </a>
                <a href="#" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                    <img src="assets/images/icons/office.svg" alt="office" class="w-5 h-5 object-contain">
                    <span class="ml-6 text-gray-600 text-sm">office</span>
                </a>
                <a href="#" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                    <img src="assets/images/icons/outdoor-cafe.svg" alt="outdoor" class="w-5 h-5 object-contain">
                    <span class="ml-6 text-gray-600 text-sm">Outdoor</span>
                </a>
                <a href="#" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                    <img src="assets/images/icons/bed-2.svg" alt="Mattress" class="w-5 h-5 object-contain">
                    <span class="ml-6 text-gray-600 text-sm">Mattress</span>
                </a> --}}
            </div>
        </div>

        <div class="flex items-center justify-between flex-grow md:pl-12 py-5">
            <div class="flex items-center space-x-6 capitalize">
                <a href="index.html" class="text-gray-200 hover:text-white transition">Home</a>
                <a href="pages/shop.html" class="text-gray-200 hover:text-white transition">Shop</a>
                <a href="#" class="text-gray-200 hover:text-white transition">About us</a>
                <a href="#" class="text-gray-200 hover:text-white transition">Contact us</a>
            </div>
        </div>
    </div>
</nav>
<!-- ./navbar -->

<!--- cart -->
<x-cart.list />

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
                <img src={{asset('storage/products/'.$product->images[0]->path)}} alt="product 1" class="w-full">
                <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center
                justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                    <a href="#"
                        class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                        title="view product">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </a>
                    <a href="#"
                        class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                        title="add to wishlist">
                        <i class="fa-solid fa-heart"></i>
                    </a>
                </div>
            </div>
            <div class="pt-4 pb-3 px-4">
                <a href="#">
                    <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">{{$product->name}}</h4>
                </a>
                <div class="flex items-baseline mb-1 space-x-2">
                    <p class="text-xl text-primary font-semibold">Rp. {{formatPrice($product->price)}}</p>
                </div>
                <div class="flex items-start flex-col">
                    <div class="text-sm text-gray-500 ">Desc : {{$product->description}}</div>
                    <div class="text-xs text-gray-500 ">Stok : {{$product->stock}}</div>
                </div>
            </div>
            <a href="#"
                class="block w-full py-1 text-center text-white bg-blue-500  border border-blue-500 rounded-b hover:bg-transparent hover:text-primary transition">Add
                to cart</a>
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

<!-- pop up -->
<script>
    function openPopUp() {
        const body = document.body;
        body.classList.add('overflow-y-hidden');
        document.getElementById('cartSection').classList.remove('hidden');

    }
</script>

@php
    //create function format product price
    function formatPrice($price){
        return number_format($price, 0, ',', '.');
    }
@endphp
