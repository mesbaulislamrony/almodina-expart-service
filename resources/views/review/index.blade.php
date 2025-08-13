<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reviews') }}
        </h2>
    </x-slot>

    @if(count($reviews) > 0)
    <div class="p-3 bg-white rounded-lg">
        <div class="max-w-xl">
            @foreach($reviews as $review)
            <div class="py-4 bg-white hover:bg-gray-50 rounded-lg">
                <div class="flex justify-between gap-x-6 px-4">
                    <div class="flex min-w-0 gap-x-4 mb-2">
                        <div class="min-w-0 flex-auto">
                            <p class="text-sm/6 font-semibold text-gray-900">{{ $review->service->name }}</p>
                            <time datetime="{{ $review->created_at }}" class="text-gray-400">{{ $review->created_at }}</time>
                        </div>
                    </div>
                    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                        <div x-data="{ rating: {{ $review->rating }} }" class="flex items-center mb-1 space-x-1 text-lg">
                            <template x-for="star in 5" :key="star">
                                <span :class="{'text-yellow-500': star <= Math.floor(rating), 'text-gray-300': star > rating, 'text-yellow-300': star > Math.floor(rating) && star <= rating }">★</span>
                            </template>
                        </div>
                    </div>
                </div>
                <p class="px-4">{{ $review->comment }}</p>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</x-app-layout>