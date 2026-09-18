<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Checkout | Flowery</title>
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
            color: var(--ink)
        }

        nav {
            height: 70px;
            padding: 0 7%;
            display: flex;
            align-items: center;
            border-bottom: 1px solid #eee
        }

        .logo {
            color: var(--pink);
            font-size: 28px;
            font-weight: bold;
            text-decoration: none
        }

        .logo span {
            color: var(--ink)
        }

        main {
            width: min(850px, 88%);
            margin: 42px auto
        }

        h1 {
            font-size: 29px
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 280px;
            gap: 35px
        }

        label {
            display: block;
            margin: 16px 0 6px;
            font-size: 13px;
            font-weight: bold
        }

        input,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px
        }

        textarea {
            height: 92px;
            resize: vertical
        }

        .payment-methods { display: grid; gap: 9px; margin-top: 10px }
        .payment-option { display: flex; align-items: center; gap: 10px; padding: 12px; border: 1px solid #ead4da; border-radius: 7px; cursor: pointer; font-size: 13px }
        .payment-option input { width: auto; accent-color: var(--pink) }

        .summary {
            height: max-content;
            padding: 21px;
            background: var(--soft)
        }

        .summary h2 {
            font-size: 18px;
            margin-top: 0
        }

        .summary p {
            font-size: 13px;
            line-height: 1.5
        }

        .total {
            margin-top: 18px;
            font-size: 18px;
            font-weight: bold
        }

        .btn {
            width: 100%;
            margin-top: 24px;
            padding: 14px;
            border: 0;
            background: var(--pink);
            color: white;
            font-weight: bold;
            cursor: pointer
        }

        .wa {
            display: block;
            margin-top: 13px;
            color: #237843;
            text-align: center;
            font-size: 13px
        }

        @media(max-width:680px) {
            .grid {
                grid-template-columns: 1fr
            }
        }

        body { background: #fffafa; font-family: Georgia, 'Times New Roman', serif; }
        nav { height: 82px; justify-content: space-between; background: rgba(255,255,255,.92); box-shadow: 0 1px 0 #f6e6eb; }
        .logo { font-family: Georgia, serif; font-size: 32px; }
        .back { border: 1px solid #f0d6df; border-radius: 999px; color: #6c565d; font-family: Arial, sans-serif; font-size: 13px; font-weight: bold; padding: 11px 16px; text-decoration: none; transition: .2s; }
        .back:hover { background: #fff0f4; color: var(--pink); }
        main { margin: 56px auto; }
        h1 { font-size: 38px; margin-bottom: 8px; }
        .grid { align-items: start; gap: 36px; }
        form { border: 1px solid #f3e1e6; border-radius: 20px; background: white; box-shadow: 0 10px 30px #9d5d7012; padding: 28px; }
        label, input, textarea, .payment-option, .btn, .wa { font-family: Arial, sans-serif; }
        input, textarea { border-color: #e9d7dc; border-radius: 10px; outline-color: #d94f79; }
        .payment-option { transition: .2s; }
        .payment-option:hover { border-color: #d94f79; background: #fff7f9; }
        .summary { border-radius: 20px; background: #33292c; box-shadow: 0 14px 30px #3921262b; color: white; padding: 26px; }
        .summary h2 { color: white; font-family: Georgia, serif; font-size: 23px; }
        .summary p { color: #e9dfe2; }
        .total { border-top: 1px solid #ffffff2e; padding-top: 18px; }
        .btn { border-radius: 10px; transition: .2s; }
        .btn:hover { background: #bd3d65; }
    </style>
</head>

<body>
    <nav><a class="logo" href="{{ route('home') }}">Flowery<span>.</span></a><a class="back" href="{{ route('cart.index') }}">← Kembali ke keranjang</a></nav>
    <main>
        <h1>Checkout</h1>@if(!count($items))<p>Keranjang kosong. <a href="{{ route('cart.index') }}">Kembali ke keranjang</a></p>@else<div class="grid">
            <form method="POST" action="{{ route('checkout.store') }}">@csrf<label>Nama penerima</label><input name="name" value="{{ old('name', auth()->user()?->name) }}" required><label>Nomor WhatsApp</label><input name="phone" value="{{ old('phone') }}" placeholder="08xxxxxxxxxx" required><label>Alamat pengiriman</label><textarea name="address" required>{{ old('address') }}</textarea><label>Metode pembayaran</label><div class="payment-methods"><label class="payment-option"><input type="radio" name="payment_method" value="midtrans_qris" checked> QRIS melalui Midtrans</label><label class="payment-option"><input type="radio" name="payment_method" value="midtrans_bank_transfer"> Transfer bank melalui Midtrans</label><label class="payment-option"><input type="radio" name="payment_method" value="midtrans_ewallet"> E-Wallet melalui Midtrans</label></div>@error('payment_method')<small>{{ $message }}</small>@enderror<button class="btn">LANJUT KE PEMBAYARAN</button><a class="wa" target="_blank" rel="noopener" href="https://wa.me/6281234567890?text=Halo%20Flowery%2C%20saya%20ingin%20bertanya%20tentang%20pesanan.">Tanya admin melalui WhatsApp</a></form>
            <aside class="summary">
                <h2>Pesananmu</h2>@foreach($items as $item)<p>{{ $item['name'] }} — {{ $item['size'] }}<br><b>Rp{{ number_format($item['price'],0,',','.') }}</b></p>@endforeach<div class="total">Total Rp{{ number_format(array_sum(array_column($items,'price')),0,',','.') }}</div>
                <p style="margin-top:16px;font-size:12px;color:#8a8385;display:flex;align-items:center;gap:6px;">🔒 Pembayaran aman diproses oleh Midtrans (Transfer Bank, QRIS, E-Wallet, Kartu Kredit)</p>
            </aside>
        </div>@endif
    </main>
</body>

</html>
