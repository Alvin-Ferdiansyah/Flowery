<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $flower['name'] }} | Flowery</title>
    <style>
        :root {
            --ink: #333;
            --muted: #777;
            --pink: #e75480;
            --pink-dark: #d94370;
            --soft: #fff4f7;
            --line: #f1dce4;
        }

        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            background: #fff;
            color: var(--ink);
        }

        .site {
            min-height: calc(100vh - 76px);
            background: #fff;
        }

        nav {
            width: 100%;
            padding: 20px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #fff;
            position: sticky;
            top: 0;
            z-index: 10;
            box-shadow: 0 2px 10px rgba(0, 0, 0, .05);
        }

        .logo {
            color: var(--pink);
            text-decoration: none;
            font-size: 30px;
            font-weight: bold;
        }

        .logo span {
            color: var(--ink);
        }

        nav ul {
            display: flex;
            list-style: none;
            gap: 30px;
            padding: 0;
            margin: 0;
        }

        nav ul a {
            color: var(--ink);
            text-decoration: none;
            font-size: 15px;
            transition: .3s;
        }

        nav ul a:hover {
            color: var(--pink);
        }

        .btn {
            display: inline-block;
            border: 0;
            border-radius: 8px;
            padding: 12px 22px;
            background: var(--pink);
            color: #fff;
            text-decoration: none;
            font-size: 15px;
            cursor: pointer;
            transition: .3s;
        }

        .btn:hover {
            background: var(--pink-dark);
        }

        main {
            max-width: 1200px;
            margin: 0 auto;
            padding: 34px 8% 70px;
        }

        .crumbs {
            display: flex;
            gap: 8px;
            padding: 0 0 22px;
            color: var(--muted);
            font-size: 13px;
        }

        .crumbs a {
            color: inherit;
            text-decoration: none;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: 440px 1fr 275px;
            gap: 42px;
            align-items: start;
        }

        .gallery-main {
            height: 455px;
            position: relative;
            overflow: hidden;
            border-radius: 20px;
            background: var(--soft);
        }

        .gallery-main img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .zoom {
            position: absolute;
            right: 14px;
            bottom: 14px;
            width: 36px;
            height: 36px;
            padding: 0;
            border: 1px solid #f2c9d6;
            border-radius: 50%;
            background: white;
            cursor: pointer;
            display: grid;
            place-items: center;
        }

        .zoom svg {
            width: 18px;
            height: 18px;
            fill: none;
            stroke: var(--ink);
            stroke-width: 2;
        }

        .thumbs {
            display: flex;
            gap: 12px;
            margin-top: 12px;
        }

        .thumb {
            padding: 0;
            width: 102px;
            height: 101px;
            overflow: hidden;
            border: 2px solid transparent;
            border-radius: 12px;
            background: var(--soft);
            cursor: pointer;
        }

        .thumb:first-child {
            border-color: var(--pink);
        }

        .thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .details h1 {
            font-size: 38px;
            line-height: 1.2;
            margin: 2px 0 9px;
            color: var(--ink);
        }

        .details {
            padding: 8px 0;
        }

        .rating {
            display: flex;
            align-items: center;
            gap: 7px;
            font-size: 14px;
        }

        .stars {
            color: var(--pink);
            font-size: 20px;
            letter-spacing: -2px;
        }

        .description {
            max-width: 348px;
            margin: 15px 0 23px;
            font-size: 15.5px;
            line-height: 1.42;
        }

        .specs {
            border-top: 1px solid var(--line);
        }

        .specs h2 {
            margin: 21px 0 12px;
            font-size: 17px;
        }

        .specs dl {
            margin: 0;
        }

        .specs div {
            display: grid;
            grid-template-columns: 126px 1fr;
            padding: 9px 0;
            border-bottom: 1px solid var(--line);
            font-size: 15px;
        }

        .specs dt,
        .specs dd {
            margin: 0;
        }

        .purchase {
            padding-top: 79px;
            padding-right: 18px;
            padding-left: 18px;
            border: 1px solid var(--line);
            border-radius: 16px;
            background: #fffafb;
            box-shadow: 0 12px 28px rgba(104, 52, 68, .08);
        }

        .price {
            margin: 0 0 12px;
            font-size: 30px;
            line-height: 1;
            color: var(--pink);
            font-weight: 700;
        }

        select,
        textarea {
            width: 100%;
            padding: 10px 12px;
            background: white;
            border: 1px solid #f0b6c8;
            border-radius: 8px;
            font-size: 14px;
        }

        select {
            height: 42px;
            cursor: pointer;
        }

        textarea {
            height: 68px;
            resize: vertical;
        }

        .custom-field {
            margin-top: 14px;
        }

        .custom-field label {
            display: block;
            margin-bottom: 6px;
            font-size: 12px;
            font-weight: bold;
            color: var(--ink);
        }

        .custom-field small {
            display: block;
            margin-top: 4px;
            color: var(--muted);
            font-size: 11px;
        }

        .addon-list {
            display: grid;
            gap: 8px;
            margin-top: 6px;
        }

        .addon-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 8px 10px;
            background: #fff;
            border: 1px solid #f3d4de;
            border-radius: 8px;
            font-size: 13px;
            cursor: pointer;
            transition: .2s;
        }

        .addon-item:hover {
            border-color: var(--pink);
            background: #fff8fa;
        }

        .addon-item input {
            accent-color: var(--pink);
            margin-right: 8px;
        }

        .addon-item span.addon-price {
            font-size: 12px;
            color: var(--pink);
            font-weight: bold;
        }

        .action {
            width: 100%;
            height: 44px;
            margin-top: 18px;
            border: 0;
            border-radius: 8px;
            background: var(--pink);
            color: white;
            font-weight: 700;
            font-size: 14px;
            cursor: pointer;
            transition: .3s;
        }

        .action:hover {
            background: var(--pink-dark);
        }

        .action.buy {
            margin-top: 10px;
            background: white;
            color: var(--pink);
            border: 1.5px solid var(--pink);
            box-shadow: none;
        }

        .action.buy:hover {
            background: var(--soft);
        }

        .benefits {
            margin-top: 26px;
            display: grid;
            gap: 10px;
            font-size: 14px;
        }

        .benefit {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .benefit svg {
            width: 19px;
            height: 19px;
            flex: none;
            fill: none;
            stroke: var(--ink);
            stroke-width: 1.8;
        }

        .wish {
            display: flex;
            align-items: center;
            gap: 9px;
            margin-top: 17px;
            padding: 0;
            background: none;
            border: 0;
            font-size: 15px;
            cursor: pointer;
        }

        .wish .heart {
            width: 37px;
            height: 37px;
            display: grid;
            place-items: center;
            border-radius: 10px;
            background: var(--soft);
        }

        .wish svg {
            width: 21px;
            fill: none;
            stroke: var(--ink);
            stroke-width: 1.7;
        }

        .share {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-top: 24px;
            font-size: 14px;
        }

        .share a {
            color: var(--ink);
            font-size: 17px;
            font-weight: 700;
            text-decoration: none;
        }

        .reviews {
            margin-top: 46px;
            padding-top: 34px;
            border-top: 1px solid var(--line);
        }

        .reviews h2 {
            font-size: 26px;
            margin: 0 0 6px;
        }

        .reviews .review-summary {
            color: var(--muted);
            font-size: 14px;
            margin: 0 0 24px;
        }

        .review-list {
            display: grid;
            gap: 18px;
        }

        .review {
            padding: 18px 20px;
            border: 1px solid var(--line);
            border-radius: 14px;
            background: #fffafb;
        }

        .review-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 6px;
        }

        .review-name {
            font-weight: 700;
            font-size: 15px;
        }

        .review-date {
            color: var(--muted);
            font-size: 12px;
        }

        .review-stars {
            color: var(--pink);
            font-size: 16px;
            letter-spacing: -1px;
            margin-bottom: 8px;
        }

        .review p {
            margin: 0;
            font-size: 14.5px;
            line-height: 1.5;
            color: var(--ink);
        }

        footer {
            min-height: 76px;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #222;
            color: white;
            font-size: 14px;
        }

        footer a {
            color: white;
            text-decoration: none;
        }

        @media (max-width:1050px) {
            main {
                padding-left: 5%;
                padding-right: 5%;
            }

            .detail-grid {
                grid-template-columns: minmax(330px, .9fr) 1fr;
                gap: 32px;
            }

            .purchase {
                grid-column: 2;
                padding-top: 0;
            }

            .thumb {
                height: 78px;
            }
        }

        @media (max-width:680px) {
            nav {
                padding: 18px 5%;
            }

            nav ul {
                display: none;
            }

            .logo {
                font-size: 27px;
            }

            main {
                padding: 28px 5% 55px;
            }

            .crumbs {
                overflow: hidden;
                white-space: nowrap;
            }

            .detail-grid {
                display: flex;
                flex-direction: column;
                gap: 23px;
            }

            .gallery,
            .details,
            .purchase {
                width: 100%;
            }

            .gallery-main {
                height: min(104vw, 440px);
            }

            .thumb {
                width: calc((100vw - 60px)/4);
                height: 76px;
            }

            .details h1 {
                font-size: 32px;
            }

            .description {
                max-width: none;
            }

            .purchase {
                padding-top: 0;
                padding-bottom: 18px;
            }

            .price {
                font-size: 30px;
            }
        }
    </style>
