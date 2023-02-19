@extends('dashboard')
@section('content')
<h1 class="m-10 font">Faktura nr. {{$order->id}}</h1>
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
               Dane klienta
                <a href="{{ url('clients/'.$order->client_id.'' )}}" class="font-mediumdark bg-green-500 py-2 px-4 cursor-pointer text-white mx-5">Sprawdź</a>
            </td>
        </tr>
        <tr>
            <th scope="col" class="py-3 px-6">
                Pracownik
            </th>
            <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                Dane pracownika
                <a href="{{ url('employee/'.$order->employee_id.'' )}}" class="font-mediumdark bg-green-500 py-2 px-4 cursor-pointer text-white mx-5">Sprawdź</a>
            </td>
        </tr>
        <tr>
            <th scope="col" class="py-3 px-6">
                Pojazd
            </th>
            <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                Dane pojazdu
                <a href="{{ url('cars/'.$order->car_id.'' )}}" class="font-mediumdark bg-green-500 py-2 px-4 cursor-pointer text-white mx-5">Sprawdź</a>
            </td>
        </tr>
        <tr>
            <th scope="col" class="py-3 px-6">
                Zdjęcie usterki
            </th>
            <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                @if(!is_null($order->damage_photo))
                    <img src="{{ asset($order->damage_photo) }}" alt="">
                @else
                    <img src="https://via.placeholder.com/150" alt="">
                @endif
            </td>
        </tr>
    </thead>
</table>
<div class="flex items-center my-5">
    <h2 class="ml-5">Wystaw fakture:</h2>
    <form action="{{ route('generate-invoice') }}" method="POST" class="mx-20">
        @csrf
        <input type="hidden" name="order_id" value="{{ $order->id }}">
        <button type="submit" class="font-mediumdark bg-green-500 py-2 px-4 cursor-pointer text-white">Generuj</button>
    </form>
</div>
@endsection
