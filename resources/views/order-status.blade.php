<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Pembayaran Berhasil & Resi Pesanan | Flowery</title>
    <style>
        :root {
            --pink: #d94f79;
            --pink-dark: #bd3d65;
            --soft: #fff5f8;
            --ink: #292728;
            --muted: #6b6366;
            --green: #28a745;
            --line: #fae2e9;
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
            padding: 0 7%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #fff;
            border-bottom: 1px solid #f1dae2;
        }

        .logo {
            font-family: Georgia, serif;
            font-size: 28px;
            font-weight: bold;
            color: var(--pink);
            text-decoration: none;
        }

        .logo span {
            color: var(--ink);
        }

        main {
            width: min(720px, 92%);
            margin: 45px auto 80px;
        }

        .card-receipt {
            background: white;
            border: 1px solid #ebd5dd;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 14px 40px rgba(157, 93, 112, 0.08);
            text-align: center;
        }

        .check-badge {
            display: inline-grid;
            place-items: center;
            width: 76px;
            height: 76px;
            margin: 0 auto 18px;
            border-radius: 50%;
            background: #e7f9ee;
            color: var(--green);
            font-size: 38px;
            box-shadow: 0 8px 20px rgba(40, 167, 69, 0.18);
        }

        .check-badge.pending {
            background: #fff3cd;
            color: #856404;
        }

        h1 {
            font-family: Georgia, serif;
            font-size: 30px;
            margin: 0 0 10px;
        }

        .subtext {
            color: var(--muted);
            font-size: 15px;
            line-height: 1.6;
            max-width: 520px;
            margin: 0 auto 26px;
        }

        .order-badge-row {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-bottom: 28px;
        }

        .badge-pill {
            padding: 8px 16px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: bold;
        }

        .badge-pill.number {
            background: var(--soft);
            color: var(--pink);
            border: 1px solid #f8ceda;
        }

        .badge-pill.paid {
            background: #e7f9ee;
            color: #1e7e34;
        }

        .badge-pill.pending-pay {
            background: #fff3cd;
            color: #856404;
        }

        /* Detail Breakdown Table */
        .receipt-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            margin: 25px 0;
            background: #fffdfd;
            border: 1px solid #f6e2e8;
            border-radius: 12px;
            overflow: hidden;
        }

        .receipt-table th,
        .receipt-table td {
            padding: 14px 18px;
            font-size: 14px;
            border-bottom: 1px solid #f9ebef;
        }

        .receipt-table th {
            background: #fff4f7;
            color: #554449;
            font-weight: 600;
        }

        .step-progress {
            display: flex;
            justify-content: space-between;
            margin: 30px 0;
            padding: 18px 10px;
            background: var(--soft);
            border-radius: 14px;
        }

        .step-item {
            flex: 1;
            font-size: 12px;
            text-align: center;
            color: var(--muted);
            position: relative;
        }

        .step-item.active {
            color: var(--pink);
            font-weight: bold;
        }

        .step-dot {
            width: 14px;
            height: 14px;
            margin: 0 auto 6px;
            border-radius: 50%;
            background: #e2cbd2;
        }

        .step-item.active .step-dot {
            background: var(--pink);
            box-shadow: 0 0 0 4px rgba(217, 79, 121, 0.2);
        }

        .btn-group {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-top: 30px;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 14px 20px;
            border-radius: 10px;
            font-size: 15px;
            font-weight: bold;
            text-decoration: none;
            cursor: pointer;
            border: 0;
            transition: .2s;
        }

        .btn-primary {
            background: var(--pink);
            color: white;
            box-shadow: 0 6px 18px rgba(217, 79, 121, 0.3);
        }

        .btn-primary:hover {
            background: var(--pink-dark);
        }

        .btn-secondary {
            background: #fff;
            color: #5a4b50;
            border: 1px solid #ebd3dc;
        }

        .btn-secondary:hover {
            background: var(--soft);
            color: var(--pink);
        }

        .btn-admin {
            background: #39282f;
            color: #fff;
        }

        .btn-admin:hover {
            background: #25181d;
        }

        .admin-notice {
            margin-top: 24px;
            padding: 14px;
            background: #eef8ff;
            border: 1px solid #cde7ff;
            border-radius: 10px;
            color: #0b5394;
            font-size: 13px;
        }
    </style>
</head>

