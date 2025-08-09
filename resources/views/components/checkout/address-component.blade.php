<div>
    <div class="py-4 px-4 bg-white rounded-lg">
        <div class="flex items-center gap-3">
            <div class="flex-1 min-w-0">
                <h2 class="font-semibold">Address</h2>
                <p class="truncate">Expert will arrive at the address given below</p>
            </div>
        </div>
    </div>
    <div class="px-4 pb-4 bg-white rounded-lg">
        <x-input-label for="address" :value="__('Write your address here')" />
        <textarea id="address" name="address" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('address') }}</textarea>
        <x-input-error class="mt-2" :messages="$errors->get('address')" />
    </div>
</div>