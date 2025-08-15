<a href="{{ $service->url }}" class="bg-white border border-neutral-100 transition transform duration-700 hover:shadow-xl rounded-xl overflow-hipen relative p-1">
    <img class="w-full mx-auto rounded-lg" src="{{ $service->thumbnail }}" alt="" />
    <div class="px-3 py-3">
        <p class="font-semibold text-gray-900 truncate">{{ $service->name }}</p>
        <div class="flex justify-between gap-x-3">
            <p class="">Start From {{ $service->price }} Tk</p>
            <p class="text-gray-900 flex items-center">
                <i class="fa-solid fa-star text-yellow-400">&nbsp;</i>
                <span>{{ $service->rating }}</span>
            </p>
        </div>
    </div>
    <span class="absolute top-2 right-2 bg-green-700 text-white px-2 py-1 text-xs rounded-lg hidden">10% off Tk. 299</span>
</a>