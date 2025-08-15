<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Add User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <form method="POST" action="{{ route('user.store') }}" class="max-w-xl mx-auto">
            @csrf
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" value="{{ old('name') }}"
                          class="input-base {{ $errors->has('name') ? 'input-error' : 'input-valid'}}"/>
            <x-input-error :messages="$errors->get('name')" class="mt-2"/>

            <x-input-label for="email" :value="__('Email')" class="mt-4" />
            <x-text-input id="email" name="email" type="email" value="{{ old('email') }}"
                          class="input-base {{ $errors->has('email') ? 'input-error' : 'input-valid' }}" />
            <x-input-error :messages="$errors->get('email')" class="mt-2"/>

            <x-input-label for="password" :value="__('Password')" class="mt-4" />
            <x-text-input id="password" name="password" type="password" value="{{ old('password') }}"
                          class="input-base {{ $errors->has('password') ? 'input-error' : 'input-valid' }}" />
            <x-input-error :messages="$errors->get('password')" class="mt-2"/>

            <x-input-label for="password-confirm" :value="__('Password confirm')" class="mt-4" />
            <x-text-input id="password-confirm" name="password_confirmation" type="password" value="{{ old('password_confirmation') }}"
                          class="input-base {{ $errors->has('password_confirmation') ? 'input-error' : 'input-valid' }}" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
            <x-primary-button class="mt-4">
                {{ __('Create User') }}
            </x-primary-button>
        </form>
    </div>
</x-app-layout>
