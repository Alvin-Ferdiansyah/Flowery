@extends('admin.layout')

@section('title', 'Kelola Produk')

@section('content')
<div class="top-bar">
    <div>
        <h1>Daftar Produk Buket Bunga</h1>
        <p style="color:var(--muted);margin:4px 0 0;font-size:14px;">Kelola stok, harga, dan ketersediaan bunga di website Flowery.</p>
    </div>
    <a href="{{ route('admin.products.create') }}" class="action-link">
        + Tambah Produk Baru
    </a>
</div>

<div class="panel">
    <table class="table">
        <thead>
            <tr>
                <th style="width:70px;">Foto</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Status</th>
                <th style="text-align:right;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
                <tr>
                    <td>
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" style="width:50px;height:50px;border-radius:8px;object-fit:cover;">
                    </td>
                    <td>
                        <strong>{{ $product->name }}</strong><br>
                        <small style="color:var(--muted)">{{ $product->variety ?: 'Artificial Flower' }}</small>
                    </td>
                    <td>{{ $product->category?->name ?? 'Umum' }}</td>
                    <td><strong>Rp{{ number_format($product->price, 0, ',', '.') }}</strong></td>
                    <td>
                        <span style="font-weight:bold;color:{{ $product->stock > 5 ? '#27ae60' : '#e74c3c' }}">
                            {{ $product->stock }} pcs
                        </span>
                    </td>
                    <td>
                        @if($product->is_active)
                            <span class="badge badge-paid">Aktif</span>
                        @else
                            <span class="badge badge-cancelled">Nonaktif</span>
                        @endif
                    </td>
                    <td style="text-align:right;">
                        <a href="{{ route('flowers.show', $product->slug) }}" target="_blank" class="btn-sm btn-view">Lihat</a>
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn-sm btn-edit">Edit</a>
                        <form method="POST" action="{{ route('admin.products.destroy', $product->id) }}" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-sm btn-delete">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align:center;padding:30px;color:var(--muted);">
                        Belum ada produk bunga yang ditambahkan.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div style="margin-top:16px;">
    {{ $products->links() }}
</div>
@endsection

