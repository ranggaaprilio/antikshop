@php
    //get cart count
    $cartCount = 0;
    if(session()->has('cart')) {
        $cartCount = count(session('cart'));
    }
@endphp

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
            <button onclick="openPopUp()" class="text-center text-gray-700 hover:text-primary transition relative p-3">
                <div class="text-2xl">
                    <i class="fas fa-shopping-cart"></i>
                    <div
                    class="absolute p-3 right-2.5 top-1 w-5 h-5 rounded-full flex items-center justify-center bg-red-600 text-white text-xs">
                    {{$cartCount}}</div>
                </div>
                <div class="text-xs leading-3">Keranjang</div>

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
              <i class="fas fa-bars"></i>
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
                <a href={{route('storefront.index')}} class="text-gray-200 hover:text-white transition">Home</a>
                <a href="pages/shop.html" class="text-gray-200 hover:text-white transition">Shop</a>
                <a href="#" class="text-gray-200 hover:text-white transition">About us</a>
                <a href="#" class="text-gray-200 hover:text-white transition">Contact us</a>
            </div>
        </div>
    </div>
</nav>
<!-- ./navbar -->
</div>


<!--- cart -->
<x-cart/>

<!-- pop up -->
<script>
    function openPopUp() {
        const body = document.body;
        body.classList.add('overflow-y-hidden');
        document.getElementById('cartSection').classList.remove('hidden');

    }
</script>
