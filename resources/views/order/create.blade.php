@extends('layouts.main')

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-8 rounded shadow">
        <h2 class="text-2xl font-semibold mb-6">Оформление заказа</h2>

        <form action="{{ route('order.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="costumer_name" class="block text-sm font-medium">Имя</label>
                    <input type="text" name="costumer_name" id="costumer_name" class="mt-1 w-full border rounded p-2" required>
                </div>

                <div>
                    <label for="costumer_surname" class="block text-sm font-medium">Фамилия</label>
                    <input type="text" name="costumer_surname" id="costumer_surname" class="mt-1 w-full border rounded p-2" required>
                </div>

                <div class="md:col-span-2">
                    <label for="phone_number" class="block text-sm font-medium">Телефон</label>
                    <input type="text" name="phone_number" id="phone_number" class="mt-1 w-full border rounded p-2" required>
                </div>

                <div class="md:col-span-2">
                    <label for="delivery" class="block text-sm font-medium">Адрес доставки</label>
                    <input type="text" name="delivery" id="delivery" class="mt-1 w-full border rounded p-2" required>
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

