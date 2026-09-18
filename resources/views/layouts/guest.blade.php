<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Flowery | Akun</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen bg-rose-50 p-4 lg:flex lg:items-center lg:justify-center lg:p-10">
            <div class="grid w-full max-w-5xl overflow-hidden rounded-3xl bg-white shadow-2xl shadow-rose-200/50 lg:grid-cols-2">
                <aside class="relative hidden min-h-[650px] overflow-hidden bg-rose-500 lg:block">
                    <img class="absolute inset-0 h-full w-full object-cover opacity-75" src="https://images.pexels.com/photos/15290949/pexels-photo-15290949.jpeg?auto=compress&cs=tinysrgb&w=1200" alt="Rangkaian bunga Flowery">
                    <div class="absolute inset-0 bg-gradient-to-t from-rose-950/75 via-rose-700/25"></div>
                    <div class="relative flex h-full flex-col justify-between p-10 text-white"><a href="{{ route('home') }}" class="font-serif text-4xl font-semibold">Flowery.</a><div><p class="text-sm font-bold tracking-[0.2em] text-rose-100">BUAT MOMEN LEBIH BERARTI</p><h1 class="mt-3 font-serif text-4xl leading-tight">Buket cantik untuk setiap cerita.</h1><p class="mt-4 max-w-sm text-sm leading-6 text-rose-50">Masuk atau daftar untuk menyimpan pesanan dan menikmati koleksi Flowery.</p></div></div>
                </aside>
                <div class="flex min-h-[650px] items-center px-6 py-10 sm:px-12">
                    <div class="w-full"><a href="{{ route('home') }}" class="mb-8 block text-center font-serif text-4xl font-semibold tracking-tight text-pink-600 lg:hidden">Flowery.</a>{{ $slot }}</div>
                </div>
            </div>
        </div>
    </body>
</html>
