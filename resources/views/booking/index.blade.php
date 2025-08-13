<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bookings') }}
        </h2>
    </x-slot>

    @if(count($bookings) > 0)
    <div class="p-3 bg-white rounded-lg">
        <div class="max-w-xl">
            @foreach($bookings as $booking)
            <div class="py-4 bg-white hover:bg-gray-50 rounded-lg">
                <div class="flex justify-between gap-x-6 px-4">
                    <div class="flex min-w-0 gap-x-4">
                        <div class="min-w-0 flex-auto">
                            <p class="text-sm/6 font-semibold text-gray-900">{{ $booking['name'] }}</p>
                        </div>
                    </div>
                    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                        <p class="text-sm/6 text-indigo-900">
                            <a href="{{ $booking['url'] }}" class="">Write an review</a>
                        </p>
                    </div>
                </div>
                <p class="px-4">{{ implode(', ', $booking['products']) }}</p>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</x-app-layout>