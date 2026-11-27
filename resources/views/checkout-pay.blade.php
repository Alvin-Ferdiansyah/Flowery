<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Berhasil | Flowery</title>
    <style>
        :root {
            --pink: #d94f79;
            --pink-dark: #bd3d65;
            --soft: #fff5f8;
            --ink: #302b2d;
            --green: #28a745;
            --border: #f0d5dd;
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
            height: 76px;
            padding: 0 8%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #fff;
            border-bottom: 1px solid var(--border);
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

        .card {
            width: min(600px, 90%);
            margin: 50px auto 80px;
            padding: 40px;
            border-radius: 6px;
            background: #fff;
            border: 1px solid var(--border);
            box-shadow: 0 12px 36px rgba(157, 93, 112, 0.08);
            text-align: center;
        }

        .success-icon {
            display: inline-grid;
            place-items: center;
            width: 76px;
            height: 76px;
            margin: 0 auto 18px;
            border-radius: 50%;
            background: #e7f9ee;
            color: var(--green);
            font-size: 36px;
            font-weight: bold;
            box-shadow: 0 6px 18px rgba(40, 167, 69, 0.2);
        }

        h1 {
            font-family: Georgia, serif;
            font-size: 30px;
            margin: 0 0 10px;
        }

        .tag {
            display: inline-block;
            padding: 6px 14px;
            border-radius: 4px;
            background: #e7f9ee;
            color: #1e7e34;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .details-box {
            background: var(--soft);
            border: 1px solid #fae2e9;
            border-radius: 4px;
            padding: 20px;
            margin: 24px 0;
            text-align: left;
            font-size: 14px;
        }

        .details-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .details-row:last-child {
            margin-bottom: 0;
            padding-top: 10px;
            border-top: 1px dashed #ebd0da;
            font-weight: bold;
            color: var(--pink);
            font-size: 16px;
        }

        .btn-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 24px;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 13px 20px;
            border-radius: 4px;
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
            border: 0;
            cursor: pointer;
            transition: .2s;
            text-align: center;
        }

        .btn-admin {
            background: #39282f;
            color: #fff;
        }

        .btn-admin:hover {
            background: #25181d;
        }

        .btn-primary {
            background: var(--pink);
            color: #fff;
        }

        .btn-primary:hover {
            background: var(--pink-dark);
        }

        .btn-outline {
            background: #fff;
            color: #55444a;
            border: 1px solid #ebd0da;
        }

        .btn-outline:hover {
            background: var(--soft);
            color: var(--pink);
        }
    </style>
</head>

<body>
    <nav>
        <a class="logo" href="{{ route('home') }}">Flowery<span>.</span></a>
        <a href="{{ route('home') }}" style="color:var(--ink);text-decoration:none;font-size:14px;font-weight:bold;">←
            Kembali ke Beranda</a>
    </nav>

    <main class="card">
        <div class="success-icon">✓</div>
        <span class="tag">PEMBAYARAN BERHASIL (LUNAS)</span>

        <h1>Pesanan Berhasil Dibayar!</h1>
        <p style="color:#666;font-size:15px;line-height:1.5;margin:0 0 20px;">
            Terima kasih <strong>{{ $order->customer_name }}</strong>, pembayaran untuk pesanan buket bunga Anda telah
            kami terima. Data pesanan ini otomatis langsung masuk ke <strong>Dashboard Admin Florist</strong> untuk
            dirangkai dan dikirim.
        </p>

        <div class="details-box">
            <div class="details-row">
                <span style="color:#777;">Nomor Resi:</span>
                <strong>{{ $order->order_number }}</strong>
            </div>
            <div class="details-row">
                <span style="color:#777;">Penerima:</span>
                <span>{{ $order->customer_name }} ({{ $order->phone }})</span>
            </div>
            <div class="details-row">
                <span style="color:#777;">Metode Pembayaran:</span>
                <span style="text-transform:uppercase;">{{ str_replace('_', ' ', $order->payment_method) }}</span>
            </div>
            <div class="details-row">
                <span style="color:#777;">Status Pesanan:</span>
                <span style="color:#28a745;font-weight:bold;">Terkonfirmasi (Masuk Antrean Florist)</span>
            </div>
            <div class="details-row">
                <span>Total Pembayaran:</span>
                <span>Rp{{ number_format($order->total, 0, ',', '.') }}</span>
            </div>
        </div>

        <div class="btn-group">
            <a href="{{ route('home') }}" class="btn btn-outline">
                Kembali ke Beranda Toko
            </a>
        </div>
    </main>

    @if ($midtransAvailable && $snapToken)
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ $clientKey }}"></script>
        <script>
            // Jika midtrans snap token ada, popup snap tetap dipanggil
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    window.location.href =
                        "{{ route('order.status', ['order' => $order->order_number, 'simulasi_bayar' => 1]) }}";
                },
                onPending: function(result) {
                    window.location.href = "{{ route('order.status', ['order' => $order->order_number]) }}";
                },
                onError: function(result) {
                    window.location.href = "{{ route('order.status', ['order' => $order->order_number]) }}";
                }
            });
        </script>
    @endif
</body>

</html>
