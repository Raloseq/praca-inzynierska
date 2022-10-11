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
<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Lp.
                </th>
                <th scope="col" class="py-3 px-6">
                    Cena
                </th>
                <th scope="col" class="py-3 px-6">
                    Opis
                </th>
                <th scope="col" class="py-3 px-6">
                    Status
                </th>
                <th scope="col" class="py-3 px-6">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>       
            @foreach($doneOrders as $order)
            <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$loop->iteration}}
                </th>
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$order->price}}
                </th>
                <td class="py-4 px-6 text-gray-900 whitespace-nowrap dark:text-white">
                    {{$order->description}}
                </td>
                <td class="py-4 px-6 text-gray-900 whitespace-nowrap dark:text-white">
                    @if($order->is_done === 1)
                        Zakonczony
                    @else
                        W trakcie
                    @endif
                </td>
                <td class="py-4 px-6 text-gray-900 whitespace-nowrap dark:text-white flex">
                    <a href="{{ url('cars/'.$order->id.'' ) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline mx-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection