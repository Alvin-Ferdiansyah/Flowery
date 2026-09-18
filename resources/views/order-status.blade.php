<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Status Pesanan | Flowery</title>
    <style>
        :root {
            --pink: #d94f79;
            --ink: #292728;
            --soft: #fff4f6
        }

        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif
        }

        body {
            margin: 0;
            color: var(--ink);
            background: var(--soft)
        }

        main {
            width: min(640px, 90%);
            margin: 70px auto;
            padding: 38px;
            background: white;
            text-align: center
        }

        .mark {
            display: grid;
            place-items: center;
            width: 58px;
            height: 58px;
            margin: auto;
            border-radius: 50%;
            background: #f9d9e3;
            color: var(--pink);
            font-size: 25px
        }

        h1 {
            font-size: 28px;
            margin: 18px 0 10px
        }

        p {
            color: #706a6c;
            line-height: 1.6
        }

        .number {
            margin: 22px 0;
            padding: 13px;
            background: var(--soft);
            font-weight: bold
        }

        .status {
            display: flex;
            justify-content: space-between;
            gap: 6px;
            margin: 30px 0;
            font-size: 12px
        }

        .status span {
            flex: 1
        }

        .status i {
            display: block;
            width: 12px;
            height: 12px;
            margin: 0 auto 8px;
            border-radius: 50%;
            background: #ddd
        }

        .status span:first-child i {
            background: var(--pink)
        }

        a {
            color: var(--pink);
            font-size: 14px;
            font-weight: bold
        }
    </style>
</head>

<body>
    <main>@if($order)<div class="mark">✓</div>
        <h1>Pesanan berhasil dikirim</h1>
        <p>Terima kasih, {{ $order['customer']['name'] }}. Admin Flowery akan menghubungi kamu melalui WhatsApp untuk konfirmasi.</p>
        <div class="number">{{ $order['number'] }} · {{ $order['status'] }}</div>
        <div class="status"><span><i></i>Pesanan diterima</span><span><i></i>Dikonfirmasi</span><span><i></i>Diproses</span><span><i></i>Selesai</span></div><a href="https://wa.me/6281234567890" target="_blank">Hubungi admin WhatsApp</a>@else<h1>Belum ada pesanan</h1>
        <p>Nomor dan status pesanan akan muncul di halaman ini setelah checkout.</p><a href="{{ url('/') }}">Kembali ke beranda</a>@endif
    </main>
</body>

</html>