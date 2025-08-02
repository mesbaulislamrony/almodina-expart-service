<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    @if($Projects->count() > 0)
    <ul role="list" class="divide-y divide-gray-100">
        @foreach($Projects as $Project)
        <a href="{{ route('Project.show', $Project->id) }}" class="flex justify-between gap-x-6 py-5">
            <div class="flex min-w-0 gap-x-4">
                <div class="min-w-0 flex-auto">
                    <p class="text-sm/6 font-semibold text-gray-900">{{ $Project->Project_no }}</p>
                    <p class="mt-1 truncate text-xs/5 text-gray-500">{{ $Project->status }}</p>
                </div>
            </div>
            <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                <p class="text-sm/6 text-gray-900">{{ $Project->payable }}</p>
                <p class="mt-1 text-xs/5 text-gray-500">{{ $Project->date }} {{ $Project->time }}</p>
            </div>
        </a>
        @endforeach
    </ul>
    @endif

</x-app-layout>