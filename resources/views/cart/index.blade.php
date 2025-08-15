@extends('layouts.main')

@section('title', 'Корзина')

@section('content')
    <div class="w-full max-w-6xl mx-auto border rounded-2xl p-10 bg-gray-50">
        @if(!empty($cartData['products']))
            <div class="flex flex-col gap-8">
                @foreach($cartData['products'] as $id => $product)
                    <div class="bg-white rounded-xl shadow-xl flex items-center px-8 py-6">
                        <img src="{{ asset('storage/product/' . $product['image']) }}"
                             alt="{{ $product['name'] }}"
                             class="w-28 h-28 object-cover rounded-lg">
                        <div class="flex-1 ml-8">
                            <h3 class="text-2xl font-bold text-gray-900">{{ $product['name'] }}</h3>
                            <p class="text-lg text-gray-700 mt-2">
                                Цена за единицу: <span class="font-semibold">{{ $product['price'] }} грн</span>
                            </p>
                            <p class="text-lg text-gray-700 mt-1">
                                Количество: <span class="font-semibold">{{ $product['quantity'] }} шт</span>
                            </p>
                            <p class="text-xl text-green-700 font-bold mt-3">
                                Итого за товар: {{ $product['productTotal'] }} грн
                            </p>
                        </div>
                        <form action="{{ route('cart.remove', $id) }}" method="POST" class="ml-6">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="text-red-600 hover:text-red-800 text-lg font-medium">
                                🗑 Удалить
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
            <div class="mt-10 text-right">
                <p class="text-2xl font-bold text-gray-900 mb-4">
                    &#128176; Общая сумма заказа: <span class="text-green-700">{{ $cartData['total'] }} грн</span>
                </p>
                <a href="{{ route('order.create') }}"
                   class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold py-4 px-8 rounded-xl shadow">
                     Оформить заказ
                </a>
            </div>
        @else
            <div class="text-center text-gray-600 py-20">
                <p class="text-2xl"> Ваша корзина пуста </p>
                <a href="{{ route('catalog.index') }}"
                   class="mt-6 inline-block text-blue-600 hover:underline text-lg">
                     Вернуться к покупкам
                </a>
            </div>
        @endif
    </div>
@endsection
