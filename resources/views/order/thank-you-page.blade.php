@extends('layouts.main')

@section('content')
    <div class="flex items-center justify-center min-h-[60vh]">
        <div class="max-w-xl w-full bg-green-50 border border-green-400 rounded-xl shadow-lg p-8 text-center">
            <h2 class="text-2xl font-bold text-green-700 mb-4">Спасибо за покупку!</h2>
            <p class="text-gray-700 text-lg mb-6">Ваш заказ успешно оформлен и скоро будет обработан.</p>
            <a href="{{ route('catalog.index') }}"
               class="inline-block px-6 py-3
               bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                Вернуться к товарам
            </a>
        </div>
    </div>
@endsection
