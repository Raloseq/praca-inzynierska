@extends('dashboard')
@section('content')
<form method="POST" action="{{ route('service_orders.store') }}" class="p-5">
    @csrf

    <div class="mt-4">
        <x-input-label for="admission_date" :value="__('Data przyjęcia')" />
        <x-text-input id="admission_date" class="block mt-1 w-full" type="datetime-local" name="admission_date" :value="old('admission_date')" required autofocus />
        <x-input-error :messages="$errors->get('admission_date')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="end_date" :value="__('Data oddania')" />
        <x-text-input id="end_date" class="block mt-1 w-full" type="datetime-local" name="end_date" :value="old('end_date')" autofocus />
        <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
    </div>

    <div class="mt-4">
        <label>Status</label>
        <input type="checkbox" name="is_done">
    </div>

    <div class="mt-4">
        <select name="client_id" class="form-control">
        <option>Wybierz klienta</option>
        @foreach($clients as $client)
            <option value="{{ $client->id }}">
                {{ $client->name }}
            </option>
        @endforeach
        </select>
    </div>

    <div class="mt-4">
        <select name="car_id" class="form-control">
        <option>Wybierz pojazd</option>
        @foreach($cars as $car)
            <option value="{{ $car->id }}">
                {{ $car->VIN }}
            </option>
        @endforeach
        </select>
    </div>

    <div class="mt-4">
        <select name="employee_id" class="form-control">
        <option>Wybierz pracownika</option>
        @foreach($employees as $employee)
            <option value="{{ $employee->id }}">
                {{ $employee->name }}
            </option>
        @endforeach
        </select>
    </div>

    <div class="mt-4">
        <x-input-label for="description" :value="__('Opis problemu')" />
        <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus />
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="price" :value="__('Cena')" />
        <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')" required autofocus />
        <x-input-error :messages="$errors->get('price')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="damage_photo" :value="__('Grafika')" />
        <x-text-input id="damage_photo" class="block mt-1 w-full" type="file" name="damage_photo" :value="old('damage_photo')" autofocus />
        <x-input-error :messages="$errors->get('damage_photo')" class="mt-2" />
    </div>

    <div class="flex items-center mt-5 justify-end">
        <a href="{{ url()->previous() }}" class="bg-red-600 inline-block px-5 py-3 ml-5">Anuluj</a>
        <button class="ml-4 bg-green-600 px-5 py-3 mr-10">
            {{ __('Dodaj') }}
        </button> 
    </div>

</form>
@endsection