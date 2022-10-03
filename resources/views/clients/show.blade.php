@extends('dashboard')
@section('content')
<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="py-3 px-6">
                Imię
            </th>
            <th scope="col" class="py-3 px-6">
                Nazwisko
            </th>
            <th scope="col" class="py-3 px-6">
                Email
            </th>
        </tr>
    </thead>
    <tbody>
        <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$client->name}}
            </th>
            <td class="py-4 px-6 text-gray-900 whitespace-nowrap dark:text-white">
                {{$client->surname}}
            </td>
            <td class="py-4 px-6 text-gray-900 whitespace-nowrap dark:text-white">
                {{$client->email}}
            </td>
        </tr>
    </tbody>
</table>
@endsection