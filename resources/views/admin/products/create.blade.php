@extends('admin.layout')

@section('title', 'Tambah Produk Baru')

@section('content')
<div class="top-bar">
    <div>
        <h1>Tambah Produk Buket Baru</h1>
        <p style="color:var(--muted);margin:4px 0 0;font-size:14px;">Masukkan rincian buket bunga baru yang akan ditampilkan di etalase toko.</p>
    </div>
    <a href="{{ route('admin.products.index') }}" class="btn-sm btn-view" style="padding:10px 16px;">
        ← Kembali ke Daftar Produk
    </a>
</div>

<div class="panel" style="max-width:750px;padding:28px;">
    <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Nama Buket Bunga *</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Contoh: Buket Mawar Pink Pastel" required>
            @error('name')<small style="color:red">{{ $message }}</small>@enderror
        </div>

        <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;">
            <div class="form-group">
                <label for="category_id">Kategori Buket</label>
                <select id="category_id" name="category_id">
                    <option value="">Pilih Kategori (opsional)</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="price">Harga Satuan (Rp) *</label>
                <input type="number" id="price" name="price" value="{{ old('price', 150000) }}" required>
                @error('price')<small style="color:red">{{ $message }}</small>@enderror
            </div>
        </div>

        <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;">
            <div class="form-group">
                <label for="variety">Jenis Bunga</label>
                <input type="text" id="variety" name="variety" value="{{ old('variety') }}" placeholder="Contoh: Mawar & Baby Breath">
            </div>
            <div class="form-group">
                <label for="colour">Warna Dominan</label>
                <input type="text" id="colour" name="colour" value="{{ old('colour') }}" placeholder="Contoh: Pink Pastel & Cream">
            </div>
        </div>

        <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;">
            <div class="form-group">
                <label for="stock">Jumlah Stok Tersedia *</label>
                <input type="number" id="stock" name="stock" value="{{ old('stock', 10) }}" required>
            </div>
            <div class="form-group">
                <label for="image">Upload Foto Bunga (atau URL)</label>
                <input type="file" id="image" name="image" accept="image/*">
            </div>
        </div>

        <div class="form-group">
            <label for="description">Deskripsi Lengkap Buket</label>
            <textarea id="description" name="description" rows="4" placeholder="Jelaskan keunikan dan keindahan rangkaian bunga ini...">{{ old('description') }}</textarea>
        </div>

        <div class="form-group" style="display:flex;align-items:center;gap:10px;">
            <input type="checkbox" id="is_active" name="is_active" value="1" checked style="width:auto;">
            <label for="is_active" style="margin:0;cursor:pointer;">Tampilkan produk ini langsung di katalog (Aktif)</label>
        </div>

        <button type="submit" class="action-link" style="border:0;cursor:pointer;padding:12px 24px;font-size:14px;margin-top:10px;">
            Simpan & Publikasikan Produk
        </button>
    </form>
</div>
@endsection

