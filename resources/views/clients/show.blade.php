@extends('dashboard')
@section('content')
<h1 class="m-10 font">Szczegółowe informacje na temat {{$client->name}}</h1>
@include('components.status-messages')
<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="py-3 px-6">
                Imię
            </th>
            <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$client->name}}
            </td>
        </tr>
        <tr>
            <th scope="col" class="py-3 px-6">
                Nazwisko
            </th>
            <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$client->surname}}
            </td>
        </tr>
        <tr>
            <th scope="col" class="py-3 px-6">
            Email
            </th>
            <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$client->email}}
            </td>
        </tr>
        <tr>
            <th scope="col" class="py-3 px-6">
                Nr. telefonu
            </th>
            <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$client->phone}}
            </td>
        </tr>
        <tr>
            <th scope="col" class="py-3 px-6">
                NIP
            </th>
            <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$client->NIP}}
            </td>
        </tr>
        <tr>
            <th scope="col" class="py-3 px-6">
                Nazwa firmy
            </th>
            <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$client->company_name}}
            </td>
        </tr>
    </thead>
</table>
<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="py-3 px-6">
                Województwo
            </th>
            <th scope="col" class="py-3 px-6">
                Miasto
            </th>
            <th scope="col" class="py-3 px-6">
                Ulica
            </th>
            <th scope="col" class="py-3 px-6">
                Kod pocztowy
            </th>
            <th scope="col" class="py-3 px-6">
                Action
            </th>
        </tr>
    </thead>
    <tbody>
        @if($address === null)
        <div class="flex justify-between items-center my-5">
            <h2 class="ml-5">Adres Klienta:</h2>
            <a href="{{ route('client_address.create', ['client_id' => $client->id]) }}" class="font-mediumdark bg-green-500 py-2 px-4 cursor-pointer text-white mr-5">Dodaj adres</a>
        </div>
        @else
            <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$address->voivodeship}}
                </th>
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$address->city}}
                </th>
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$address->street}}
                </th>
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$address->ZIP}}
                </th>
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white flex">
                    <a href="{{ route('client_address.edit', $address) }}" class="font-medium text-yellow-500 dark:text-blue-500 hover:underline">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                    <form action="{{ route('client_address.destroy', $address) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </form>
                </th>
            </tr>
        @endif
    </tbody>
</table>
<div class="flex justify-between items-center my-5">
    <h2 class="ml-5">Historia zleceń:</h2>
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