<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Add Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data" class="max-w-xl mx-auto">
            @csrf

            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" value="{{ old('name') }}"
                          class="input-base {{ $errors->has('name') ? 'input-error' : 'input-valid' }}" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />

            <x-input-label for="description" :value="__('Description')" class="mt-4" />
            <textarea id="description" name="description"
                      class="input-base {{ $errors->has('description') ? 'input-error' : 'input-valid' }}">{{ old('description') }}</textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2"/>

            <x-input-label for="price" :value="__('Price')" class="mt-4" />
            <x-text-input id="price" name="price" type="number" value="{{ old('price') }}"
                          class="input-base {{ $errors->has('price') ? 'input-error' : 'input-valid' }}" />
            <x-input-error :messages="$errors->get('price')" class="mt-2"/>


            <x-input-label for="image" :value="__('Image')" class="mt-4" />
            <x-text-input id="image" name="image" type="file"  class="mt-1 block w-full" />
            <x-input-error :messages="$errors->get('image')" class="mt-2"/>


            <x-input-label for="category_id" :value="__('Category')" class="mt-4" />
            <select id="category_id" name="category_id"
                    class="input-base {{ $errors->has('category_id') ? 'input-error' : 'input-valid' }}">
                <option value="" selected disabled>{{ __('Choose category') }}</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('category_id')" class="mt-2"/>

            <x-primary-button class="mt-4">
                {{ __('Create Product') }}
            </x-primary-button>
        </form>
    </div>
</x-app-layout>
