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
    <div class="my-4">
        <input id="agreement" name="agreement" type="checkbox" value="agree" class="w-4 h-4 outline-none ring-0 focus:outline-none focus:ring-0">
        <label for="agreement" class="ms-2 text-sm ">I agree with the <a href="#" class="text-blue-600 hover:underline">terms and conditions</a>.</label>
        <x-input-error :messages="$errors->get('agreement')" class="mt-2" />
    </div>
    <x-primary-button class="w-full">
        {{ __('Place Order') }}
    </x-primary-button>
</div>