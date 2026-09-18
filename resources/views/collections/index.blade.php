<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koleksi Bunga | Flowery</title>
    <style>
        :root { --pink: #e75480; --ink: #333; --muted: #777; }
        * { box-sizing: border-box; font-family: Arial, sans-serif; }
        body { margin: 0; color: var(--ink); }
        nav { display: flex; align-items: center; justify-content: space-between; padding: 20px 8%; box-shadow: 0 2px 10px rgb(0 0 0 / .05); }
        .logo { color: var(--pink); font-size: 30px; font-weight: 700; text-decoration: none; }
        .logo span { color: var(--ink); }
        nav ul { display: flex; gap: 30px; margin: 0; padding: 0; list-style: none; }
        nav ul a { color: var(--ink); font-size: 15px; text-decoration: none; }
        nav ul a:hover, nav ul a[aria-current="page"] { color: var(--pink); }
        .btn { border-radius: 8px; padding: 12px 22px; background: var(--pink); color: #fff; font-size: 15px; text-decoration: none; }
        main { width: min(1180px, 88%); margin: 0 auto; padding: 60px 0 80px; }
        .eyebrow { margin: 0; color: var(--pink); font-size: 12px; font-weight: 700; letter-spacing: .16em; }
        h1 { margin: 10px 0; font-family: Georgia, serif; font-size: clamp(34px, 5vw, 48px); }
        .lead { max-width: 550px; margin: 0; color: var(--muted); line-height: 1.6; }
        .collection-list { display: flex; flex-wrap: wrap; gap: 10px; margin-top: 24px; }
        .collection-list span { border: 1px solid #f1cbd7; border-radius: 99px; padding: 9px 14px; background: #fff7f9; color: #b94068; font-size: 13px; }
        .product-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-top: 42px; }
        .product { overflow: hidden; border-radius: 8px; background: #fff; box-shadow: 0 7px 18px rgb(103 48 64 / .1); transition: transform .2s; }
        .product:hover { transform: translateY(-4px); }
        .product a { color: inherit; text-decoration: none; }
        .product img { display: block; width: 100%; height: 230px; object-fit: cover; }
        .product-copy { padding: 15px; }
        .product h2 { margin: 0; font-size: 16px; }
        .price { margin: 10px 0 0; color: var(--pink); font-weight: 700; }
        .empty { margin-top: 42px; color: var(--muted); }
        @media (max-width: 900px) { .product-grid { grid-template-columns: repeat(2, 1fr); } }
        @media (max-width: 650px) { nav { padding: 18px 5%; } nav ul { display: none; } main { width: calc(100% - 32px); padding-top: 45px; } .product-grid { grid-template-columns: 1fr; } .product img { height: 280px; } }
    </style>
</head>

<body>
    <nav>
        <a class="logo" href="{{ route('home') }}">Flowery<span>.</span></a>
        <ul>
            <li><a href="{{ route('home') }}">Beranda</a></li>
            <li><a href="{{ route('collections.index') }}" aria-current="page">Koleksi</a></li>
            <li><a href="{{ route('home') }}#tentang">Tentang Kami</a></li>
            <li><a href="{{ route('home') }}#kontak">Kontak</a></li>
        </ul>
        @guest
            <a class="btn" href="{{ route('login') }}">Masuk</a>
        @else
            <a class="btn" href="{{ route('profile.edit') }}">Profil</a>
        @endguest
    </nav>

    <main>
        <p class="eyebrow">KOLEKSI FLOWERY</p>
        <h1>Semua Produk Bunga</h1>
        <p class="lead">Temukan rangkaian bunga artificial pilihan untuk hadiah, dekorasi, dan setiap momen spesialmu.</p>
        <div class="collection-list" aria-label="Pilihan koleksi"><span>Buket Mawar</span><span>Buket Lily</span><span>Buket Tulip</span><span>Buket Peony</span><span>Wisuda</span><span>Anniversary</span><span>Ulang Tahun</span><span>Dekorasi Rumah</span><span>Rangkaian Acara</span></div>

        <div class="product-grid">
            @forelse ($products as $product)
                <article class="product">
                    <a href="{{ route('flowers.show', $product->slug) }}">
                        <img src="{{ $product->image }}" alt="{{ $product->name }}">
                        <div class="product-copy">
                            <h2>{{ $product->name }}</h2>
                            <p class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        </div>
                    </a>
                </article>
            @empty
                <p class="empty">Belum ada produk yang tersedia.</p>
            @endforelse
        </div>
    </main>
</body>

</html>
