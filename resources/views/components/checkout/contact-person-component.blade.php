<div class="py-4 px-4 bg-white rounded-lg" x-data="{ modalContactPerson: false }">
    <div class="flex items-center gap-3">
        <div class="flex-1 min-w-0">
            <h2 class="font-semibold">Contact Person</h2>
            <p class="truncate">Our Team will contact this person</p>
        </div>
    </div>
    <div class="py-4 px-12 space-y-4">
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="mobile_no" :value="__('Mobile number')" />
            <x-text-input id="mobile_no" class="block mt-1 w-full" type="text" name="mobile_no" :value="old('mobile_no')" />
            <x-input-error :messages="$errors->get('mobile_no')" class="mt-2" />
        </div>
    </div>
</div>