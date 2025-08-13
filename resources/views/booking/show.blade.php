<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Project') }}
        </h2>
    </x-slot>

    <dl class="divide-y divide-gray-100">
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm/6 font-medium text-gray-900">Project No</dt>
            <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $booking->project_no }}</dd>
        </div>
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm/6 font-medium text-gray-900">Schedule Datetime</dt>
            <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $booking->scheduled_at }}</dd>
        </div>
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm/6 font-medium text-gray-900">Payable</dt>
            <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $booking->payable }} Tk</dd>
        </div>
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm/6 font-medium text-gray-900">Address</dt>
            <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $booking->address }}</dd>
        </div>
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm/6 font-medium text-gray-900">Note</dt>
            <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $booking->note }}</dd>
        </div>

        @if($booking->tasks->count() > 0)
        <ul role="list" class="divide-y divide-gray-100">
            @foreach($booking->tasks as $task)
            <li class="flex justify-between gap-x-6 py-5">
                <div class="flex min-w-0 gap-x-4">
                    <div class="min-w-0 flex-auto">
                        <p class="text-sm/6 font-semibold text-gray-900">
                            <span>{{ $task->product->name }}</span>
                            @if($task->product->variant)
                            <span class="text-xs text-neutral-500">({{ $task->product->variant->name }})</span>
                            @endif
                        </p>
                        <p class="truncate text-xs">{{ $task->product->service->name }}</p>
                        <a href="" class="text-xs/5 text-gray-500">Write an review</a>
                    </div>
                </div>
                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                    <p class="text-sm/6 text-gray-900">{{ $task->total }} Tk</p>
                    <p class="mt-1 text-xs/5 text-gray-500">{{ $task->status }}</p>
                </div>
            </li>
            @endforeach
        </ul>
        @endif

    </dl>
</x-app-layout>