<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Add Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <form method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data" class="max-w-xl mx-auto">
            @csrf

            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" value="{{ old('name') }}"
                          class="input-base {{ $errors->has('name') ? 'input-error' : 'input-valid' }}" />
            <x-input-error :messages="$errors->get('name')"/>


            <x-input-label for="image" :value="__('Image')" class="mt-4" />
            <x-text-input id="image" name="image" type="file"  class="mt-1 block w-full" />
            <x-input-error :messages="$errors->get('image')" class="mt-2"/>


            <x-primary-button class="mt-4">
                {{ __('Create category') }}
            </x-primary-button>
        </form>
    </div>
</x-app-layout>
