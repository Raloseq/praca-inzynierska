@extends('dashboard')
@section('content')
<form action="{{ route('cars.update', $car) }}" class="p-5" enctype="multipart/form-data" method="POST" >
    @csrf
    @method('PUT')
    <div>
        <x-input-label for="VIN" :value="__('VIN')" />
        <x-text-input id="VIN" class="block mt-1 w-full" type="text" name="VIN" value="{{$car->VIN}}" required autofocus />
        <x-input-error :messages="$errors->get('VIN')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="registration_number" :value="__('Numer rejestracyjny')" />
        <x-text-input id="registration_number" class="block mt-1 w-full" type="text" name="registration_number" value="{{$car->registration_number}}" required autofocus />
        <x-input-error :messages="$errors->get('registration_number')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="year" :value="__('Rok produkcji')" />
        <x-text-input id="year" class="block mt-1 w-full" type="date" name="year" value="{{$car->year}}" autofocus />
        <x-input-error :messages="$errors->get('year')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="brand" :value="__('Marka pojazdu')" />
        <select name="brand" id="brand" class="form-control">
            <option value="{{$car->brand}}"> {{$car->brand}}</option>
            @foreach($brands as $brand)
                <option value="{{ $brand }}">
                    {{ $brand }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mt-4">
        <x-input-label for="model" :value="__('Model pojazdu')" />
        <select name="model" id="model" class="form-control">
            <option value="{{$car->model}}"> {{$car->model}}</option>
            @foreach($models as $model)
                <option value="{{ $model }}">
                    {{ $model }}
                </option>
            @endforeach
        </select>
    </div>
    
    <div class="mt-4">
        <x-input-label for="type" :value="__('Rodzaj pojazdu')" />
        <select name="type" id="type" class="form-control">
            <option value="{{$car->type}}"> {{$car->type}}</option>
            @foreach($types as $type)
                <option value="{{ $type }}">
                    {{ $type }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mt-4">
        <x-input-label for="photo" :value="__('Grafika')" />
        <x-text-input id="photo" class="block mt-1 w-full" type="file" name="photo" :value="old('photo')" autofocus />
        <x-input-error :messages="$errors->get('photo')" class="mt-2" />
    </div>

    <div class="flex items-center mt-5 justify-end">
        <a href="{{ url()->previous() }}" class="bg-red-600 inline-block px-5 py-3 ml-5">Anuluj</a>
        <button class="ml-4 bg-green-600 px-5 py-3 mr-10">
            {{ __('Zapisz') }}
        </button> 
    </div>

</form>
@endsection