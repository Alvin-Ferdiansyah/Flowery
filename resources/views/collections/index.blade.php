<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koleksi Lengkap Buket Bunga | Flowery</title>
    <style>
        :root {
            --pink: #d94f79;
            --pink-dark: #bd3d65;
            --soft: #fff5f8;
            --ink: #302b2d;
            --muted: #736a6d;
            --line: #fae1e8;
        }

        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            color: var(--ink);
            background: #fffafa;
        }

        nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 18px 8%;
            background: #fff;
            border-bottom: 1px solid #f2dfe5;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .logo {
            color: var(--pink);
            font-family: Georgia, serif;
            font-size: 30px;
            font-weight: 700;
            text-decoration: none;
        }

        .logo span {
            color: var(--ink);
        }

        nav ul {
            display: flex;
            gap: 28px;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        nav ul a {
            color: var(--ink);
            font-size: 15px;
            text-decoration: none;
            transition: .2s;
        }

        nav ul a:hover,
        nav ul a[aria-current="page"] {
            color: var(--pink);
            font-weight: bold;
        }

        /* BUTTON KOTAK RAPI TANPA PANAH */
        .btn {
            display: inline-block;
            border-radius: 4px;
            padding: 10px 18px;
            background: var(--pink);
            color: #fff;
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
            border: 0;
            cursor: pointer;
            transition: .2s;
        }

        .btn:hover {
            background: var(--pink-dark);
        }

        main {
            width: min(1180px, 90%);
            margin: 0 auto;
            padding: 40px 0 80px;
        }

        .header-section {
            text-align: center;
            margin-bottom: 35px;
        }

        .eyebrow {
            margin: 0;
            color: var(--pink);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: .16em;
        }

        h1 {
            margin: 8px 0;
            font-family: Georgia, serif;
            font-size: clamp(30px, 4vw, 42px);
        }

        .lead {
            max-width: 600px;
            margin: 0 auto;
            color: var(--muted);
            line-height: 1.6;
            font-size: 15px;
        }

        /* SEARCH BAR */
        .search-container {
            max-width: 600px;
            margin: 25px auto 0;
            display: flex;
            gap: 8px;
        }

        .search-input {
            flex: 1;
            padding: 12px 18px;
            border: 1px solid #ebd0da;
            border-radius: 4px;
            font-size: 14px;
            outline: none;
            background: #fff;
        }

        .search-input:focus {
            border-color: var(--pink);
            box-shadow: 0 0 0 3px rgba(217, 79, 121, 0.15);
        }

        .search-btn {
            border-radius: 4px;
            padding: 12px 22px;
            background: var(--pink);
            color: white;
            border: 0;
            font-weight: bold;
            cursor: pointer;
        }

        .search-btn:hover {
            background: var(--pink-dark);
        }

        /* FILTER KATEGORI PILLS */
        .category-filter {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            justify-content: center;
            margin-top: 25px;
        }

        .category-pill {
            display: inline-block;
            border: 1px solid #ebd0da;
            border-radius: 4px;
            padding: 8px 16px;
            background: #fff;
            color: #55444a;
            font-size: 13px;
            text-decoration: none;
            transition: .2s;
        }

        .category-pill:hover,
        .category-pill.active {
            background: var(--pink);
            color: white;
            border-color: var(--pink);
            font-weight: bold;
        }

        /* PRODUCT GRID */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 22px;
            margin-top: 36px;
        }

        .product-card {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 6px;
            overflow: hidden;
            box-shadow: 0 6px 18px rgba(103, 48, 64, 0.06);
            transition: transform .2s, box-shadow .2s;
            display: flex;
            flex-direction: column;
        }

        .product-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 24px rgba(103, 48, 64, 0.12);
        }

        .product-card a {
            color: inherit;
            text-decoration: none;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .product-img {
            width: 100%;
            height: 240px;
            object-fit: cover;
        }

        .product-info {
            padding: 16px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .product-info .cat-tag {
            font-size: 11px;
            color: var(--pink);
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: .05em;
            margin-bottom: 4px;
        }

        .product-info h2 {
            margin: 0 0 6px;
            font-size: 16px;
            font-weight: 600;
            color: var(--ink);
            line-height: 1.35;
        }

        .product-info p.desc-short {
            margin: 0 0 12px;
            font-size: 12px;
            color: var(--muted);
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .price-row {
            margin-top: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 8px;
            border-top: 1px solid #fcf0f3;
        }

        .product-info .price {
            margin: 0;
            color: var(--pink);
            font-weight: 700;
            font-size: 16px;
        }

        .btn-view-card {
            border-radius: 4px;
            padding: 6px 12px;
            background: var(--soft);
            color: var(--pink);
            font-size: 12px;
            font-weight: bold;
            border: 1px solid #f6cfdc;
        }

        .empty-state {
            grid-column: 1 / -1;
            text-align: center;
            padding: 60px 20px;
            background: white;
            border: 1px dashed #ebd0da;
            border-radius: 6px;
        }

        @media (max-width: 950px) {
            .product-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 650px) {
            nav {
                padding: 16px 5%;
            }
            nav ul {
                display: none;
            }
            main {
                width: calc(100% - 32px);
                padding-top: 30px;
            }
            .product-grid {
                grid-template-columns: 1fr;
            }
            .product-img {
                height: 260px;
            }
        }
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
        <div style="display:flex;align-items:center;gap:12px;">
            <a href="{{ route('cart.index') }}" style="color:var(--pink);text-decoration:none;font-weight:bold;font-size:14px;">
                🛒 Keranjang
            </a>
            @guest
                <a class="btn" href="{{ route('login') }}">Masuk</a>
            @else
                <a class="btn" href="{{ route('profile.edit') }}">Profil</a>
            @endguest
        </div>
    </nav>

    <main>
        <div class="header-section">
            <p class="eyebrow">KATALOG LENGKAP FLOWERY</p>
            <h1>Koleksi Buket Bunga Artificial</h1>
            <p class="lead">Pilih dari puluhan rangkaian bunga tiruan berkualitas tinggi dengan detail realistis, siap kirim dan tahan bertahun-tahun.</p>

            <!-- SEARCH BAR -->
            <form method="GET" action="{{ route('collections.index') }}" class="search-container">
                @if($selectedCategorySlug)
                    <input type="hidden" name="kategori" value="{{ $selectedCategorySlug }}">
                @endif
                <input type="text" name="q" value="{{ $search }}" class="search-input" placeholder="Cari nama buket, jenis bunga (mawar, tulip, dll), atau warna...">
                <button type="submit" class="search-btn">Cari Bunga</button>
            </form>

            <!-- FILTER KATEGORI -->
            <div class="category-filter">
                <a href="{{ route('collections.index', array_filter(['q' => $search])) }}" class="category-pill {{ !$selectedCategorySlug ? 'active' : '' }}">
                    Semua Koleksi ({{ $categories->sum('products_count') }})
                </a>
                @foreach($categories as $cat)
                    <a href="{{ route('collections.index', array_filter(['kategori' => $cat->slug, 'q' => $search])) }}" class="category-pill {{ $selectedCategorySlug === $cat->slug ? 'active' : '' }}">
                        {{ $cat->name }} ({{ $cat->products_count }})
                    </a>
                @endforeach
            </div>
        </div>

        @if($search)
            <p style="margin: 20px 0 10px; font-size: 14px; color: var(--muted);">
                Hasil pencarian untuk "<strong>{{ $search }}</strong>" ({{ $products->total() }} produk ditemukan):
                <a href="{{ route('collections.index', array_filter(['kategori' => $selectedCategorySlug])) }}" style="color: var(--pink); margin-left: 8px;">Reset pencarian</a>
            </p>
        @endif

        <div class="product-grid">
            @forelse ($products as $product)
                <article class="product-card">
                    <a href="{{ route('flowers.show', $product->slug) }}">
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="product-img">
                        <div class="product-info">
                            <span class="cat-tag">{{ $product->category?->name ?? 'Buket Bunga' }}</span>
                            <h2>{{ $product->name }}</h2>
                            <p class="desc-short">{{ $product->description }}</p>
                            <div class="price-row">
                                <span class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                <span class="btn-view-card">Pilih Buket</span>
                            </div>
                        </div>
                    </a>
                </article>
            @empty
                <div class="empty-state">
                    <h3>Tidak ada produk yang cocok</h3>
                    <p style="color:var(--muted);margin:8px 0 16px;">Coba gunakan kata kunci lain atau pilih kategori buket yang berbeda.</p>
                    <a href="{{ route('collections.index') }}" class="btn">Tampilkan Semua Produk</a>
                </div>
            @endforelse
        </div>

        <div style="margin-top: 36px;">
            {{ $products->links() }}
        </div>
    </main>
</body>

</html>
