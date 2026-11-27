@extends('admin.layout')

@section('title', 'Dashboard Admin')

@section('content')
<div class="top-bar">
    <div>
        <h1>Dashboard Utama Florist</h1>
        <p style="color:var(--muted);margin:4px 0 0;font-size:14px;">Pantau statistik, pesanan masuk terbaru, dan performa toko bunga Flowery.</p>
    </div>
    <a href="{{ route('admin.products.create') }}" class="action-link">
        + Tambah Produk Baru
    </a>
</div>

<!-- STATS CARDS -->
<div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(200px, 1fr));gap:18px;margin-bottom:30px;">
    <div style="background:#fff;border:1px solid var(--line);border-radius:14px;padding:22px;">
        <span style="color:var(--muted);font-size:13px;display:block;">Pesanan Menunggu</span>
        <strong style="font-size:30px;color:var(--pink);display:block;margin-top:6px;">{{ $stats['new_orders'] }}</strong>
    </div>
    <div style="background:#fff;border:1px solid var(--line);border-radius:14px;padding:22px;">
        <span style="color:var(--muted);font-size:13px;display:block;">Total Koleksi Bunga</span>
        <strong style="font-size:30px;color:#2c3e50;display:block;margin-top:6px;">{{ $stats['total_products'] }}</strong>
    </div>
    <div style="background:#fff;border:1px solid var(--line);border-radius:14px;padding:22px;">
        <span style="color:var(--muted);font-size:13px;display:block;">Kategori Buket</span>
        <strong style="font-size:30px;color:#8e44ad;display:block;margin-top:6px;">{{ $stats['total_categories'] }}</strong>
    </div>
    <div style="background:#fff;border:1px solid var(--line);border-radius:14px;padding:22px;">
        <span style="color:var(--muted);font-size:13px;display:block;">Pelanggan Terdaftar</span>
        <strong style="font-size:30px;color:#27ae60;display:block;margin-top:6px;">{{ $stats['total_customers'] }}</strong>
    </div>
</div>

<!-- SECTION GRID -->
<div style="display:grid;grid-template-columns:1.8fr 1fr;gap:24px;">
    <!-- Pesanan Terbaru -->
    <div class="panel">
        <div class="panel-header">
            <h2>Pesanan Terbaru Masuk</h2>
            <a href="{{ route('admin.orders.index') }}" style="color:var(--pink);font-size:13px;text-decoration:none;font-weight:bold;">Lihat Semua →</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>No. Resi</th>
                    <th>Pelanggan</th>
                    <th>Total</th>
                    <th>Bayar</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentOrders as $order)
                    <tr>
                        <td>
                            <strong>{{ $order->order_number }}</strong><br>
                            <small style="color:var(--muted)">{{ $order->created_at->format('d/m/Y H:i') }}</small>
                        </td>
                        <td>
                            {{ $order->customer_name }}<br>
                            <small style="color:var(--muted)">{{ $order->phone }}</small>
                        </td>
                        <td><strong>Rp{{ number_format($order->total, 0, ',', '.') }}</strong></td>
                        <td>
                            @if($order->payment_status === 'paid')
                                <span class="badge badge-paid">LUNAS</span>
                            @else
                                <span class="badge badge-pending">PENDING</span>
                            @endif
                        </td>
                        <td>
                            <span class="badge badge-{{ $order->status }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.orders.show', $order->id) }}" class="btn-sm btn-view">Detail</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align:center;padding:30px;color:var(--muted);">
                            Belum ada pesanan masuk saat ini.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Akses Cepat Fitur Admin -->
    <div>
        <div class="panel">
            <div class="panel-header">
                <h2>Kelola Fitur Flowery</h2>
            </div>
            <div style="padding:18px;display:grid;gap:12px;">
                <a href="{{ route('admin.products.index') }}" style="display:flex;align-items:center;justify-content:space-between;padding:14px;background:var(--soft-pink);border-radius:10px;text-decoration:none;color:var(--ink);">
                    <div>
                        <strong style="display:block;font-size:14px;">💐 Kelola Produk Bunga</strong>
                        <span style="font-size:12px;color:var(--muted)">Atur stok, foto, dan harga buket</span>
                    </div>
                    <span style="color:var(--pink);font-weight:bold;">→</span>
                </a>
                <a href="{{ route('admin.categories.index') }}" style="display:flex;align-items:center;justify-content:space-between;padding:14px;background:var(--soft-pink);border-radius:10px;text-decoration:none;color:var(--ink);">
                    <div>
                        <strong style="display:block;font-size:14px;">🏷️ Kelola Kategori</strong>
                        <span style="font-size:12px;color:var(--muted)">Klasifikasi tema (wisuda, romantis, dll)</span>
                    </div>
                    <span style="color:var(--pink);font-weight:bold;">→</span>
                </a>
                <a href="{{ route('admin.orders.index') }}" style="display:flex;align-items:center;justify-content:space-between;padding:14px;background:var(--soft-pink);border-radius:10px;text-decoration:none;color:var(--ink);">
                    <div>
                        <strong style="display:block;font-size:14px;">📦 Proses Pesanan & Resi</strong>
                        <span style="font-size:12px;color:var(--muted)">Ubah status pesanan & no resi kirim</span>
                    </div>
                    <span style="color:var(--pink);font-weight:bold;">→</span>
                </a>
                <a href="{{ route('admin.reports.index') }}" style="display:flex;align-items:center;justify-content:space-between;padding:14px;background:var(--soft-pink);border-radius:10px;text-decoration:none;color:var(--ink);">
                    <div>
                        <strong style="display:block;font-size:14px;">📈 Laporan Pendapatan</strong>
                        <span style="font-size:12px;color:var(--muted)">Rekap omset dan statistik penjualan</span>
                    </div>
                    <span style="color:var(--pink);font-weight:bold;">→</span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
