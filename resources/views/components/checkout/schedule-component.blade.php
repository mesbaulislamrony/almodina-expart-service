<div class="py-4 px-4 bg-white rounded-lg">
    <div class="flex items-center gap-3">
        <div class="flex-1 min-w-0">
            <h2 class="font-semibold">Pick your schedule</h2>
            <p class="truncate">Please select your desired date and time for your service.</p>
        </div>
    </div>
    <div class="py-4 text-center">
        <div class="px-12 space-y-4">
            <ul class="grid grid-cols-7 gap-1">
                @foreach($weekes as $week)
                <li>
                    <input type="radio" name="date" class="hidden peer" value="{{ $week->date }}" id="{{ $week->name }}" />
                    <label for="{{ $week->name }}" class="block rounded-lg px-2 py-2 leading-3 border border-neutral-100 hover:bg-neutral-100 cursor-pointer peer-checked:border-green-700">
                        <p class="text-2xl font-semibold">{{ $week->day }}</p>
                        <p>{{ $week->name }}</p>
                    </label>
                </li>
                @endforeach
            </ul>
            <ul class="grid grid-cols-4 gap-1">
                @foreach($hours as $hour)
                <li>
                    <input type="radio" name="time" class="hidden peer" value="{{ $hour->time }}" id="{{ $hour->time }}" />
                    <label for="{{ $hour->time }}" class="block rounded-lg px-2 py-2 leading-3 border cursor-pointer hover:bg-neutral-100 peer-checked:border-green-700">
                        <p class="text-xs">{{ $hour->time }}</p>
                    </label>
                </li>
                @endforeach
            </ul>
            <x-input-error :messages="$errors->get('schedule')" class="mt-2" />
        </div>
    </div>
</div>