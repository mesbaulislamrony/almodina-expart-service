<ul role="list" class="divide-y divide-neutral-100 my-4">
    <li class="py-3">
        <div class="flex items-center gap-3">
            <div class="flex-1 min-w-0">
                <p class="font-semibold text-neutral-700 truncate">Subtotal</p>
            </div>
            <div class="text-base font-semibold">{{ $subtotal }} Tk</div>
        </div>
        @if($discount == 0)
        <div class="py-3">
            <div class="relative">
                <input type="text" id="code" name="code" class="mt-1 block w-full border-neutral-300 focus:border-neutral-300 focus:ring-neutral-200 rounded-lg text-sm" placeholder="Have you any promo code?" />
                <button type="button" class="text-white absolute right-0 inset-y-0 bg-green-700 hover:bg-green-800 font-medium rounded-lg px-4" wire:click="apply">Apply</button>
            </div>
        </div>
        @endif
        @if($discount > 0)
        <div class="flex items-center gap-3">
            <div class="flex-1 min-w-0">
                <p class="font-semibold text-neutral-700 truncate">Discount</p>
            </div>
            <div class="text-base font-semibold">{{ $discount }} Tk</div>
        </div>
        @endif
        <div class="flex items-center gap-3">
            <div class="flex-1 min-w-0">
                <p class="font-semibold text-neutral-700 truncate">Payable</p>
            </div>
            <div class="text-base font-semibold">{{ $payable }} Tk</div>
        </div>
    </li>
</ul>