<div class="py-4 px-4 bg-white rounded-lg" x-data="{ modalSchedule: false, schedule: '{{ $scheduled_at }}', date: '', time: '' }">
    <div class="flex items-center gap-3">
        <div class="flex-1 min-w-0">
            <h2 class="font-semibold">Pick your schedule</h2>
            <p class="truncate">Expert will arrive at your given address</p>
            <p class="text-neutral-700 font-semibold mt-2" x-html="schedule"></p>
        </div>
        <button x-on:click="modalSchedule = true" type="button" class="text-xs rounded-full px-3.5 py-1 font-semibold inline-block border border-green-700 text-green-700">
            <i class="fa-solid fa-arrow-up-right-from-square"></i>
            <span class="ms-2">Change</span>
        </button>
    </div>
    <div x-show="modalSchedule" x-transition.opacity.duration.200ms x-trap.inert.noscroll="modalSchedule" x-on:keydown.esc.window="modalSchedule = false" x-on:click.self="modalSchedule = false" id="default-modal" tabindex="-1" aria-hidden="true" class="overflow-y-auto overflow-x-hidden fixed inset-0 z-50 justify-center items-center w-full backdrop-blur-md">
        <div class="relative p-4 w-full max-w-2xl max-h-full mx-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-lg">
                <!-- Modal header -->
                <div class="flex items-center justify-between px-4 py-4">
                    <h3 class="font-semibold">When would you like to serve you?</h3>
                    <button type="button" class="" data-modal-hide="default-modal" x-on:click="modalSchedule = false">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="py-4 text-center">
                    <div class="px-12 space-y-4">
                        <p class="font-semibold text-neutral-700">Please select a date for your service.</p>
                        <ul class="grid grid-cols-7 gap-1">
                            @foreach($weekes as $week)
                            <li>
                                <input x-model="date" type="radio" name="date" class="hidden peer" value="{{ $week->date }}" id="{{ $week->name }}" />
                                <label for="{{ $week->name }}" class="block rounded-lg px-2 py-2 leading-3 border border-neutral-100 hover:bg-neutral-100 cursor-pointer peer-checked:border-green-700">
                                    <p class="text-2xl font-semibold">{{ $week->day }}</p>
                                    <p>{{ $week->name }}</p>
                                </label>
                            </li>
                            @endforeach
                        </ul>
                        <p class="font-semibold text-neutral-700">Please select a time for your service.</p>
                        <ul class="grid grid-cols-4 gap-1">
                            @foreach($hours as $hour)
                            <li>
                                <input x-model="time" type="radio" name="time" class="hidden peer" value="{{ $hour->time }}" id="{{ $hour->time }}" />
                                <label for="{{ $hour->time }}" class="block rounded-lg px-2 py-2 leading-3 border cursor-pointer hover:bg-neutral-100 peer-checked:border-green-700">
                                    <p class="text-xs">{{ $hour->time }}</p>
                                </label>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center px-4 py-4 border-t border-neutral-100">
                    <x-primary-button class="" @click="schedule = date + ' ' + time; modalSchedule = false">
                        {{ __('Confirm Schedule') }}
                    </x-primary-button>
                    <x-secondary-button class="ms-3" x-on:click="modalSchedule = false">
                        {{ __('Close') }}
                    </x-secondary-button>
                </div>
            </div>
        </div>
    </div>
</div>