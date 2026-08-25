<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Admin Dashboard') - Stock Connect</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7f6;
            color: #1f2937;
        }

        .admin-layout {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */

        .sidebar {
            width: 250px;
            background: #123c2a;
            color: white;
            padding: 24px 16px;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0 10px 30px;
            border-bottom: 1px solid rgba(255,255,255,0.12);
        }

        .logo h2 {
            font-size: 21px;
            font-weight: 700;
        }

        .logo span {
            color: #8fd694;
        }

        .nav {
            margin-top: 28px;
        }

        .nav-title {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #9fb8aa;
            padding: 0 12px;
            margin-bottom: 12px;
        }

        .nav a {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #dce9e1;
            text-decoration: none;
            padding: 12px;
            margin-bottom: 5px;
            border-radius: 8px;
            transition: 0.2s ease;
        }

        .nav a:hover,
        .nav a.active {
            background: #1d6043;
            color: white;
        }

        .nav-icon {
            width: 22px;
            text-align: center;
        }

        /* Main */

        .main {
            margin-left: 250px;
            width: calc(100% - 250px);
        }

        /* Topbar */

        .topbar {
            height: 72px;
            background: white;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 32px;
        }

        .page-title {
            font-size: 20px;
            font-weight: 600;
        }

        .admin-user {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #dcefe2;
            color: #185c38;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        .user-info small {
            display: block;
            color: #6b7280;
            margin-top: 2px;
        }

        /* Content */

        .content {
            padding: 32px;
        }

        .welcome {
            margin-bottom: 28px;
        }

        .welcome h1 {
            font-size: 28px;
            margin-bottom: 7px;
        }

        .welcome p {
            color: #6b7280;
        }

        /* Cards */

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 22px;
        }

        .stat-label {
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .stat-value {
            font-size: 28px;
            font-weight: 700;
            color: #123c2a;
        }

        /* Responsive */

        @media (max-width: 1000px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 700px) {
            .sidebar {
                width: 70px;
                padding: 20px 10px;
            }

            .logo h2,
            .nav-title,
            .nav a span {
                display: none;
            }

            .nav a {
                justify-content: center;
            }

            .main {
                margin-left: 70px;
                width: calc(100% - 70px);
            }

            .topbar {
                padding: 0 18px;
            }

            .content {
                padding: 20px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .user-info {
                display: none;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

<div class="admin-layout">

    <!-- Sidebar -->

    <aside class="sidebar">

        <div class="logo">
            <h2>Stock <span>Connect</span></h2>
        </div>

        <nav class="nav">

            <div class="nav-title">
                Main Menu
            </div>

            <a href="{{ route('admin.dashboard') }}" class="active">
                <span class="nav-icon">⌂</span>
                <span>Dashboard</span>
            </a>

            <a href="#">
                <span class="nav-icon">🐄</span>
                <span>Livestock</span>
            </a>

            <a href="#">
                <span class="nav-icon">📦</span>
                <span>Orders</span>
            </a>

            <a href="#">
                <span class="nav-icon">👥</span>
                <span>Customers</span>
            </a>

            <div class="nav-title" style="margin-top: 28px;">
                Management
            </div>

            <a href="#">
                <span class="nav-icon">💳</span>
                <span>Payments</span>
            </a>

            <a href="#">
                <span class="nav-icon">⚙️</span>
                <span>Settings</span>
            </a>

        </nav>

    </aside>

    <!-- Main -->

    <main class="main">

        <header class="topbar">

            <div class="page-title">
                @yield('page-title', 'Dashboard')
            </div>

            <div class="admin-user">

                <div class="avatar">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>

                <div class="user-info">
                    <strong>{{ auth()->user()->name }}</strong>
                    <small>Administrator</small>
                </div>

            </div>

        </header>

        <section class="content">

            @yield('content')

        </section>

    </main>

</div>

</body>
</html>