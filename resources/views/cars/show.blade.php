@extends('dashboard')
@section('content')
<h1 class="m-10 font">Szczegółowe informacje na temat samochodu {{$car->VIN}}</h1>
@include('components.status-messages')
<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="py-3 px-6">
                VIN
            </th>
            <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$car->VIN}}
            </td>
        </tr>
        <tr>
            <th scope="col" class="py-3 px-6">
                Numer rejestracyjny
            </th>
            <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$car->registration_number}}
            </td>
        </tr>
        <tr>
            <th scope="col" class="py-3 px-6">
                Rok produkcji
            </th>
            <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$car->year}}
            </td>
        </tr>
        <tr>
            <th scope="col" class="py-3 px-6">
                Typ pojazdu
            </th>
            <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$car->type}}
            </td>
        </tr>
        <tr>
            <th scope="col" class="py-3 px-6">
                Marka
            </th>
            <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$car->brand}}
            </td>
        </tr>
        <tr>
            <th scope="col" class="py-3 px-6">
                Model
            </th>
            <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$car->model}}
            </td>
        </tr>
    </thead>
</table>
<div class="flex justify-between items-center my-5">
    <h2 class="ml-5">Historia napraw:</h2>
</div>
@endsection