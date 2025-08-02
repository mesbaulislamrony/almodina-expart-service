<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    @if($wishlists->count() > 0)
    <ul role="list" class="divide-y divide-gray-100">
        @foreach($wishlists as $wishlist)
        <li class="flex justify-between gap-x-6 py-5">
            <div class="flex min-w-0 gap-x-4">
                <img class="size-12 flex-none rounded-full bg-gray-50" src="{{$wishlist->image}}" alt="">
                <div class="min-w-0 flex-auto">
                    <p class="text-sm/6 font-semibold text-gray-900">{{ $wishlist->name }}</p>
                    <p class="mt-1 truncate text-xs/5 text-gray-500">{{ $wishlist->category->name }}</p>
                </div>
            </div>
            <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion-{{$wishlist->id}}')">{{ __('Delete') }}</x-danger-button>
            </div>
        </li>

        <x-modal name="confirm-user-deletion-{{$wishlist->id}}" :show="$errors->userDeletion->isNotEmpty()" focusable>
            <form method="post" action="{{ route('wishlist.destroy', $wishlist->id) }}" class="p-6">
                @csrf
                @method('delete')
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Are you sure you want to delete your account?') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                </p>

                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <x-danger-button class="ms-3">
                        {{ __('Delete Account') }}
                    </x-danger-button>
                </div>
            </form>
        </x-modal>
        @endforeach
    </ul>
    @endif
</x-app-layout>