@extends('layouts.main')

@section('title', $product->name)

@section('content')
    <div class="flex flex-col md:flex-row justify-center md:justify-between items-start md:space-x-8 p-4">
        <div class="w-full md:w-1/2 flex flex-col items-center md:items-start mb-4 md:mb-0">
            <img src="{{ asset('storage/product/' . $product->image) }}" alt="{{ $product->name }}"
                 class="w-full max-w-md h-full object-cover rounded shadow mb-4">
            <h2 class="text-xl font-bold">{{ $product->name }}</h2>
            <p class="text-lg text-white mt-2">Цена: {{ $product->price }} грн</p>
        </div>

        <div class="w-full md:w-1/2 flex flex-col space-y-4 items-end">
            <div class="w-full min-h-96 border bg-white p-6 rounded shadow">
                <p class="text-gray-700">{{ $product->description }}</p>
            </div>

            <form action="{{ route('cart.add', $product) }}" method="POST" class="w-full">
                @csrf
                <button type="submit"
                        class="flex items-center gap-2 px-6 py-3 bg-green-500 text-white font-bold rounded-lg hover:bg-green-600 transition-colors duration-300 w-80 justify-center">
                    <span>Добавить в корзину</span>
                </button>
            </form>
        </div>

    </div>
@endsection
