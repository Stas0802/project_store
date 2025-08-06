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
            <x-text-input id="name" name="name" type="text" required class="mt-1 block w-full" />

            <x-input-label for="email" :value="__('Email')" class="mt-4" />
            <x-text-input id="email" name="email" type="email" required class="mt-1 block w-full" />

            <x-input-label for="password" :value="__('Password')" class="mt-4" />
            <x-text-input id="password" name="password" type="password" required class="mt-1 block w-full" />

            <x-primary-button class="mt-4">
                {{ __('Create User') }}
            </x-primary-button>
        </form>
    </div>
</x-app-layout>
