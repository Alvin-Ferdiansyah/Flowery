<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Keranjang Belanja | Flowery</title>
    <style>
        :root {
            --pink: #d94f79;
            --pink-dark: #bd3d65;
            --ink: #2b2527;
            --muted: #6e6467;
            --soft: #fff5f8;
            --border: #f2d9e1;
        }

        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            color: var(--ink);
            background: #fffafa;
        }

        nav {
            height: 76px;
            padding: 0 8%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: rgba(255, 255, 255, 0.95);
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .logo {
            color: var(--pink);
            font-family: Georgia, serif;
            font-size: 30px;
            font-weight: bold;
            text-decoration: none;
        }

        .logo span {
            color: var(--ink);
        }

        .nav-back {
            border: 1px solid var(--border);
            border-radius: 4px;
            color: var(--muted);
            font-size: 13px;
            font-weight: bold;
            padding: 9px 16px;
            text-decoration: none;
            transition: .2s;
        }

        .nav-back:hover {
            background: var(--soft);
            color: var(--pink);
        }

        main {
            width: min(1080px, 92%);
            margin: 36px auto 70px;
        }

        .page-header h1 {
            font-family: Georgia, serif;
            font-size: 34px;
            margin: 0 0 6px;
        }

        .page-header p {
            color: var(--muted);
            margin: 0 0 24px;
            font-size: 14px;
        }

        .notice {
            margin-bottom: 22px;
            padding: 12px 18px;
            background: #e8f8ed;
            color: #1e7e34;
            border-radius: 4px;
            font-size: 14px;
            border: 1px solid #c3e6cb;
        }

        .cart-grid {
            display: grid;
            grid-template-columns: 1.6fr 1fr;
            gap: 32px;
            align-items: start;
        }

        /* Cart Items Box */
        .cart-items-container {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 6px;
            padding: 0 24px;
            box-shadow: 0 6px 20px rgba(157, 93, 112, 0.05);
        }

        .cart-item {
            display: flex;
            gap: 20px;
            padding: 22px 0;
            border-bottom: 1px solid #fae8ee;
        }

        .cart-item:last-child {
            border-bottom: 0;
        }

        .cart-item-img {
            width: 110px;
            height: 115px;
            object-fit: cover;
            border-radius: 6px;
            box-shadow: 0 4px 12px rgba(157, 93, 112, 0.12);
        }

        .cart-item-body {
            flex: 1;
        }

        .cart-item-body h3 {
            margin: 0 0 6px;
            font-family: Georgia, serif;
            font-size: 18px;
            color: var(--ink);
        }

        .item-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            margin-bottom: 8px;
        }

        .item-tag {
            display: inline-block;
            padding: 3px 8px;
            background: var(--soft);
            color: var(--pink);
            border-radius: 3px;
            font-size: 11px;
            font-weight: 600;
        }

        .item-details p {
            margin: 3px 0;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.4;
        }

        .item-price {
            display: block;
            margin-top: 10px;
            color: var(--pink);
            font-weight: bold;
            font-size: 16px;
        }

        .remove-btn {
            background: transparent;
            border: 1px solid #ebd0da;
            border-radius: 4px;
            color: #b05e73;
            cursor: pointer;
            padding: 6px 10px;
            font-size: 12px;
            font-weight: bold;
            height: max-content;
            transition: .2s;
        }

        .remove-btn:hover {
            background: #ffebee;
            color: #c62828;
            border-color: #ffcdd2;
        }

        /* Order Summary Box */
        .summary-card {
            background: #2b2326;
            color: white;
            border-radius: 6px;
            padding: 28px;
            box-shadow: 0 10px 30px rgba(43, 35, 38, 0.25);
        }

        .summary-card h2 {
            font-family: Georgia, serif;
            font-size: 22px;
            margin: 0 0 18px;
            padding-bottom: 14px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
        }

        .cost-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            font-size: 14px;
            color: #dccfd3;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            padding-top: 18px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            font-size: 18px;
            font-weight: bold;
            color: white;
        }

        .total-row span.price {
            color: #ff88aa;
        }

        /* BUTTON KOTAK TANPA PANAH */
        .btn-checkout {
            display: block;
            width: 100%;
            margin-top: 22px;
            padding: 14px 20px;
            background: var(--pink);
            color: white;
            font-weight: bold;
            font-size: 14px;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
            border: 0;
            cursor: pointer;
            transition: .2s;
        }

        .btn-checkout:hover {
            background: var(--pink-dark);
        }

        /* PROMO & PERKS SECTION (Agar halaman tidak kosong) */
        .cart-perks {
            margin-top: 35px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
        }

        .perk-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 6px;
            padding: 20px 18px;
            text-align: center;
        }

        .perk-card .icon {
            font-size: 26px;
            margin-bottom: 8px;
            display: block;
        }

        .perk-card h4 {
            margin: 0 0 4px;
            font-size: 14px;
            font-weight: bold;
            color: var(--ink);
        }

        .perk-card p {
            margin: 0;
            font-size: 12px;
            color: var(--muted);
            line-height: 1.4;
        }

        .voucher-box {
            margin-top: 18px;
            padding: 14px;
            background: rgba(255, 255, 255, 0.08);
            border: 1px dashed rgba(255, 255, 255, 0.25);
            border-radius: 4px;
            font-size: 12px;
            color: #fce8ee;
        }

        .empty-cart {
            background: white;
            border: 1px dashed #ebd0da;
            border-radius: 6px;
            padding: 60px 24px;
            text-align: center;
        }

        @media(max-width: 800px) {
            .cart-grid {
                grid-template-columns: 1fr;
            }
            .cart-perks {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <nav>
        <a class="logo" href="{{ route('home') }}">Flowery<span>.</span></a>
        <a class="nav-back" href="{{ route('collections.index') }}">Lanjut Belanja</a>
    </nav>

    <main>
        <div class="page-header">
            <h1>Keranjang Belanja</h1>
            <p>Periksa pesanan buket bunga pilihanmu sebelum melanjutkan ke pembayaran.</p>
        </div>

        @if(session('success'))
            <div class="notice">{{ session('success') }}</div>
        @endif

        @if(count($items))
            @php
                $subtotal = array_sum(array_column($items, 'price'));
            @endphp

            <div class="cart-grid">
                <!-- DAFTAR ITEM DI KERANJANG -->
                <div class="cart-items-container">
                    @foreach($items as $item)
                        <article class="cart-item">
                            <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="cart-item-img">
                            <div class="cart-item-body">
                                <h3>{{ $item['name'] }}</h3>

                                <div class="item-tags">
                                    <span class="item-tag">Ukuran: {{ $item['size'] }}</span>
                                    @if(!empty($item['wrapping_color']))
                                        <span class="item-tag">Wrapping: {{ $item['wrapping_color'] }}</span>
                                    @endif
                                    @if(!empty($item['ribbon_color']))
                                        <span class="item-tag">Pita: {{ $item['ribbon_color'] }}</span>
                                    @endif
                                </div>

                                <div class="item-details">
                                    @if(!empty($item['flower_tone']))
                                        <p><strong>🌸 Tone:</strong> {{ $item['flower_tone'] }}</p>
                                    @endif
                                    @if(!empty($item['extra_addons']) && is_array($item['extra_addons']))
                                        <p><strong>✨ Add-ons:</strong> {{ implode(', ', array_map(fn($a) => ucwords(str_replace('_', ' ', $a)), $item['extra_addons'])) }}</p>
                                    @endif
                                    @if($item['custom_note'])
                                        <p><strong>Catatan:</strong> {{ $item['custom_note'] }}</p>
                                    @endif
                                    @if($item['card_message'])
                                        <p><strong>Kartu:</strong> “{{ $item['card_message'] }}”</p>
                                    @endif
                                </div>

                                <span class="item-price">Rp{{ number_format($item['price'], 0, ',', '.') }}</span>
                            </div>

                            <form method="POST" action="{{ route('cart.destroy', $item['id']) }}">
                                @csrf
                                @method('DELETE')
                                <button class="remove-btn" type="submit">Hapus</button>
                            </form>
                        </article>
                    @endforeach
                </div>

                <!-- RINGKASAN TAGIHAN -->
                <aside class="summary-card">
                    <h2>Ringkasan Pesanan</h2>

                    <div class="cost-row">
                        <span>Total Produk ({{ count($items) }} buket)</span>
                        <span>Rp{{ number_format($subtotal, 0, ',', '.') }}</span>
                    </div>
                    <div class="cost-row">
                        <span>Estimasi Pengemasan</span>
                        <span style="color:#6be094;">GRATIS (Gift Wrap)</span>
                    </div>
                    <div class="cost-row">
                        <span>Kartu Ucapan Personalisasi</span>
                        <span style="color:#6be094;">GRATIS</span>
                    </div>

                    <div class="voucher-box">
                        💡 <strong>Promo Ongkir:</strong> Belanja buket minimal Rp300.000 untuk menikmati <strong>Gratis Ongkir Reguler</strong> saat checkout.
                    </div>

                    <div class="total-row">
                        <span>Subtotal Tagihan</span>
                        <span class="price">Rp{{ number_format($subtotal, 0, ',', '.') }}</span>
                    </div>

                    <a class="btn-checkout" href="{{ route('checkout') }}">LANJUT KE CHECKOUT</a>
                </aside>
            </div>

            <!-- PERKS & FITUR KEUNGGULAN AGAR KERANJANG TIDAK POLOS -->
            <div class="cart-perks">
                <div class="perk-card">
                    <span class="icon">🌸</span>
                    <h4>Bunga Artificial Premium</h4>
                    <p>Bahan silk & latex berkualitas tinggi dengan tampilan kelopak sangat natural dan tahan bertahun-tahun.</p>
                </div>
                <div class="perk-card">
                    <span class="icon">🎀</span>
                    <h4>Dirangkai Khusus (Custom)</h4>
                    <p>Setiap buket dirangkai rapi oleh florist profesional Flowery sesuai warna pita & kustomisasi pilihanmu.</p>
                </div>
                <div class="perk-card">
                    <span class="icon">🛡️</span>
                    <h4>Kemasan Box & Garansi Aman</h4>
                    <p>Paket bunga dibungkus bubble wrap dan kardus tebal untuk menjamin bunga tiba tanpa rusak ataupun penyok.</p>
                </div>
            </div>

        @else
            <div class="empty-cart">
                <h3 style="font-size:22px;margin:0 0 8px;font-family:Georgia,serif;">Keranjangmu Masih Kosong</h3>
                <p style="color:var(--muted);margin:0 0 20px;">Belum ada buket bunga yang kamu pilih. Ayo temukan rangkaian bunga favoritmu!</p>
                <a href="{{ route('collections.index') }}" class="btn-checkout" style="display:inline-block;width:auto;padding:12px 28px;">
                    Jelajahi Koleksi Bunga
                </a>
            </div>
        @endif
    </main>
</body>

</html>
