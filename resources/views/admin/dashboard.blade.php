<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Stock Connect | Admin Dashboard</title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    >

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --green: #35d84a;
            --green-dark: #238b34;
            --green-soft: #edf9ef;

            --sidebar: #ffffff;
            --background: #f6f8f7;
            --white: #ffffff;

            --text: #18211b;
            --muted: #7b857e;

            --border: #e7ebe8;

            --yellow: #e7aa32;
            --blue: #557bd6;
            --purple: #7959bd;
            --red: #df5d5d;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--background);
            color: var(--text);
        }

        a {
            text-decoration: none;
        }

        button,
        input {
            font-family: inherit;
        }

        /* =====================================
           MAIN APPLICATION
        ===================================== */

        .app {
            min-height: 100vh;
        }

        /* =====================================
           SIDEBAR
        ===================================== */

        .sidebar {
                 width: 255px;
                 min-height: 100vh;
                height: 100vh;
                overflow-y: auto;
                overflow-x: hidden;
                background: #ffffff;
                color: var(--text);
                padding: 28px 18px;
                position: fixed;
                left: 0;
                top: 0;
                bottom: 0;
                border-right: 1px solid var(--border);
                z-index: 100;
            }

        .brand {
            padding: 10px 10px 24px;
            border-bottom: 1px solid var(--border);
            margin-bottom: 24px;
            text-align: center;
        }

        .brand-logo {
            width: 125px;
            height: 125px;
            object-fit: contain;
            display: block;
            margin-top: 8px;
            justify-content: center;
            margin: 0 auto 10px;
        }

        .brand-name {
            font-size: 25px;
            font-weight: 900;
            color: var(--green-dark);
            margin-top: 2px;
        }

        .brand-subtitle {
            margin-top: 4px;
            font-size: 11px;
            color: var(--green-dark);
        }

        .menu-title {
            font-size: 10px;

            text-transform: uppercase;

            letter-spacing: 1px;

            color: #a0a8a3;

            margin: 20px 10px 10px;
        }

        .menu {
            display: flex;

            flex-direction: column;

            gap: 5px;
        }

        .menu a {
            display: flex;

            align-items: center;

            gap: 12px;

            padding: 11px 13px;

            border-radius: 9px;

            color: #657068;

            font-size: 13px;

            transition: .2s ease;
        }

        .menu a:hover {
            background: #eaf7ed;

            color: var(--green-dark);

            transform: translateX(2px);
        }

        .menu a.active {
            background: var(--green);

            color: white;

            box-shadow: 0 7px 18px rgba(53, 216, 74, .18);
        }

        .menu-icon {
            width: 19px;

            text-align: center;

            font-size: 14px;
        }

        /* =====================================
           SUPPORT BOX
        ===================================== */

        .support {
              position: relative;
              bottom: auto;
              left: auto;
              right: auto;
              margin-top: 25px;
              padding: 16px;
              background: #f7faf7;
              border: 1px solid #e3ebe4;
              border-radius: 12px;
            }

        .support h4 {
            font-size: 12px;

            margin-bottom: 6px;
        }

        .support p {
            font-size: 10px;

            line-height: 1.5;

            color: var(--muted);

            margin-bottom: 12px;
        }

        .support a {
            display: block;

            text-align: center;

            background: var(--green);

            color: white;

            padding: 9px;

            border-radius: 7px;

            font-size: 10px;

            transition: .2s ease;
        }

        .support a:hover {
            background: var(--green-dark);
        }

        /* =====================================
           MAIN
        ===================================== */

        .main {
                margin-left: 255px;
                width: calc(100% - 255px);
                min-height: 100vh;
            }

        /* =====================================
           TOPBAR
        ===================================== */

        .topbar {
              height: 74px;
              background: #ffffff;
              border-bottom: 1px solid var(--border);
              display: flex;
              align-items: center;
              justify-content: space-between;
              padding: 0 32px;
            }

         .page-title {
             font-size: 18px;
             font-weight: 700;
             display: flex;
             align-items: center;
             gap: 15px;
            }

        .page-title::before {
            content: "\f0c9";
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            font-size: 17px;
            color: #333b35;
        }

        .top-right {
            display: flex;
            align-items: center;
            gap: 22px;
        }

        .search-box {
            width: 270px;
            height: 40px;
            background: #ffffff;
            border: 1px solid #e3e8e4;
            border-radius: 9px;
            padding: 0 15px;
            outline: none;
            font-size: 12px;
            color: var(--text);
        }

        .search-box i {
            position: absolute;

            left: 13px;

            top: 50%;

            transform: translateY(-50%);

            color: #9ba39e;

            font-size: 12px;
        }

        .search {
            width: 235px;

            background: #f6f8f6;

            border: 1px solid var(--border);

            border-radius: 8px;

            padding: 10px 13px 10px 35px;

            outline: none;

            font-size: 11px;
        }

       .search:focus {
            border-color: var(--primary);
        }

        /* Notification */

