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
            <a href="{{ $service->url }}" class="bg-white border border-neutral-100 transition transform duration-700 hover:shadow-xl rounded-xl overflow-hipen relative p-1">
                <img class="w-full mx-auto rounded-lg" src="{{ $service->thumbnail }}" alt="" />
                <div class="px-3 py-3">
                    <p class="font-semibold text-gray-900 truncate">{{ $service->name }}</p>
                    <div class="flex justify-between gap-x-3">
                        <p class="">Start From {{ $service->price }} Tk</p>
                        <p class="text-gray-900 flex items-center">
                            <i class="fa-solid fa-star text-yellow-400">&nbsp;</i>
                            <span>4.7</span>
                        </p>
                    </div>
                </div>
                <span class="absolute top-2 right-2 bg-red-500 text-white px-2 py-1 text-xs rounded-lg">10% off Tk. 299</span>
            </a>
            @endforeach
        </div>
        @endif
    </section>
</x-guest-layout>