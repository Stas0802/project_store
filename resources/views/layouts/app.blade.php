<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/css/admin.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100">

    <div class="flex min-h-screen">

        {{-- Сайдбар --}}
        <aside class="w-64 bg-gray-700 shadow-lg flex flex-col">
            <nav class="flex-1 flex flex-col space-y-3 px-4 mt-10">
              <div>
                  <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                      {{ __('Dashboard') }}
                  </x-nav-link>
              </div>

                <div>
                    <x-nav-link :href="route('user.index')" :active="request()->routeIs('user.index')">
                        {{ __('Users') }}
                    </x-nav-link>
                </div>

                <div>
                    <x-nav-link :href="route('product.index')" :active="request()->routeIs('product.index')">
                        {{ __('Products') }}
                    </x-nav-link>
                </div>

                <div>
                    <x-nav-link :href="route('category.index')" :active="request()->routeIs('category.index')">
                        {{ __('Categories') }}
                    </x-nav-link>
                </div>

                <div>
                    <x-nav-link :href="route('order.index')" :active="request()->routeIs('order.index')">
                        {{ __('Orders') }}
                    </x-nav-link>
                </div>

                @if(Auth::user()->is_admin)
                 <div>
                     <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edite')">
                         {{ __('Profile Admin') }}
                     </x-nav-link>
                 </div>

                <div>
                    <x-nav-link :href="route('user.create')" :active="request()->routeIs('user.create')">
                        {{ __('Add user') }}
                    </x-nav-link>
                </div>

                <div>
                    <x-nav-link :href="route('product.create')" :active="request()->routeIs('product.create')">
                        {{ __('Add product') }}
                    </x-nav-link>
                </div>
                    <div>
                        <x-nav-link :href="route('category.create')" :active="request()->routeIs('category.create')">
                            {{ __('Add category') }}
                        </x-nav-link>
                    </div>
                @endif
            </nav>
        </aside>
        <main class="flex-1 p-6">
            @if(session('success'))
                <x-show-message type="success" :message="session('success')" />
            @endif
            @if(session('error'))
                <x-show-message type="error" :message="session('error')" />
            @endif
                <div class="fixed top-4 right-6 z-50 flex items-center space-x-4 text-xl font-medium">&#128100;
                    <span  class="text-gray-700">{{ Auth::user()->name }} </span>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="px-3 py-1 border border-gray-400 rounded-md bg-white text-black hover:text-red-600 hover:border-red-600 transition-colors duration-300">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </div>
            {{ $slot }}
        </main>

    </div>
    </body>
</html>
