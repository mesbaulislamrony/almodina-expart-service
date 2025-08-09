<div class="py-4 px-4 bg-white rounded-lg" x-data="{ modalContactPerson: false }">
    <div class="flex items-center gap-3">
        <div class="flex-1 min-w-0">
            <h2 class="font-semibold">Contact Person</h2>
            <p class="truncate">Our Team will contact this person</p>
            <p class="text-neutral-700 font-semibold mt-2" x-html="name">Mahmudul Jony|+8801738552616</p>
        </div>
        <button x-on:click="modalContactPerson = true" type="button" class="text-xs rounded-full px-3.5 py-1 font-semibold inline-block border border-green-700 text-green-700">
            <i class="fa-solid fa-arrow-up-right-from-square"></i>
            <span class="ms-2">Change</span>
        </button>
    </div>
    <div x-show="modalContactPerson" x-transition.opacity.duration.200ms x-trap.inert.noscroll="modalContactPerson" x-on:keydown.esc.window="modalContactPerson = false" x-on:click.self="modalContactPerson = false" id="default-modal" tabindex="-1" aria-hidden="true" class="overflow-y-auto overflow-x-hidden fixed inset-0 z-50 justify-center items-center w-full backdrop-blur-md">
        <div class="relative p-4 w-full max-w-2xl max-h-full mx-auto">
            <!-- Modal content --> 
            <div class="relative bg-white rounded-lg shadow-lg">
                <!-- Modal header -->
                <div class="flex items-center justify-between px-4 py-4">
                    <h3 class="font-semibold">When would you like to serve you?</h3>
                    <button type="button" class="" data-modal-hide="default-modal" x-on:click="modalContactPerson = false">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="py-4 text-center">
                </div>
                <!-- Modal footer -->
                <div class="flex items-center px-4 py-4 border-t border-neutral-100">
                    <x-primary-button class="">
                        {{ __('Confirm name') }}
                    </x-primary-button>
                    <x-secondary-button class="ms-3" x-on:click="modalContactPerson = false">
                        {{ __('Close') }}
                    </x-secondary-button>
                </div>
            </div>
        </div>
    </div>
</div>