<div class="py-2 px-2 bg-white rounded-lg mb-2 grid grid-cols-6 gap-3">
    <div class="overflow-hidden col-span-3 flex items-center">
        <div class="flex flex-col">
            <h5 class="font-semibold truncate">{{ $product->name }}</h5>
            <p class="text-xs">{{ $product->price }} Tk {{ $product->service->unit->name }}</p>
        </div>
    </div>
    <div class="overflow-hidden col-span-2 flex items-center justify-end">
        <div class="flex flex-row justify-between items-center border border-neutral-300 rounded-full">
            <button type="button" class="size-8 cursor-pointer px-1" wire:click="decrement">
                <svg class="stroke-gray-900 transition-all duration-500 group-hover:stroke-black" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                    <path d="M16.5 11H5.5" stroke="" stroke-width="1.6" stroke-linecap="round" />
                    <path d="M16.5 11H5.5" stroke="" stroke-opacity="0.2" stroke-width="1.6" stroke-linecap="round" />
                    <path d="M16.5 11H5.5" stroke="" stroke-opacity="0.2" stroke-width="1.6" stroke-linecap="round" />
                </svg>
            </button>
            <input type="text" class="p-0 outline-none w-12 text-center border-none bg-transparent" placeholder="1" name="qty" value="{{ $qty }}" />
            <button type="button" class="size-8 cursor-pointer px-1" wire:click="increment">
                <svg class="stroke-gray-900 transition-all duration-500 group-hover:stroke-black" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                    <path d="M11 5.5V16.5M16.5 11H5.5" stroke="" stroke-width="1.6" stroke-linecap="round" />
                    <path d="M11 5.5V16.5M16.5 11H5.5" stroke="" stroke-opacity="0.2" stroke-width="1.6" stroke-linecap="round" />
                    <path d="M11 5.5V16.5M16.5 11H5.5" stroke="" stroke-opacity="0.2" stroke-width="1.6" stroke-linecap="round" />
                </svg>
            </button>
        </div>
    </div>
    <div class="overflow-hidden col-span-1 flex items-center justify-end">
        <span class="select-none">{{ $product->subtotal }} Tk</span>
    </div>
</div>