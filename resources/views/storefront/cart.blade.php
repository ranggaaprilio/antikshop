<!-- navbar component -->
<x-storefront.navbar />

<!-- breadcrumb -->
<div class="container py-4 flex items-center gap-3">
    <a href={{ route('storefront.index') }} class="text-primary text-base">
        <i class="fa-solid fa-house"></i>
    </a>
    <span class="text-sm text-gray-400">
        <i class="fas fa-shopping-cart"></i>
    </span>
    <p class="text-gray-600 font-medium">Checkout</p>
</div>
<!-- ./breadcrumb -->

<!-- wrapper -->
<div class="container grid grid-cols-12 items-start pb-16 pt-4 gap-6">

    <div class="col-span-12 md:col-span-8">
        <div class="border border-gray-200 p-4 rounded mb-3">
            <h3 class="text-lg font-medium capitalize mb-4">Checkout</h3>
            <div class="space-y-4">
                <div>
                    <label for="name" class="text-gray-600">Name <span class="text-primary">*</span></label>
                    <input type="text" name="name" id="name" class="input-box">
                </div>
                <div>
                    <label for="phone" class="text-gray-600">Phone number</label>
                    <input type="text" name="phone" id="phone" class="input-box">
                </div>
                <div>
                    <label for="address" class="text-gray-600">Address</label>
                    <textarea name="address" id="address" class="input-box"></textarea>
                </div>
            </div>

        </div>
        <div class=" border border-gray-200 p-4 rounded">
            <h3 class="text-lg font-medium capitalize mb-4">Payment Option</h3>
            <div class="grid grid-cols-3 gap-3">
                <div class="col-span-3 md:col-span-1 block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <img src="{{asset('images/bankLogo/bca.png')}}" alt="logo bca" srcset="" height="100px" width="150px">
                        <p class=" block text-gray-700 dark:text-gray-400 mt-3 font-bold">Bank BCA</p>
                        <p class=" block text-gray-700 dark:text-gray-400 mt-3 font-normal"> 7660445000</p>
                        <p class=" block text-gray-700 dark:text-gray-400 mt-1 font-normal"> Rangga Aprilio Utama</p>
                </div>
                <div class="col-span-3 md:col-span-1 block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <img src="{{asset('images/bankLogo/bsi.png')}}" alt="logo bca" srcset="" height="100px" width="150px">
                    <p class=" block text-gray-700 dark:text-gray-400 mt-3 font-bold">Bank BSI</p>
                    <p class=" block text-gray-700 dark:text-gray-400 mt-3 font-normal"> 7660445000</p>
                    <p class=" block text-gray-700 dark:text-gray-400 mt-1 font-normal"> Rangga Aprilio Utama</p>
                </div>
                <div class="col-span-3 md:col-span-1 block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <img src="{{asset('images/bankLogo/bjb.png')}}" alt="logo bca" srcset="" height="80px" width="120px">
                    <p class=" block text-gray-700 dark:text-gray-400 mt-3 font-bold">Bank BJB</p>
                    <p class=" block text-gray-700 dark:text-gray-400 mt-3 font-normal"> 7660445000</p>
                    <p class=" block text-gray-700 dark:text-gray-400 mt-1 font-normal"> Rangga Aprilio Utama</p>
                </div>
            </div>

        </div>
    </div>





    <div class="col-span-12 md:col-span-4 border border-gray-200 p-4 rounded">
        <h4 class="text-gray-800 text-lg mb-4 font-medium uppercase">order summary</h4>
        <div class="space-y-2">
            @foreach ($carts as $cart)
            <div class="flex justify-between">
                <div>
                    <h5 class="text-gray-800 font-medium">{{$cart['name']}}</h5>
                    <p class="text-sm text-gray-600"> qty: {{$cart['quantity']}}</p>
                    </p>
                </div>
                {{-- <p class="text-gray-600">
                    {{$cart['quantity']}}</p>
                </p> --}}
                <p class="text-gray-800 font-medium">Rp. {{$cart['price']}}</p>
            </div>
            @endforeach


        </div>

        <div class="flex justify-between border-b border-gray-200 mt-1 text-gray-800 font-medium py-3 uppercas">
            <p>subtotal</p>
            <p>Rp. {{number_format($subtotal)}}</p>
        </div>

        <div class="flex justify-between border-b border-gray-200 mt-1 text-gray-800 font-medium py-3 uppercas">
            <p>shipping</p>
            <p>Free</p>
        </div>

        <div class="flex justify-between text-gray-800 font-medium py-3 uppercas">
            <p class="font-semibold">Total</p>
            <p>Rp. {{number_format($subtotal)}}</p>
        </div>

        {{-- <div class="flex items-center mb-4 mt-2">
            <input type="checkbox" name="aggrement" id="aggrement"
                class="text-primary focus:ring-0 rounded-sm cursor-pointer w-3 h-3">
            <label for="aggrement" class="text-gray-600 ml-3 cursor-pointer text-sm">I agree to the <a href="#"
                    class="text-primary">terms & conditions</a></label>
        </div> --}}

        <a href="#"
            class="block w-full py-3 px-4 text-center text-white bg-primary border border-primary rounded-md hover:bg-transparent hover:text-primary transition font-medium">Order
            Via Whatsapp</a>
    </div>

</div>
<!-- ./wrapper -->
