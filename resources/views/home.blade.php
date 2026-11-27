<!DOCTYPE html>
<html lang="id">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Flowery | Buket Bunga Artificial</title>
        <style>
                @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600&display=swap');

                :root {
                        --pink: #d93670;
                        --rose: #fff4f6;
                        --ink: #302b2d;
                        --muted: #736a6d;
                }

                * {
                        box-sizing: border-box;
                }

                html {
                        scroll-behavior: smooth;
                }

                body {
                        margin: 0;
                        color: var(--ink);
                        font-family: 'DM Sans', Arial, sans-serif;
                }

                a {
                        color: inherit;
                        text-decoration: none;
                }

                img {
                        display: block;
                        width: 100%;
                }

                h1,
                h2,
                h3,
                p {
                        margin: 0;
                }

                .container {
                        width: min(1180px, calc(100% - 48px));
                        margin: auto;
                }

                .display {
                        font-family: 'Playfair Display', Georgia, serif;
                        font-weight: 500;
                }

                .eyebrow {
                        color: var(--pink);
                        font-size: 10px;
                        font-weight: 700;
                        letter-spacing: 1.8px;
                }

                .button {
                        display: inline-block;
                        margin-top: 22px;
                        padding: 12px 20px;
                        border-radius: 4px;
                        background: var(--pink);
                        color: #fff;
                        font-size: 13px;
                        font-weight: 700;
                        transition: .2s;
                        text-align: center;
                }

                .button:hover {
                        background: #b92058;
                }

                .site-header {
                        position: sticky;
                        top: 0;
                        z-index: 5;
                        background: #fffefaee;
                        border-bottom: 1px solid #f4eaec;
                        backdrop-filter: blur(8px);
                }

                .navigation {
                        display: flex;
                        min-height: 76px;
                        align-items: center;
                        justify-content: space-between;
                }

                .brand {
                        color: #d54877;
                        font-family: 'Playfair Display', Georgia, serif;
                        font-size: 30px;
                        font-weight: 600;
                }

                .menu {
                        display: flex;
                        gap: 31px;
                        margin: 0;
                        padding: 0;
                        list-style: none;
                        font-size: 15px;
                        font-weight: 600;
                }

                .menu a:hover {
                        color: var(--pink);
                }

                .nav-actions {
                        display: flex;
                        align-items: center;
                        gap: 15px;
                        color: var(--pink);
                }

                .icon {
                        font-size: 18px;
                }

                .login {
                        padding: 10px 18px;
                        border-radius: 4px;
                        background: var(--pink);
                        color: #fff;
                        font-size: 14px;
                        font-weight: 700;
                }

                .hero {
                        min-height: 445px;
                        background:  url('https://images.pexels.com/photos/15290949/pexels-photo-15290949.jpeg?auto=compress&cs=tinysrgb&w=1600') center/cover;
                }

                .hero .container {
                        display: flex;
                        min-height: 445px;
                        align-items: center;
                }

                .hero-copy {
                        max-width: 440px;
                }

                .hero h1 {
                        margin-top: 12px;
                        font-size: clamp(40px, 4vw, 58px);
                        line-height: .98;
                        letter-spacing: -2px;
                        color: #ffffff;
                }

                .hero-copy>p:last-of-type {
                        margin-top: 18px;
                        max-width: 370px;
                        color: #ffffff;
                        font-family: 'Playfair Display', Georgia, serif;
                        font-size: 15px;
                        line-height: 1.45;
                }

                section {
                        padding: 68px 0;
                }

                .section-heading {
                        text-align: center;
                }

                .section-heading h2 {
                        margin-top: 8px;
                        font-size: 28px;
                }

                .section-heading>p {
                        margin: 6px auto 0;
                        color: var(--muted);
                        font-family: 'Playfair Display', Georgia, serif;
                        font-size: 14px;
                }

                .moments {
                        display: grid;
                        grid-template-columns: repeat(5, 1fr);
                        gap: 14px;
                        margin-top: 27px;
                }

                .moment,
                .collection {
                        position: relative;
                        overflow: hidden;
                        border-radius: 5px;
                        background: #ead9db;
                }

                .moment {
                        min-height: 204px;
                }

                .moment::after,
                .collection::after {
                        content: '';
                        position: absolute;
                        inset: 0;
                        background: linear-gradient(transparent 45%, rgb(39 21 25 /.62));
                }

                .moment img,
                .collection img {
                        height: 100%;
                        object-fit: cover;
                        transition: transform .35s;
                }

                .moment:hover img,
                .collection:hover img {
                        transform: scale(1.05);
                }

                .moment span {
                        position: absolute;
                        right: 0;
                        bottom: 15px;
                        left: 0;
                        z-index: 1;
                        color: #fff;
                        font-family: 'Playfair Display', Georgia, serif;
                        text-align: center;
                }

                .soft {
                        background: linear-gradient(100deg, #fff2f4, #fff8f7);
                }

                .shop-layout,
                .collection-layout {
                        display: grid;
                        grid-template-columns: 280px 1fr;
                        align-items: center;
                        gap: 34px;
                }

                .intro h2 {
                        margin-top: 9px;
                        font-size: 29px;
                        line-height: 1.13;
                }

                .intro>p:not(.eyebrow) {
                        margin-top: 13px;
                        color: var(--muted);
                        font-family: 'Playfair Display', Georgia, serif;
                        font-size: 14px;
                        line-height: 1.5;
                }

                .product-grid {
                        display: grid;
                        grid-template-columns: repeat(4, 1fr);
                        gap: 15px;
                }

                .product {
                        overflow: hidden;
                        border-radius: 5px;
                        background: #fff;
                        box-shadow: 0 7px 18px rgb(103 48 64 /.08);
                }

                .product-image {
                        position: relative;
                        height: 177px;
                        overflow: hidden;
                        background: #f6ecec;
                }

                .product-image img {
                        height: 100%;
                        object-fit: cover;
                        transition: .3s;
                }

                .product:hover img {
                        transform: scale(1.04);
                }

                .badge {
                        position: absolute;
                        top: 9px;
                        left: 9px;
                        z-index: 1;
                        padding: 5px 7px;
                        border-radius: 2px;
                        background: var(--pink);
                        color: #fff;
                        font-size: 8px;
                        font-weight: 700;
                }

                .product-copy {
                        padding: 11px;
                }

                .product-copy h3 {
                        font-size: 11px;
                }

                .price {
                        margin-top: 8px;
                        color: var(--pink);
                        font-size: 12px;
                        font-weight: 700;
                }

                .rating {
                        margin-top: 7px;
                        color: #eaa11b;
                        font-size: 10px;
                        letter-spacing: 1px;
                }

                .rating small {
                        color: var(--muted);
                        letter-spacing: 0;
                }

                .empty-products {
                        grid-column: 1/-1;
                        color: var(--muted);
                }

                .collection-layout {
                        grid-template-columns: 245px 1fr;
                }

                .collection-grid {
                        display: grid;
                        grid-template-columns: repeat(3, 1fr);
                        gap: 15px;
                }

                .collection {
                        height: 205px;
                }

                .collection-copy {
                        position: absolute;
                        right: 15px;
                        bottom: 14px;
                        left: 15px;
                        z-index: 1;
                        color: #fff;
                }

                .collection-copy h3 {
                        font-family: 'Playfair Display', Georgia, serif;
                        font-size: 17px;
                        font-weight: 500;
                }

                .collection-copy span {
                        display: block;
                        margin-top: 6px;
                        font-size: 10px;
                }

                .story {
                        display: grid;
                        grid-template-columns: 1fr 1fr;
                        padding: 0;
                }

                .story-image {
                        min-height: 445px;
                        background: url('https://images.pexels.com/photos/15290949/pexels-photo-15290949.jpeg?auto=compress&cs=tinysrgb&w=1200') center/cover;
                }

                .story-copy {
                        display: flex;
                        flex-direction: column;
                        justify-content: center;
                        padding: 70px 12%;
                        background: linear-gradient(120deg, #8f4556, #633740);
                        color: #fff;
                }

                .story-copy .eyebrow {
                        color: #ffd1dd;
                }

                .story-copy h2 {
                        margin-top: 11px;
                        max-width: 420px;
                        font-size: 31px;
                        line-height: 1.14;
                }

                .story-copy>p:not(.eyebrow) {
                        margin-top: 15px;
                        max-width: 430px;
                        color: #faeaee;
                        font-size: 13px;
                        line-height: 1.6;
                }

                .benefits {
                        display: grid;
                        grid-template-columns: repeat(4, 1fr);
                        gap: 24px;
                        padding: 45px 0;
                        text-align: center;
                }

                .benefit-icon {
                        display: grid;
                        width: 47px;
                        height: 47px;
                        place-items: center;
                        margin: 0 auto 12px;
                        border-radius: 50%;
                        background: #fff0f4;
                        color: var(--pink);
                        font-size: 21px;
                }

                .benefit h3 {
                        font-family: 'Playfair Display', Georgia, serif;
                        font-size: 16px;
                        font-weight: 500;
                }

                .benefit p {
                        margin: 6px auto 0;
                        max-width: 205px;
                        color: var(--muted);
                        font-size: 11px;
                        line-height: 1.5;
                }

                .newsletter {
                        padding: 29px 0;
                        background: #fff0f3;
                }

                .newsletter .container,
                .footer-content {
                        display: flex;
                        align-items: center;
                        justify-content: space-between;
                        gap: 28px;
                }

                .newsletter h2 {
                        font-size: 17px;
                }

                .newsletter p {
                        margin-top: 4px;
                        color: var(--muted);
                        font-size: 11px;
                }

                .newsletter form {
                        display: flex;
                        gap: 7px;
                        width: min(390px, 100%);
                }

                .newsletter input {
                        min-width: 0;
                        flex: 1;
                        border: 1px solid #f0dadd;
                        border-radius: 5px;
                        padding: 12px;
                        font: inherit;
                        font-size: 11px;
                }

                .newsletter button {
                        border: 0;
                        border-radius: 5px;
                        padding: 0 19px;
                        background: var(--pink);
                        color: #fff;
                        font: inherit;
                        font-size: 11px;
                        font-weight: 700;
                }

                footer {
                        padding: 23px 0;
                        background: #442d33;
                        color: #f8e9ed;
                }

                .footer-content .brand {
                        color: #fff;
                        font-size: 23px;
                }

                .footer-links {
                        display: flex;
                        gap: 22px;
                        font-size: 10px;
                }

                .copyright {
                        color: #d8bdc5;
                        font-size: 9px;
                }

                @media(max-width:900px) {

                        .shop-layout,
                        .collection-layout {
                                grid-template-columns: 1fr;
                        }

                        .intro {
                                text-align: center;
                        }

                        .product-grid {
                                grid-template-columns: repeat(2, 1fr);
                        }

                        .story-copy {
                                padding: 55px 8%;
                        }
                }

                @media(max-width:650px) {
                        .container {
                                width: calc(100% - 32px);
                        }

                        .menu,
                        .icon {
                                display: none;
                        }

                        .navigation {
                                min-height: 61px;
                        }

                        .hero,
                        .hero .container {
                                min-height: 405px;
                        }

                        .hero {
                                background-position: 63% center;
                        }

                        .hero-copy {
                                padding-bottom: 130px;
                        }

                        .hero h1 {
                                font-size: 40px;
                        }

                        section {
                                padding: 50px 0;
                        }

                        .moments {
                                grid-template-columns: repeat(2, 1fr);
                        }

                        .moment {
                                min-height: 180px;
                        }

                        .product-image {
                                height: 180px;
                        }

                        .collection-grid,
                        .story {
                                grid-template-columns: 1fr;
                        }

                        .collection {
                                height: 220px;
                        }

                        .story-image {
                                min-height: 280px;
                        }

                        .benefits {
                                grid-template-columns: repeat(2, 1fr);
                        }

                        .newsletter .container,
                        .footer-content {
                                align-items: flex-start;
                                flex-direction: column;
                        }

                        .newsletter form {
                                width: 100%;
                        }
                }
        </style>
</head>

<body>
        <header class="site-header">
                <nav class="navigation container"><a class="brand" href="{{ route('home') }}">Flowery.</a>
                        <ul class="menu">
                                <li><a href="#momen">Momen</a></li>
                                <li><a href="#produk">Buket Bunga</a></li>
                                <li><a href="{{ route('collections.index') }}">Koleksi</a></li>
                                <li><a href="#tentang">Tentang Kami</a></li>
                        </ul>
                        <div class="nav-actions">
                                @guest
                                        <a class="login" href="{{ route('login') }}">Masuk</a>
                                @else
                                        <a class="login" href="{{ route('profile.edit') }}">Profil</a>
                                @endguest
                        </div>
                </nav>
        </header>
        <main>
                <section class="hero">
                        <div class="container">
                                <div class="hero-copy">
                                        <p class="eyebrow">BUNGA ARTIFICIAL, KEINDAHAN YANG TAHAN LAMA</p>
                                        <h1 class="display">Hadiah yang<br>selalu punya arti.</h1>
                                        <p>Pilih buket bunga palsu dengan tampilan realistis dan rangkaian penuh perhatian untuk menyampaikan setiap perasaanmu.</p><a class="button" href="#produk">Belanja Sekarang</a>
                                </div>
                        </div>
                </section>
                <section id="momen">
                        <div class="container">
                                <div class="section-heading">
                                        <h2 class="display">Temukan hadiah untuk momennya</h2>
                                        <p>Mulai dari perayaan sederhana sampai hari yang tak terlupakan.</p>
                                </div>
                                <div class="moments">
                                    <a class="moment" href="{{ route('collections.index', ['kategori' => 'ulang-tahun']) }}"><img src="https://images.pexels.com/photos/15290942/pexels-photo-15290942.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Ulang Tahun"><span>Ulang Tahun</span></a>
                                    <a class="moment" href="{{ route('collections.index', ['kategori' => 'anniversary']) }}"><img src="https://images.pexels.com/photos/15290940/pexels-photo-15290940.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Anniversary"><span>Anniversary</span></a>
                                    <a class="moment" href="{{ route('collections.index', ['kategori' => 'wisuda']) }}"><img src="https://images.pexels.com/photos/35468615/pexels-photo-35468615.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Wisuda"><span>Wisuda</span></a>
                                    <a class="moment" href="{{ route('collections.index', ['kategori' => 'buket-mawar']) }}"><img src="https://images.pexels.com/photos/10671881/pexels-photo-10671881.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Buket Mawar"><span>Buket Mawar</span></a>
                                    <a class="moment" href="{{ route('collections.index', ['kategori' => 'buket-tulip']) }}"><img src="https://images.pexels.com/photos/15290942/pexels-photo-15290942.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Buket Tulip"><span>Buket Tulip</span></a>
                                </div>
                        </div>
                </section>
                <section id="produk" class="soft">
                        <div class="container shop-layout">
                                <div class="intro">
                                        <p class="eyebrow">PILIHAN FLOWERY UNTUKMU</p>
                                        <h2 class="display">Buket Bunga Artificial Terlaris</h2>
                                        <p>Rangkaian paling banyak disukai pelanggan kami.</p><a class="button" href="{{ route('collections.index') }}">Lihat Semua Produk</a>
                                </div>
                                <div class="product-grid">@forelse ($products as $index => $product)<article class="product"><a href="{{ route('flowers.show', $product->slug) }}">
                                                        <div class="product-image">@if ($index < 2)<span class="badge">{{ $index === 0 ? 'BEST SELLER' : 'BARU' }}</span>@endif<img src="{{ $product->image }}" alt="{{ $product->name }}"></div>
                                                        <div class="product-copy">
                                                                <h3>{{ $product->name }}</h3>
                                                                <p class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                                                                <p class="rating">★★★★★ <small>({{ 7 + $index }})</small></p>
                                                        </div>
                                                </a></article>@empty<p class="empty-products">Belum ada produk yang ditambahkan.</p>@endforelse</div>
                        </div>
                </section>
                <section id="koleksi">
                        <div class="container collection-layout">
                                <div class="intro">
                                        <p class="eyebrow">BELANJA BERDASARKAN KOLEKSI</p>
                                        <h2 class="display">Temukan Koleksi Favoritmu</h2>
                                        <p>Berbagai pilihan rangkaian bunga palsu untuk setiap suasana.</p><a class="button" href="{{ route('collections.index') }}">Lihat Semua Produk</a>
                                </div>
                                <div class="collection-grid">
                                    <a class="collection" href="{{ route('collections.index', ['kategori' => 'buket-mawar']) }}">
                                        <img src="https://images.pexels.com/photos/15290949/pexels-photo-15290949.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Buket Mawar">
                                        <span class="collection-copy">
                                            <h3>Buket Mawar</h3><span>Lihat koleksi</span>
                                        </span>
                                    </a>
                                    <a class="collection" href="{{ route('collections.index', ['kategori' => 'dekorasi-rumah']) }}">
                                        <img src="https://images.pexels.com/photos/35468615/pexels-photo-35468615.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Dekorasi Rumah">
                                        <span class="collection-copy">
                                            <h3>Dekorasi Rumah</h3><span>Lihat koleksi</span>
                                        </span>
                                    </a>
                                    <a class="collection" href="{{ route('collections.index', ['kategori' => 'wisuda']) }}">
                                        <img src="https://images.pexels.com/photos/15290940/pexels-photo-15290940.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Wisuda & Kelulusan">
                                        <span class="collection-copy">
                                            <h3>Wisuda & Kelulusan</h3><span>Lihat koleksi</span>
                                        </span>
                                    </a>
                                </div>
                        </div>
                </section>
                <section id="tentang" class="story">
                        <div class="story-image"></div>
                        <div class="story-copy">
                                <p class="eyebrow">RANGKAIAN KHUSUS FLOWERY</p>
                                <h2 class="display">Bunga yang dibuat untuk bertahan dalam ingatan</h2>
                                <p>Kami menyediakan bunga artificial dengan tampilan realistis dan rangkaian yang dibuat dengan teliti agar setiap pesan sampai dengan indah.</p>
                                <a class="button" href="{{ route('collections.index') }}">Lihat Koleksi</a>
                        </div>
                </section>
                <div class="container benefits">
                        <article class="benefit">
                                <div class="benefit-icon">✿</div>
                                <h3>Bunga Berkualitas</h3>
                                <p>Bunga artificial pilihan dengan tampilan cantik dan realistis.</p>
                        </article>
                        <article class="benefit">
                                <div class="benefit-icon">♡</div>
                                <h3>Dirangkai dengan Hati</h3>
                                <p>Detail kecil yang membuat hadiah terasa lebih personal.</p>
                        </article>
                        <article class="benefit">
                                <div class="benefit-icon">♧</div>
                                <h3>Pengiriman Terjaga</h3>
                                <p>Pesanan dikemas rapi dan aman sampai ke tujuan.</p>
                        </article>
                        <article class="benefit">
                                <div class="benefit-icon">?</div>
                                <h3>Butuh Bantuan?</h3>
                                <p>Tim kami siap membantu pilihan buketmu.</p>
                        </article>
                </div>
                <section class="newsletter">
                        <div class="container">
                                <div>
                                        <h2 class="display">Dapatkan kabar terbaru dari Flowery</h2>
                                        <p>Info koleksi baru dan penawaran spesial langsung ke emailmu.</p>
                                </div>
                        </div>
                </section>
        </main>
        <footer>
                <div class="container footer-content"><a class="brand" href="{{ route('home') }}">Flowery.</a>
                        <nav class="footer-links"><a href="#tentang">Tentang Kami</a><a href="{{ route('collections.index') }}">Produk</a><a href="{{ route('profile.edit') }}">Akun Saya</a><a href="https://wa.me/6281234567890" target="_blank" rel="noopener">WhatsApp</a></nav><span class="copyright">© {{ date('Y') }} Flowery. Dirangkai dengan hati untuk setiap momen.</span>
                </div>
        </footer>
</body>

</html>
