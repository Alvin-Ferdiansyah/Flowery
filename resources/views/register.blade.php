<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar | Flowery</title>

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

        /* TOMBOL KEMBALI */

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

        /* GAMBAR */

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
            margin-bottom: 35px;

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
            margin: 10px 0 28px;

            color: #777;

            font-size: 13px;
            line-height: 1.6;
        }

        .form-group {
            margin-bottom: 16px;
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
            height: 44px;

            padding: 0 14px;

            border: 1px solid #ddd3d6;
            border-radius: 5px;

            outline: none;

            font-size: 13px;
        }

        input:focus {
            border-color: #df4d7b;

            box-shadow:
                0 0 0 3px rgba(223, 77, 123, .08);
        }

        .error {
            margin-top: 6px;

            color: #dc3545;

            font-size: 11px;
        }

        /* BUTTON DAFTAR */

        .register-button {
            width: 100%;
            height: 47px;

            margin-top: 8px;

            border: 0;
            border-radius: 5px;

            background: #df4d7b;
            color: white;

            font-size: 13px;
            font-weight: bold;

            cursor: pointer;
        }

        .register-button:hover {
            background: #c93b69;
        }

        .divider {
            display: flex;
            align-items: center;
            gap: 12px;

            margin: 22px 0;

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

        .login-text {
            color: #777;

            text-align: center;

            font-size: 12px;
        }

        .login-text a {
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


    <!-- TOMBOL KEMBALI KANAN ATAS -->

    <a href="{{ url('/') }}" class="back-home">
        ← Kembali
    </a>


    <div class="auth-page">


        <!-- GAMBAR -->

        <div class="auth-image">

            <div class="image-content">

                <h2>
                    Bergabung
                    dengan Flowery.
                </h2>

                <p>
                    Buat akun dan temukan berbagai
                    pilihan buket bunga artificial untuk
                    setiap momen spesial.
                </p>

            </div>

        </div>


        <!-- FORM REGISTER -->

        <div class="auth-form-area">

            <div class="auth-box">


                <a
                    href="{{ url('/') }}"
                    class="logo"
                >
                    Flowery<span>.</span>
                </a>


                <h1 class="title">
                    Daftar
                </h1>


                <p class="subtitle">
                    Buat akun Flowery untuk memudahkan
                    proses pemesanan bunga artificial.
                </p>


                <form
                    method="POST"
                    action="{{ route('register') }}"
                >

                    @csrf


                    <!-- NAMA -->

                    <div class="form-group">

                        <label for="name">
                            Nama Lengkap
                        </label>

                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Masukkan nama lengkap"
                            required
                            autofocus
                        >

                        @error('name')

                            <div class="error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


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
                            placeholder="Minimal 8 karakter"
                            required
                        >

                        @error('password')

                            <div class="error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <!-- KONFIRMASI PASSWORD -->

                    <div class="form-group">

                        <label for="password_confirmation">
                            Konfirmasi Password
                        </label>

                        <input
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            placeholder="Ulangi password"
                            required
                        >

                        @error('password_confirmation')

                            <div class="error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <!-- DAFTAR -->

                    <button
                        type="submit"
                        class="register-button"
                    >
                        Daftar
                    </button>

                </form>


                <div class="divider">
                    atau
                </div>


                <div class="login-text">

                    Sudah punya akun?

                    <a href="{{ route('login') }}">
                        Login sekarang
                    </a>

                </div>

            </div>

        </div>

    </div>

</body>

</html>