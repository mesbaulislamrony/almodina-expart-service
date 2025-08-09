<x-guest-layout>
    <section class="max-w-5xl mx-auto pt-2 px-5 relative">
        <img class="w-full mx-auto rounded-lg brightness-50" src="{{ asset('assets/images/banner.png') }}" alt="" />
        <div class="px-12 py-6 absolute inset-0 text-white space-y-3">
            <div class="">
                <h1 class="text-lg font-semibold">{{ $service->name }}</h1>
                <p class="">{{ $service->category->name }}</p>
            </div>
            <div class="flex gap-2 items-baseline mt-3">
                <span class="text-3xl font-semibold">4.7</span>
                <a href="#" class="flex leading-4 underline hover:no-underline">
                    <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                    </svg>
                    <span>{{ $service->reviews->count() }} reviews</span>
                </a>
                <form class="ms-4" action="{{ route('wishlist.store', $service->slug) }}" method="POST">
                    @csrf
                    <button type="submit" class="flex items-center justify-center text-dark mx-0 size-8">
                        <i class="fa-solid fa-bookmark text-sm"></i>
                    </button>
                </form>
            </div>
            <ul role="list" class="space-y-3">
                <li class="flex space-x-2 rtl:space-x-reverse items-center">
                    <svg class="shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                    <span class="leading-tight">Dynamic reports and dashboards</span>
                </li>
                <li class="flex space-x-2 rtl:space-x-reverse items-center">
                    <svg class="shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                    <span class="leading-tight">Templates for everyone</span>
                </li>
                <li class="flex space-x-2 rtl:space-x-reverse items-center">
                    <svg class="shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                    <span class="leading-tight">Development workflow</span>
                </li>
                <li class="flex space-x-2 rtl:space-x-reverse items-center">
                    <svg class="shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                    <span class="leading-tight">Limitless business automation</span>
                </li>
            </ul>
        </div>
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
                <article class="my-6">
                    <h1 class="text-lg font-semibold">Description</h1>
                    {!! $service->description !!}
                </article>
                <article class="my-6">
                    <h1 class="text-lg font-semibold">Faq</h1>
                </article>
                <article class="my-6">
                    <h1 class="text-lg font-semibold">Review of {{ $service->name }}</h1>
                    @if($service->reviews->count() > 0)
                    @foreach($service->reviews as $review)
                    @endforeach
                    @endif
                </article>
                <article class="my-6">
                    <h1 class="text-lg font-semibold">Share your thoughts</h1>
                    <p>If you’ve used this product, share your thoughts with other customers</p>
                    <x-primary-button-link href="" class="mt-4">
                        <span class="me-2">{{ __('Write an Review') }}</span><i class="fa-solid fa-arrow-up-right-from-square">&nbsp;</i>
                    </x-primary-button-link>
                </article>
            </div>
            <div class="col-span-2">
                <livewire:order.cart-bag-livewire />
            </div>
        </div>
    </section>
</x-guest-layout>