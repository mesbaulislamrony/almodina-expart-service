<x-guest-layout>
    <section class="max-w-5xl mx-auto pt-2 px-5 relative">
        <img class="w-full mx-auto rounded-lg brightness-50" src="{{ asset('assets/images/banner.png') }}" alt="" />
        <div class="px-12 py-6 absolute inset-0 text-white space-y-3">
            <div class="">
                <h1 class="text-lg font-semibold">{{ $service->name }}</h1>
                <p class="">{{ $service->category->name }}</p>
            </div>
            <div class="flex gap-2 items-baseline mt-3">
                <span class="text-3xl font-semibold">4.7</span>
                <a href="#" class="flex leading-4 underline hover:no-underline">
                    <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                    </svg>
                    <span>{{ $service->reviews->count() }} reviews</span>
                </a>
                <form class="ms-4" action="{{ route('wishlist.store', $service->slug) }}" method="POST">
                    @csrf
                    <button type="submit" class="flex items-center justify-center text-dark mx-0 size-8">
                        <i class="fa-solid fa-bookmark text-sm"></i>
                    </button>
                </form>
            </div>
            <ul role="list" class="space-y-3">
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
        </div>
    </section>
    <section class="max-w-5xl mx-auto px-12 relative">
        <div class="grid grid-cols-5 gap-6">
            <div class="col-span-3">
                @if($service->variants->count() > 0)
                <ul class="flex flex-wraptext-center mt-6">
                    @foreach($service->variants as $variant)
                    <li class="me-2">
                        <a href="{{ route('services', $service->slug) }}?tab={{ $variant->slug }}" class="rounded-full px-3.5 py-2 font-semibold inline-block border border-green-700 text-green-700" aria-current="page">{{ $variant->name }}</a>
                    </li>
                    @endforeach
                </ul>
                @endif
                <div class="mt-6">
                    @if($service->products->count() > 0)
                    @foreach($service->products as $product)
                    <form class="py-2 px-2 bg-white rounded-lg mb-2" action="{{ route('cart.store', $product->id) }}" method="POST">
                        <div class="grid grid-cols-6 gap-3" x-data="{ price: {{ $product->price }}, qty: 0 }">
                            <div class="overflow-hidden col-span-3 flex items-center">
                                <div class="flex flex-col">
                                    <h5 class="font-semibold truncate">{{ $product->name }}</h5>
                                    <p class="text-xs">{{ $product->price }} Tk {{ $service->unit->name }}</p>
                                </div>
                            </div>
                            <div class="overflow-hidden col-span-2 flex items-center justify-end">
                                <div class="flex flex-row justify-between items-center border border-neutral-300 rounded-full">
                                    <button type="button" class="size-8 cursor-pointer px-1" @click="qty = Math.max(0, qty - 1)">
                                        <svg class="stroke-gray-900 transition-all duration-500 group-hover:stroke-black" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                            <path d="M16.5 11H5.5" stroke="" stroke-width="1.6" stroke-linecap="round" />
                                            <path d="M16.5 11H5.5" stroke="" stroke-opacity="0.2" stroke-width="1.6" stroke-linecap="round" />
                                            <path d="M16.5 11H5.5" stroke="" stroke-opacity="0.2" stroke-width="1.6" stroke-linecap="round" />
                                        </svg>
                                    </button>
                                    <input type="text" class="p-0 outline-none w-12 text-center border-none bg-transparent" placeholder="1" name="qty" value="0" x-model="qty" />
                                    <button type="button" class="size-8 cursor-pointer px-1" @click="qty++">
                                        <svg class="stroke-gray-900 transition-all duration-500 group-hover:stroke-black" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                            <path d="M11 5.5V16.5M16.5 11H5.5" stroke="" stroke-width="1.6" stroke-linecap="round" />
                                            <path d="M11 5.5V16.5M16.5 11H5.5" stroke="" stroke-opacity="0.2" stroke-width="1.6" stroke-linecap="round" />
                                            <path d="M11 5.5V16.5M16.5 11H5.5" stroke="" stroke-opacity="0.2" stroke-width="1.6" stroke-linecap="round" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="overflow-hidden col-span-1 flex items-center justify-end">
                                <span class="select-none" x-text="(price * qty).toFixed(2) + ' Tk'"></span>
                            </div>
                        </div>
                    </form>
                    @endforeach
                    @endif
                </div>
                <article class="my-6">
                    <h1 class="text-lg font-semibold">Description</h1>
                    {!! $service->description !!}
                </article>
                <article class="my-6">
                    <h1 class="text-lg font-semibold">Faq</h1>
                </article>
                <article class="my-6">
                    <h1 class="text-lg font-semibold">Review of {{ $service->name }}</h1>
                    @if($service->reviews->count() > 0)
                    @foreach($service->reviews as $review)
                    @endforeach
                    @endif
                </article>
                <article class="my-6">
                    <h1 class="text-lg font-semibold">Share your thoughts</h1>
                    <p>If you’ve used this product, share your thoughts with other customers</p>
                    <a href="#" class="rounded-full px-3.5 py-2 mt-6 font-semibold inline-block border border-green-700 text-green-700">Write an Review</a>
                </article>
            </div>
            <div class="col-span-2">
                <div class="w-full px-3 py-3 bg-white border border-neutral-300 rounded-lg -mt-12">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold">Your Carts</h3>
                        <p>You have {{ 1 }} items</p>
                    </div>
                    <ul role="list" class="divide-y divide-neutral-100">
                        <li class="py-3">
                            <div class="flex items-center gap-3">
                                <div class="flex-1 min-w-0">
                                    <p class="font-semibold text-neutral-700 truncate">Washing Machine Tune-Up & Maintenance</p>
                                    <p class="truncate">Top Load (Silver) x 1 item</p>
                                </div>
                                <div class="text-base font-semibold">685 Tk</div>
                                <a href="" class="flex shrink-0 items-center justify-center rounded-full size-4">
                                    <i class="fa-solid fa-circle-xmark"></i>
                                </a>
                            </div>
                        </li>
                        <li class="py-3">
                            <div class="flex items-center gap-3">
                                <div class="flex-1 min-w-0">
                                    <p class="font-semibold text-neutral-700 truncate">Cooling Coil Deep Cleaning</p>
                                    <p class="truncate">Residential (Standard) x 1 item</p>
                                </div>
                                <div class="text-base font-semibold">196 Tk</div>
                                <a href="" class="flex shrink-0 items-center justify-center rounded-full size-4">
                                    <i class="fa-solid fa-circle-xmark"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                    <ul role="list" class="divide-y divide-neutral-100">
                        <li class="py-3">
                            <div class="flex items-center gap-3">
                                <div class="flex-1 min-w-0">
                                    <p class="font-semibold text-neutral-700 truncate">Subtotal</p>
                                </div>
                                <div class="text-base font-semibold">685 Tk</div>
                            </div>
                        </li>
                        <li class="py-3">
                            <div class="flex items-center gap-3">
                                <div class="flex-1 min-w-0">
                                    <p class="font-semibold text-neutral-700 truncate">Discount</p>
                                </div>
                                <div class="text-base font-semibold">0 Tk</div>
                            </div>
                        </li>
                        <li class="py-3">
                            <div class="flex items-center gap-3">
                                <div class="flex-1 min-w-0">
                                    <p class="font-semibold text-neutral-700 truncate">Payable</p>
                                </div>
                                <div class="text-base font-semibold">685 Tk</div>
                            </div>
                        </li>
                    </ul>
                    <a href="{{ route('checkout.create') }}" class="bg-green-700 text-center text-white uppercase block px-3 py-3 mt-4 focus:outline-none rounded-full cursor-pointer w-full">{{ __('Place Order') }}</a>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>