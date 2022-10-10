@extends('dashboard')
@section('content')
<h1 class="m-10 font">Szczegółowe informacje na temat {{$employee->name}} {{$employee->surname}}</h1>
@include('components.status-messages')
<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="py-3 px-6">
                Imię
            </th>
            <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$employee->name}}
            </td>
        </tr>
        <tr>
            <th scope="col" class="py-3 px-6">
                Nazwisko
            </th>
            <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$employee->surname}}
            </td>
        </tr>
        <tr>
            <th scope="col" class="py-3 px-6">
            Nr. telefonu
            </th>
            <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$employee->phone}}
            </td>
        </tr>
        <tr>
            <th scope="col" class="py-3 px-6">
                Stanowisko
            </th>
            <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$employee->position}}
            </td>
        </tr>
        <tr>
            <th scope="col" class="py-3 px-6">
                Wynagrodzenie
            </th>
            <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$employee->salary}}
            </td>
        </tr>
    </thead>
</table>
<div class="flex justify-between items-center my-5">
    <h2 class="ml-5">Zakonczone zlecenia pracownika:</h2>
</div>
@endsection