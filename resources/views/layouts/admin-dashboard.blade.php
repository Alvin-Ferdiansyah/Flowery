<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin Flowery</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif
        }

        body {
            margin: 0;
            color: #292728;
            background: #f6f4f4
        }

        .side {
            position: fixed;
            width: 220px;
            min-height: 100vh;
            padding: 28px;
            background: #292728;
            color: white
        }

        .side h1 {
            margin: 0 0 34px;
            color: #e75480;
            font-size: 28px
        }

        .side a {
            display: block;
            padding: 12px 0;
            color: #ddd;
            text-decoration: none;
            font-size: 14px
        }

        .main {
            margin-left: 220px;
            padding: 38px
        }

        .main h2 {
            margin-top: 0
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin: 25px 0
        }

        .card {
            padding: 20px;
            background: white
        }

        .card span {
            color: #777;
            font-size: 13px
        }

        .card strong {
            display: block;
            margin-top: 8px;
            font-size: 27px
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            background: white
        }

        .table th,
        .table td {
            padding: 15px;
            border-bottom: 1px solid #eee;
            text-align: left;
            font-size: 13px
        }

        .tag {
            color: #a46118;
            background: #fff4d9;
            padding: 5px 8px;
            font-size: 11px
        }

        @media(max-width:650px) {
            .side {
                position: static;
                width: auto;
                min-height: 0
            }

            .side a {
                display: inline-block;
                margin-right: 12px
            }

            .main {
                margin: 0;
                padding: 25px
            }

            .cards {
                grid-template-columns: 1fr
            }
        }
    </style>
</head>

<body>
    <aside class="side">
        <h1>Flowery.</h1><a href="#">Dashboard</a><a href="#">Produk</a><a href="#">Kategori</a><a href="#">Pesanan</a><a href="#">Pelanggan</a><a href="{{ url('/') }}">Lihat website</a>
    </aside>
    <main class="main">
        <h2>Dashboard Admin</h2>
        <p>Ringkasan aktivitas toko hari ini.</p>
        <div class="cards">
            <div class="card"><span>Pesanan baru</span><strong>0</strong></div>
            <div class="card"><span>Total produk</span><strong>3</strong></div>
            <div class="card"><span>Menunggu konfirmasi</span><strong>0</strong></div>
        </div>
        <h3>Pesanan terbaru</h3>
        <table class="table">
            <tr>
                <th>No. Pesanan</th>
                <th>Pelanggan</th>
                <th>Total</th>
                <th>Status</th>
            </tr>
            <tr>
                <td colspan="4">Belum ada pesanan masuk.</td>
            </tr>
        </table>
    </main>
</body>

</html>