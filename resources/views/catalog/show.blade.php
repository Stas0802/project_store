@extends('layouts.main')

@section('title', $category->name)

@section('content')
    <h2 class="text-xl font-bold mb-4">Товары категории: {{ $category->name }}</h2>

    <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
        @foreach($products as $product)
            <a href="{{ route('product.show', $product) }}">
                <div class="bg-white rounded shadow p-4">
                    <img src="{{ asset('storage/product/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-40 object-cover mb-2 rounded">
                    <h3 class="text-sm font-semibold">{{ $product->name }}</h3>
                    <p class="text-gray-600 text-sm">Цена: {{ $product->price }} грн</p>
                </div>
            </a>
        @endforeach
    </div>
@endsection
