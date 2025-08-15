<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Add User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <form method="POST" action="{{ route('user.update', $user->id) }}" class="max-w-xl mx-auto">
            @csrf
            {{method_field('PATCH')}}

            <x-input-label for="user-name" :value="__('Name')" />
            <x-text-input id="user-name" name="user_name" value="{{$user->name}}" type="text"
                          class="input-base {{ $errors->getBag('user')->has('user_name') ? 'input-error' : 'input-valid' }}" />
            <x-input-error :messages="$errors->getBag('user')->get('user_name')"/>

            <x-input-label for="email" :value="__('Email')" class="mt-4" />
            <x-text-input id="email" name="email" value="{{$user->email}}" type="email"
                          class="input-base {{ $errors->getBag('user')->has('email') ? 'input-error' : 'input-valid' }}" />
            <x-input-error :messages="$errors->getBag('user')->get('email')"/>

            <x-input-label for="password" :value="__('New Password')" class="mt-4" />
            <x-text-input id="password" name="password"  type="password"
                          class="input-base {{ $errors->getBag('user')->has('password') ? 'input-error' : 'input-valid' }}" />
            <x-input-error :messages="$errors->getBag('user')->get('password')"/>

            <x-input-label for="password-confirm" :value="__('Password confirm')" class="mt-4" />
            <x-text-input id="password-confirm" name="password_confirmation" type="password" value="{{ old('password_confirmation') }}"
                          class="input-base {{ $errors->getBag('user')->has('password_confirmation') ? 'input-error' : 'input-valid' }}" />
            <x-input-error :messages="$errors->getBag('user')->get('password_confirmation')" class="mt-2"/>

            <x-primary-button class="mt-4">
                {{ __('Edite User') }}
            </x-primary-button>
        </form>
    </div>
</x-app-layout>

