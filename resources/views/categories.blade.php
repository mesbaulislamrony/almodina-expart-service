<x-guest-layout>
    <section class="max-w-5xl mx-auto px-5 py-6">
        @if($categories->count() > 0)
            <div class="grid grid-cols-6 gap-3">
                @foreach($categories as $item)
                <a href="{{ route('categories', $item->slug) }}" class="bg-white border border-neutral-100 transition transform duration-700 hover:shadow-xl rounded-xl overflow-hipen relative p-1">
                    <img class="w-full mx-auto rounded-lg" src="{{ $item->thumbnail }}" alt="" />
                    <div class="px-3 py-3 text-center">
                        <span class="line-clamp-2 text-xs">{{ $item->name }}</span>
                    </div>
                </a>
                @endforeach
            </div>
         @endif
    </section>
    <section class="max-w-5xl mx-auto px-5 py-6">
        <h1 class="text-lg font-semibold mb-3">{{ $category->name }}</h1>
        @if($services->count() > 0)
        <div class="grid grid-cols-4 gap-3">
            @foreach($services as $service)
                <x-service-card-component :service="$service" />
            @endforeach
        </div>
        @endif
    </section>
</x-guest-layout>