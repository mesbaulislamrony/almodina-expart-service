<x-guest-layout>
    <section class="max-w-5xl mx-auto pt-2 px-5 relative">
        <img class="w-full mx-auto rounded-lg brightness-50" src="{{ asset('assets/images/banner.png') }}" alt="" />
        @include('service.partials.hero-section-component')
    </section>
    <section class="max-w-5xl mx-auto px-12 relative">
        <div class="grid grid-cols-5 gap-6">
            <div class="col-span-3">
                @if($service->variants->count() > 0)
                <ul class="flex flex-wraptext-center mt-6">
                    @foreach($service->variants as $variant)
                    <li class="me-2">
                        <a href="{{ route('services', $service->slug) }}?tab={{ $variant->slug }}" class="rounded-full px-3.5 py-2 font-semibold inline-block border border-green-700 text-green-700 {{ ($variant->slug == $tab) ? 'bg-green-700 text-white' : '' }}" aria-current="page">{{ $variant->name }}</a>
                    </li>
                    @endforeach
                </ul>
                @endif
                <div class="mt-6">
                    @if($service->products->count() > 0)
                    @foreach($service->products as $product)
                    <livewire:order.add-to-cart-livewire :product="$product" :key="$product->id" />
                    @endforeach
                    @else
                    <h1 class="text-lg font-semibold">No product found</h1>
                    @endif
                </div>
                @include('service.partials.description-component')
                @include('service.partials.faq-component')
                @include('service.partials.review-rating-component')
            </div>
            <div class="col-span-2">
                <livewire:order.cart-bag-livewire />
            </div>
        </div>
    </section>
</x-guest-layout>