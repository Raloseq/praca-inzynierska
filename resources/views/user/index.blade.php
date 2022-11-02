@extends('dashboard')
@section('content')
<div class="overflow-x-auto relative shadow-md">
    @include('components.status-messages')

    <a href="{{ route('user.edit', $user) }}" class="font-mediumdark bg-green-500 py-2 px-4 mx-4 my-4 cursor-pointer text-white">Edytuj dane</a>  

    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Miasto
                </th>
                <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $user->city }}
                </td>
            </tr>
            <tr>
                <th scope="col" class="py-3 px-6">
                    Ulica
                </th>
                <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $user->street }}
                </td>
            </tr>
            <tr>
                <th scope="col" class="py-3 px-6">
                    Kod pocztowy
                </th>
                <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $user->ZIP }}
                </td>
            </tr>
            <tr>
                <th scope="col" class="py-3 px-6">
                    Nazwa firmy                </th>
                <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $user->company_name }}
                </td>
            </tr>
            <tr>
                <th scope="col" class="py-3 px-6">
                    NIP                </th>
                <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $user->NIP }}
                </td>
            </tr>
        </thead>
    </table>
</div>

@endsection