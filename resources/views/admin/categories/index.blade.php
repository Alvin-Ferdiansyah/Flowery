@extends('admin.layout')

@section('title', 'Kelola Kategori')

@section('content')
<div class="top-bar">
    <div>
        <h1>Daftar Kategori Buket</h1>
        <p style="color:var(--muted);margin:4px 0 0;font-size:14px;">Kelola pengelompokan jenis buket bunga di toko Flowery.</p>
    </div>
    <a href="{{ route('admin.categories.create') }}" class="action-link">
        + Tambah Kategori Baru
    </a>
</div>

<div class="panel" style="max-width:850px;">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kategori</th>
                <th>Slug URL</th>
                <th>Jumlah Produk Terkait</th>
                <th style="text-align:right;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>#{{ $category->id }}</td>
                    <td><strong>{{ $category->name }}</strong></td>
                    <td><code>{{ $category->slug }}</code></td>
                    <td>{{ $category->products_count }} produk</td>
                    <td style="text-align:right;">
                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn-sm btn-edit">Edit</a>
                        <form method="POST" action="{{ route('admin.categories.destroy', $category->id) }}" style="display:inline;" onsubmit="return confirm('Hapus kategori ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-sm btn-delete">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align:center;padding:30px;color:var(--muted);">
                        Belum ada kategori buket.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div style="margin-top:16px;">
    {{ $categories->links() }}
</div>
@endsection

