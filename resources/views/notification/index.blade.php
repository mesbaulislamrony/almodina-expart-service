<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notifications') }}
        </h2>
    </x-slot>

    @if(count($notifications) > 0)
    <div class="p-3 bg-white rounded-lg">
        <div class="max-w-xl">
            @foreach($notifications as $notification)
            <div class="py-4 bg-white hover:bg-gray-50 rounded-lg">
                <div class="flex justify-between gap-x-6 px-4">
                    <div class="flex min-w-0 gap-x-4 mb-2">
                        <div class="min-w-0 flex-auto">
                            <p class="text-sm/6 font-semibold text-gray-900">{{ $notification->service->name }}</p>
                            <time datetime="{{ $notification->created_at }}" class="text-gray-400">{{ $notification->created_at }}</time>
                        </div>
                    </div>
                </div>
                <p class="px-4">{{ $notification->comment }}</p>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</x-app-layout>