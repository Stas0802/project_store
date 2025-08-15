@extends('layouts.main', ['sidebar' => true])

@section('title', 'Категории')

@section('content')
    <div class="flex justify-end">
        <div class="flex flex-wrap justify-end gap-12">
            @foreach($categories as $category)
                <a href="{{ route('category.product', $category) }}" class="sm:w-80 md:w-96">
                    <div class="relative group h-52 overflow-hidden rounded-lg shadow">
                        <img src="{{ asset('storage/category/' . $category->image) }}"
                             alt="{{ $category->name }}"
                             class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                        {{-- Верхний прозрачный козырёк с названием --}}
                        <div class="absolute top-0 left-0 w-full h-1/5 bg-black bg-opacity-40 flex items-center px-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <p class="text-white text-lg  font-semibold">{{ $category->name }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    {{--  links paginate  --}}
    <div class="mt-4 ml-12 w-full flex justify-center">
        {{ $categories->links() }}
    </div>
@endsection
