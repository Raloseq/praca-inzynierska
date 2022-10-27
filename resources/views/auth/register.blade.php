<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Imię i Nazwisko')" />

                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Haslo')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Powtorz haslo')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="NIP" :value="__('NIP')" />

                <x-text-input id="NIP" class="block mt-1 w-full" :value="old('NIP')"
                                type="text"
                                name="NIP" required />

                <x-input-error :messages="$errors->get('NIP')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="street" :value="__('Ulica')" />

                <x-text-input id="street" class="block mt-1 w-full" :value="old('street')"
                                type="text"
                                name="street" required />

                <x-input-error :messages="$errors->get('street')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="city" :value="__('Miasto')" /> 

                <x-text-input id="city" class="block mt-1 w-full" :value="old('city')"
                                type="text"
                                name="city" required />

                <x-input-error :messages="$errors->get('city')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="ZIP" :value="__('Kod pocztowy')" />

                <x-text-input id="ZIP" class="block mt-1 w-full" :value="old('ZIP')"
                                type="text"
                                name="ZIP" required />

                <x-input-error :messages="$errors->get('ZIP')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="company_name" :value="__('Nazwa firmy')" />

                <x-text-input id="company_name" class="block mt-1 w-full" :value="old('company_name')"
                                type="text"
                                name="company_name" required />

                <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
            </div>



            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
