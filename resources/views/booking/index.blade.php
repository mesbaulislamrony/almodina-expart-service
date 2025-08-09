<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bookings') }}
        </h2>
    </x-slot>

    @if($bookings->count() > 0)
    <ul role="list" class="divide-y divide-gray-100">
        @foreach($bookings as $booking)
        <a href="{{ route('booking.show', $booking->id) }}" class="flex justify-between gap-x-6 py-4 px-4 mb-4 bg-white hover:bg-gray-50 rounded-lg">
            <div class="flex min-w-0 gap-x-4">
                <div class="min-w-0 flex-auto">
                    <p class="text-sm/6 font-semibold text-gray-900">{{ $booking->project_no }}</p>
                    <p class="mt-1 truncate text-xs/5 text-gray-500">{{ $booking->status }}</p>
                </div>
            </div>
            <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                <p class="text-sm/6 text-gray-900">{{ $booking->payable }} Tk</p>
                <p class="mt-1 text-xs/5 text-gray-500">{{ $booking->date }} {{ $booking->time }}</p>
            </div>
        </a>
        @endforeach
    </ul>
    @endif

</x-app-layout>