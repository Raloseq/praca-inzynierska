@extends('dashboard')
@section('content')
<form action="{{ route('user.update', $user) }}" class="p-5" method="POST" >
    @csrf
    @method('PUT')
    <div>
        <x-input-label for="city" :value="__('city')" />
        <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" value="{{$user->city}}" required autofocus />
        <x-input-error :messages="$errors->get('city')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="street" :value="__('sreet')" />
        <x-text-input id="street" class="block mt-1 w-full" type="text" name="street" value="{{$user->street}}" required autofocus />
        <x-input-error :messages="$errors->get('street')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="ZIP" :value="__('ZIP')" />
        <x-text-input id="ZIP" class="block mt-1 w-full" type="text" name="ZIP" value="{{$user->ZIP}}" autofocus />
        <x-input-error :messages="$errors->get('ZIP')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="company_name" :value="__('company_name')" />
        <x-text-input id="company_name" class="block mt-1 w-full" type="text" name="company_name" value="{{$user->company_name}}" autofocus />
        <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="NIP" :value="__('NIP')" />
        <x-text-input id="NIP" class="block mt-1 w-full" type="text" name="NIP" value="{{$user->NIP}}" autofocus />
        <x-input-error :messages="$errors->get('NIP')" class="mt-2" />
    </div>

    <div class="flex items-center mt-5 justify-end">
        <a href="{{ url()->previous() }}" class="bg-red-600 inline-block px-5 py-3 ml-5">Anuluj</a>
        <button class="ml-4 bg-green-600 px-5 py-3 mr-10">
            {{ __('Zapisz') }}
        </button> 
    </div>

</form>
@endsection