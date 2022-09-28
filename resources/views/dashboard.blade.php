<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="h-screen">
        <div class="flex h-full">
            @include('components.sidebar')
            <div class="w-4/5 h-full">
                Main
            </div>
        </div>
    </div>
</x-app-layout>
