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
<div class="flex justify-between items-center my-5">
    <h2 class="ml-5">Adres Klienta:</h2>
    <a href="{{ route('client_address.create', ['client_id' => $client->id]) }}" class="font-mediumdark bg-green-500 py-2 px-4 cursor-pointer text-white mr-5">Dodaj adres</a>
</div>
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

            @foreach($address as $item)
                <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$item->voivodeship}}
                    </th>
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$item->city}}
                    </th>
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$item->street}}
                    </th>
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$item->ZIP}}
                    </th>
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white flex">
                        <a href="{{ route('client_address.edit', $item) }}" class="font-medium text-yellow-500 dark:text-blue-500 hover:underline">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                            <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <form action="{{ route('client_address.destroy', $item) }}" method="POST">
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
            @endforeach

    </tbody>
</table>
@endsection