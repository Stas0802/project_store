<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Add Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <form method="POST" action="{{ route('product.update', $product) }}" enctype="multipart/form-data" class="max-w-xl mx-auto">
            @csrf
            {{method_field('PATCH')}}

            <x-input-label for="product-name" :value="__('Name')" />
            <x-text-input id="product-name" name="product_name" value="{{$product->name}}" type="text"
                          class="input-base {{ $errors->getBag('product')->has('product_name') ? 'input-error' : 'input-valid' }}" />
            <x-input-error :messages="$errors->getBag('product')->get('product_name')"/>

            <x-input-label for="description" :value="__('Description')" class="mt-4" />
            <textarea id="description" name="description"
                      class="input-base {{ $errors->getBag('product')->has('description') ? 'input-error' : 'input-valid' }}">{{$product->description}}</textarea>
            <x-input-error :messages="$errors->getBag('product')->get('description')"/>

            <x-input-label for="price" :value="__('Price')" class="mt-4" />
            <x-text-input id="price" name="price" value="{{$product->price}}" type="number"
                          class="input-base {{ $errors->getBag('product')->has('price') ? 'input-error' : 'input-valid' }}" />
            <x-input-error :messages="$errors->getBag('product')->get('price')"/>


            <x-input-label for="image" :value="__('Image')" class="mt-4" />
            <img src="{{asset('storage/product/' . $product->image)}}" alt="{{$product->name}}" class="w-20 h-20">
            <x-text-input id="image" name="image" type="file" class="mt-1 block w-full" />
            <x-input-error :messages="$errors->getBag('product')->get('image')"/>

            <x-input-label for="category_id" :value="__('Category')" class="mt-4" />
            <select id="category_id" name="category_id"
                    class="input-base {{ $errors->getBag('product')->has('category_id') ? 'input-error' : 'input-valid'  }}">
                <option value="" selected disabled>{{ __('Choose category') }}</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->getBag('product')->get('category_id')"/>

            <x-primary-button class="mt-4">
                {{ __('Edite Product') }}
            </x-primary-button>
        </form>
    </div>
</x-app-layout>
