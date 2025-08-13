<div class="py-4 px-4 bg-white rounded-lg relative">
    <div class="flex items-center gap-3">
        <div class="flex-1 min-w-0">
            <h2 class="font-semibold">Write your address</h2>
            <p class="truncate">Expert will arrive at the address given below.</p>
        </div>
    </div>
    <div class="grid grid-cols-2 gap-3 mt-3">
        <div class="mb-3">
            <x-input-label for="house" :value="__('House number')" />
            <x-text-input id="house" class="block mt-1 w-full" type="text" name="house" :value="old('house')" />
            <x-input-error :messages="$errors->get('house')" class="mt-2" />
        </div>
        <div class="mb-3">
            <x-input-label for="road" :value="__('Road Name/Number')" />
            <x-text-input id="road" class="block mt-1 w-full" type="text" name="road" :value="old('road')" />
            <x-input-error :messages="$errors->get('road')" class="mt-2" />
        </div>
    </div>
    <div>
        <x-input-label for="address" :value="__('Write your address here')" />
        <textarea id="address" name="address" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('address') }}</textarea>
        <x-input-error class="mt-2" :messages="$errors->get('address')" />
    </div>
</div>