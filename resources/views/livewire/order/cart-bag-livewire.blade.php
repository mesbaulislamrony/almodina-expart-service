
<div class="w-full px-3 py-3 bg-white border border-neutral-300 rounded-lg -mt-12">
    <div class="flex items-center justify-between mb-4">
        <h3 class="text-lg font-semibold">Your Carts</h3>
        <p>You have {{ ($items) ? $items->count() : 0 }} items</p>
    </div>
    @if($items)
    <ul role="list" class="divide-y divide-neutral-100">
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
                <form class="" action="{{ route('cart.destroy', $item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="flex shrink-0 items-center justify-center rounded-full size-4 text-red-500">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </form>
            </div>
        </li>
        @endforeach
    </ul>
    <ul role="list" class="divide-y divide-neutral-100 my-4">
        <li class="py-3 bg-neutral-100 rounded-lg">
            <div class="flex items-center gap-3 px-7">
                <div class="flex-1 min-w-0">
                    <p class="font-semibold text-neutral-700 truncate">Subtotal</p>
                </div>
                <div class="text-base font-semibold">{{ $total }} Tk</div>
            </div>
        </li>
    </ul>
    <x-primary-button-link href="{{ route('checkout.create') }}" class="mt-4 w-full">
        <span class="">{{ __('Continue') }}</span>
    </x-primary-button-link>
    @endif
    @if(!$items)
        <div class="py-12 text-center space-y-4">
            <i class="fa-solid fa-warning text-4xl text-neutral-500"></i>
            <p class="text-lg font-semibold">Your Cart is Empty</p>
        </div>
    @endif
</div>