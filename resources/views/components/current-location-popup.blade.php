<x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-current-location')">
    <i class="fa-solid fa-location-dot">&nbsp;</i>
    @if($location)
    <span>{{ $location->name }}</span>
    @endif
</x-danger-button>
<x-modal name="confirm-current-location" :show="$errors->userDeletion->isNotEmpty()" focusable>
    <form method="post" action="{{ route('current.location') }}" class="p-6">
        @csrf
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Please comfirm your location?') }}
        </h2>
        @if($locations->count() > 0)
        <div class="grid grid-cols-3 gap-3 my-3">
            @foreach($locations as $location)
            <div class="relative">
                <input class="peer hidden" id="{{ $location->name }}" type="radio" name="location" value="{{ $location->id }}" />
                <label class="peer-checked:border peer-checked:border-gray-700 peer-checked:bg-gray-50 block cursor-pointer select-none rounded-lg border border-gray-300 p-4" for="{{ $location->name }}">
                    <p class="font-semibold text-sm">{{ $location->name }}</p>
                </label>
            </div>
            @endforeach
        </div>
        @endif
        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ms-3">
                {{ __('Confirm') }}
            </x-danger-button>
        </div>
    </form>
</x-modal>