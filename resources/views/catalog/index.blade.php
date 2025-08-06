@extends('layouts.main')

@section('title', 'Категории')

@section('content')
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 px-4 py-8">
        @foreach($categories as $category)
            <a href="{{ route('category.product', $category) }}">
                <div class="flex flex-col items-center text-center space-y-3 bg-white rounded-lg shadow p-4 w-48 h-52"
                >
                    <img src="{{ asset('storage/category/' . $category->image) }}" alt="{{ $category->name }}"
                         class="w-full h-40 object-cover rounded">
                    <p class="mt-3 text-center font-semibold text-gray-800">{{ $category->name }}</p>
                </div>
            </a>
        @endforeach
    </div>
@endsection
