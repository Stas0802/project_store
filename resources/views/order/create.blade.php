@extends('layouts.main')

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-8 rounded shadow">
        <h2 class="text-2xl font-semibold mb-6">Оформление заказа</h2>

        <form action="{{ route('order.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="costumer_name" class="block text-sm font-medium">Имя</label>
                    <input type="text" name="costumer_name"
                           id="costumer_name" value="{{ old('costumer_name') }}"
                           class="input-base {{ $errors->has('costumer_name') ? 'input-error' : 'input-valid' }}">
                    <x-input-error :messages="$errors->get('costumer_name')"/>
                </div>

                <div>
                    <label for="costumer_surname" class="block text-sm font-medium">Фамилия</label>
                    <input type="text" name="costumer_surname"
                           id="costumer_surname" value="{{ old('costumer_surname') }}"
                           class="input-base {{ $errors->has('costumer_surname') ? 'input-error' : 'input-valid'}}">
                    <x-input-error :messages="$errors->get('costumer_surname')"/>
                </div>

                <div class="md:col-span-2">
                    <label for="phone_number" class="block text-sm font-medium">Телефон</label>
                    <input type="text" name="phone_number"
                           id="phone_number" value="{{ old('phone_number') }}"
                           class="input-base {{ $errors->has('phone_number') ? 'input-error' : 'input-valid'}}">
                    <x-input-error :messages="$errors->get('phone_number')"/>
                </div>

                <div class="md:col-span-2">
                    <label for="delivery" class="block text-sm font-medium">Адрес доставки</label>
                    <input type="text" name="delivery"
                           id="delivery" value="{{ old('delivery') }}"
                           class="input-base {{ $errors->has('delivery') ? 'input-error' : 'input-valid' }}">
                    <x-input-error :messages="$errors->get('delivery')"/>
                </div>
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                    Отправить заказ
                </button>
            </div>
        </form>
    </div>
@endsection

