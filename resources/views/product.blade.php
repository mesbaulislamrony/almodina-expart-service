<x-guest-layout>
    <section class="max-w-screen-xl mx-auto py-12 px-6">
        <p class="text-xl">{{ $service->name }}</p>
        <p class="">{{ $service->category->name }}</p>
        <div class="flex items-baseline my-4">
            <span class="text-5xl font-semibold tracking-tight text-gray-900">4.7</span>
            <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
            </svg>
            <a href="#" class="text-sm font-medium text-gray-900 underline hover:no-underline">73 reviews</a>
            <form class="ms-4" action="{{ route('wishlist.store', $service->slug) }}" method="POST">
                @csrf
                <button type="submit" class="text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm h-10 w-10 text-center inline-flex justify-center items-center">
                    <i class="fa-solid fa-bookmark text-xl"></i>
                </button>
            </form>
        </div>
        <ul role="list" class="space-y-3 text-gray-500 dark:text-gray-400">
            <li class="flex space-x-2 rtl:space-x-reverse items-center">
                <svg class="shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                </svg>
                <span class="leading-tight">Dynamic reports and dashboards</span>
            </li>
            <li class="flex space-x-2 rtl:space-x-reverse items-center">
                <svg class="shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                </svg>
                <span class="leading-tight">Templates for everyone</span>
            </li>
            <li class="flex space-x-2 rtl:space-x-reverse items-center">
                <svg class="shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                </svg>
                <span class="leading-tight">Development workflow</span>
            </li>
            <li class="flex space-x-2 rtl:space-x-reverse items-center">
                <svg class="shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                </svg>
                <span class="leading-tight">Limitless business automation</span>
            </li>
        </ul>
        <div id="live-request-app">
            <live-request></live-request>
        </div>
    </section>


    <section class="max-w-screen-xl mx-auto px-6 relative">
        <div class="grid w-full grid-cols-12 items-start gap-x-6 gap-y-8 pe-4">
            <div class="col-span-8">
                @if($service->variants->count() > 0)
                @foreach($service->variants as $variant)
                <a href="{{ route('services', $service->slug) }}?tab={{ $variant->slug }}" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none font-medium rounded-full px-5 py-2.5 me-2 mb-2">{{ $variant->name }}</a>
                @endforeach
                @endif



                @if($service->products->count() > 0)
                @foreach($service->products as $product)
                <form class="" action="{{ route('cart.store', $product->id) }}" method="POST">
                    <div class="mt-3 grid grid-cols-8 gap-3" x-data="{ price: {{ $product->price }}, qty: 0 }">
                        <div class="overflow-hidden col-span-4 flex items-center">
                            <div class="flex flex-col space-y-1">
                                <h5 class="font-semibold text-gray-700 truncate">{{ $product->name }}</h5>
                                <h1 class="text-primary">{{ $product->price }} Tk {{ $service->unit->name }}</h1>
                            </div>
                        </div>
                        <div class="overflow-hidden col-span-2 flex flex-col items-center px-2">
                            <div class="flex flex-row justify-between items-center border border-gray-200 px-2 py-2 space-x-6 rounded-full">
                                <button type="button" class="w-8 h-8 rounded-full text-white hover:scale-105 transform transition duration-500 cursor-pointer p-1" @click="qty = Math.max(0, qty - 1)">
                                    <svg class="stroke-gray-900 transition-all duration-500 group-hover:stroke-black" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                        <path d="M16.5 11H5.5" stroke="" stroke-width="1.6" stroke-linecap="round" />
                                        <path d="M16.5 11H5.5" stroke="" stroke-opacity="0.2" stroke-width="1.6" stroke-linecap="round" />
                                        <path d="M16.5 11H5.5" stroke="" stroke-opacity="0.2" stroke-width="1.6" stroke-linecap="round" />
                                    </svg>
                                </button>
                                <input type="text" class="outline-none text-gray-900 font-semibold text-lg w-12 placeholder:text-gray-900 text-center bg-transparent border-none" placeholder="1" name="qty" value="0" x-model="qty" />
                                <button type="button" class="w-8 h-8 rounded-full text-white hover:scale-105 transform transition duration-500 cursor-pointer p-1" @click="qty++">
                                    <svg class="stroke-gray-900 transition-all duration-500 group-hover:stroke-black" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                        <path d="M11 5.5V16.5M16.5 11H5.5" stroke="" stroke-width="1.6" stroke-linecap="round" />
                                        <path d="M11 5.5V16.5M16.5 11H5.5" stroke="" stroke-opacity="0.2" stroke-width="1.6" stroke-linecap="round" />
                                        <path d="M11 5.5V16.5M16.5 11H5.5" stroke="" stroke-opacity="0.2" stroke-width="1.6" stroke-linecap="round" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="flex items-center col-span-1">
                            <span class="text-gray-700 select-none" x-text="(price * qty).toFixed(2) + ' Tk'"></span>
                        </div>
                    </div>
                </form>
                @endforeach
                @endif
            </div>
            <div class="col-span-8">
                <h1 class="text-xl">Description</h1>
                {!! $service->description !!}
            </div>
            <div class="col-span-8">
                <h1 class="text-xl mb-6">Review of {{ $service->name }}</h1>
                @if($service->reviews->count() > 0)
                @foreach($service->reviews as $review)
                <article class="mb-6">
                    <div class="flex items-center mb-1">
                        <img class="w-10 h-10 me-4 rounded-full" src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=256&h=256&q=80" alt="">
                        <p>Jese Leos <time datetime="2014-08-16 19:00" class="block">Reviewed on {{ $review->reviewed_at }}</time></p>
                    </div>
                    <div class="flex items-center space-x-1 rtl:space-x-reverse mb-1">
                        <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-gray-300 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">{{ $review->rating }}</p>
                        <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">out of</p>
                        <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">5</p>
                    </div>
                    <p class="">{{ $review->content }}</p>
                </article>
                @endforeach
                @endif
                <h4 class="text-xl">Share your thoughts</h4>
                <p>If you’ve used this product, share your thoughts with other customers</p>
                <a href="" class="bg-red-500 text-white px-8 py-2 focus:outline-none rounded-full mt-6 inline-block">Write an Review</a>
            </div>
        </div>
        <div class="absolute -top-10 right-0 w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-8">
            <div class="flex items-center justify-between mb-4">
                <h5 class="text-xl font-bold leading-none text-gray-900">Your Carts</h5>
                <p>You have {{ 1 }} items</p>
            </div>
            <ul role="list" class="divide-y divide-gray-700">
                <li class="py-3">
                    <div class="flex items-center">
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate">Washing Machine Tune-Up & Maintenance</p>
                            <p class="text-sm text-gray-500 truncate">Top Load (Silver) x 1 item</p>
                        </div>
                        <div class="inline-flex items-center text-base font-semibold text-gray-900">685 Tk</div>
                    </div>
                </li>
            </ul>
            <ul role="list" class="divide-y divide-gray-200">
                <li class="py-3">
                    <div class="flex items-center">
                        <div class="flex-1 min-w-0">
                            <p class="font-medium truncate">Subtotal</p>
                        </div>
                        <div class="inline-flex items-center text-base font-semibold">685 Tk</div>
                    </div>
                </li>
                <li class="py-3">
                    <div class="flex items-center">
                        <div class="flex-1 min-w-0">
                            <p class="font-medium truncate">Discount</p>
                        </div>
                        <div class="inline-flex items-center text-base font-semibold">0 Tk</div>
                    </div>
                </li>
                <li class="py-3">
                    <div class="flex items-center">
                        <div class="flex-1 min-w-0">
                            <p class="font-medium truncate">Payable</p>
                        </div>
                        <div class="inline-flex items-center text-base font-semibold">685 Tk</div>
                    </div>
                </li>
            </ul>
            <button type="submit" class="bg-red-500 text-center text-white uppercase block px-3 py-3 mt-4 focus:outline-none rounded-full cursor-pointer w-full">{{ __('Place Order') }}</button>
        </div>
    </section>
</x-guest-layout>