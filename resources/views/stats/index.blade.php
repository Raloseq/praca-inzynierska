@extends('dashboard')
@section('content')
<div class="overflow-x-auto relative shadow-md">
    @include('components.status-messages')
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="py-3 px-6">
                Liczba zleceń w tym miesiącu
            </th>
            <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $orders->count() }}
            </td>
        </tr>
        <tr>
            <th scope="col" class="py-3 px-6">
                Liczba nowych klientów w tym miesiącu
            </th>
            <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $clients->count() }}
            </td>
        </tr>
        <tr>
            <th scope="col" class="py-3 px-6">
                Pracownik miesiąca
            </th>
            <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                @if($topEmployee == 0)
                    <p>Nie ma jeszcze w tym miesiącu</p>
                @else
                    {{ $topEmployee->name }} {{ $topEmployee->surname }}
                @endif
            </td>
        </tr>
        <tr>
            <th scope="col" class="py-3 px-6">
                Klient miesiąca
            </th>
            <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                @if($topClient == 0)
                    <p>Nie ma jeszcze w tym miesiącu</p>
                @else
                    {{ $topClient->name }} {{ $topClient->surname }}
                @endif
            </td>
        </tr>
    </thead>
</table>
</div>
@endsection