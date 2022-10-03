@extends('dashboard')
@section('content')
<form method="POST" action="{{ route('client_address.store') }}" class="p-5">
    @csrf
    <div>
        <x-input-label for="client_id" :value="__('ID Klienta')" />
        <x-text-input id="client_id" class="block mt-1 w-full" type="text" name="client_id" value="{{ $client_id }}" required autofocus />
        <x-input-error :messages="$errors->get('client_id')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="voivodeship" :value="__('Wojewodztwo')" />
        <x-text-input id="voivodeship" class="block mt-1 w-full" type="text" name="voivodeship" :value="old('voivodeship')" required autofocus />
        <x-input-error :messages="$errors->get('voivodeship')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="city" :value="__('Miasto')" />
        <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" autofocus />
        <x-input-error :messages="$errors->get('city')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="street" :value="__('Ulica')" />
        <x-text-input id="street" class="block mt-1 w-full" type="text" name="street" :value="old('street')" autofocus />
        <x-input-error :messages="$errors->get('street')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="ZIP" :value="__('Kod pocztowy')" />
        <x-text-input id="ZIP" class="block mt-1 w-full" type="text" name="ZIP" :value="old('ZIP')" autofocus />
        <x-input-error :messages="$errors->get('ZIP')" class="mt-2" />
    </div>

    <div class="flex items-center mt-5 justify-end">
        <a href="{{ url()->previous() }}" class="bg-red-600 inline-block px-5 py-3 ml-5">Anuluj</a>
        <button class="ml-4 bg-green-600 px-5 py-3 mr-10">
            {{ __('Dodaj') }}
        </button> 
    </div>

</form>
@endsection