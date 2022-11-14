@extends('dashboard')
@section('content')
<form method="POST" action="{{ route('cars.store') }}" class="p-5" enctype="multipart/form-data">
    @csrf

    <div>
        <x-input-label for="VIN" :value="__('VIN')" />
        <x-text-input id="VIN" class="block mt-1 w-full" type="text" name="VIN" :value="old('VIN')" required autofocus />
        <x-input-error :messages="$errors->get('VIN')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="registration_number" :value="__('Numer rejestracyjny')" />
        <x-text-input id="registration_number" class="block mt-1 w-full" type="text" name="registration_number" :value="old('registration_number')" required autofocus />
        <x-input-error :messages="$errors->get('registration_number')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="year" :value="__('Rok produkcji')" />
        <x-text-input id="year" class="block mt-1 w-full" type="date" name="year" :value="old('year')" autofocus />
        <x-input-error :messages="$errors->get('year')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="model" :value="__('Model pojazdu')" />
        <select name="model" id="model" class="form-control" required>
            <option value=""> -- Select One --</option>
            @foreach($models as $model)
                <option value="{{ $model }}">
                    {{ $model }}
                </option>
            @endforeach
        </select>
    </div>
    
    <div class="mt-4">
        <x-input-label for="type" :value="__('Rodzaj pojazdu')" />
        <select name="type" id="type" class="form-control" required>
            <option value=""> -- Select One --</option>
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
            {{ __('Dodaj') }}
        </button> 
    </div>

</form>
@endsection