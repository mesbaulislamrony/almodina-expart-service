
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
        @endif
        @if($items->count() == 0)
            <li class="py-3 text-center">
                Add services to your cart to get started.
            </li>
        @endif
    </ul>
    <ul role="list" class="divide-y divide-neutral-100 my-4">
        <li class="py-3 bg-neutral-100 rounded-lg">
            <div class="flex items-center gap-3 px-7">
                <div class="flex-1 min-w-0">
                    <p class="font-semibold text-neutral-700 truncate">Subtotal</p>
                </div>
                <div class="text-base font-semibold">{{ $subtotal }} Tk</div>
            </div>
        </li>
    </ul>
    <x-link-button href="{{ route('checkout.create') }}" class="w-full mt-4 border border-green-700 text-green-700 hover:bg-green-700 hover:text-white">
        {{ __('Continue') }}
    </x-link-button>
</div>