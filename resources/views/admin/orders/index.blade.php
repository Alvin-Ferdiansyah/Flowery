@extends('admin.layout')

@section('title', 'Kelola Pesanan Masuk')

@section('content')
<div class="top-bar">
    <div>
        <h1>Daftar Pesanan & Resi Pelanggan</h1>
        <p style="color:var(--muted);margin:4px 0 0;font-size:14px;">Pantau semua pesanan masuk, status pembayaran, dan pengiriman florist.</p>
    </div>
</div>

<!-- FILTER STATUS -->
<div style="display:flex;gap:10px;margin-bottom:20px;flex-wrap:wrap;">
    <a href="{{ route('admin.orders.index') }}" class="btn-sm {{ !request('status') ? 'btn-edit' : 'btn-view' }}" style="padding:8px 14px;">Semua Pesanan</a>
    <a href="{{ route('admin.orders.index', ['status' => 'pending']) }}" class="btn-sm {{ request('status') === 'pending' ? 'btn-edit' : 'btn-view' }}" style="padding:8px 14px;">Pending</a>
    <a href="{{ route('admin.orders.index', ['status' => 'confirmed']) }}" class="btn-sm {{ request('status') === 'confirmed' ? 'btn-edit' : 'btn-view' }}" style="padding:8px 14px;">Dikonfirmasi / Lunas</a>
    <a href="{{ route('admin.orders.index', ['status' => 'processing']) }}" class="btn-sm {{ request('status') === 'processing' ? 'btn-edit' : 'btn-view' }}" style="padding:8px 14px;">Sedang Dirangkai</a>
    <a href="{{ route('admin.orders.index', ['status' => 'completed']) }}" class="btn-sm {{ request('status') === 'completed' ? 'btn-edit' : 'btn-view' }}" style="padding:8px 14px;">Selesai</a>
</div>

<div class="panel">
    <table class="table">
        <thead>
            <tr>
                <th>No. Resi Pesanan</th>
                <th>Nama Pelanggan</th>
                <th>Pengiriman & Jadwal</th>
                <th>Total Bayar</th>
                <th>Status Pembayaran</th>
                <th>Status Pesanan</th>
                <th style="text-align:right;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
                <tr>
                    <td>
                        <strong style="color:var(--pink);">{{ $order->order_number }}</strong><br>
                        <small style="color:var(--muted);">{{ $order->created_at->format('d/m/Y H:i') }}</small>
                    </td>
                    <td>
                        <strong>{{ $order->customer_name }}</strong><br>
                        <small style="color:var(--muted)">📱 {{ $order->phone }}</small>
                    </td>
                    <td>
                        <span style="font-weight:bold;">{{ strtoupper($order->shipping_method ?: 'Reguler') }}</span><br>
                        <small style="color:var(--muted)">
                            {{ $order->city ?: 'Tujuan' }} 
                            @if($order->delivery_date)
                                • Tgl: {{ $order->delivery_date->format('d/m/Y') }}
                            @endif
                        </small>
                    </td>
                    <td>
                        <strong>Rp{{ number_format($order->total, 0, ',', '.') }}</strong><br>
                        <small style="color:var(--muted)">{{ str_replace('_', ' ', strtoupper($order->payment_method ?: 'Midtrans')) }}</small>
                    </td>
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
                    <td style="text-align:right;">
                        <a href="{{ route('admin.orders.show', $order->id) }}" class="btn-sm btn-edit">Kelola & Detail</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align:center;padding:35px;color:var(--muted);">
                        Belum ada pesanan yang sesuai filter ini.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div style="margin-top:16px;">
    {{ $orders->links() }}
</div>
@endsection

