<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Главная')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal text-gray-800 min-h-screen flex flex-col">

<!-- Header -->
<header class="bg-white shadow">
    <div class="container mx-auto px-4 py-6 flex justify-between items-center">
        <a href="{{route('catalog.index')}}">
            <h1 class="text-2xl font-bold text-gray-800">Sport Market</h1>
        </a>
        @php
            $cart = session('cart', []);
            $cartCount = array_sum(array_column($cart, 'quantity'));
        @endphp

        <nav>
            <a href="{{ route('cart.index') }}" class="flex items-center text-gray-600 hover:text-gray-900">
                🛒 <span class="ml-1">Корзина</span>
                @if($cartCount > 0)
                    <span class="ml-1 inline-block bg-red-500 text-white text-xs px-2 py-0.5 rounded-full">{{ $cartCount }}</span>
                @endif
            </a>
        </nav>
    </div>
</header>

<!-- Main -->
<main class="flex-grow container mx-auto px-4 py-8">
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-300 text-green-800 rounded alert-success">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')
</main>

<!-- Footer -->
<footer class="bg-white border-t">
    <div class="container mx-auto px-4 py-6 text-center text-sm text-gray-500">
        © {{ date('Y') }} Мой сайт. Все права защищены.
    </div>
</footer>

</body>
<script>
    setTimeout(function (){
       const alert = document.querySelector('.alert-success')
        if(alert){
            alert.style.display = 'none';
        }
    }, 3000);
</script>
</html>
