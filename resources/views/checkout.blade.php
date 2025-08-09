<x-guest-layout>
    <section class="max-w-5xl mx-auto pt-2 px-5 relative mb-4">
        <h1 class="text-lg font-semibold">Checkout</h1>
        <form class="grid grid-cols-5 gap-6 mt-3" action="{{ route('checkout.store') }}" method="POST">
            @csrf
            <div class="col-span-3 space-y-3">
                <x-checkout.contact-person-component />
                <x-checkout.schedule-component />
                <x-checkout.address-component />
                <div class="py-4 px-4 bg-white rounded-lg">
                    <x-input-label for="note" :value="__('Additional notes with your order? (Optional)')" />
                    <textarea id="note" name="note" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('note') }}</textarea>
                    <x-input-error class="mt-2" :messages="$errors->get('note')" />
                </div>
            </div>
            <div class="col-span-2">
                <div class="w-full px-3 py-3 bg-white border border-neutral-300 rounded-lg -mt-12">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold">Your Carts</h3>
                        <p>You have {{ $items->count() }} items</p>
                    </div>
                    <ul role="list" class="divide-y divide-neutral-100">
                        @if($items->count() > 0)
                            @foreach($items as $item)
                            <li class="py-3 px-3 hover:bg-neutral-50 transition-colors duration-200 cursor-pointer">
                                <div class="flex items-center gap-3">
                                    <a href="{{ $item->url }}" class="flex-1 min-w-0">
                                        <p class="font-semibold text-neutral-700 truncate">
                                            <span>{{ $item->product->name }}</span>
                                            @if($item->product->variant)
                                            <span class="text-xs text-neutral-500">({{ $item->product->variant->name }})</span>
                                            @endif
                                        </p>
                                        <p class="truncate text-xs">{{ $item->product->service->name }}</p>
                                    </a>
                                    <div class="text-xs">{{ $item->qty }}x</div>
                                    <div class="text-base font-semibold">{{ $item->total }} Tk</div>
                                </div>
                            </li>
                            @endforeach
                        @endif
                        @if($items->count() == 0)
                            <li class="py-3 text-center">
                                Add services to your cart to get started.
                            </li>
                        @endif
                    </ul>
                    <livewire:order.apply-coupon-livewire />
                    <div class="flex items-center my-4">
                        <input id="link-checkbox" type="checkbox" value="" class="w-4 h-4 outline-none ring-0 focus:outline-none focus:ring-0">
                        <label for="link-checkbox" class="ms-2 text-sm ">I agree with the <a href="#" class="text-blue-600 hover:underline">terms and conditions</a>.</label>
                    </div>
                    <x-primary-button class="w-full">
                        {{ __('Place Order') }}
                    </x-primary-button>
                </div>
            </div>
        </form>
    </section>
</x-guest-layout>