</head>

<body>
    <div class="site">
        <nav>
            <a class="logo" href="{{ url('/') }}">Flowery<span>.</span></a>
            <ul>
                <li><a href="{{ url('/') }}">Beranda</a></li>
                <li><a href="{{ route('collections.index') }}">Koleksi</a></li>
                <li><a href="{{ url('/#tentang') }}">Tentang Kami</a></li>
                <li><a href="{{ url('/#kontak') }}">Kontak</a></li>
            </ul>
            @guest
                <a class="btn" href="{{ route('login') }}">Masuk</a>
            @else
                <a class="btn" href="{{ route('profile.edit') }}">Profil</a>
            @endguest
        </nav>
        <main>
            <div class="crumbs"><a href="{{ url('/') }}">Home</a><span>›</span><a href="{{ route('collections.index') }}">Koleksi</a><span>›</span><span>{{ $flower['name'] }}</span></div>
            <div class="detail-grid">
                <section class="gallery" aria-label="Galeri {{ $flower['name'] }}">
                    <div class="gallery-main"><img id="main-image" src="{{ $flower['image'] }}" alt="{{ $flower['name'] }}"><button class="zoom" aria-label="Perbesar gambar"><svg viewBox="0 0 24 24">
                                <circle cx="10.5" cy="10.5" r="5.5"></circle>
                                <path d="m15 15 5 5M10.5 8v5M8 10.5h5"></path>
                            </svg></button></div>
                    <div class="thumbs">
                        @foreach ([['w' => 500, 'q' => 85], ['w' => 700, 'q' => 80], ['w' => 900, 'q' => 75], ['w' => 1100, 'q' => 85]] as $variant)
                        <button class="thumb" type="button"><img src="{{ preg_replace('/w=1200&q=85/', 'w='.$variant['w'].'&q='.$variant['q'], $flower['image']) }}" alt="Tampilan {{ $flower['name'] }}"></button>
                        @endforeach
                    </div>

                </section>
                <section class="details">
                    <h1>{{ $flower['name'] }}</h1>
                    <div class="rating"><span class="stars">★★★★★</span><span>4.8 (215 ulasan)</span></div>
                    <p class="description">{{ $flower['description'] }}</p>
                    <div class="specs">
                        <h2>SPESIFIKASI BUKET ARTIFICIAL</h2>
                        <dl>
                            <div>
                                <dt>Jenis bunga</dt>
                                <dd>{{ $flower['variety'] }}</dd>
                            </div>
                            <div>
                                <dt>Jumlah</dt>
                                <dd>± 20 tangkai (standar)</dd>
                            </div>
                            <div>
                                <dt>Foliage</dt>
                                <dd>Eucalyptus & baby breath</dd>
                            </div>
                            <div>
                                <dt>Warna</dt>
                                <dd>{{ $flower['colour'] }}</dd>
                            </div>
                            <div>
                                <dt>Ketahanan</dt>
                                <dd>5–7 hari</dd>
                            </div>
                            <div>
                                <dt>Kemasan</dt>
                                <dd>Paper wrap & pita satin</dd>
                            </div>
                        </dl>
                    </div>
                </section>
                <aside id="pembelian" class="purchase">
                    <form method="POST" action="{{ route('cart.add') }}">
                        @csrf
                        <input type="hidden" name="product" value="{{ $slug }}">
                        <input type="hidden" name="size" id="size-value" value="0">
                        
                        <p class="price" data-base-price="{{ $flower['price'] }}">Rp{{ number_format($flower['price'], 0, ',', '.') }}</p>
                        
                        <div class="custom-field">
                            <label for="size">Pilihan Ukuran Buket</label>
                            <select id="size" aria-label="Pilih ukuran">
                                <option value="0">Standar (± 20 tangkai)</option>
                                <option value="45000">Deluxe (± 30 tangkai, +Rp45.000)</option>
                                <option value="85000">Grand (± 40 tangkai, +Rp85.000)</option>
                            </select>
                        </div>

                        <!-- FITUR KUSTOMISASI BUNGA -->
                        <div class="custom-field">
                            <label for="wrapping_color">🎨 Warna Kertas Wrapping</label>
                            <select id="wrapping_color" name="wrapping_color">
                                <option value="Pink Pastel (Default)">Pink Pastel (Default)</option>
                                <option value="Korean Cream / Beige">Korean Cream / Beige</option>
                                <option value="Hitam Matte Elegan">Hitam Matte Elegan</option>
                                <option value="Putih Bersih">Putih Bersih</option>
                                <option value="Lilac / Ungu Lembut">Lilac / Ungu Lembut</option>
                                <option value="Sage Green Soft">Sage Green Soft</option>
                                <option value="Baby Blue">Baby Blue</option>
                            </select>
                        </div>

                        <div class="custom-field">
                            <label for="ribbon_color">🎀 Warna Pita Satin</label>
                            <select id="ribbon_color" name="ribbon_color">
                                <option value="Cream Satin (Default)">Cream Satin (Default)</option>
                                <option value="Pink Rose">Pink Rose</option>
                                <option value="Gold Mewah">Gold Mewah</option>
                                <option value="Putih Klasik">Putih Klasik</option>
                                <option value="Merah Maroon">Merah Maroon</option>
                                <option value="Hitam Kontras">Hitam Kontras</option>
                            </select>
                        </div>

                        <div class="custom-field">
                            <label for="flower_tone">🌸 Nuansa Bunga (Tone)</label>
                            <select id="flower_tone" name="flower_tone">
                                <option value="Sesuai Foto Asli">Sesuai Foto Asli</option>
                                <option value="Nuansa Pastel Lembut">Nuansa Pastel Lembut</option>
                                <option value="Nuansa Cerah & Ceria">Nuansa Cerah & Ceria</option>
                                <option value="Nuansa Warm Autumn">Nuansa Warm Autumn</option>
                                <option value="Nuansa Monokrom / Minimalis">Nuansa Monokrom / Minimalis</option>
                            </select>
                        </div>

                        <div class="custom-field">
                            <label>✨ Tambahan Aksesoris (Add-ons)</label>
                            <div class="addon-list">
                                <label class="addon-item">
                                    <span><input type="checkbox" name="extra_addons[]" value="lampu_led" data-price="15000" class="addon-check"> Lampu LED Fairy Light</span>
                                    <span class="addon-price">+Rp15.000</span>
                                </label>
                                <label class="addon-item">
                                    <span><input type="checkbox" name="extra_addons[]" value="boneka_wisuda" data-price="25000" class="addon-check"> Mini Boneka Beruang / Wisuda</span>
                                    <span class="addon-price">+Rp25.000</span>
                                </label>
                                <label class="addon-item">
                                    <span><input type="checkbox" name="extra_addons[]" value="cokelat" data-price="20000" class="addon-check"> 2pcs Cokelat Ferrero / SilverQueen</span>
                                    <span class="addon-price">+Rp20.000</span>
                                </label>
                                <label class="addon-item">
                                    <span><input type="checkbox" name="extra_addons[]" value="balon_foil" data-price="10000" class="addon-check"> Mini Balon Foil Hati/Bintang</span>
                                    <span class="addon-price">+Rp10.000</span>
                                </label>
                                <label class="addon-item">
                                    <span><input type="checkbox" name="extra_addons[]" value="paper_bag_premium" data-price="12000" class="addon-check"> Paper Bag Eksklusif Flowery</span>
                                    <span class="addon-price">+Rp12.000</span>
                                </label>
                            </div>
                        </div>

                        <div class="custom-field">
                            <label for="custom_note">Catatan Khusus Kustomisasi</label>
                            <textarea id="custom_note" name="custom_note" placeholder="Contoh: dominan bunga pink, pita diikat panjang 30cm, dll..."></textarea>
                        </div>

                        <div class="custom-field">
                            <label for="card_message">Pesan Kartu Ucapan (Gratis)</label>
                            <textarea id="card_message" name="card_message" placeholder="Tulis kata-kata ucapan romantis / wisuda / ultah..."></textarea>
                            <small>Kartu ucapan eksklusif gratis dicetak rapi.</small>
                        </div>

                        <button class="action" type="submit">TAMBAH KE KERANJANG</button>
                        <button class="action buy" type="submit" name="checkout" value="1">CHECKOUT SEKARANG</button>
                        
                        <div class="benefits">
                            <div class="benefit">
                                <svg viewBox="0 0 24 24"><path d="M3 7h11v10H3zM14 10h4l3 3v4h-7z"></path><circle cx="7" cy="19" r="1.5"></circle><circle cx="18" cy="19" r="1.5"></circle></svg>
                                Estimasi perakitan: Hari ini (Same-day ready)
                            </div>
                            <div class="benefit">
                                <svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"></path></svg>
                                Gratis ongkir untuk pesanan di atas Rp300.000
                            </div>
                        </div>
                    </form>
                </aside>
            </div>

                    <section class="reviews" aria-label="Ulasan pelanggan" style="margin-top:28px;">
                        <h2>Ulasan Pelanggan</h2>
                        <p class="review-summary">Rating 4.8 dari 5 berdasarkan 215 ulasan pelanggan Flowery.</p>
                        <div class="review-list">
                            <article class="review">
                                <div class="review-header">
                                    <span class="review-name">Aulia Ramadhani</span>
                                    <span class="review-date">12 Okt 2026</span>
                                </div>
                                <div class="review-stars">★★★★★</div>
                                <p>Buketnya sangat cantik dan realistis, tidak seperti bunga palsu biasa. Ibuku sampai tidak percaya kalau ini artificial. Pengiriman juga cepat dan rapi.</p>
                            </article>
                            <article class="review">
                                <div class="review-header">
                                    <span class="review-name">Budi Santoso</span>
                                    <span class="review-date">05 Okt 2026</span>
                                </div>
                                <div class="review-stars">★★★★★</div>
                                <p>Pesan untuk wisuda adik, hasilnya melebihi ekspektasi. Warna sesuai foto dan kemasannya premium. Akan order lagi untuk anniversary.</p>
                            </article>
                            <article class="review">
                                <div class="review-header">
                                    <span class="review-name">Citra Lestari</span>
                                    <span class="review-date">28 Sep 2026</span>
                                </div>
                                <div class="review-stars">★★★★☆</div>
                                <p>Bunganya awet dan tidak mudah rusak. Hanya saja pengiriman sedikit terlambat, tapi admin responsif dan membantu. Overall puas!</p>
                            </article>
                            <article class="review">
                                <div class="review-header">
                                    <span class="review-name">Dewi Anggraeni</span>
                                    <span class="review-date">20 Sep 2026</span>
                                </div>
                                <div class="review-stars">★★★★★</div>
                                <p>Sudah 3x order di Flowery, kualitas selalu konsisten. Cocok untuk hadiah karena tahan lama dan tetap cantik. Recommended banget!</p>
                            </article>
                            <article class="review">
                                <div class="review-header">
                                    <span class="review-name">Eko Prasetyo</span>
                                    <span class="review-date">15 Sep 2026</span>
                                </div>
                                <div class="review-stars">★★★★★</div>
                                <p>Customisasi warna wrapping dan pita sangat membantu. Buket sesuai request dan harganya worth it. Terima kasih Flowery!</p>
                            </article>
                        </div>
                    </section>

        </main>
    </div>
    <footer><span>&copy; 2026 Flowery. Semua Hak Dilindungi.</span></footer>
    <script>
        const mainImage = document.getElementById('main-image');
        document.querySelectorAll('.thumb').forEach((thumb) => thumb.addEventListener('click', () => {
            mainImage.src = thumb.querySelector('img').src;
            document.querySelectorAll('.thumb').forEach((item) => item.style.borderColor = 'transparent');
            thumb.style.borderColor = '#e75480';
        }));
        const price = document.querySelector('.price'),
            size = document.getElementById('size'),
            base = Number(price.dataset.basePrice),
            addonCheckboxes = document.querySelectorAll('.addon-check');

        function updateTotalPrice() {
            let addonsTotal = 0;
            addonCheckboxes.forEach(cb => {
                if (cb.checked) {
                    addonsTotal += Number(cb.dataset.price || 0);
                }
            });
            const sizeVal = Number(size.value || 0);
            const total = base + sizeVal + addonsTotal;
            price.textContent = 'Rp' + total.toLocaleString('id-ID');
            document.getElementById('size-value').value = sizeVal;
        }

        size.addEventListener('change', updateTotalPrice);
        addonCheckboxes.forEach(cb => cb.addEventListener('change', updateTotalPrice));
    </script>
</body>

</html>
