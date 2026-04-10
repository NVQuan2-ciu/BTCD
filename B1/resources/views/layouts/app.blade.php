<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Quản lý sinh viên')</title>
    <style>
        :root {
            --bg: #0f1419;
            --surface: #1a2332;
            --border: #2d3a4d;
            --text: #e7edf5;
            --muted: #8b9cb3;
            --accent: #3b82f6;
            --accent-hover: #2563eb;
            --danger: #ef4444;
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            min-height: 100vh;
            font-family: "Segoe UI", system-ui, sans-serif;
            background: linear-gradient(160deg, var(--bg) 0%, #151d2a 100%);
            color: var(--text);
        }
        .shell {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        header {
            border-bottom: 1px solid var(--border);
            background: rgba(26, 35, 50, 0.85);
            backdrop-filter: blur(8px);
        }
        .header-inner {
            max-width: 960px;
            margin: 0 auto;
            padding: 1rem 1.25rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }
        .brand {
            font-weight: 700;
            font-size: 1.1rem;
            color: var(--text);
            text-decoration: none;
            letter-spacing: -0.02em;
        }
        .brand span { color: var(--accent); }
        nav { display: flex; align-items: center; gap: 0.75rem; flex-wrap: wrap; }
        nav a, nav button {
            font-size: 0.9rem;
            color: var(--muted);
            text-decoration: none;
            padding: 0.4rem 0.75rem;
            border-radius: 6px;
            border: none;
            background: transparent;
            cursor: pointer;
            font-family: inherit;
        }
        nav a:hover, nav button:hover { color: var(--text); background: rgba(59, 130, 246, 0.12); }
        main {
            flex: 1;
            max-width: 960px;
            width: 100%;
            margin: 0 auto;
            padding: 2rem 1.25rem;
        }
        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 2rem;
            max-width: 420px;
            margin: 0 auto;
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.35);
        }
        h1 {
            margin: 0 0 0.35rem;
            font-size: 1.5rem;
            font-weight: 700;
        }
        .subtitle { margin: 0 0 1.5rem; color: var(--muted); font-size: 0.9rem; }
        label {
            display: block;
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--muted);
            margin-bottom: 0.35rem;
        }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 0.65rem 0.85rem;
            border-radius: 8px;
            border: 1px solid var(--border);
            background: var(--bg);
            color: var(--text);
            font-size: 1rem;
            margin-bottom: 1rem;
        }
        input:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
        }
        .remember {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.25rem;
            font-size: 0.875rem;
            color: var(--muted);
        }
        .btn {
            display: inline-block;
            width: 100%;
            padding: 0.75rem 1rem;
            border: none;
            border-radius: 8px;
            background: var(--accent);
            color: #fff;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            font-family: inherit;
        }
        .btn:hover { background: var(--accent-hover); }
        .footer-link {
            margin-top: 1.25rem;
            text-align: center;
            font-size: 0.9rem;
            color: var(--muted);
        }
        .footer-link a { color: var(--accent); text-decoration: none; }
        .footer-link a:hover { text-decoration: underline; }
        .errors {
            background: rgba(239, 68, 68, 0.12);
            border: 1px solid rgba(239, 68, 68, 0.35);
            border-radius: 8px;
            padding: 0.75rem 1rem;
            margin-bottom: 1rem;
            font-size: 0.875rem;
            color: #fca5a5;
        }
        .errors ul { margin: 0; padding-left: 1.1rem; }
        .status {
            background: rgba(59, 130, 246, 0.12);
            border: 1px solid rgba(59, 130, 246, 0.35);
            border-radius: 8px;
            padding: 0.75rem 1rem;
            margin-bottom: 1rem;
            font-size: 0.875rem;
            color: #93c5fd;
        }
    </style>
    @stack('styles')
</head>
<body>
<div class="shell">
    <header>
        <div class="header-inner">
            <a href="{{ url('/') }}" class="brand">QL<span>Sinh viên</span></a>
            <nav>
                @auth
                    <span style="color: var(--muted); font-size: 0.9rem;">{{ Auth::user()->name }}</span>
                    <form action="{{ route('logout') }}" method="post" style="display: inline;">
                        @csrf
                        <button type="submit">Đăng xuất</button>
                    </form>
                @else
                    <a href="{{ route('login') }}">Đăng nhập</a>
                    <a href="{{ route('register') }}">Đăng ký</a>
                @endauth
            </nav>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
</div>
@stack('scripts')
</body>
</html>
