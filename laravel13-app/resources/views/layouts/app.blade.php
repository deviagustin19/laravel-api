<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'DeviStore Dashboard')</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f1f5fc;
            color: #172554;
        }

        /* SIDEBAR */
        .sidebar {
            width: 280px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: linear-gradient(180deg, #172554, #1e3a70);
            padding: 38px 22px;
            color: white;
            box-shadow: 5px 0 25px rgba(15,23,42,.10);
            z-index: 10;
            overflow: hidden;
        }

        .brand {
            font-size: 26px;
            font-weight: 800;
            margin-bottom: 58px;
            letter-spacing: -.8px;
            padding-left: 5px;
        }

        .brand span {
            color: #60a5fa;
        }

        .menu-title {
            color: #94a3b8;
            font-size: 12px;
            letter-spacing: 1.5px;
            margin: 30px 10px 17px;
            font-weight: 700;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 13px;
            text-decoration: none;
            color: #cbd5e1;
            padding: 18px 16px;
            border-radius: 13px;
            margin-bottom: 10px;
            font-size: 15px;
            font-weight: 600;
            transition: .25s;
        }

        .menu a:hover,
        .menu a.active {
            background: linear-gradient(135deg, #2563eb, #3478f6);
            color: white;
            transform: translateX(3px);
        }

        .menu a.active {
            box-shadow: 0 7px 18px rgba(37,99,235,.3);
        }

        .menu-icon {
            font-size: 20px;
            width: 25px;
            text-align: center;
        }

        .sidebar-info {
            font-size: 13px;
            color: #aabbd7;
            padding: 10px;
            line-height: 2;
        }

        /* MAIN CONTENT */
        .main {
            margin-left: 280px;
            padding: 30px 35px;
            min-height: 100vh;
        }

        /* TOPBAR */
        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 35px;
            padding: 5px 5px;
        }

        .topbar h2 {
            font-size: 25px;
            font-weight: 800;
            color: #172554;
        }

        .welcome {
            color: #64748b;
            font-size: 13px;
            margin-top: 8px;
        }

        .profile {
            background: white;
            padding: 13px 20px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 700;
            color: #172554;
            border: 1px solid #e2e8f0;
            box-shadow: 0 3px 12px rgba(0,0,0,.04);
        }

        /* CONTENT */
        .content {
            background: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(30,64,175,.06);
            min-height: 450px;
            border: 1px solid #edf1f7;
        }

        .content h2 {
            color: #172554;
            font-size: 24px;
            font-weight: 800;
            margin-bottom: 20px;
        }

        /* ALERT */
        .alert {
            padding: 15px 20px;
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
            border-radius: 12px;
            margin-bottom: 22px;
            font-size: 14px;
        }

        /* BUTTON */
        .btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 7px;
            padding: 12px 19px;
            border: none;
            border-radius: 11px;
            text-decoration: none;
            cursor: pointer;
            font-family: inherit;
            font-size: 13px;
            font-weight: 700;
            transition: .25s;
            box-shadow: 0 3px 9px rgba(0,0,0,.08);
        }

        .btn:hover {
            transform: translateY(-2px);
            filter: brightness(.96);
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-warning {
            background: #f59e0b;
            color: white;
        }

        .btn-danger {
            background: #ef4444;
            color: white;
        }

        /* TABLE */
        .content table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-top: 25px;
            border: 1px solid #dbe4f2;
            border-radius: 15px;
            overflow: hidden;
            background: white;
        }

        .content th {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: white;
            text-align: left;
            font-size: 13px;
            letter-spacing: .2px;
            font-weight: 700;
            padding: 20px 17px;
            border-bottom: 1px solid #dbeafe;
            white-space: nowrap;
        }

        .content td {
            padding: 19px 17px;
            color: #1e293b;
            font-size: 14px;
            border-bottom: 1px solid #e8edf5;
            vertical-align: middle;
        }

        .content tbody tr:nth-child(even) {
            background: #f8faff;
        }

        .content tbody tr:hover td {
            background: #eff6ff;
        }

        .content tbody tr:last-child td {
            border-bottom: none;
        }

        /* KOLOM AKSI */
        .content td form {
            display: inline-block;
            margin: 0;
        }

        .content td .btn {
            margin: 2px;
            min-width: 75px;
        }

        /* FORM */
        .content input,
        .content select,
        .content textarea {
            width: 100%;
            padding: 14px;
            border: 1px solid #dbe3ee;
            background: white;
            border-radius: 11px;
            font-family: inherit;
            font-size: 14px;
            margin-top: 8px;
            outline: none;
            transition: .2s;
        }

        .content input:focus,
        .content select:focus,
        .content textarea:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59,130,246,.10);
        }

        .content label {
            font-size: 14px;
            font-weight: 700;
            color: #334155;
        }

        .content p[style*="color:red"],
        .content p[style*="color: red"] {
            font-size: 12px;
            margin-top: 5px;
        }

        /* PAGINATION */
        .custom-pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 35px;
            padding: 15px 0;
        }

        .custom-pagination a,
        .custom-pagination span {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            min-width: 45px;
            height: 45px;
            padding: 0 16px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
        }

        .custom-pagination a {
            color: #2563eb;
            background: #f1f5f9;
            transition: .2s;
        }

        .custom-pagination a:hover {
            background: #dbeafe;
        }

        .custom-pagination .page-active {
            background: #2563eb;
            color: white;
            box-shadow: 0 4px 12px rgba(37,99,235,.25);
        }

        .custom-pagination .page-disabled {
            color: #94a3b8;
            background: #f8fafc;
            cursor: not-allowed;
        }


        /* DEKORASI GELOMBANG DI BAGIAN BAWAH SIDEBAR */
        .sidebar {
            isolation: isolate;
        }

        .sidebar::before,
        .sidebar::after {
            content: "";
            position: absolute;
            left: -45px;
            width: 390px;
            pointer-events: none;
            z-index: 0;
        }

        .sidebar::before {
            height: 155px;
            bottom: -62px;
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            border-radius: 48% 52% 0 0 / 38% 45% 0 0;
            transform: rotate(-7deg);
            opacity: .95;
        }

        .sidebar::after {
            height: 125px;
            bottom: -78px;
            left: -75px;
            background: linear-gradient(135deg, #1d4ed8, #60a5fa);
            border-radius: 52% 48% 0 0 / 45% 38% 0 0;
            transform: rotate(8deg);
            opacity: .9;
        }

        .sidebar > * {
            position: relative;
            z-index: 1;
        }

        .sidebar-cart {
            position: absolute;
            z-index: 2;
            left: 28px;
            bottom: 24px;
            font-size: 38px;
            color: #fff;
            opacity: .95;
            pointer-events: none;
        }

        /* RESPONSIVE */
        @media(max-width: 900px) {
            .sidebar {
                width: 220px;
                padding: 25px 15px;
            }

            .main {
                margin-left: 220px;
                padding: 25px 20px;
            }
        }

        @media(max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                padding: 20px;
            }

            .brand {
                margin-bottom: 20px;
            }

            .menu-title {
                margin-top: 15px;
            }

            .main {
                margin-left: 0;
                padding: 18px;
            }

            .content {
                padding: 20px;
                overflow-x: auto;
            }

            .topbar {
                gap: 15px;
                flex-wrap: wrap;
            }

            .content table {
                min-width: 750px;
            }

            .profile {
                padding: 10px 15px;
            }
        }
    </style>
