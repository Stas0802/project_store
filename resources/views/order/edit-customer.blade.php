<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Update Customer Data') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <form method="POST" action="{{ route('order.update', $order->id) }}" class="max-w-xl mx-auto">
            @csrf
            @method('PATCH')

            <x-input-label for="costumer_name" :value="__('Имя')" />
            <x-text-input id="costumer_name" name="costumer_name" type="text"
                          value="{{ old('costumer_name', $order->costumer_name) }}"
                          class="input-base {{ $errors->has('costumer_name') ? 'input-error' : 'input-valid' }}" />
            <x-input-error :messages="$errors->get('costumer_name')" class="mt-2" />

            <x-input-label for="costumer_surname" :value="__('Фамилия')" class="mt-4" />
            <x-text-input id="costumer_surname" name="costumer_surname" type="text"
                          value="{{  old('costumer_surname', $order->costumer_surname) }}"
                          class="input-base {{ $errors->has('costumer_surname') ? 'input-error' : 'input-valid' }}" />
            <x-input-error :messages="$errors->get('costumer_surname')" class="mt-2" />

            <x-input-label for="phone_number" :value="__('Телефон')" class="mt-4" />
            <x-text-input id="phone_number" name="phone_number" type="text"
                          value="{{ old('phone_number', $order->phone_number) }}"
                          class="input-base {{ $errors->has('phone_number') ? 'input-error' : 'input-valid' }}" />
            <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />

            <x-input-label for="delivery" :value="__('Адрес доставки')" class="mt-4" />
            <x-text-input id="delivery" name="delivery" type="text"
                          value="{{  old('delivery', $order->delivery) }}"
                          class="input-base {{ $errors->has('delivery') ? 'input-error' : 'input-valid' }}" />
            <x-input-error :messages="$errors->get('delivery')" class="mt-2" />

            <x-primary-button class="mt-6">
                {{ __('Edit customer data') }}
            </x-primary-button>
        </form>
    </div>
</x-app-layout>
