@extends('dashboard')
@section('content')

<form action="{{ route('clients.update', $client) }}" class="p-5" method="POST">
    @csrf
    @method('PUT')
    <div>
        <x-input-label for="name" :value="__('Imie')" />
        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$client->name}}" autofocus/>
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="surname" :value="__('Nazwisko')" />
        <x-text-input id="surname" class="block mt-1 w-full" type="text" name="surname" value="{{$client->surname}}" autofocus />
        <x-input-error :messages="$errors->get('surname')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="NIP" :value="__('NIP')" />
        <x-text-input id="NIP" class="block mt-1 w-full" type="text" name="NIP" value="{{$client->NIP}}" autofocus />
        <x-input-error :messages="$errors->get('NIP')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="company_name" :value="__('Nazwa firmy')" />
        <x-text-input id="company_name" class="block mt-1 w-full" type="text" name="company_name" value="{{$client->company_name}}" autofocus />
        <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="phone" :value="__('Numer telefonu')" />
        <x-text-input id="phone" class="block mt-1 w-full" type="phone" name="phone" value="{{$client->phone}}" autofocus />
        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" class="block mt-1 w-full" type="mail" name="email" value="{{$client->email}}" autofocus />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>
    <div class="flex items-center mt-5 justify-end">
        <a href="{{ url()->previous() }}" class="bg-red-600 inline-block px-5 py-3 ml-5">Anuluj</a>
        <button class="ml-4 bg-green-600 px-5 py-3 mr-10">
            {{ __('Zapisz') }}
        </button> 
    </div>

</form>
@endsection