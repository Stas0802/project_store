<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">
            {{-- Форма продукта --}}
            <div class="bg-gray-300 border rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-semibold mb-4 text-gray-700">Add Product</h3>
                <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data" class="space-y-4">
                    @csrf

                    <x-input-label for="product-name" :value="__('Name')" />
                    <x-text-input id="product-name" name="product_name" type="text" value="{{ old('product_name') }}"
                                  class="input-base {{ $errors->getBag('product')->has('product_name') ? 'input-error' : 'input-valid' }}" />
                    <x-input-error :messages="$errors->getBag('product')->get('product_name')" />

                    <x-input-label for="description" :value="__('Description')" />
                    <textarea id="description" name="description"
                              class="input-base {{ $errors->getBag('product')->has('description') ? 'input-error' : 'input-valid' }}">{{ old('description') }}</textarea>
                    <x-input-error :messages="$errors->getBag('product')->get('description')" />

                    <x-input-label for="price" :value="__('Price')" />
                    <x-text-input id="price" name="price" type="number" value="{{ old('price') }}"
                                  class="input-base {{ $errors->getBag('product')->has('price') ? 'input-error' : 'input-valid' }}" />
                    <x-input-error :messages="$errors->getBag('product')->get('price')" />

                    <x-input-label for="image" :value="__('Image')" />
                    <x-text-input id="image" name="image" type="file" class="mt-1 block w-full" />
                    <x-input-error :messages="$errors->getBag('product')->get('image')" />

                    <x-input-label for="category_id" :value="__('Category')" />
                    <select id="category_id" name="category_id"
                            class="input-base {{ $errors->getBag('product')->has('category_id') ? 'input-error' : 'input-valid' }}">
                        <option value="" selected disabled>{{ __('Choose category') }}</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->getBag('product')->get('category_id')" />

                    <x-primary-button class="w-full justify-center">
                        {{ __('Create Product') }}
                    </x-primary-button>
                </form>
            </div>
            {{-- Форма категории --}}
          <div class="space-y-6">
              <div class="bg-gray-300 border rounded-lg shadow-sm p-6">
                  <h3 class="text-lg font-semibold mb-4 text-gray-700">Add Category</h3>
                  <form method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data" class="space-y-4">
                      @csrf

                      <x-input-label for="category-name" :value="__('Name')" />
                      <x-text-input id="category-name" name="category_name" type="text" value="{{ old('category_name') }}"
                                    class="input-base {{ $errors->getBag('category')->has('category_name') ? 'input-error' : 'input-valid' }}" />
                      <x-input-error :messages="$errors->getBag('category')->get('category_name')" />

                      <x-input-label for="image" :value="__('Image')" />
                      <x-text-input id="image" name="image" type="file" class="mt-1 block w-full" />
                      <x-input-error :messages="$errors->getBag('category')->get('image')" />


                      <x-primary-button class="w-full justify-center">
                          {{ __('Create Category') }}
                      </x-primary-button>
                  </form>
              </div>
              {{-- Форма пользователя --}}
              @if(Auth::user()->is_admin)
                  <div class="bg-gray-300 border rounded-lg shadow-sm p-6">
                      <h3 class="text-lg font-semibold mb-4 text-gray-700">Add User</h3>
                      <form method="POST" action="{{ route('user.store') }}" class="max-w-xl mx-auto">
                          @csrf

                          <x-input-label for="user-name" :value="__('Name')" />
                          <x-text-input id="user-name" name="user_name" type="text" value="{{ old('user_name') }}"
                                        class="input-base {{ $errors->getBag('user')->has('user_name') ? 'input-error' : 'input-valid'}}"/>
                          <x-input-error :messages="$errors->getBag('user')->get('user_name')" class="mt-2"/>

                          <x-input-label for="email" :value="__('Email')" class="mt-4" />
                          <x-text-input id="email" name="email" type="email" value="{{ old('email') }}"
                                        class="input-base {{ $errors->getBag('user')->has('email') ? 'input-error' : 'input-valid' }}" />
                          <x-input-error :messages="$errors->getBag('user')->get('email')" class="mt-2"/>

                          <x-input-label for="password" :value="__('Password')" class="mt-4" />
                          <x-text-input id="password" name="password" type="password" value="{{ old('password') }}"
                                        class="input-base {{ $errors->getBag('user')->has('password') ? 'input-error' : 'input-valid' }}" />
                          <x-input-error :messages="$errors->getBag('user')->get('password')" class="mt-2"/>

                          <x-input-label for="password-confirm" :value="__('Password confirm')" class="mt-4" />
                          <x-text-input id="password-confirm" name="password_confirmation" type="password" value="{{ old('password_confirmation') }}"
                                        class="input-base {{ $errors->getBag('user')->has('password_confirmation') ? 'input-error' : 'input-valid' }}" />
                          <x-input-error :messages="$errors->getBag('user')->get('password_confirmation')" class="mt-2"/>

                          <x-primary-button class="w-full justify-center mt-3">
                              {{ __('Create User') }}
                          </x-primary-button>
                      </form>
                  </div>
              @endif
          </div>
        </div>
    </div>
</x-app-layout>
