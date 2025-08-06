
@extends('layouts.main')

@section('title', $product->name)

@section('content')
    <div class="max-w-md mx-auto bg-white p-6 rounded shadow">
        <img src="{{ asset('storage/product/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-60 object-cover rounded mb-4">

        <h2 class="text-xl font-bold">{{ $product->name }}</h2>
        <p class="text-gray-700 mt-2">{{ $product->description }}</p>
        <p class="text-lg text-green-600 mt-4">Цена: {{ $product->price }} грн</p>

        <form action="{{ route('cart.add', $product) }}" method="POST">
            @csrf
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                🛒 Добавить в корзину
            </button>
        </form>
    </div>
@endsection
