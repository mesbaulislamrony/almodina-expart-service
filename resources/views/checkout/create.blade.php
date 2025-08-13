<x-guest-layout>
    <section class="max-w-5xl mx-auto pt-2 px-5 relative mb-4">
        <h1 class="text-lg font-semibold">Checkout</h1>
        <form class="grid grid-cols-5 gap-6 mt-3" action="{{ route('checkout.store') }}" method="POST">
            @csrf
            <div class="col-span-3 space-y-3">
                @include('checkout.partials.contact-person-component')
                @include('checkout.partials.schedule-component')
                @include('checkout.partials.address-component')
                <div class="py-4 px-4 bg-white rounded-lg">
                    <x-input-label for="note" :value="__('Additional notes with your order? (Optional)')" />
                    <textarea id="note" name="note" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('note') }}</textarea>
                    <x-input-error class="mt-2" :messages="$errors->get('note')" />
                </div>
            </div>
            <div class="col-span-2">
                @include('checkout.partials.order-overview-component')
            </div>
        </form>
    </section>
</x-guest-layout>