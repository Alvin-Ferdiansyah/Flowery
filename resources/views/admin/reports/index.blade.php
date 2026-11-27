@extends('admin.layout')

@section('title', 'Laporan Penjualan')

@section('content')
<div class="top-bar">
    <div>
        <h1>Laporan Pendapatan & Penjualan</h1>
        <p style="color:var(--muted);margin:4px 0 0;font-size:14px;">Rekapitulasi transaksi lunas dan performa toko bunga Flowery.</p>
    </div>
</div>

<div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(220px, 1fr));gap:18px;margin-bottom:30px;">
    <div style="background:#fff;border:1px solid var(--line);border-radius:14px;padding:22px;">
        <span style="color:var(--muted);font-size:13px;display:block;">Total Omset (Lunas)</span>
        <strong style="font-size:28px;color:#27ae60;display:block;margin-top:6px;">Rp{{ number_format($totalRevenue, 0, ',', '.') }}</strong>
    </div>
    <div style="background:#fff;border:1px solid var(--line);border-radius:14px;padding:22px;">
        <span style="color:var(--muted);font-size:13px;display:block;">Jumlah Transaksi Lunas</span>
        <strong style="font-size:28px;color:var(--pink);display:block;margin-top:6px;">{{ $paidOrdersCount }} transaksi</strong>
    </div>
    <div style="background:#fff;border:1px solid var(--line);border-radius:14px;padding:22px;">
        <span style="color:var(--muted);font-size:13px;display:block;">Pesanan Perlu Diproses</span>
        <strong style="font-size:28px;color:#f39c12;display:block;margin-top:6px;">{{ $pendingOrdersCount }} pesanan</strong>
    </div>
    <div style="background:#fff;border:1px solid var(--line);border-radius:14px;padding:22px;">
        <span style="color:var(--muted);font-size:13px;display:block;">Pesanan Selesai Dikirim</span>
        <strong style="font-size:28px;color:#2980b9;display:block;margin-top:6px;">{{ $completedOrdersCount }} selesai</strong>
    </div>
</div>

<div class="panel">
    <div class="panel-header">
        <h2>Riwayat Transaksi Penjualan Masuk (Lunas)</h2>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>No. Resi</th>
                <th>Tanggal Bayar</th>
                <th>Nama Pelanggan</th>
                <th>Metode Bayar</th>
                <th>Item Dibeli</th>
                <th style="text-align:right;">Nominal Lunas</th>
            </tr>
        </thead>
        <tbody>
            @forelse($recentSales as $sale)
                <tr>
                    <td><strong style="color:var(--pink);">{{ $sale->order_number }}</strong></td>
                    <td>{{ $sale->updated_at->format('d/m/Y H:i') }}</td>
                    <td>{{ $sale->customer_name }}</td>
                    <td><span class="badge badge-confirmed">{{ str_replace('_', ' ', strtoupper($sale->payment_method ?: 'QRIS')) }}</span></td>
                    <td>{{ $sale->items->count() }} item buket</td>
                    <td style="text-align:right;font-weight:bold;color:#27ae60;">Rp{{ number_format($sale->total, 0, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align:center;padding:35px;color:var(--muted);">
                        Belum ada transaksi pembayaran yang berhasil / lunas.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div style="margin-top:16px;">
    {{ $recentSales->links() }}
</div>
@endsection

