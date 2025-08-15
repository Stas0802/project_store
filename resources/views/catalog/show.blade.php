@extends('layouts.main', ['sidebar' => true])

@section('title', $category->name)

@section('content')
 <div class="flex justify-end">
     <div class="flex flex-wrap justify-end gap-6">
         @foreach($products as $product)
             <div class="bg-white rounded shadow p-4">
                 <a href="{{ route('product.show', $product) }}">
                     <div class="w-64 h-64 overflow-hidden rounded mb-2">
                         <img src="{{ asset('storage/product/' . $product->image) }}"
                              alt="{{ $product->name }}"
                              class="w-full h-full object-cover">
                     </div>
                     <h3 class="text-sm font-semibold">{{ $product->name }}</h3>
                 </a>
                 <div class="text-lg text-gray-800 mt-2 flex items-center justify-between w-full">
                     <span>Цена: {{ $product->price }} грн</span>

                 <form action="{{ route('cart.add', $product) }}" method="POST">
                     @csrf
                     <button type="submit"
                             class="text-2xl text-green-500 hover:text-green-700 transition-colors duration-300"
                             title="Добавить в корзину">&#128722;
                     </button>
                 </form>
                 </div>
             </div>
         @endforeach
     </div>
 </div>
{{-- links paginate --}}
 <div class="mt-4 w-full flex justify-center">
     {{ $products->links() }}
 </div>
@endsection
