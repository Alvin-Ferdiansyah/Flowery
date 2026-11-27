<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') | Flowery</title>
    <style>
        :root {
            --pink: #d94f79;
            --pink-hover: #be3b63;
            --soft-pink: #fff5f8;
            --ink: #33272b;
            --muted: #796c70;
            --line: #f1dce2;
            --sidebar-bg: #432a32;
        }
        * { box-sizing: border-box; font-family: Arial, sans-serif; }
        body { margin: 0; color: var(--ink); background: #fffafb; }
        .layout { display: grid; grid-template-columns: 240px 1fr; min-height: 100vh; }
        
        /* Sidebar */
        .side { padding: 32px 20px; background: var(--sidebar-bg); color: #fff; }
        .brand { color: #fff; font-family: Georgia, serif; font-size: 28px; text-decoration: none; font-weight: bold; }
        .brand span { color: #ff8cab; }
        .side p.menu-title { margin: 34px 0 12px; color: #efc9d3; font-size: 11px; font-weight: 700; letter-spacing: .12em; }
        .side a.nav-item { display: flex; align-items: center; gap: 10px; margin: 4px 0; border-radius: 8px; padding: 11px 14px; color: #f8e9ed; font-size: 14px; text-decoration: none; transition: .2s; }
        .side a.nav-item:hover, .side a.nav-item.active { background: #68414e; color: #fff; }
        .side button.logout-btn { width: 100%; text-align: left; background: none; border: 0; color: #f8e9ed; padding: 11px 14px; font-size: 14px; cursor: pointer; border-radius: 8px; }
        .side button.logout-btn:hover { background: #68414e; }
        
        /* Content */
        .content { padding: 36px 42px; }
        .top-bar { display: flex; align-items: center; justify-content: space-between; margin-bottom: 28px; }
        .top-bar h1 { margin: 0; font-family: Georgia, serif; font-size: 30px; }
        .top-bar .action-link { display: inline-flex; align-items: center; gap: 6px; padding: 10px 18px; background: var(--pink); color: white; border-radius: 8px; text-decoration: none; font-size: 13px; font-weight: bold; }
        .top-bar .action-link:hover { background: var(--pink-hover); }

        /* Alerts */
        .alert { padding: 14px 18px; border-radius: 10px; margin-bottom: 22px; font-size: 14px; }
        .alert-success { background: #e7f9ee; color: #1e7e34; border: 1px solid #c3e6cb; }

        /* Panel & Tables */
        .panel { background: #fff; border: 1px solid var(--line); border-radius: 16px; overflow: hidden; box-shadow: 0 8px 24px rgba(104, 52, 68, .05); margin-bottom: 24px; }
        .panel-header { padding: 18px 22px; border-bottom: 1px solid var(--line); display: flex; justify-content: space-between; align-items: center; }
        .panel-header h2 { margin: 0; font-size: 17px; }
        .table { width: 100%; border-collapse: collapse; }
        .table th, .table td { padding: 14px 20px; border-bottom: 1px solid #f9ecf0; text-align: left; font-size: 13px; vertical-align: middle; }
        .table th { background: #fff8fa; color: var(--muted); font-weight: 600; }
        
        /* Badges */
        .badge { display: inline-block; padding: 5px 10px; border-radius: 99px; font-size: 11px; font-weight: bold; }
        .badge-pending { background: #fff3cd; color: #856404; }
        .badge-confirmed { background: #cce5ff; color: #004085; }
        .badge-processing { background: #d1ecf1; color: #0c5460; }
        .badge-completed { background: #d4edda; color: #155724; }
        .badge-cancelled { background: #f8d7da; color: #721c24; }
        .badge-paid { background: #e7f9ee; color: #1e7e34; }

        /* Buttons & Forms */
        .btn-sm { padding: 6px 12px; border-radius: 6px; font-size: 12px; text-decoration: none; font-weight: bold; border: 0; cursor: pointer; display: inline-block; }
        .btn-view { background: #f0f0f0; color: #333; }
        .btn-edit { background: #fff0f4; color: var(--pink); border: 1px solid #f3c2cf; }
        .btn-delete { background: #ffebee; color: #c62828; }
        
        input, select, textarea { width: 100%; padding: 10px 14px; border: 1px solid #ebd2da; border-radius: 8px; font-size: 14px; outline: none; }
        input:focus, select:focus, textarea:focus { border-color: var(--pink); }
        .form-group { margin-bottom: 18px; }
        label { display: block; margin-bottom: 6px; font-size: 13px; font-weight: bold; }
        
        @media(max-width: 850px) {
            .layout { grid-template-columns: 1fr; }
            .side { padding: 20px; }
            .side a.nav-item { display: inline-flex; }
            .content { padding: 24px; }
        }
    </style>
</head>
<body>
    <div class="layout">
        <aside class="side">
            <a class="brand" href="{{ route('home') }}">Flowery<span>.</span></a>
            
            <p class="menu-title">MANAJEMEN TOKO</p>
            <a class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                📊 Dashboard
            </a>
            <a class="nav-item {{ request()->routeIs('admin.products.*') ? 'active' : '' }}" href="{{ route('admin.products.index') }}">
                💐 Kelola Produk
            </a>
            <a class="nav-item {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}" href="{{ route('admin.categories.index') }}">
                🏷️ Kelola Kategori
            </a>
            <a class="nav-item {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}" href="{{ route('admin.orders.index') }}">
                📦 Kelola Pesanan
            </a>
            <a class="nav-item {{ request()->routeIs('admin.customers.*') ? 'active' : '' }}" href="{{ route('admin.customers.index') }}">
                👥 Pelanggan
            </a>
            <a class="nav-item {{ request()->routeIs('admin.reports.*') ? 'active' : '' }}" href="{{ route('admin.reports.index') }}">
                📈 Laporan Penjualan
            </a>

            <p class="menu-title">LAINNYA</p>
            <a class="nav-item" href="{{ route('home') }}" target="_blank">🌐 Lihat Website</a>
            <a class="nav-item" href="{{ route('profile.edit') }}">👤 Profil Akun</a>
            <form method="POST" action="{{ route('logout') }}" style="margin-top: 10px;">
                @csrf
                <button type="submit" class="logout-btn">🚪 Keluar Admin</button>
            </form>
        </aside>

        <main class="content">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @yield('content')
        </main>
    </div>
</body>
</html>

