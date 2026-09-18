<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | Flowery</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
            background: #fff7f8;
        }

        /* TOMBOL KEMBALI KANAN ATAS */

        .back-home {
            position: fixed;
            top: 25px;
            right: 30px;
            z-index: 100;

            padding: 11px 22px;
            border-radius: 5px;

            background: #df4d7b;
            color: white;

            font-size: 12px;
            font-weight: bold;
            text-decoration: none;

            transition: .2s;
        }

        .back-home:hover {
            background: #c93b69;
        }

        /* HALAMAN */

        .auth-page {
            min-height: 100vh;
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        /* BAGIAN GAMBAR */

        .auth-image {
            position: relative;
            min-height: 100vh;

            background-image:
                linear-gradient(
                    rgba(91, 45, 53, .12),
                    rgba(91, 45, 53, .30)
                ),
                url('https://images.unsplash.com/photo-1523438885200-e635ba2c371e?auto=format&fit=crop&w=1200&q=85');

            background-size: cover;
            background-position: center;
        }

        .image-content {
            position: absolute;
            left: 55px;
            bottom: 55px;
            max-width: 430px;
            color: white;
        }

        .image-content h2 {
            margin: 0 0 12px;
            font-family: Georgia, serif;
            font-size: 43px;
            line-height: 1.05;
        }

        .image-content p {
            margin: 0;
            font-size: 14px;
            line-height: 1.7;
        }

        /* FORM */

        .auth-form-area {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
            background: #fff;
        }

        .auth-box {
            width: min(420px, 100%);
        }

        .logo {
            display: inline-block;
            margin-bottom: 45px;

            color: #d93670;
            font-family: Georgia, serif;
            font-size: 30px;
            font-weight: bold;
            text-decoration: none;
        }

        .logo span {
            color: #302b2d;
        }

        .title {
            margin: 0;
            color: #292526;
            font-family: Georgia, serif;
            font-size: 34px;
            font-weight: 500;
        }

        .subtitle {
            margin: 10px 0 30px;
            color: #777;
            font-size: 13px;
            line-height: 1.6;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            color: #40393b;
            font-size: 12px;
            font-weight: 600;
        }

        input {
            width: 100%;
            height: 46px;
            padding: 0 14px;

            border: 1px solid #ddd3d6;
            border-radius: 5px;

            outline: none;
            font-size: 13px;
        }

        input:focus {
            border-color: #df4d7b;
            box-shadow: 0 0 0 3px rgba(223, 77, 123, .08);
        }

        .error {
            margin-top: 6px;
            color: #dc3545;
            font-size: 11px;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 8px;

            margin: 8px 0 20px;

            color: #777;
            font-size: 12px;
        }

        .remember input {
            width: 15px;
            height: 15px;
        }

        /* BUTTON LOGIN */

        .login-button {
            width: 100%;
            height: 47px;

            border: 0;
            border-radius: 5px;

            background: #df4d7b;
            color: white;

            font-size: 13px;
            font-weight: bold;

            cursor: pointer;
        }

        .login-button:hover {
            background: #c93b69;
        }

        .forgot {
            display: block;
            margin-top: 13px;

            color: #df4d7b;
            text-align: right;

            font-size: 11px;
        }

        .divider {
            display: flex;
            align-items: center;
            gap: 12px;

            margin: 25px 0;

            color: #aaa;
            font-size: 11px;
        }

        .divider::before,
        .divider::after {
            content: "";
            height: 1px;
            flex: 1;
            background: #eee;
        }

        .register-text {
            color: #777;
            text-align: center;
            font-size: 12px;
        }

        .register-text a {
            color: #df4d7b;
            font-weight: bold;
            text-decoration: none;
        }

        /* RESPONSIVE */

        @media (max-width: 800px) {

            .auth-page {
                grid-template-columns: 1fr;
            }

            .auth-image {
                display: none;
            }

            .auth-form-area {
                min-height: 100vh;
                padding: 30px;
            }

            .back-home {
                top: 18px;
                right: 18px;
                padding: 9px 16px;
            }
        }
    </style>

</head>

<body>

    <!-- TOMBOL KEMBALI -->

    <a href="{{ url('/') }}" class="back-home">
        ← Kembali
    </a>


    <div class="auth-page">

        <!-- GAMBAR BUKET -->

        <div class="auth-image">

            <div class="image-content">

                <h2>
                    Selamat Datang
                    di Flowery.
                </h2>

                <p>
                    Temukan buket bunga artificial cantik
                    untuk hadiah dan momen spesialmu.
                </p>

            </div>

        </div>


        <!-- FORM LOGIN -->

        <div class="auth-form-area">

            <div class="auth-box">

                <a href="{{ url('/') }}" class="logo">
                    Flowery<span>.</span>
                </a>


                <h1 class="title">
                    Login
                </h1>

                <p class="subtitle">
                    Masuk ke akun Flowery untuk melanjutkan pesananmu.
                </p>


                @if ($errors->any())

                    <div class="error" style="margin-bottom:20px;">
                        Email atau password yang kamu masukkan salah.
                    </div>

                @endif


                <form method="POST" action="{{ route('login') }}">

                    @csrf


                    <!-- EMAIL -->

                    <div class="form-group">

                        <label for="email">
                            Email
                        </label>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="Masukkan email"
                            required
                            autofocus
                        >

                        @error('email')

                            <div class="error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <!-- PASSWORD -->

                    <div class="form-group">

                        <label for="password">
                            Password
                        </label>

                        <input
                            id="password"
                            type="password"
                            name="password"
                            placeholder="Masukkan password"
                            required
                        >

                        @error('password')

                            <div class="error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <!-- INGAT SAYA -->

                    <label class="remember">

                        <input
                            type="checkbox"
                            name="remember"
                        >

                        Ingat saya

                    </label>


                    <!-- LOGIN -->

                    <button
                        type="submit"
                        class="login-button"
                    >
                        Login
                    </button>


                    <a href="#" class="forgot">
                        Lupa password?
                    </a>

                </form>


                <div class="divider">
                    atau
                </div>


                <div class="register-text">

                    Belum punya akun?

                    <a href="{{ route('register') }}">
                        Daftar sekarang
                    </a>

                </div>

            </div>

        </div>

    </div>

</body>

</html>