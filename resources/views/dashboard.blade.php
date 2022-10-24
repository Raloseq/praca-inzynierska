<x-app-layout>
    <div class="h-screen">
        <div class="flex h-full">
            @include('components.sidebar')
            <div class="w-4/5 h-full">
                @yield('content')
            </div>
        </div>
    </div>
</x-app-layout>
