<x-guest-layout>
    <section class="max-w-screen-xl mx-auto pb-12 px-6">
        @if($services->count() > 0)
        <section class="max-w-screen-xl mx-auto py-12 px-6">
            <h1 class="text-xl">{{ $service->category->name }}</h1>
            <p class="">Provide you with the fastest service in less time.</p>
            <div class="grid grid-cols-4 gap-6 mt-6">
                @foreach($services as $service)
                <a href="{{ $service->url }}" class="border border-gray-100 transition transform duration-700 hover:shadow-xl rounded-lg overflow-hidden relative">
                    <img class="w-full mx-auto" src="{{ $service->thumbnail }}" alt="" />
                    <div class="px-3 py-3">
                        <div class="flex justify-between gap-x-3">
                            <p class="font-semibold text-gray-900 truncate">{{ $service->name }}</p>
                            <p class="text-sm text-gray-900 flex items-center">
                                <i class="fa-solid fa-star text-xs text-yellow-400">&nbsp;</i>
                                <span>{{ $service->rating }}</span>
                            </p>
                        </div>
                        <p class="text-sm text-gray-900">Start From {{ $service->price }} Tk</p>
                    </div>
                    <span class="absolute top-2 right-2 bg-red-500 text-white px-2 py-1 text-xs rounded">10% off Tk. 299</span>
                </a>
                @endforeach
            </div>
        </section>
        @endif
    </section>
</x-guest-layout>