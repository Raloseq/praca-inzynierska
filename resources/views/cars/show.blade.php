@extends('dashboard')
@section('content')
@include('components.status-messages')
<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="py-3 px-6">
            Szczegółowe informacje na temat samochodu {{$car->VIN}}
            </th>
            <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                @if(!is_null($car->photo))
                    <img src="{{ asset('storage/' . $car->photo) }}" alt="">
                @else
                
                <img src="https://via.placeholder.com/150" alt="">
                @endif
            </td>
        </tr>
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
                    <a href="{{ url('service_orders/'.$order->id.'' ) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline mx-3">
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