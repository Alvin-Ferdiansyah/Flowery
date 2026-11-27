@extends('admin.layout')

@section('title', 'Daftar Pelanggan')

@section('content')
<div class="top-bar">
    <div>
        <h1>Daftar Pelanggan Terdaftar</h1>
        <p style="color:var(--muted);margin:4px 0 0;font-size:14px;">Data pengguna dan riwayat transaksi pembeli di Flowery.</p>
    </div>
</div>

<div class="panel">
    <table class="table">
        <thead>
            <tr>
                <th>Nama Pelanggan</th>
                <th>Alamat Email</th>
                <th>Role</th>
                <th>Total Pesanan Dibuat</th>
                <th>Tanggal Bergabung</th>
            </tr>
        </thead>
        <tbody>
            @forelse($customers as $customer)
                <tr>
                    <td><strong>{{ $customer->name }}</strong></td>
                    <td>{{ $customer->email }}</td>
                    <td><span class="badge badge-confirmed">{{ ucfirst($customer->role) }}</span></td>
                    <td><strong>{{ $customer->orders_count }} pesanan</strong></td>
                    <td>{{ $customer->created_at->format('d/m/Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align:center;padding:30px;color:var(--muted);">
                        Belum ada pelanggan terdaftar.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div style="margin-top:16px;">
    {{ $customers->links() }}
</div>
@endsection