.notification {
    width: 36px;
    height: 40px;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #202620;
    font-size: 20px;
}

.notification span {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 17px;
    height: 17px;
    padding: 0 4px;
    border-radius: 20px;
    background: #188b36;
    color: white;
    font-size: 9px;
    font-weight: 700;
    display: flex;
    align-items: center;
    justify-content: center;
}

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--primary-soft);
            color: var(--primary-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 20px;

        }

        .admin-info strong {
            display: block;
            font-size: 17px;
            color: #1b211d;
        }

        .admin-info span {
            font-size: 10px;
            color: var(--muted);
        }

        /* =====================================
           CONTENT
        ===================================== */

        .content {
            padding: 30px;
        }

        .welcome {
            margin-bottom: 25px;
        }

        .welcome h1 {
            font-size: 25px;

            margin-bottom: 6px;
        }

        .welcome p {
            color: var(--muted);

            font-size: 12px;
        }

        /* =====================================
           STATISTICS
        ===================================== */

        .stats {
            display: grid;

            grid-template-columns: repeat(4, 1fr);

            gap: 16px;

            margin-bottom: 20px;
        }

        .stat-card {
            background: white;

            border: 1px solid var(--border);

            border-radius: 13px;

            padding: 18px;

            transition: .2s ease;
        }

        .stat-card:hover {
            transform: translateY(-2px);

            box-shadow: 0 8px 25px rgba(0,0,0,.04);
        }

        .stat-top {
            display: flex;

            align-items: center;

            justify-content: space-between;

            color: #69736c;

            font-size: 11px;
        }

        .stat-icon {
            width: 38px;
            height: 38px;

            border-radius: 9px;

            display: flex;

            align-items: center;

            justify-content: center;

            background: var(--green-soft);

            color: var(--green-dark);

            font-size: 15px;
        }

        .stat-card h3 {
            margin-top: 17px;

            font-size: 24px;
        }

        .stat-card p {
            font-size: 10px;

            color: var(--muted);

            margin-top: 4px;
        }

        /* =====================================
           DASHBOARD GRID
        ===================================== */

        .dashboard-grid {
            display: grid;

            grid-template-columns: 2fr 1fr;

            gap: 18px;

            margin-bottom: 20px;
        }

        .card {
            background: white;

            border: 1px solid var(--border);

            border-radius: 13px;

            padding: 20px;
        }

        .card-header {
            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 18px;
        }

        .card-header h2 {
            font-size: 15px;
        }

        .card-header a {
            color: var(--green-dark);

            font-size: 10px;

            font-weight: 600;
        }

        /* =====================================
           SALES
        ===================================== */

        .revenue-number {
            font-size: 25px;

            font-weight: 700;

            margin-bottom: 4px;
        }

        .revenue-label {
            color: var(--muted);

            font-size: 10px;
        }

        .sales-chart-wrapper {
            height: 230px;

            margin-top: 18px;
        }

        /* =====================================
           ORDER STATUS
        ===================================== */

        .status-chart-wrapper {
            height: 205px;

            position: relative;

            display: flex;

            justify-content: center;

            align-items: center;

            margin-bottom: 10px;
        }

        .status-list {
            margin-top: 5px;
        }

        .status-row {
            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 9px 0;

            border-bottom: 1px solid var(--border);

            font-size: 11px;
        }

        .status-row:last-child {
            border-bottom: none;
        }

        .status-left {
            display: flex;

            align-items: center;

            gap: 8px;
        }

        .dot {
            width: 8px;
            height: 8px;

            border-radius: 50%;
        }

        .green {
            background: var(--green);
        }

        .yellow {
            background: var(--yellow);
        }

        .blue {
            background: var(--blue);
        }

        .purple {
            background: var(--purple);
        }

        .red {
            background: var(--red);
        }

        /* =====================================
           TABLE
        ===================================== */

        .orders-card {
            overflow-x: auto;
        }

        table {
            width: 100%;

            border-collapse: collapse;
        }

        th {
            text-align: left;

            font-size: 9px;

            color: var(--muted);

            text-transform: uppercase;

            padding: 12px 8px;

            border-bottom: 1px solid var(--border);

            white-space: nowrap;
        }

        td {
            padding: 13px 8px;

            font-size: 11px;

            border-bottom: 1px solid #f0f2f0;

            white-space: nowrap;
        }

        tbody tr {
            transition: .15s ease;
        }

        tbody tr:hover {
            background: #fafcfb;
        }

        .badge {
            padding: 5px 9px;

            border-radius: 20px;

            font-size: 9px;

            display: inline-block;
        }

        .badge-pending {
            background: #fff5dc;

            color: #a77700;
        }

        .badge-confirmed {
            background: #eaf2ff;

            color: #456dc3;
        }

        .badge-processing {
            background: #f0ebff;

            color: #7052b8;
        }

        .badge-completed {
            background: #e9f9ed;

            color: #29863b;
        }

        .badge-cancelled {
            background: #ffeaea;

            color: #c94c4c;
        }

        /* =====================================
           CUSTOMER
        ===================================== */

        .customer {
            display: flex;

            align-items: center;

            gap: 10px;

            padding: 11px 0;

            border-bottom: 1px solid var(--border);
        }

        .customer:last-child {
            border-bottom: none;
        }

        .customer-avatar {
            width: 35px;
            height: 35px;

            border-radius: 50%;

            background: var(--green-soft);

            display: flex;

            justify-content: center;

            align-items: center;

            color: var(--green-dark);

            font-size: 11px;

            font-weight: 700;

            flex-shrink: 0;
        }

        .customer-info strong {
            display: block;

            font-size: 11px;
        }

        .customer-info span {
            color: var(--muted);

            font-size: 9px;
        }

        /* =====================================
           MOBILE BUTTON
        ===================================== */

        .mobile-menu {
            display: none;

            border: none;

            background: var(--green-soft);

            color: var(--green-dark);

            width: 35px;

            height: 35px;

            border-radius: 8px;

            cursor: pointer;
        }

        /* =====================================
           RESPONSIVE
        ===================================== */

        @media(max-width: 1100px) {

            .stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .dashboard-grid {
                grid-template-columns: 1fr;
            }
        }

        @media(max-width: 800px) {

            .sidebar {
                transform: translateX(-100%);

                transition: .25s ease;
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .main {
                margin-left: 0;
            }

            .mobile-menu {
                display: inline-flex;

                align-items: center;

                justify-content: center;
            }

            .topbar {
                padding: 0 18px;
            }

            .search {
                width: 180px;
            }

            .content {
                padding: 20px;
            }
        }

        @media(max-width: 600px) {

            .stats {
                grid-template-columns: 1fr;
            }

            .search-box {
                display: none;
            }

            .admin-info {
                display: none;
            }

            .welcome h1 {
                font-size: 21px;
            }

            .content {
                padding: 15px;
            }
        }
    </style>
</head>

<body>

<div class="app">

    <!-- =====================================
         SIDEBAR
    ====================================== -->

    <aside class="sidebar" id="sidebar">

        <div class="brand">

            <!--
                YOUR COMPANY LOGO

                If your logo is:
                public/images/company-logo.png

                change the filename below.
            -->

            <img
                src="{{ asset('images/stock-connect-logo.png') }}"
                class="brand-logo"
                alt="Stock Connect Logo"
            >

            <div class="brand-name">
                Stock Connect
            </div>

            <div class="brand-subtitle">
                Livestock Marketplace
            </div>

        </div>


        <div class="menu-title">
            Main Menu
        </div>


        <nav class="menu">

            <a href="{{ route('admin.dashboard') }}" class="active">
                <span class="menu-icon">
                    <i class="fa-solid fa-chart-line"></i>
                </span>

                <span>
                    Dashboard
                </span>
            </a>


            <a href="{{ route('livestock.index') }}">
                <span class="menu-icon">
                    <i class="fa-solid fa-cow"></i>
                </span>

                <span>
                    Livestock
                </span>
            </a>


            <a href="{{ route('admin.orders.index') }}">
                <span class="menu-icon">
                    <i class="fa-solid fa-cart-shopping"></i>
                </span>

                <span>
                    Orders
                </span>
            </a>


            <a href="{{ route('admin.customers.index') }}">
                <span class="menu-icon">
                    <i class="fa-solid fa-users"></i>
                </span>

                <span>
                    Customers
                </span>
            </a>


            <a href="{{ route('admin.payments.index') }}">
                <span class="menu-icon">
                    <i class="fa-solid fa-credit-card"></i>
                </span>

                <span>
                    Payments
                </span>
            </a>


            <a href="{{ route('admin.reviews.index') }}">
                <span class="menu-icon">
                    <i class="fa-solid fa-star"></i>
                </span>

                <span>
                    Reviews
                </span>
            </a>

        </nav>


        <div class="menu-title">
            Management
        </div>


        <nav class="menu">

            <a href="#">
                <span class="menu-icon">
                    <i class="fa-solid fa-file-lines"></i>
                </span>

                <span>
                    Reports
                </span>
            </a>


            <a href="#">
                <span class="menu-icon">
                    <i class="fa-solid fa-chart-pie"></i>
                </span>

                <span>
                    Analytics
                </span>
            </a>

        </nav>

        <div class="menu-title">
    Account
</div>

<nav class="menu">

    <form method="POST" action="{{ route('logout') }}">

        @csrf

        <button
            type="submit"
            style="
                width: 100%;
                border: none;
                background: transparent;
                cursor: pointer;
                text-align: left;
                font-family: inherit;
            "
        >

            <span class="menu-icon">
                <i class="fa-solid fa-right-from-bracket"></i>
            </span>

            <span>
                Logout
            </span>

        </button>

    </form>

</nav>
       
        <div class="support">

            <h4>
                Need Help?
            </h4>

            <p>
                Need assistance managing your Stock Connect marketplace?
            </p>

            <a href="#">
                Contact Support
            </a>

        </div>

    </aside>


    <!-- =====================================
         MAIN CONTENT
    ====================================== -->

    <main class="main">


        <!-- TOPBAR -->

        <header class="topbar">

            <div style="display:flex;align-items:center;gap:12px;">

                <button
                    class="mobile-menu"
                    id="mobileMenu"
                    type="button"
                >
                    <i class="fa-solid fa-bars"></i>
                </button>

                <div class="page-title">
                    Dashboard
                </div>

            </div>


            <div class="top-right">


                <div class="search-box">

                    <i class="fa-solid fa-magnifying-glass"></i>

                    <input
                        type="text"
                        class="search"
                        id="dashboardSearch"
                        placeholder="Search anything..."
                    >
                </div>

                <div class="notification">
                    <i class="fa-solid fa-bell"></i></i>
                    <span>3</span>
                    </div>

                <div class="admin-profile">

                    <div class="avatar">

                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                    </div>


                    <div class="admin-info">

                        <strong>
                            {{ auth()->user()->name }}
                        </strong>

                        <span>
                            Administrator
                        </span>

                    </div>

                </div>

            </div>

        </header>


        <!-- =====================================
             DASHBOARD CONTENT
        ====================================== -->

        <section class="content">


            <!-- WELCOME -->

            <div class="welcome">

                <h1>
                    Welcome back, {{ auth()->user()->name }} 👋
                </h1>

                <p>
                    Here's what's happening with your Stock Connect livestock marketplace today.
                </p>

            </div>


            <!-- =====================================
                 STATISTICS
            ====================================== -->

            <div class="stats">


                <!-- LIVESTOCK -->

                <div class="stat-card">

                    <div class="stat-top">

                        <span>
                            Total Livestock
                        </span>

                        <div class="stat-icon">

                            <i class="fa-solid fa-cow"></i>

                        </div>

                    </div>


                    <h3>
                        {{ $totalLivestock }}
                    </h3>


                    <p>
                        Livestock listed on marketplace
                    </p>

                </div>


                <!-- ORDERS -->

                <div class="stat-card">

                    <div class="stat-top">

                        <span>
                            Total Orders
                        </span>

                        <div class="stat-icon">

                            <i class="fa-solid fa-cart-shopping"></i>

                        </div>

                    </div>


                    <h3>
                        {{ $totalOrders }}
                    </h3>


                    <p>
                        Orders received
                    </p>

                </div>


                <!-- CUSTOMERS -->

                <div class="stat-card">

                    <div class="stat-top">

                        <span>
                            Customers
                        </span>

                        <div class="stat-icon">

                            <i class="fa-solid fa-users"></i>

                        </div>

                    </div>


                    <h3>
                        {{ $totalCustomers }}
                    </h3>


                    <p>
                        Registered customers
                    </p>

                </div>


                <!-- REVENUE -->

                <div class="stat-card">

                    <div class="stat-top">

                        <span>
                            Revenue
                        </span>

                        <div class="stat-icon">

                            <i class="fa-solid fa-naira-sign"></i>

                        </div>

                    </div>


                    <h3>
                        ₦{{ number_format($totalRevenue, 0) }}
                    </h3>


                    <p>
                        From confirmed payments
                    </p>

                </div>

            </div>


            <!-- =====================================
                 CHARTS
            ====================================== -->

            <div class="dashboard-grid">


                <!-- SALES OVERVIEW -->

                <div class="card">

                    <div class="card-header">

                        <h2>
                            Sales Overview
                        </h2>

                        <span style="font-size:10px;color:#7c867f;">
                            Current
                        </span>

                    </div>


                    <div class="revenue-number">

                        ₦{{ number_format($totalRevenue, 0) }}

                    </div>


                    <div class="revenue-label">

                        Total confirmed revenue

                    </div>


                    <div class="sales-chart-wrapper">

                        <canvas id="salesChart"></canvas>

                    </div>

                </div>


                <!-- ORDER STATUS -->

                <div class="card">

                    <div class="card-header">

                        <h2>
                            Order Status
                        </h2>

                    </div>


                    <div class="status-chart-wrapper">

                        <canvas id="orderStatusChart"></canvas>

                    </div>


                    <div class="status-list">


                        <div class="status-row">

                            <div class="status-left">

                                <span class="dot yellow"></span>

                                Pending

                            </div>

                            <strong>
                                {{ $pendingOrders }}
                            </strong>

                        </div>


                        <div class="status-row">

                            <div class="status-left">

                                <span class="dot blue"></span>

                                Confirmed

                            </div>

                            <strong>
                                {{ $confirmedOrders }}
                            </strong>

                        </div>


                        <div class="status-row">

                            <div class="status-left">

                                <span class="dot purple"></span>

                                Processing

                            </div>

                            <strong>
                                {{ $processingOrders }}
                            </strong>

                        </div>


                        <div class="status-row">

                            <div class="status-left">

                                <span class="dot green"></span>

                                Completed

                            </div>

                            <strong>
                                {{ $completedOrders }}
                            </strong>

                        </div>


                        <div class="status-row">

                            <div class="status-left">

                                <span class="dot red"></span>

                                Cancelled

                            </div>

                            <strong>
                                {{ $cancelledOrders }}
                            </strong>

                        </div>

                    </div>

                </div>

            </div>


            <!-- =====================================
                 RECENT ORDERS
            ====================================== -->

            <div class="card orders-card">

                <div class="card-header">

                    <h2>
                        Recent Orders
                    </h2>

                    <a href="{{ route('admin.orders.index') }}">
                        View all orders →
                    </a>

                </div>


                <table id="ordersTable">

                    <thead>

                        <tr>

                            <th>
                                Order
                            </th>

                            <th>
                                Customer
                            </th>

                            <th>
                                Livestock
                            </th>

                            <th>
                                Amount
                            </th>

                            <th>
                                Status
                            </th>

                            <th>
                                Date
                            </th>

                        </tr>

                    </thead>


                    <tbody>


                    @forelse($recentOrders as $order)

                        <tr>

                            <td>
                                #{{ $order->id }}
                            </td>


                            <td>
                                {{ $order->customer_name }}
                            </td>


                            <td>

                                {{ $order->livestock->name ?? 'Livestock' }}

                            </td>


                            <td>

                                ₦{{ number_format($order->total_price, 0) }}

                            </td>


                            <td>

                                @if($order->status === 'pending')

                                    <span class="badge badge-pending">
                                        Pending
                                    </span>

                                @elseif($order->status === 'confirmed')

                                    <span class="badge badge-confirmed">
                                        Confirmed
                                    </span>

                                @elseif($order->status === 'processing')

                                    <span class="badge badge-processing">
                                        Processing
                                    </span>

                                @elseif($order->status === 'completed')

                                    <span class="badge badge-completed">
                                        Completed
                                    </span>

                                @elseif($order->status === 'cancelled')

                                    <span class="badge badge-cancelled">
                                        Cancelled
                                    </span>

                                @else

                                    <span class="badge badge-pending">
                                        {{ ucfirst($order->status) }}
                                    </span>

                                @endif

                            </td>


                            <td>

                                {{ $order->created_at->format('M d, Y') }}

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="6"
                                style="text-align:center;padding:30px;color:#7c867f;"
                            >
                                No orders have been placed yet.
                            </td>

                        </tr>

                    @endforelse


                    </tbody>

                </table>

            </div>


            <br>


            <!-- =====================================
                 CUSTOMERS + PAYMENTS
            ====================================== -->

            <div class="dashboard-grid">


                <!-- RECENT CUSTOMERS -->

                <div class="card">

                    <div class="card-header">

                        <h2>
                            Recent Customers
                        </h2>

                        <a href="#">
                            View all →
                        </a>

                    </div>


                    @forelse($recentCustomers as $customer)

                        <div class="customer">

                            <div class="customer-avatar">

                                {{ strtoupper(substr($customer->name, 0, 1)) }}

                            </div>


                            <div class="customer-info">

                                <strong>
                                    {{ $customer->name }}
                                </strong>

                                <span>
                                    {{ $customer->email }}
                                </span>

                            </div>

                        </div>

                    @empty

                        <p style="font-size:11px;color:#7c867f;">
                            No customers registered yet.
                        </p>

                    @endforelse

                </div>


                <!-- PAYMENT OVERVIEW -->

                <div class="card">

                    <div class="card-header">

                        <h2>
                            Payment Overview
                        </h2>

                    </div>


                    <div class="status-row">

                        <div class="status-left">

                            <span class="dot yellow"></span>

                            Pending Payments

                        </div>


                        <strong>
                            {{ $pendingPayments }}
                        </strong>

                    </div>


                    <div class="status-row">

                        <div class="status-left">

                            <span class="dot green"></span>

                            Confirmed Payments

                        </div>


                        <strong>
                            {{ $confirmedPayments }}
                        </strong>

                    </div>


                    <div class="status-row">

                        <div class="status-left">

                            <span class="dot blue"></span>

                            Confirmed Revenue

                        </div>


                        <strong>

                            ₦{{ number_format($totalRevenue, 0) }}

                        </strong>

                    </div>

                </div>

            </div>


        </section>

    </main>

</div>


<!-- =====================================
     JAVASCRIPT
====================================== -->

<script>

    /* =====================================
       MOBILE SIDEBAR
    ====================================== */

    const mobileMenu = document.getElementById('mobileMenu');

    const sidebar = document.getElementById('sidebar');

    if (mobileMenu) {

        mobileMenu.addEventListener('click', function () {

            sidebar.classList.toggle('open');

        });

    }


    /* =====================================
       SALES CHART
    ====================================== */

    const salesCanvas = document.getElementById('salesChart');

    if (salesCanvas) {

        const salesContext = salesCanvas.getContext('2d');

        new Chart(salesContext, {

            type: 'line',

            data: {

                labels: [
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'May',
                    'Jun',
                    'Jul',
                    'Aug'
                ],

                datasets: [

                    {

                        label: 'Revenue',

                        data: [
                            0,
                            0,
                            0,
                            0,
                            0,
                            0,
                            0,
                            {{ $totalRevenue }}
                        ],

                        borderColor: '#35d84a',

                        backgroundColor: 'rgba(53, 216, 74, 0.08)',

                        borderWidth: 2,

                        fill: true,

                        tension: 0.4,

                        pointRadius: 3,

                        pointHoverRadius: 6

                    }

                ]

            },

            options: {

                responsive: true,

                maintainAspectRatio: false,

                plugins: {

                    legend: {
                        display: false
                    },

                    tooltip: {

                        callbacks: {

                            label: function(context) {

                                return ' ₦' +
                                    Number(context.raw).toLocaleString();

                            }

                        }

                    }

                },

                scales: {

                    x: {

                        grid: {
                            display: false
                        },

                        ticks: {
                            font: {
                                size: 9
                            },

                            color: '#89938c'
                        }

                    },

                    y: {

                        beginAtZero: true,

                        grid: {
                            color: '#edf0ed'
                        },

                        ticks: {

                            font: {
                                size: 9
                            },

                            color: '#89938c',

                            callback: function(value) {

                                return '₦' +
                                    Number(value).toLocaleString();

                            }

                        }

                    }

                }

            }

        });

    }


    /* =====================================
       ORDER STATUS DOUGHNUT CHART
    ====================================== */

    const statusCanvas = document.getElementById('orderStatusChart');

    if (statusCanvas) {

        const statusContext = statusCanvas.getContext('2d');

        new Chart(statusContext, {

            type: 'doughnut',

            data: {

                labels: [
                    'Pending',
                    'Confirmed',
                    'Processing',
                    'Completed',
                    'Cancelled'
                ],

                datasets: [

                    {

                        data: [

                            {{ $pendingOrders }},

                            {{ $confirmedOrders }},

                            {{ $processingOrders }},

                            {{ $completedOrders }},

                            {{ $cancelledOrders }}

                        ],

                        backgroundColor: [

                            '#e7aa32',

                            '#557bd6',

                            '#7959bd',

                            '#35d84a',

                            '#df5d5d'

                        ],

                        borderWidth: 0,

                        hoverOffset: 6

                    }

                ]

            },

            options: {

                responsive: true,

                maintainAspectRatio: false,

                cutout: '68%',

                plugins: {

                    legend: {
                        display: false
                    },

                    tooltip: {

                        callbacks: {

                            label: function(context) {

                                return ' ' +
                                    context.label +
                                    ': ' +
                                    context.raw;

                            }

                        }

                    }

                }

            }

        });

    }


    /* =====================================
       DASHBOARD SEARCH
    ====================================== */

    const searchInput =
        document.getElementById('dashboardSearch');

    const ordersTable =
        document.getElementById('ordersTable');

    if (searchInput && ordersTable) {

        searchInput.addEventListener('input', function () {

            const searchValue =
                this.value.toLowerCase().trim();

            const rows =
                ordersTable.querySelectorAll('tbody tr');

            rows.forEach(function(row) {

                const text =
                    row.textContent.toLowerCase();

                if (text.includes(searchValue)) {

                    row.style.display = '';

                } else {

                    row.style.display = 'none';

                }

            });

        });

    }

</script>

</body>
</html>