</head>

<body>

    <aside class="sidebar">

        <div class="brand">DEVI<span>STORE.</span></div>

        <div class="menu-title">MENU UTAMA</div>

        <div class="menu">
            <a href="{{ route('produk.index') }}"
               class="{{ request()->routeIs('produk.index') ? 'active' : '' }}">
                <span class="menu-icon">▦</span>
                Data Produk
            </a>

            <a href="{{ route('produk.create') }}"
               class="{{ request()->routeIs('produk.create') ? 'active' : '' }}">
                <span class="menu-icon">＋</span>
                Tambah Produk
            </a>
        </div>

        <div class="menu-title">INFORMASI</div>

        <div class="sidebar-info">
            Sistem Manajemen Produk
            <br><br>
            Laravel CRUD Application
        </div>

        <div class="sidebar-cart" aria-hidden="true">🛒</div>

    </aside>

    <main class="main">

        <div class="topbar">
            <div>
                <h2>@yield('heading', 'Dashboard')</h2>
                <p class="welcome">
                    Selamat datang di sistem manajemen produk.
                </p>
            </div>

            <div class="profile">👤 Administrator　⌄</div>
        </div>

        <div class="content">

            @if(session('success'))
                <div class="alert">
                    ✓ {{ session('success') }}
                </div>
            @endif

            @yield('content')

        </div>

    </main>

</body>
</html>