<body>
    <nav>
        <a class="logo" href="{{ route('home') }}">Flowery<span>.</span></a>
        <a href="{{ route('home') }}" style="color:var(--muted);text-decoration:none;font-size:14px;font-weight:bold;">← Kembali ke Beranda</a>
    </nav>

    <main>
        @if(!$order)
            <div class="card-receipt">
                <h1>Belum Ada Pesanan Terpilih</h1>
                <p class="subtext">Nomor resi pesanan tidak ditemukan atau keranjang Anda masih kosong.</p>
                <a href="{{ route('collections.index') }}" class="btn btn-primary">Lihat Koleksi Bunga</a>
            </div>
        @else
            @php
                $isPaid = ($order->payment_status === 'paid');
            @endphp

            <div class="card-receipt">
                <div class="check-badge {{ $isPaid ? '' : 'pending' }}">
                    {{ $isPaid ? '✓' : '⏱' }}
                </div>

                <h1>{{ $isPaid ? 'Pembayaran Berhasil!' : 'Pesanan Diterima (Menunggu Pembayaran)' }}</h1>
                <p class="subtext">
                    @if($isPaid)
                        Terima kasih, <strong>{{ $order->customer_name }}</strong>! Pembayaran pesanan Anda telah berhasil dikonfirmasi. Tim Florist kami sedang menyiapkan buket bunga Anda.
                    @else
                        Halo <strong>{{ $order->customer_name }}</strong>, pesanan Anda telah tersimpan di sistem Flowery. Silakan selesaikan pembayaran agar pesanan segera dirangkai.
                    @endif
                </p>

                <div class="order-badge-row">
                    <span class="badge-pill number">Resi: {{ $order->order_number }}</span>
                    <span class="badge-pill {{ $isPaid ? 'paid' : 'pending-pay' }}">
                        {{ $isPaid ? 'LUNAS (PAID)' : 'MENUNGGU PEMBAYARAN' }}
                    </span>
                    <span class="badge-pill" style="background:#f3e8f8;color:#7c2d99;">
                        Status: {{ ucfirst($order->status) }}
                    </span>
                </div>

                <!-- Step Timeline -->
                <div class="step-progress">
                    <div class="step-item active">
                        <div class="step-dot"></div>
                        <span>1. Dipesan</span>
                    </div>
                    <div class="step-item {{ in_array($order->status, ['confirmed', 'processing', 'completed']) ? 'active' : '' }}">
                        <div class="step-dot"></div>
                        <span>2. Pembayaran Lunas</span>
                    </div>
                    <div class="step-item {{ in_array($order->status, ['processing', 'completed']) ? 'active' : '' }}">
                        <div class="step-dot"></div>
                        <span>3. Dirangkai Florist</span>
                    </div>
                    <div class="step-item {{ $order->status === 'completed' ? 'active' : '' }}">
                        <div class="step-dot"></div>
                        <span>4. Dikirim / Selesai</span>
                    </div>
                </div>

                <!-- Rincian Pesanan -->
                <table class="receipt-table">
                    <thead>
                        <tr>
                            <th>Rincian Item & Kustomisasi</th>
                            <th style="text-align:right;">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->items as $item)
                            <tr>
                                <td>
                                    <strong>{{ $item->product_name }}</strong> ({{ $item->size ?: 'Standar' }})<br>
                                    @if($item->wrapping_color)
                                        <small style="color:var(--muted)">🎨 Wrapping: {{ $item->wrapping_color }}</small><br>
                                    @endif
                                    @if($item->ribbon_color)
                                        <small style="color:var(--muted)">🎀 Pita: {{ $item->ribbon_color }}</small><br>
                                    @endif
                                    @if($item->flower_tone)
                                        <small style="color:var(--muted)">🌸 Nuansa: {{ $item->flower_tone }}</small><br>
                                    @endif
                                    @if(!empty($item->extra_addons))
                                        <small style="color:var(--pink)">✨ Add-ons: {{ implode(', ', array_map(fn($a) => ucwords(str_replace('_', ' ', $a)), (array)$item->extra_addons)) }}</small><br>
                                    @endif
                                    @if($item->card_message)
                                        <small style="color:#555">💌 Kartu: “{{ $item->card_message }}”</small><br>
                                    @endif
                                </td>
                                <td style="text-align:right;font-weight:bold;vertical-align:top;">
                                    Rp{{ number_format($item->price, 0, ',', '.') }}
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td>
                                <strong>Pengiriman ({{ strtoupper($order->shipping_method ?: 'Reguler') }})</strong><br>
                                <small style="color:var(--muted)">Tujuan: {{ $order->address }}{{ $order->city ? ', '.$order->city : '' }}</small>
                            </td>
                            <td style="text-align:right;font-weight:bold;">
                                {{ $order->shipping_cost > 0 ? 'Rp'.number_format($order->shipping_cost, 0, ',', '.') : 'GRATIS' }}
                            </td>
                        </tr>
                        <tr style="background:#fff2f5;font-size:16px;">
                            <td><strong>TOTAL PEMBAYARAN</strong></td>
                            <td style="text-align:right;color:var(--pink);font-weight:bold;font-size:18px;">
                                Rp{{ number_format($order->total, 0, ',', '.') }}
                            </td>
                        </tr>
                    </tbody>
                </table>

                @if(!$isPaid)
                    <!-- Tombol Simulasi Pembayaran Berhasil untuk Demo/Testing -->
                    <div style="background:#fef5e7;border:1px dashed #f3b95f;padding:18px;border-radius:12px;margin:20px 0;">
                        <h4 style="margin:0 0 8px;color:#9b6510;">Simulasi / Konfirmasi Bayar:</h4>
                        <p style="margin:0 0 12px;font-size:13px;color:#705018;">Klik tombol di bawah ini untuk mensimulasikan pembayaran berhasil dan memverifikasi pesanan langsung masuk ke dashboard admin sebagai lunas.</p>
                        <form method="GET" action="{{ route('order.status') }}">
                            <input type="hidden" name="order" value="{{ $order->order_number }}">
                            <input type="hidden" name="simulasi_bayar" value="1">
                            <button type="submit" class="btn btn-primary" style="background:#28a745;">
                                ✓ Konfirmasi Pembayaran Berhasil Sekarang
                            </button>
                        </form>
                    </div>
                @endif

                <div class="admin-notice">
                    ✨ Pesanan ini otomatis tercatat dan tersinkronisasi ke <strong>Dashboard Admin Flowery</strong> untuk segera diproses oleh staf florist.
                </div>

                <div class="btn-group">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-admin">
                        📊 Buka & Pantau di Dashboard Admin →
                    </a>
                    <a href="{{ route('home') }}" class="btn btn-secondary">
                        Kembali ke Halaman Depan
                    </a>
                </div>
            </div>
        @endif
    </main>
</body>

</html>
