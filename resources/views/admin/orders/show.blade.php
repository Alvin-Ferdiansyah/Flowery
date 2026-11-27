@extends('admin.layout')

@section('title', 'Detail Pesanan #' . $order->order_number)

@section('content')
<div class="top-bar">
    <div>
        <h1>Detail Pesanan #{{ $order->order_number }}</h1>
        <p style="color:var(--muted);margin:4px 0 0;font-size:14px;">Waktu Pesanan: {{ $order->created_at->format('d F Y, H:i') }} WIB</p>
    </div>
    <a href="{{ route('admin.orders.index') }}" class="btn-sm btn-view" style="padding:10px 16px;">
        ← Kembali ke Daftar Pesanan
    </a>
</div>

<div style="display:grid;grid-template-columns:1.8fr 1fr;gap:24px;">
    <div>
        <!-- Rincian Item Bunga -->
        <div class="panel">
            <div class="panel-header">
                <h2>💐 Rincian Produk & Kustomisasi</h2>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Item Buket</th>
                        <th>Kustomisasi & Kartu Ucapan</th>
                        <th style="text-align:right;">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                        <tr>
                            <td>
                                <strong>{{ $item->product_name }}</strong><br>
                                <span class="badge badge-confirmed">Ukuran: {{ $item->size ?: 'Standar' }}</span>
                            </td>
                            <td>
                                @if($item->wrapping_color)
                                    <div>🎨 Wrapping: <strong>{{ $item->wrapping_color }}</strong></div>
                                @endif
                                @if($item->ribbon_color)
                                    <div>🎀 Pita: <strong>{{ $item->ribbon_color }}</strong></div>
                                @endif
                                @if($item->flower_tone)
                                    <div>🌸 Nuansa: <strong>{{ $item->flower_tone }}</strong></div>
                                @endif
                                @if(!empty($item->extra_addons))
                                    <div style="color:var(--pink);margin-top:4px;">
                                        ✨ Add-ons: <strong>{{ implode(', ', array_map(fn($a) => ucwords(str_replace('_', ' ', $a)), (array)$item->extra_addons)) }}</strong>
                                    </div>
                                @endif
                                @if($item->custom_note)
                                    <div style="margin-top:4px;font-style:italic;">Catatan: {{ $item->custom_note }}</div>
                                @endif
                                @if($item->card_message)
                                    <div style="margin-top:6px;padding:8px;background:var(--soft-pink);border-radius:6px;font-size:12px;">
                                        💌 <strong>Pesan Kartu:</strong> “{{ $item->card_message }}”
                                    </div>
                                @endif
                            </td>
                            <td style="text-align:right;font-weight:bold;">
                                Rp{{ number_format($item->price, 0, ',', '.') }}
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="2" style="text-align:right;">Ongkir ({{ strtoupper($order->shipping_method ?: 'Reguler') }})</td>
                        <td style="text-align:right;font-weight:bold;">Rp{{ number_format($order->shipping_cost, 0, ',', '.') }}</td>
                    </tr>
                    <tr style="background:#fff8fa;font-size:15px;">
                        <td colspan="2" style="text-align:right;"><strong>TOTAL PESANAN</strong></td>
                        <td style="text-align:right;color:var(--pink);font-weight:bold;font-size:17px;">
                            Rp{{ number_format($order->total, 0, ',', '.') }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Alamat Pengiriman -->
        <div class="panel" style="padding:22px;">
            <h2 style="font-size:17px;margin:0 0 14px;border-bottom:1px solid var(--line);padding-bottom:10px;">
                📍 Alamat Pengiriman & Kontak
            </h2>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;font-size:14px;">
                <div>
                    <label style="color:var(--muted);font-size:12px;">Penerima:</label>
                    <p style="margin:2px 0 10px;font-weight:bold;font-size:15px;">{{ $order->customer_name }}</p>
                    
                    <label style="color:var(--muted);font-size:12px;">No. WhatsApp / HP:</label>
                    <p style="margin:2px 0 10px;">
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $order->phone) }}?text=Halo%20{{ urlencode($order->customer_name) }}%2C%20kami%20dari%20Flowery%20ingin%20mengonfirmasi%20pesanan%20nomor%20{{ $order->order_number }}" target="_blank" style="color:#25d366;font-weight:bold;text-decoration:none;">
                            📱 {{ $order->phone }} (Chat WhatsApp)
                        </a>
                    </p>

                    @if($order->email)
                        <label style="color:var(--muted);font-size:12px;">Email:</label>
                        <p style="margin:2px 0 10px;">{{ $order->email }}</p>
                    @endif
                </div>

                <div>
                    <label style="color:var(--muted);font-size:12px;">Alamat Tujuan:</label>
                    <p style="margin:2px 0 10px;line-height:1.4;">{{ $order->address }}</p>
                    
                    <label style="color:var(--muted);font-size:12px;">Kota & Kode Pos:</label>
                    <p style="margin:2px 0 10px;">{{ $order->city ?: '-' }} {{ $order->postal_code ? '('.$order->postal_code.')' : '' }}</p>

                    @if($order->notes)
                        <label style="color:var(--muted);font-size:12px;">Instruksi Khusus:</label>
                        <p style="margin:2px 0 10px;color:#c0392b;">⚠️ {{ $order->notes }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Panel Update Status Pesanan -->
    <div>
        <div class="panel" style="padding:22px;">
            <h2 style="font-size:17px;margin:0 0 16px;border-bottom:1px solid var(--line);padding-bottom:10px;">
                ⚙️ Update Status & Resi
            </h2>

            <form method="POST" action="{{ route('admin.orders.update', $order->id) }}">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="status">Status Alur Pesanan</label>
                    <select id="status" name="status">
                        <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending (Menunggu)</option>
                        <option value="confirmed" {{ $order->status === 'confirmed' ? 'selected' : '' }}>Confirmed (Dikonfirmasi)</option>
                        <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>Processing (Sedang Dirangkai)</option>
                        <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Completed (Selesai Dikirim)</option>
                        <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled (Dibatalkan)</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="payment_status">Status Pembayaran</label>
                    <select id="payment_status" name="payment_status">
                        <option value="pending" {{ $order->payment_status === 'pending' ? 'selected' : '' }}>Pending (Belum Bayar)</option>
                        <option value="paid" {{ $order->payment_status === 'paid' ? 'selected' : '' }}>Paid (LUNAS)</option>
                        <option value="failed" {{ $order->payment_status === 'failed' ? 'selected' : '' }}>Failed (Gagal)</option>
                        <option value="expired" {{ $order->payment_status === 'expired' ? 'selected' : '' }}>Expired (Kedaluwarsa)</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="tracking_number">No. Resi Pengiriman Kurir</label>
                    <input type="text" id="tracking_number" name="tracking_number" value="{{ old('tracking_number', $order->tracking_number) }}" placeholder="Contoh: JNE12345678 / Instant GoSend">
                </div>

                <button type="submit" class="action-link" style="width:100%;text-align:center;justify-content:center;border:0;cursor:pointer;padding:12px;font-size:14px;margin-top:6px;">
                    Update Status Pesanan Ini
                </button>
            </form>
        </div>

        <div class="panel" style="padding:22px;">
            <h3 style="font-size:15px;margin:0 0 10px;">Informasi Pembayaran</h3>
            <p style="margin:4px 0;font-size:13px;color:var(--muted);">
                Metode: <strong>{{ str_replace('_', ' ', strtoupper($order->payment_method ?: 'Midtrans')) }}</strong>
            </p>
            @if($order->midtrans_snap_token)
                <p style="margin:4px 0;font-size:12px;color:var(--muted);">
                    Token Gateway: <code style="word-break:break-all;">{{ substr($order->midtrans_snap_token, 0, 20) }}...</code>
                </p>
            @endif
        </div>
    </div>
</div>
@endsection

