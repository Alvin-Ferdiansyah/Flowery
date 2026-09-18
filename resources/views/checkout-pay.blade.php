<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran | Flowery</title>
    <style>
        body {
            margin: 0;
            background: #fff6f8;
            color: #342b2e;
            font-family: Arial, sans-serif
        }

        .card {
            width: min(520px, 88%);
            margin: 90px auto;
            padding: 35px;
            border-radius: 18px;
            background: #fff;
            box-shadow: 0 14px 35px #9d5d7026
        }

        h1 {
            font-family: Georgia, serif;
            margin-top: 0
        }

        .tag {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 99px;
            background: #fff0d9;
            color: #946114;
            font-size: 12px
        }

        a {
            color: #d94f79;
            text-decoration: none;
            font-weight: 700
        }
    </style>
</head>

<body>
    <main class="card"><span class="tag">PESANAN {{ $order->order_number }}</span>
        <h1>Menyiapkan pembayaran</h1>
        <p>Total pesanan: <strong>Rp{{ number_format($order->total, 0, ',', '.') }}</strong></p>@if ($midtransAvailable && $snapToken)<p>Jendela pembayaran Midtrans akan terbuka otomatis. Pilih metode pembayaran yang tersedia di sana.</p>@else<p>Integrasi Midtrans belum siap karena SDK atau kunci Midtrans belum dikonfigurasi. Pesanan Anda sudah tercatat sebagai menunggu pembayaran.</p>@endif<a href="{{ route('home') }}">Kembali ke beranda</a>
    </main>@if ($midtransAvailable && $snapToken)<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ $clientKey }}"></script>
    <script>
        window.snap.pay('{{ $snapToken }}');
    </script>@endif
</body>

</html>