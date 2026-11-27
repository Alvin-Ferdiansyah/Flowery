<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Checkout Lengkap | Flowery</title>
    <style>
        :root {
            --pink: #d94f79;
            --pink-dark: #bd3d65;
            --soft-pink: #fff5f8;
            --ink: #292728;
            --muted: #6b6366;
            --border: #f0d5dd;
            --card-bg: #ffffff;
        }

        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            background: #fffafa;
            color: var(--ink);
        }

        nav {
            height: 80px;
            padding: 0 7%;
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
            font-family: Georgia, serif;
            font-size: 30px;
            font-weight: bold;
            color: var(--pink);
            text-decoration: none;
        }

        .logo span {
            color: var(--ink);
        }

        .back-link {
            border: 1px solid var(--border);
            border-radius: 999px;
            color: var(--muted);
            font-size: 13px;
            font-weight: bold;
            padding: 10px 18px;
            text-decoration: none;
            transition: .2s;
        }

        .back-link:hover {
            background: var(--soft-pink);
            color: var(--pink);
        }

        main {
            width: min(1120px, 92%);
            margin: 40px auto 80px;
        }

        .page-header {
            margin-bottom: 30px;
        }

        .page-header h1 {
            font-family: Georgia, serif;
            font-size: 34px;
            margin: 0 0 8px;
        }

        .page-header p {
            color: var(--muted);
            margin: 0;
            font-size: 15px;
        }

        .checkout-grid {
            display: grid;
            grid-template-columns: 1.55fr 1fr;
            gap: 36px;
            align-items: start;
        }

        .form-section {
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: 18px;
            padding: 28px;
            margin-bottom: 24px;
            box-shadow: 0 8px 24px rgba(157, 93, 112, 0.05);
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 17px;
            font-weight: bold;
            margin: 0 0 20px;
            padding-bottom: 12px;
            border-bottom: 1px solid #fae8ee;
            color: var(--ink);
        }

        .section-title span.badge-num {
            display: inline-grid;
            place-items: center;
            width: 26px;
            height: 26px;
            background: var(--pink);
            color: white;
            border-radius: 50%;
            font-size: 13px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-size: 13px;
            font-weight: 600;
            color: #4a3e42;
        }

        label span.req {
            color: var(--pink);
        }

        input[type="text"],
        input[type="email"],
        input[type="date"],
        select,
        textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #e5cdd4;
            border-radius: 10px;
            font-size: 14px;
            background: #fff;
            transition: .2s;
            outline: none;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: var(--pink);
            box-shadow: 0 0 0 3px rgba(217, 79, 121, 0.15);
        }

        textarea {
            resize: vertical;
            min-height: 80px;
        }

        /* Radio Options */
        .option-grid {
            display: grid;
            gap: 10px;
        }

        .option-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 14px 16px;
            border: 1px solid #ebd2da;
            border-radius: 12px;
            cursor: pointer;
            transition: .2s;
            background: #fff;
        }

        .option-card:hover {
            border-color: var(--pink);
            background: var(--soft-pink);
        }

        .option-card.selected {
            border-color: var(--pink);
            background: #fff0f4;
            box-shadow: 0 0 0 1px var(--pink);
        }

        .option-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .option-info input[type="radio"] {
            accent-color: var(--pink);
            width: 17px;
            height: 17px;
        }

        .option-text strong {
            display: block;
            font-size: 14px;
            margin-bottom: 2px;
        }

        .option-text span {
            font-size: 12px;
            color: var(--muted);
        }

        .option-price {
            font-size: 14px;
            font-weight: bold;
            color: var(--pink);
        }

        /* Summary Sidebar */
        .summary-box {
            background: #2f2528;
            color: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 14px 35px rgba(47, 37, 40, 0.25);
            position: sticky;
            top: 100px;
        }

        .summary-box h2 {
            font-family: Georgia, serif;
            font-size: 22px;
            margin: 0 0 20px;
            padding-bottom: 14px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
        }

        .cart-item-mini {
            display: flex;
            gap: 14px;
            padding-bottom: 16px;
            margin-bottom: 16px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .cart-item-mini img {
            width: 60px;
            height: 60px;
            border-radius: 10px;
            object-fit: cover;
        }

        .cart-item-info h4 {
            margin: 0 0 4px;
            font-size: 14px;
            font-weight: 600;
        }

        .cart-item-info p {
            margin: 0 0 4px;
            font-size: 12px;
            color: #d8c9ce;
        }

        .cart-item-info .item-price {
            color: #ff9bbb;
            font-weight: bold;
            font-size: 13px;
        }

        .cost-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            font-size: 14px;
            color: #ebdce1;
        }

        .cost-row.total-row {
            margin-top: 18px;
            padding-top: 18px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            font-size: 19px;
            font-weight: bold;
            color: white;
        }

        .cost-row.total-row span.grand-total {
            color: #ff88aa;
        }

        .submit-btn {
            width: 100%;
            margin-top: 24px;
            padding: 16px;
            background: var(--pink);
            color: white;
            border: 0;
            border-radius: 12px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            transition: .2s;
            box-shadow: 0 6px 18px rgba(217, 79, 121, 0.35);
        }

        .submit-btn:hover {
            background: var(--pink-dark);
            transform: translateY(-1px);
        }

        .trust-badge {
            margin-top: 18px;
            font-size: 12px;
            color: #b5a4aa;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        @media (max-width: 900px) {
            .checkout-grid {
                grid-template-columns: 1fr;
            }
            .summary-box {
                position: static;
            }
        }

        @media (max-width: 580px) {
            .form-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <nav>
        <a class="logo" href="{{ route('home') }}">Flowery<span>.</span></a>
        <a class="back-link" href="{{ route('cart.index') }}">← Kembali ke Keranjang</a>
    </nav>

    <main>
        <div class="page-header">
            <h1>Checkout Pesanan</h1>
            <p>Lengkapi detail pengiriman dan pembayaran untuk buket impianmu.</p>
        </div>

        @if(!count($items))
            <div style="background:white;padding:40px;border-radius:18px;text-align:center;border:1px solid #f0d5dd;">
                <h3>Keranjang belanja Anda kosong.</h3>
                <p>Silakan pilih buket cantik terlebih dahulu.</p>
                <a href="{{ route('collections.index') }}" style="display:inline-block;margin-top:12px;padding:12px 24px;background:var(--pink);color:white;border-radius:8px;text-decoration:none;font-weight:bold;">Lihat Koleksi Bunga</a>
            </div>
        @else
            @php
                $itemsTotal = array_sum(array_column($items, 'price'));
            @endphp

            <form id="checkout-form" method="POST" action="{{ route('checkout.store') }}" class="checkout-grid">
                @csrf

                <!-- KOLOM KIRI: FORM DETAIL LENGKAP -->
                <div class="form-columns">
                    <!-- 1. DATA PENERIMA -->
                    <div class="form-section">
                        <div class="section-title">
                            <span class="badge-num">1</span> Informasi Penerima
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name">Nama Penerima <span class="req">*</span></label>
                                <input type="text" id="name" name="name" value="{{ old('name', auth()->user()?->name) }}" placeholder="Contoh: Salsabila Putri" required>
                                @error('name')<small style="color:red">{{ $message }}</small>@enderror
                            </div>
                            <div class="form-group">
                                <label for="phone">Nomor WhatsApp / HP <span class="req">*</span></label>
                                <input type="text" id="phone" name="phone" value="{{ old('phone') }}" placeholder="08xxxxxxxxxx" required>
                                @error('phone')<small style="color:red">{{ $message }}</small>@enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Alamat Email (opsional untuk konfirmasi e-invoice)</label>
                            <input type="email" id="email" name="email" value="{{ old('email', auth()->user()?->email) }}" placeholder="email@kamu.com">
                        </div>
                    </div>

                    <!-- 2. ALAMAT PENGIRIMAN -->
                    <div class="form-section">
                        <div class="section-title">
                            <span class="badge-num">2</span> Alamat Lengkap Tujuan
                        </div>
                        <div class="form-group">
                            <label for="address">Alamat Lengkap (Jalan, No. Rumah, RT/RW, Patokan) <span class="req">*</span></label>
                            <textarea id="address" name="address" placeholder="Contoh: Jl. Mawar No. 12B, RT 02/05, dekat gerbang hijau..." required>{{ old('address') }}</textarea>
                            @error('address')<small style="color:red">{{ $message }}</small>@enderror
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="city">Kota / Kabupaten</label>
                                <input type="text" id="city" name="city" value="{{ old('city', 'Jakarta') }}" placeholder="Contoh: Jakarta Selatan / Bandung">
                            </div>
                            <div class="form-group">
                                <label for="postal_code">Kode Pos</label>
                                <input type="text" id="postal_code" name="postal_code" value="{{ old('postal_code') }}" placeholder="Contoh: 12345">
                            </div>
                        </div>
                    </div>

                    <!-- 3. JADWAL & METODE PENGIRIMAN -->
                    <div class="form-section">
                        <div class="section-title">
                            <span class="badge-num">3</span> Metode Pengiriman
                        </div>
                        

                        <label>Pilih Kurir / Pengiriman <span class="req">*</span></label>
                        <div class="option-grid">
                            <label class="option-card selected">
                                <div class="option-info">
                                    <input type="radio" name="shipping_method" value="reguler" data-cost="15000" checked>
                                    <div class="option-text">
                                        <strong>Pengiriman Standar / Reguler (1-2 hari)</strong>
                                        <span>Gratis ongkir jika pesanan buket di atas Rp300.000</span>
                                    </div>
                                </div>
                                <div class="option-price" id="cost-reguler">
                                    {{ $itemsTotal >= 300000 ? 'GRATIS' : 'Rp15.000' }}
                                </div>
                            </label>

                            <label class="option-card">
                                <div class="option-info">
                                    <input type="radio" name="shipping_method" value="express" data-cost="30000">
                                    <div class="option-text">
                                        <strong>Express Kilat (Esok Hari Sampai)</strong>
                                        <span>Prioritas packing & kurir khusus paket aman</span>
                                    </div>
                                </div>
                                <div class="option-price">Rp30.000</div>
                            </label>

                            <label class="option-card">
                                <div class="option-info">
                                    <input type="radio" name="shipping_method" value="same_day" data-cost="45000">
                                    <div class="option-text">
                                        <strong>Same-Day Instant Delivery</strong>
                                        <span>Diantar kurir instan di hari yang sama</span>
                                    </div>
                                </div>
                                <div class="option-price">Rp45.000</div>
                            </label>

                            <label class="option-card">
                                <div class="option-info">
                                    <input type="radio" name="shipping_method" value="pickup" data-cost="0">
                                    <div class="option-text">
                                        <strong>Ambil Sendiri di Toko (Self Pick-up)</strong>
                                        <span>Toko Flowery Florist Studio, buka 09:00 - 20:00</span>
                                    </div>
                                </div>
                                <div class="option-price">GRATIS</div>
                            </label>
                        </div>

                        <div class="form-row" style="margin-top:16px;">
                            <div class="form-group">
                                <label for="delivery_date">Tanggal Pengiriman (opsional)</label>
                                <input type="date" id="delivery_date" name="delivery_date" value="{{ old('delivery_date') }}">
                            </div>
                            <div class="form-group">
                                <label for="delivery_time">Waktu Pengiriman (opsional)</label>
                                <select id="delivery_time" name="delivery_time">
                                    <option value="">Pilih waktu</option>
                                    <option value="09:00 - 12:00">09:00 - 12:00</option>
                                    <option value="12:00 - 15:00">12:00 - 15:00</option>
                                    <option value="15:00 - 18:00">15:00 - 18:00</option>
                                    <option value="18:00 - 20:00">18:00 - 20:00</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group" style="margin-top:16px;">
                            <label for="notes">Instruksi Khusus untuk Kurir (opsional)</label>
                            <input type="text" id="notes" name="notes" placeholder="Contoh: Tolong jangan dibanting, titip satpam jika tidak ada orang.">
                        </div>
                    </div>

                    <!-- 4. METODE PEMBAYARAN -->
                    <div class="form-section">
                        <div class="section-title">
                            <span class="badge-num">4</span> Metode Pembayaran
                        </div>

                        <div class="option-grid">
                            <label class="option-card selected">
                                <div class="option-info">
                                    <input type="radio" name="payment_method" value="midtrans_qris" checked>
                                    <div class="option-text">
                                        <strong>QRIS Instant (GoPay, OVO, Dana, ShopeePay, BCA)</strong>
                                        <span>Scan barcode QRIS langsung otomatis terverifikasi</span>
                                    </div>
                                </div>
                                <span style="font-size:18px;"></span>
                            </label>

                            <label class="option-card">
                                <div class="option-info">
                                    <input type="radio" name="payment_method" value="midtrans_bank_transfer">
                                    <div class="option-text">
                                        <strong>Virtual Account Bank (BCA, Mandiri, BNI, BRI)</strong>
                                        <span>Transfer instan melalui VA otomatis diverifikasi</span>
                                    </div>
                                </div>
                                <span style="font-size:18px;"></span>
                            </label>

                            <label class="option-card">
                                <div class="option-info">
                                    <input type="radio" name="payment_method" value="midtrans_ewallet">
                                    <div class="option-text">
                                        <strong>E-Wallet & Kartu Kredit</strong>
                                        <span>Metode pembayaran lengkap via gateway Midtrans</span>
                                    </div>
                                </div>
                                <span style="font-size:18px;"></span>
                            </label>

                            <label class="option-card">
                                <div class="option-info">
                                    <input type="radio" name="payment_method" value="manual_transfer">
                                    <div class="option-text">
                                        <strong>Transfer Bank Manual</strong>
                                        <span>BCA / Mandiri Flowery Florist (Upload/Kirim bukti via WA)</span>
                                    </div>
                                </div>
                                <span style="font-size:18px;"></span>
                            </label>

                            <label class="option-card">
                                <div class="option-info">
                                    <input type="radio" name="payment_method" value="cod">
                                    <div class="option-text">
                                        <strong>Bayar di Tempat (COD)</strong>
                                        <span>Bayar tunai ke kurir saat bunga tiba di lokasi</span>
                                    </div>
                                </div>
                                <span style="font-size:18px;"></span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- KOLOM KANAN: RINGKASAN PESANAN LENGKAP -->
                <aside class="summary-box">
                    <h2>Rincian Pesanan</h2>

                    <div class="cart-items-list">
                        @foreach($items as $item)
                            <div class="cart-item-mini">
                                <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}">
                                <div class="cart-item-info">
                                    <h4>{{ $item['name'] }}</h4>
                                    <p>Ukuran: {{ $item['size'] }}</p>
                                    @if(!empty($item['wrapping_color']))
                                        <p style="font-size:11px;color:#ffcad7;">🎨 {{ $item['wrapping_color'] }}</p>
                                    @endif
                                    @if(!empty($item['extra_addons']) && is_array($item['extra_addons']))
                                        <p style="font-size:11px;color:#ffcad7;">✨ +{{ count($item['extra_addons']) }} add-on</p>
                                    @endif
                                    <div class="item-price">Rp{{ number_format($item['price'], 0, ',', '.') }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div style="margin-top:20px;">
                        <div class="cost-row">
                            <span>Subtotal Produk</span>
                            <span id="label-subtotal" data-val="{{ $itemsTotal }}">Rp{{ number_format($itemsTotal, 0, ',', '.') }}</span>
                        </div>
                        <div class="cost-row">
                            <span>Ongkos Kirim</span>
                            @php
                                $initShipping = ($itemsTotal >= 300000) ? 0 : 15000;
                            @endphp
                            <span id="label-shipping">Rp{{ number_format($initShipping, 0, ',', '.') }}</span>
                        </div>
                        <div class="cost-row">
                            <span>Asuransi Pengiriman</span>
                            <span style="color:#6be094;">GRATIS</span>
                        </div>

                        <div class="cost-row total-row">
                            <span>Total Tagihan</span>
                            <span class="grand-total" id="label-grand-total">Rp{{ number_format($itemsTotal + $initShipping, 0, ',', '.') }}</span>
                        </div>
                    </div>

                    <button type="submit" class="submit-btn">PROSES PESANAN SEKARANG →</button>

                    <div class="trust-badge">
                        <span>🔒 Enkripsi SSL 256-Bit • Jaminan Kepuasan & Kesegaran</span>
                    </div>
                </aside>
            </form>
        @endif
    </main>

    <script>
        const subtotal = Number(document.getElementById('label-subtotal')?.dataset.val || 0);
        const shippingRadios = document.querySelectorAll('input[name="shipping_method"]');
        const paymentRadios = document.querySelectorAll('input[name="payment_method"]');
        const labelShipping = document.getElementById('label-shipping');
        const labelGrandTotal = document.getElementById('label-grand-total');

        function updateSummary() {
            let selectedShipping = document.querySelector('input[name="shipping_method"]:checked');
            let cost = Number(selectedShipping ? selectedShipping.dataset.cost : 15000);

            // Free ongkir untuk reguler bila subtotal >= 300rb
            if (selectedShipping && selectedShipping.value === 'reguler' && subtotal >= 300000) {
                cost = 0;
            }

            if (labelShipping) {
                labelShipping.textContent = cost === 0 ? 'GRATIS' : 'Rp' + cost.toLocaleString('id-ID');
            }

            if (labelGrandTotal) {
                const grand = subtotal + cost;
                labelGrandTotal.textContent = 'Rp' + grand.toLocaleString('id-ID');
            }
        }

        function highlightRadioCards(radioElements) {
            radioElements.forEach(radio => {
                radio.addEventListener('change', () => {
                    radioElements.forEach(r => r.closest('.option-card')?.classList.remove('selected'));
                    radio.closest('.option-card')?.classList.add('selected');
                    updateSummary();
                });
            });
        }

        highlightRadioCards(shippingRadios);
        highlightRadioCards(paymentRadios);
        updateSummary();
    </script>
</body>

</html>
