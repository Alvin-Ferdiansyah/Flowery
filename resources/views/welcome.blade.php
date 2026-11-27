<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @fonts

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #FDFDFC;
            color: #1b1b18;
        }

        header {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 12px;
            padding: 20px 24px;
        }

        header a {
            display: inline-block;
            padding: 8px 18px;
            border-radius: 6px;
            font-size: 14px;
            text-decoration: none;
            color: inherit;
        }

        header a.primary {
            border: 1px solid #19140035;
        }
    </style>
</head>

<body>
    <header>
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}" class="primary">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="primary">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="primary">Register</a>
                @endif
            @endauth
        @endif
    </header>
</body>

</html>
