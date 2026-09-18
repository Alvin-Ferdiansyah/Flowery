<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Keranjang | Flowery</title>
    <style>
        :root {
            --pink: #d94f79;
            --ink: #292728;
            --muted: #746d70;
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
            justify-content: space-between;
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
            width: min(950px, 88%);
            margin: 45px auto
        }

        h1 {
            font-size: 30px
        }

        .notice {
            margin: 18px 0;
            padding: 13px;
            background: #edf8f0;
            color: #28703a;
            font-size: 14px
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 300px;
            gap: 30px
        }

        .item {
            display: flex;
            gap: 16px;
            padding: 15px 0;
            border-bottom: 1px solid #eee
        }

        .item img {
            width: 100px;
            height: 105px;
            object-fit: cover
        }

        .item h3 {
            margin: 3px 0 9px;
            font-size: 17px
        }

        .item p {
            margin: 5px 0;
            color: var(--muted);
            font-size: 13px
        }

        .item b {
            color: var(--pink)
        }

        .remove {
            align-self: center;
            margin-left: auto;
            border: 0;
            background: transparent;
            color: #a55c70;
            cursor: pointer;
            font-size: 22px
        }

        .summary {
            height: max-content;
            padding: 22px;
            background: var(--soft)
        }

        .summary h2 {
            margin-top: 0;
            font-size: 19px
        }

        .total {
            display: flex;
            justify-content: space-between;
            margin: 20px 0;
            font-size: 18px;
            font-weight: bold
        }

        .btn {
            display: block;
            padding: 14px;
            background: var(--pink);
            color: white;
            text-align: center;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold
        }

        .empty {
            padding: 40px 0;
            color: var(--muted)
        }

        @media(max-width:680px) {
            .grid {
                grid-template-columns: 1fr
            }

            .item img {
                width: 82px;
                height: 88px
            }
        }

        body { background: #fffafa; font-family: Georgia, 'Times New Roman', serif; }
        nav { height: 82px; background: rgba(255,255,255,.92); box-shadow: 0 1px 0 #f6e6eb; }
        .logo { font-family: Georgia, serif; font-size: 32px; }
        nav > a:last-child { border: 1px solid #f0d6df; border-radius: 999px; color: #6c565d; font-family: Arial, sans-serif; font-size: 13px; font-weight: bold; padding: 11px 16px; text-decoration: none; transition: .2s; }
        nav > a:last-child:hover { background: #fff0f4; color: var(--pink); }
        main { margin: 56px auto; }
        h1 { font-size: 38px; margin-bottom: 8px; }
        .grid { align-items: start; gap: 36px; }
        .grid > div { background: white; border: 1px solid #f3e1e6; border-radius: 20px; box-shadow: 0 10px 30px #9d5d7012; padding: 0 22px; }
        .item { padding: 22px 0; }
        .item img { border-radius: 13px; box-shadow: 0 6px 15px #9d5d7024; }
        .item h3, .summary h2 { font-family: Georgia, serif; }
        .remove { border-radius: 50%; height: 36px; width: 36px; transition: .2s; }
        .remove:hover { background: #fff0f4; color: var(--pink); }
        .summary { border-radius: 20px; background: #33292c; box-shadow: 0 14px 30px #3921262b; color: white; padding: 26px; }
        .summary h2 { color: white; font-size: 23px; }
        .total { border-top: 1px solid #ffffff2e; padding-top: 18px; }
        .btn { border-radius: 10px; transition: .2s; }
        .btn:hover { background: #bd3d65; }
        .empty { margin-top: 25px; border: 1px dashed #edcbd5; border-radius: 20px; background: white; padding: 56px 30px; text-align: center; }
        .empty a { color: var(--pink); font-weight: bold; }
    </style>
</head>

<body>
    <nav><a class="logo" href="{{ route('home') }}">Flowery<span>.</span></a><a href="{{ route('home') }}">← Kembali ke beranda</a></nav>
    <main>
        <h1>Keranjang Belanja</h1>@if(session('success'))<div class="notice">{{ session('success') }}</div>@endif @if(count($items))<div class="grid">
            <div>@foreach($items as $item)<article class="item"><img src="{{ $item['image'] }}" alt="{{ $item['name'] }}">
                    <div>
                        <h3>{{ $item['name'] }}</h3>
                        <p>Ukuran: {{ $item['size'] }}</p>@if($item['custom_note'])<p>Kustomisasi: {{ $item['custom_note'] }}</p>@endif @if($item['card_message'])<p>Kartu: “{{ $item['card_message'] }}”</p>@endif<b>Rp{{ number_format($item['price'],0,',','.') }}</b>
                    </div><form method="POST" action="{{ route('cart.destroy', $item['id']) }}">@csrf @method('DELETE')<button class="remove" type="submit" aria-label="Hapus {{ $item['name'] }}">×</button></form>
                </article>@endforeach</div>
            <aside class="summary">
                <h2>Ringkasan Pesanan</h2>
                <div class="total"><span>Total</span><span>Rp{{ number_format(array_sum(array_column($items,'price')),0,',','.') }}</span></div><a class="btn" href="{{ route('checkout') }}">LANJUT CHECKOUT</a>
            </aside>
        </div>@else<div class="empty">Keranjangmu masih kosong. <a href="{{ url('/#produk') }}">Lihat koleksi buket artificial</a></div>@endif
    </main>
</body>

</html>
