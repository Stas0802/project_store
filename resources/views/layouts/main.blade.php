<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Главная')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-500 font-sans leading-normal tracking-normal text-gray-800 min-h-screen flex flex-col">
{{--Header--}}
<header class="bg-white shadow-xl">
    <div class="container mx-auto px-4 py-6 flex justify-between items-center h-40">
        <a href="{{route('catalog.index')}}" class="w-full md:w-auto">
            <h1 class="text-4xl font-bold bg-gradient-to-r from-green-600 via-blue-500 to-pink-700 text-transparent bg-clip-text">Sport Market</h1>
        </a>
        <div class="flex flex-col w-full md:w-auto">
            <div>&#9742; <i>+38 (044) 123-45-67</i></div>
            <div>&#128205; <i> г. Киев, ул. Спортивная, 12</i></div>
            <div>&#128233; <i> info@sportmarket.ua</i></div>
        </div>
       <div class="w-full md:w-auto flex justify-center md:justify-start">
           <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQHrCHnbUxjP8kwY3vsAaU_BxzltVwNFklW7Q&s"
                alt="">
       </div>
        <nav>
            <a href="{{ route('cart.index') }}" class="flex items-center text-gray-600 hover:text-gray-900">
                <span class="text-2xl">&#128722;</span>
                @if($count > 0)
                    <span class="ml-1 inline-block bg-red-500 text-white text-xs px-2 py-0.5 rounded-full">{{ $count }}</span>
                @endif
            </a>
        </nav>
    </div>
</header>
<main class="flex-grow container mx-auto px-4 py-8">
    @if(session('success'))
        <x-show-message type="success" :message="session('success')" />
    @endif
    <div class="flex gap-4">
        {{-- Левая колонка --}}
        @if(!empty($sidebar))
            <div class="w-1/4 flex flex-col space-y-4 p-4 text-left text-sm">
                <div class=" h-full rounded  text-center text-sm  space-y-4">
                    <iframe
                        width="100%"
                        height="250"
                        src="https://www.youtube.com/embed/BwDVlnQh-Yw?autoplay=1&mute=1&loop=1&playlist=BwDVlnQh-Yw"
                        title="YouTube video"
                        frameborder="0"
                        allow="autoplay; encrypted-media"
                        allowfullscreen
                        class="rounded shadow">
                    </iframe>
                    <img src="https://vertical-odessa.com/wp-content/uploads/2025/03/1920_745-2-1.png" alt="">
                    <img src="https://vertical-odessa.com/wp-content/uploads/2023/10/%D0%91%D0%BE%D0%BA%D1%81-%D0%B6%D0%B5%D0%BD-%D0%92%D0%B8%D0%BB%D1%8C%D1%8F%D0%BC%D1%81%D0%B0-%D1%81%D0%B0%D0%B9%D1%82-2.jpg" alt="">
                </div>
            </div>
        @endif
        {{-- Контент --}}
        <div class="{{ !empty($sidebar) ? 'w-3/4' : 'w-full' }}">
            @yield('content')
        </div>
    </div>
</main>
<!-- Footer -->
<footer class="bg-white border-t">
    <div class="container mx-auto px-4 py-6 text-center text-sm text-gray-500">
        © {{ date('Y') }} Мой сайт.
    </div>
</footer>

</body>
{{--<script>--}}
{{--    setTimeout(function (){--}}
{{--       const alert = document.querySelector('.alert-success')--}}
{{--        if(alert){--}}
{{--            alert.style.display = 'none';--}}
{{--        }--}}
{{--    }, 3000);--}}
{{--</script>--}}
</html>
