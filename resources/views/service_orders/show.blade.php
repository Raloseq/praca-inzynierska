@extends('dashboard')
@section('content')
<h1 class="m-10 font">Szczegółowe informacje na temat</h1>
@include('components.status-messages')
<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="py-3 px-6">
                Data rozpoczęcia
            </th>
            <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$order->admission_date}}
            </td>
        </tr>
        <tr>
            <th scope="col" class="py-3 px-6">
                Data zakończenia
            </th>
            <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$order->end_date}}
            </td>
        </tr>
        <tr>
            <th scope="col" class="py-3 px-6">
                Status
            </th>
            <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$order->is_done}}
            </td>
        </tr>
        <tr>
            <th scope="col" class="py-3 px-6">
                Opis
            </th>
            <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$order->description}}
            </td>
        </tr>
        <tr>
            <th scope="col" class="py-3 px-6">
                Cena
            </th>
            <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$order->price}}
            </td>
        </tr>
        <tr>
            <th scope="col" class="py-3 px-6">
                Klient
            </th>
            <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <a href="{{ url('clients/'.$order->client_id.'' )}}">Dane klienta</a>
            </td>
        </tr>
        <tr>
            <th scope="col" class="py-3 px-6">
                Pracownik
            </th>
            <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <a href="{{ url('employee/'.$order->employee_id.'' )}}">Dane pracownika</a>
            </td>
        </tr>
        <tr>
            <th scope="col" class="py-3 px-6">
                Pojazd
            </th>
            <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <a href="{{ url('cars/'.$order->car_id.'' )}}">Dane pojazdu</a>
            </td>
        </tr>
    </thead>
</table>
<div class="flex justify-between items-center my-5">
    <h2 class="ml-5">Wystaw fakture:</h2>
    <h2 class="ml-5">Wystaw protokół serwisowy:</h2>
</div>
@endsection