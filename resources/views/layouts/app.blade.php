<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Product Manager' }}</title>
    <style>
        :root {
            color-scheme: light;
            --bg: #f6f7fb;
            --panel: #ffffff;
            --ink: #172033;
            --muted: #647089;
            --line: #dce2ea;
            --brand: #0f8b8d;
            --brand-dark: #0a6d6f;
            --accent: #f4b942;
            --danger: #d64545;
            --radius: 8px;
            --shadow: 0 18px 50px rgba(23, 32, 51, .08);
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background: var(--bg);
            color: var(--ink);
            font-family: Arial, Helvetica, sans-serif;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .app-shell {
            min-height: 100vh;
        }

        .topbar {
            background: #ffffff;
            border-bottom: 1px solid var(--line);
        }

        .topbar-inner,
        .page {
            width: min(1120px, calc(100% - 32px));
            margin: 0 auto;
        }

        .topbar-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            min-height: 68px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 800;
            letter-spacing: 0;
        }

        .brand-mark {
            display: grid;
            place-items: center;
            width: 36px;
            height: 36px;
            border-radius: var(--radius);
            background: var(--brand);
            color: #fff;
        }

        .nav {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .nav a,
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 40px;
            border: 1px solid transparent;
            border-radius: var(--radius);
            padding: 0 14px;
            font-weight: 700;
            cursor: pointer;
        }

        .nav a {
            color: var(--muted);
        }

        .nav a:hover {
            background: #edf4f4;
            color: var(--brand-dark);
        }

        .page {
            padding: 28px 0 44px;
        }

        .page-header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 18px;
            margin-bottom: 22px;
        }

        h1,
        h2 {
            margin: 0;
            letter-spacing: 0;
        }

        h1 {
            font-size: clamp(28px, 4vw, 42px);
            line-height: 1.05;
        }

        .lede {
            margin: 8px 0 0;
            color: var(--muted);
            max-width: 650px;
        }

        .btn-primary {
            background: var(--brand);
            color: #fff;
        }

        .btn-primary:hover {
            background: var(--brand-dark);
        }

        .btn-secondary {
            background: #fff;
            border-color: var(--line);
            color: var(--ink);
        }

        .btn-danger {
            background: #fff;
            border-color: #f0caca;
            color: var(--danger);
        }

        .panel {
            background: var(--panel);
            border: 1px solid var(--line);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
        }

        .alert {
            margin-bottom: 18px;
            border-radius: var(--radius);
            padding: 13px 16px;
            background: #eaf7ee;
            color: #176331;
            border: 1px solid #bde7c8;
            font-weight: 700;
        }

        .error-list {
            margin-bottom: 18px;
            border-radius: var(--radius);
            padding: 13px 16px;
            background: #fff1f1;
            color: #9d2828;
            border: 1px solid #f2c4c4;
        }

        .error-list ul {
            margin: 8px 0 0;
            padding-left: 20px;
        }

        @media (max-width: 720px) {
            .topbar-inner,
            .page-header {
                align-items: stretch;
                flex-direction: column;
            }

            .nav,
            .page-header .btn {
                width: 100%;
            }

            .nav a,
            .page-header .btn {
                flex: 1;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
    <div class="app-shell">
        <header class="topbar">
            <div class="topbar-inner">
                <a href="{{ route('products.index') }}" class="brand">
                    <span class="brand-mark">P</span>
                    <span>Product Manager</span>
                </a>
                <nav class="nav" aria-label="Main navigation">
                    <a href="{{ route('products.index') }}">Products</a>
                    <a href="{{ route('products.create') }}">Add Product</a>
                </nav>
            </div>
        </header>

        <main class="page">
            @if (session('success'))
                <div class="alert">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="error-list">
                    <strong>Please fix these fields.</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
    @stack('scripts')
</body>
</html>
