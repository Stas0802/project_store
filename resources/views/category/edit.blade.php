<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Add Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <form method="POST" action="{{ route('category.update', $category) }}" enctype="multipart/form-data" class="max-w-xl mx-auto">
            @csrf
            {{method_field('PATCH')}}

            <!-- Название -->
            <x-input-label for="category-name" :value="__('Name')" />
            <x-text-input id="category-name" name="category_name" type="text" value="{{ old('category_name', $category->name) }}"
                          class="input-base {{ $errors->getBag('category')->has('name') ? 'input-error' : 'input-valid' }}" />
            <x-input-error :messages="$errors->getBag('category')->get('category_name')"/>

            <!-- Картинка -->
            <x-input-label for="image" :value="__('Image')" class="mt-4" />
            <img src="{{asset('storage/category/' . $category->image)}}" alt="{{$category->name}}" class="w-20 h-20">
            <x-text-input id="image" name="image" type="file"  class="mt-1 block w-full" />
            <x-input-error :messages="$errors->getBag('category')->get('image')"/>

            <!-- Кнопка -->
            <x-primary-button class="mt-4">
                {{ __('Edite category') }}
            </x-primary-button>
        </form>
    </div>
</x-app-layout>
<?php
