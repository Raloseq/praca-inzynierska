@extends('dashboard')
@section('content')
<form method="POST" action="{{ route('employee.store') }}" class="p-5">
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
        <x-input-label for="phone" :value="__('Numer telefonu')" />
        <x-text-input id="phone" class="block mt-1 w-full" type="phone" name="phone" :value="old('phone')" required autofocus />
        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="salary" :value="__('Wypłata')" />
        <x-text-input id="salary" class="block mt-1 w-full" type="number" name="salary" :value="old('salary')" required autofocus />
        <x-input-error :messages="$errors->get('salary')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="position" :value="__('Stanowisko')" />
        <x-text-input id="position" class="block mt-1 w-full" type="text" name="position" :value="old('position')" autofocus />
        <x-input-error :messages="$errors->get('position')" class="mt-2" />
    </div>

    <div class="flex items-center mt-5 justify-end">
        <a href="{{ url()->previous() }}" class="bg-red-600 inline-block px-5 py-3 ml-5">Anuluj</a>
        <button class="ml-4 bg-green-600 px-5 py-3 mr-10">
            {{ __('Dodaj') }}
        </button> 
    </div>

</form>
@endsection