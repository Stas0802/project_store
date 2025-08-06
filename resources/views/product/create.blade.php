<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Add Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data" class="max-w-xl mx-auto">
            @csrf

            <!-- Название -->
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" required class="mt-1 block w-full" />

            <!-- Описание -->
            <x-input-label for="description" :value="__('Description')" class="mt-4" />
            <textarea id="description" name="description" required
                      class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>

            <!-- Цена -->
            <x-input-label for="price" :value="__('Price')" class="mt-4" />
            <x-text-input id="price" name="price" type="number" required class="mt-1 block w-full" />

            <!-- Картинка -->
            <x-input-label for="image" :value="__('Image')" class="mt-4" />
            <x-text-input id="image" name="image" type="file" required class="mt-1 block w-full" />

            <!-- Категория -->
            <x-input-label for="categories_id" :value="__('Category')" class="mt-4" />
            <select id="categories_id" name="categories_id" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                <option value="" selected disabled>{{ __('Choose category') }}</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            <!-- Кнопка -->
            <x-primary-button class="mt-4">
                {{ __('Create Product') }}
            </x-primary-button>
        </form>
    </div>
</x-app-layout>
