@extends('dashboard')
@section('content')
<h1 class="m-10 font">Szczegółowe informacje na temat</h1>
@include('components.status-messages')
<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="py-3 px-6">
                Klient
            </th>
            <th scope="col" class="py-3 px-6">
                Opis
            </th>
            <th scope="col" class="py-3 px-6">
                Cena
            </th>
        </tr>
    </thead>
    <tbody>
        <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$order->client_id}}
            </th>
            <td class="py-4 px-6 text-gray-900 whitespace-nowrap dark:text-white">
                {{$order->description}}
            </td>
            <td class="py-4 px-6 text-gray-900 whitespace-nowrap dark:text-white">
                {{$order->price}}
            </td>
        </tr>
    </tbody>
    
</table>
<div class="flex justify-between items-center my-5">
    <h2 class="ml-5">Zakonczone zlecenia pracownika:</h2>
</div>
@endsection