@extends('dashboard')
@section('content')
<form method="POST" action="{{ route('clients.store') }}" class="p-5">
    @csrf

    <div>
        <x-input-label for="name" :value="__('Imie')" />
        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="surname" :value="__('Nazwisko')" />
        <x-text-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="old('surname')" required autofocus />
        <x-input-error :messages="$errors->get('surname')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="NIP" :value="__('NIP')" />
        <x-text-input id="NIP" class="block mt-1 w-full" type="text" name="NIP" :value="old('NIP')" autofocus />
        <x-input-error :messages="$errors->get('NIP')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="company_name" :value="__('Nazwa firmy')" />
        <x-text-input id="company_name" class="block mt-1 w-full" type="text" name="company_name" :value="old('company_name')" autofocus />
        <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="phone" :value="__('Numer telefonu')" />
        <x-text-input id="phone" class="block mt-1 w-full" type="phone" name="phone" :value="old('phone')" required autofocus />
        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" class="block mt-1 w-full" type="mail" name="email" :value="old('email')" required autofocus />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>
    <div class="flex items-center mt-5 justify-end">
        <a href="{{ url()->previous() }}" class="bg-red-600 inline-block px-5 py-3 ml-5">Anuluj</a>
        <button class="ml-4 bg-green-600 px-5 py-3 mr-10">
            {{ __('Dodaj') }}
        </button> 
    </div>

</form>
@endsection