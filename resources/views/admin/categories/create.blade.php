@extends('admin.layout')

@section('title', 'Tambah Kategori')

@section('content')
<div class="top-bar">
    <div>
        <h1>Tambah Kategori Buket Baru</h1>
        <p style="color:var(--muted);margin:4px 0 0;font-size:14px;">Tambahkan klasifikasi kategori baru untuk katalog buket bunga.</p>
    </div>
    <a href="{{ route('admin.categories.index') }}" class="btn-sm btn-view" style="padding:10px 16px;">
        ← Kembali ke Kategori
    </a>
</div>

<div class="panel" style="max-width:550px;padding:28px;">
    <form method="POST" action="{{ route('admin.categories.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Nama Kategori *</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Contoh: Buket Wisuda / Valentine" required>
            @error('name')<small style="color:red">{{ $message }}</small>@enderror
        </div>

        <button type="submit" class="action-link" style="border:0;cursor:pointer;padding:12px 24px;font-size:14px;margin-top:10px;">
            Simpan Kategori Baru
        </button>
    </form>
</div>
@endsection

