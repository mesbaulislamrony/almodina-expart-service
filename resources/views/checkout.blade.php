<x-guest-layout>
    <section class="max-w-5xl mx-auto pt-2 px-5 relative">
        <h1 class="text-lg font-semibold">Checkout</h1>
        <div class="grid grid-cols-5 gap-6 mt-3">
            <div class="col-span-3 space-y-3">
                <div class="py-4 px-4 bg-white rounded-lg">
                    <div class="flex items-center gap-3">
                        <div class="flex-1 min-w-0">
                            <h2 class="font-semibold">Billing to</h2>
                            <p class="truncate">Invoice will be generated in this name</p>
                        </div>
                        <div class="text-end">
                            <div class="font-semibold">Mahmudul Jony</div>
                            <a href="" class="text-xs">+8801738552616</a>
                        </div>
                        <a href="#" class="text-xs rounded-full px-3.5 py-1 font-semibold inline-block border border-green-700 text-green-700"><i class="fa-solid fa-arrow-up-right-from-square">&nbsp;</i>Change</a>
                    </div>
                </div>
                <div class="py-4 px-4 bg-white rounded-lg">
                    <div class="flex items-center gap-3">
                        <div class="flex-1 min-w-0">
                            <h2 class="font-semibold">Pick your schedule</h2>
                            <p class="truncate">Expert will arrive at your given address</p>
                        </div>
                        <div class="text-end">
                            <p class="text-neutral-700 font-semibold">02 July, 2025</p>
                            <p class="text-xs">04:00 PM</p>
                        </div>
                        <a href="#" class="text-xs rounded-full px-3.5 py-1 font-semibold inline-block border border-green-700 text-green-700"><i class="fa-solid fa-arrow-up-right-from-square">&nbsp;</i>Change</a>
                    </div>
                </div>
                <div class="py-4 px-4 bg-white rounded-lg">
                    <div class="flex items-center gap-3">
                        <div class="flex-1 min-w-0">
                            <h2 class="font-semibold">Address</h2>
                            <p class="truncate">Expert will arrive at the address given below</p>
                        </div>
                        <div class="text-end">
                            <p class="text-neutral-700 font-semibold">West Agargoan</p>
                            <p class="text-xs">Dhaka</p>
                        </div>
                        <a href="#" class="text-xs rounded-full px-3.5 py-1 font-semibold inline-block border border-green-700 text-green-700"><i class="fa-solid fa-arrow-up-right-from-square">&nbsp;</i>Change</a>
                    </div>
                </div>
                <div class="py-4 px-4 bg-white rounded-lg">
                    <div class="flex items-center gap-3">
                        <div class="flex-1 min-w-0">
                            <h2 class="font-semibold">Address</h2>
                            <p class="truncate">If you have need to add a new address</p>
                        </div>
                        <a href="#" class="text-xs rounded-full px-3.5 py-1 font-semibold inline-block border border-green-700 text-green-700"><i class="fa-solid fa-arrow-up-right-from-square">&nbsp;</i>Create an address</a>
                    </div>
                </div>
                <div class="py-4 px-4 bg-white rounded-lg">
                    <x-input-label for="note" :value="__('Additional notes with your order? (Optional)')" />
                    <textarea id="note" name="note" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('note') }}</textarea>
                    <x-input-error class="mt-2" :messages="$errors->get('note')" />
                </div>
            </div>
            <div class="col-span-2">
                <div class="w-full px-3 py-3 bg-white border border-neutral-300 rounded-lg">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold">Order Summary</h3>
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
                            <div class="flex items-center gap-3 hidden">
                                <div class="flex-1 min-w-0">
                                    <p class="font-semibold text-neutral-700 truncate">Discount</p>
                                </div>
                                <div class="text-base font-semibold">0 Tk</div>
                            </div>
                            <form class="">
                                <x-input-label for="note" :value="__('Have you any promo code?')" />
                                <div class="relative">
                                    <input type="text" id="default-search" class="mt-1 block w-full border-neutral-300 focus:border-neutral-300 focus:ring-neutral-200 rounded-lg text-sm" placeholder="Place your code" required />
                                    <button type="submit" class="text-white absolute right-0 inset-y-0 bg-green-700 hover:bg-green-800 font-medium rounded-lg px-4">Apply</button>
                                </div>
                            </form>
                        </li>
                        <li class="py-3">
                            <div class="flex items-center gap-3">
                                <div class="flex-1 min-w-0">
                                    <p class="font-semibold text-neutral-700 truncate">Payable amount</p>
                                </div>
                                <div class="text-base font-semibold">685 Tk</div>
                            </div>
                        </li>
                        <li class="py-3">
                            <div class="flex items-center">
                                <input id="link-checkbox" type="checkbox" value="" class="w-4 h-4 outline-none ring-0 focus:outline-none focus:ring-0">
                                <label for="link-checkbox" class="ms-2 text-sm ">I agree with the <a href="#" class="text-blue-600 hover:underline">terms and conditions</a>.</label>
                            </div>
                        </li>
                    </ul>
                    <button type="submit" class="bg-green-700 text-center text-white uppercase block px-3 py-3 mt-3 focus:outline-none rounded-full cursor-pointer w-full">{{ __('Place Order') }}</button>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>