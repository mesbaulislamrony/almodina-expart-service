<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reviews') }}
        </h2>
    </x-slot>

    @if(count($services) > 0)
    <div class="p-3 bg-white rounded-lg">
        <div class="max-w-xl">
            <div class="grid grid-cols-2 gap-3">
                @foreach($services as $service)
                <x-service-card-component :service="$service" />
                @endforeach
            </div>
        </div>
    </div>
    @endif
</x-app-layout>