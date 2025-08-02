<x-guest-layout>
    <section class="max-w-screen-xl mx-auto py-12 px-6">
        <form action="{{ route('checkout.store') }}" method="post" class="">
            @csrf
            <div class="grid w-full grid-cols-12 items-start gap-x-6 gap-y-8">
                <div class="col-span-7">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Checkout</h2>
                    <p class="text-sm leading-6 text-gray-600">Write your address and personal information.</p>
                    @if(auth()->user()->address)
                    <div class="my-3">
                        <label class="block cursor-pointer select-none rounded-lg border border-gray-300 p-4" for="address">
                            <p class="font-semibold text-sm flex items-center justify-between">
                                <a href="{{ route('profile.edit') }}" class="text-xs bg-gray-500 text-white px-2 py-1 rounded-full">Edit</a>
                            </p>
                            <p class="text-slate-500 text-xs truncate">{{ auth()->user()->address }}</p>
                        </label>
                    </div>
                    @endif
                    @if(!auth()->user()->address)
                    <div class="my-3">
                        <div class="rounded-lg border border-gray-300 p-4 my-3 text-sm">
                            <p class="text-gray-500">If you have need to add a new address</p>
                            <a href="{{ route('profile.edit') }}" class="inline-flex items-center font-medium text-blue-600 hover:text-blue-800 dark:text-blue-500 dark:hover:text-blue-700">Create an new address</a>
                        </div>
                    </div>
                    @endif
                    <h2 class="text-base font-semibold leading-7 text-gray-900">{{ __('Pick your schedule') }}</h2>
                    <p class="text-sm leading-6 text-gray-600">Choose a date and time that is convenient for the service provider and you..</p>
                    <div class="grid grid-cols-2 gap-3 my-3">
                        <div>
                            <x-input-label for="date" :value="__('Date')" />
                            <x-text-input id="date" class="block mt-1 w-full" type="date" name="date" :value="old('date', $date)" required autofocus autocomplete="date" />
                            <x-input-error :messages="$errors->get('date')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="time" :value="__('Time')" />
                            <x-text-input id="time" class="block mt-1 w-full" type="time" name="time" :value="old('time', $time)" required autofocus autocomplete="time" />
                            <x-input-error :messages="$errors->get('time')" class="mt-2" />
                        </div>
                    </div>

                    <div>
                        <x-input-label for="note" :value="__('Note')" />
                        <textarea id="note" name="note" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('note') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('note')" />
                    </div>
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
                    <h2 class="text-base font-semibold leading-7 text-gray-900">{{ __('Choose your payment method') }}</h2>
                    <p class="text-sm leading-6 text-gray-600">Choose an secure payment method</p>
                    <div class="grid grid-cols-3 gap-3 my-3">
                        <div class="relative">
                            <input class="peer hidden" id="cash" type="radio" name="payment" value="cash" checked />
                            <label class="peer-checked:border peer-checked:border-gray-700 peer-checked:bg-gray-50 block cursor-pointer select-none rounded-lg border border-gray-300 p-4" for="cash">
                                <p class="font-semibold text-sm">Cash</p>
                            </label>
                        </div>
                        <div class="relative">
                            <input class="peer hidden" id="card" type="radio" name="payment" value="card" />
                            <label class="peer-checked:border peer-checked:border-gray-700 peer-checked:bg-gray-50 block cursor-pointer select-none rounded-lg border border-gray-300 p-4" for="card">
                                <p class="font-semibold text-sm">Card</p>
                            </label>
                        </div>
                        <div class="relative">
                            <input class="peer hidden" id="mobile_banking" type="radio" name="payment" value="mobile_banking" />
                            <label class="peer-checked:border peer-checked:border-gray-700 peer-checked:bg-gray-50 block cursor-pointer select-none rounded-lg border border-gray-300 p-4" for="mobile_banking">
                                <p class="font-semibold text-sm">Mobile Banking</p>
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="bg-red-500 text-center text-white uppercase block px-3 py-3 focus:outline-none rounded-full cursor-pointer w-full">{{ __('Place Order') }}</button>
                </div>
            </div>
        </form>
    </section>
</x-guest-layout>