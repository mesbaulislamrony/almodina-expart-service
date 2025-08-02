<x-guest-layout>
    <section class="max-w-screen-xl mx-auto py-12 px-6">
        @if($carts->count() > 0)
        <div class="grid w-full grid-cols-12 items-start gap-x-6 gap-y-8">
            <div class="col-span-7">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Your Cart</h2>
                <p class="text-sm leading-6 text-gray-600">Use a permanent address where you can receive mail.</p>
                @foreach($carts as $item)
                <div class="mt-3 grid grid-cols-8 gap-3">
                    <div class="overflow-hidden col-span-4 flex items-center">
                        <div class="flex flex-col space-y-1">
                            <h5 class="text-sm text-gray-700 truncate">{{ $item->product->name }}</h5>
                            <h1 class="font-semibold text-xs text-primary">{{ $item->price }} Tk</h1>
                        </div>
                    </div>
                    <div class="overflow-hidden col-span-2 flex flex-col items-center px-2">
                        <div class="flex flex-row justify-between items-center border border-gray-200 px-2 py-2 space-x-6 rounded-full">
                            <button type="button" class="w-8 h-8 rounded-full text-white hover:scale-105 transform transition duration-500 cursor-pointer p-1">
                                <svg class="stroke-gray-900 transition-all duration-500 group-hover:stroke-black" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                    <path d="M16.5 11H5.5" stroke="" stroke-width="1.6" stroke-linecap="round" />
                                    <path d="M16.5 11H5.5" stroke="" stroke-opacity="0.2" stroke-width="1.6" stroke-linecap="round" />
                                    <path d="M16.5 11H5.5" stroke="" stroke-opacity="0.2" stroke-width="1.6" stroke-linecap="round" />
                                </svg>
                            </button>
                            <input type="text" class="outline-none text-gray-900 font-semibold text-lg w-12 placeholder:text-gray-900 text-center bg-transparent border-none" placeholder="1" name="qty" value="{{ $item->qty }}" />
                            <button type="button" class="w-8 h-8 rounded-full text-white hover:scale-105 transform transition duration-500 cursor-pointer p-1">
                                <svg class="stroke-gray-900 transition-all duration-500 group-hover:stroke-black" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                    <path d="M11 5.5V16.5M16.5 11H5.5" stroke="" stroke-width="1.6" stroke-linecap="round" />
                                    <path d="M11 5.5V16.5M16.5 11H5.5" stroke="" stroke-opacity="0.2" stroke-width="1.6" stroke-linecap="round" />
                                    <path d="M11 5.5V16.5M16.5 11H5.5" stroke="" stroke-opacity="0.2" stroke-width="1.6" stroke-linecap="round" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="flex items-center col-span-1">
                        <span class="text-sm text-gray-700 select-none">{{ $item->subtotal }} Tk</span>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-white inline-block focus:outline-none rounded-full cursor-pointer">
                                <svg fill="#ef4444" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="30px" height="30px">
                                    <path d="M25,2C12.319,2,2,12.319,2,25s10.319,23,23,23s23-10.319,23-23S37.681,2,25,2z M33.71,32.29c0.39,0.39,0.39,1.03,0,1.42	C33.51,33.9,33.26,34,33,34s-0.51-0.1-0.71-0.29L25,26.42l-7.29,7.29C17.51,33.9,17.26,34,17,34s-0.51-0.1-0.71-0.29	c-0.39-0.39-0.39-1.03,0-1.42L23.58,25l-7.29-7.29c-0.39-0.39-0.39-1.03,0-1.42c0.39-0.39,1.03-0.39,1.42,0L25,23.58l7.29-7.29	c0.39-0.39,1.03-0.39,1.42,0c0.39,0.39,0.39,1.03,0,1.42L26.42,25L33.71,32.29z" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-span-5">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Order Summary</h2>
                <p class="text-sm leading-6 text-gray-600">Use a permanent address where you can receive mail.</p>
                <div class="my-4 space-y-3">
                    <div class="flex items-center justify-between">
                        <p class="font-medium text-md leading-8 text-black">Subtotal</p>
                        <p class="font-medium text-md leading-8 text-indigo-600">{{ $carts->sum('subtotal') }} Tk</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <p class="font-medium text-md leading-8 text-black">Discount</p>
                        <p class="font-medium text-md leading-8 text-indigo-600">{{ $carts->sum('discount') }} Tk</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <p class="font-medium text-md leading-8 text-black">Payable</p>
                        <p class="font-medium text-md leading-8 text-indigo-600">{{ $carts->sum('total') }} Tk</p>
                    </div>
                </div>
                <a href="{{ route('checkout.create') }}" class="bg-red-500 text-center text-white uppercase block px-3 py-3 focus:outline-none rounded-full cursor-pointer w-full">{{ __('Next') }}</a>
            </div>
        </div>
        @endif
    </section>
</x-guest-layout>