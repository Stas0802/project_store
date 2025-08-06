@extends('layouts.main')

@section('title', 'Корзина')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Корзина</h2>
    @if(!empty($cart))
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach($cart as $id => $product)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{ asset('storage/product/' . $product['image']) }}" alt="{{ $product['name'] }}"
                         class="w-full h-48 object-cover">

                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800">{{ $product['name'] }}</h3>
                        <p class="text-gray-600">Цена: <strong>{{ $product['price'] }} </strong></p>
                        <p class="text-gray-600">Кол-во: <strong>{{ $product['quantity'] }}</strong></p>
                        <p class="text-gray-800 font-semibold mt-2">
                            Итого: {{ $product['quantity'] * $product['price'] }} </p>
                        <form action="{{ route('cart.remove', $id) }}" method="POST" class="mt-4">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="text-red-600 hover:text-red-800 text-sm font-medium">
                                Удалить
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Кнопка "Оформить заказ" -->
        <div class="mt-8 text-center">
            <a href="{{ route('order.create') }}"
               class="inline-block bg-green-500 hover:bg-green-600 text-white font-semibold py-3 px-6 rounded-lg shadow">
                🛍 Оформить заказ
            </a>
        </div>
    @else
        <p class="text-gray-600">Ваша корзина пуста.</p>
    @endif
@endsection
