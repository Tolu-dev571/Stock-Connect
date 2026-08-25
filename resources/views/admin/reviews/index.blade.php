<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Stock Connect | Review Management</title>

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;600;700&display=swap"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    >

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

            --background: #f6f8f7;
            --white: #ffffff;

            --text: #18211b;
            --muted: #7b857e;

            --border: #e7ebe8;

            --yellow: #e7aa32;
            --yellow-soft: #fff6df;

            --blue: #557bd6;
            --blue-soft: #edf3ff;

            --red: #df5d5d;
            --red-soft: #ffeaea;

            --purple: #7959bd;
            --purple-soft: #f0ebff;
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
        input,
        select {
            font-family: inherit;
        }

        /* =====================================
           APPLICATION
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

            margin: 0 auto 10px;

        }


        .brand-name {

            font-size: 25px;

            font-weight: 900;

            color: var(--green-dark);

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


        .menu a,
        .logout-button {

            display: flex;

            align-items: center;

            gap: 12px;

            width: 100%;

            padding: 11px 13px;

            border-radius: 9px;

            color: #657068;

            font-size: 13px;

            transition: .2s ease;

        }


        .menu a:hover,
        .logout-button:hover {

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

            flex-shrink: 0;

        }


        .logout-form {

            margin: 0;
            padding: 0;

        }


        .logout-button {

            border: none;

            background: transparent;

            cursor: pointer;

            text-align: left;

        }


        /* =====================================
           SUPPORT
        ===================================== */

        .support {

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


        .top-left {

            display: flex;

            align-items: center;

            gap: 12px;

        }


        .page-title {

            font-size: 18px;

            font-weight: 700;

        }


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


        .top-right {

            display: flex;

            align-items: center;

            gap: 20px;

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


        .search-wrapper {

            position: relative;

        }


        .search-wrapper i {

            position: absolute;

            left: 13px;

            top: 50%;

            transform: translateY(-50%);

            color: #9ba39e;

            font-size: 12px;

        }


        .notification {

            width: 36px;

            height: 40px;

            position: relative;

            display: flex;

            align-items: center;

            justify-content: center;

            color: #202620;

            font-size: 19px;

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

            background: var(--green-soft);

            color: var(--green-dark);

            display: flex;

            align-items: center;

            justify-content: center;

            font-weight: 700;

            font-size: 16px;

        }


        .admin-info strong {

            display: block;

            font-size: 13px;

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


        .page-heading {

            margin-bottom: 25px;

        }


        .page-heading h1 {

            font-size: 25px;

            margin-bottom: 6px;

        }


        .page-heading p {

            color: var(--muted);

            font-size: 12px;

        }


        /* =====================================
           ALERT
        ===================================== */

        .alert {

            padding: 13px 16px;

            border-radius: 10px;

            margin-bottom: 20px;

            font-size: 11px;

            display: flex;

            align-items: center;

            gap: 9px;

        }


        .alert-success {

            background: var(--green-soft);

            color: var(--green-dark);

            border: 1px solid #d6efd9;

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

            font-size: 14px;

        }


        .stat-green {

            background: var(--green-soft);

            color: var(--green-dark);

        }


        .stat-yellow {

            background: var(--yellow-soft);

            color: var(--yellow);

        }


        .stat-blue {

            background: var(--blue-soft);

            color: var(--blue);

        }


        .stat-purple {

            background: var(--purple-soft);

            color: var(--purple);

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
           REVIEWS CARD
        ===================================== */

        .reviews-card {

            background: white;

            border: 1px solid var(--border);

            border-radius: 13px;

            overflow: hidden;

        }


        .card-header {

            padding: 20px;

            border-bottom: 1px solid var(--border);

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 15px;

        }


        .card-header h2 {

            font-size: 15px;

            margin-bottom: 4px;

        }


        .card-header p {

            color: var(--muted);

            font-size: 10px;

        }


        .header-actions {

            display: flex;

            align-items: center;

            gap: 10px;

        }


        .filter-select {

            border: 1px solid var(--border);

            background: white;

            padding: 9px 12px;

            border-radius: 8px;

            outline: none;

            font-size: 10px;

            color: var(--text);

            cursor: pointer;

        }


        /* =====================================
           TABLE
        ===================================== */

        .table-wrapper {

            overflow-x: auto;

        }


        table {

            width: 100%;

            border-collapse: collapse;

            min-width: 900px;

        }


        th {

            text-align: left;

            font-size: 9px;

            color: var(--muted);

            text-transform: uppercase;

            padding: 13px 15px;

            border-bottom: 1px solid var(--border);

            white-space: nowrap;

        }


        td {

            padding: 15px;

            font-size: 11px;

            border-bottom: 1px solid #f0f2f0;

            vertical-align: middle;

        }


        tbody tr {

            transition: .15s ease;

        }


        tbody tr:hover {

            background: #fafcfb;

        }


        tbody tr:last-child td {

            border-bottom: none;

        }


        /* =====================================
           CUSTOMER
        ===================================== */

        .customer {

            display: flex;

            align-items: center;

            gap: 9px;

            min-width: 150px;

        }


        .customer-avatar {

            width: 34px;

            height: 34px;

            border-radius: 50%;

            background: var(--green-soft);

            color: var(--green-dark);

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 11px;

            font-weight: 700;

            flex-shrink: 0;

        }


        .customer-details strong {

            display: block;

            font-size: 11px;

            margin-bottom: 3px;

        }


        .customer-details span {

            display: block;

            color: var(--muted);

            font-size: 9px;

        }


        /* =====================================
           LIVESTOCK
        ===================================== */

        .livestock-name {

            font-weight: 600;

            font-size: 11px;

        }


        .order-number {

            color: var(--muted);

            font-size: 9px;

            margin-top: 3px;

        }


        /* =====================================
           RATING
        ===================================== */

        .rating {

            display: flex;

            align-items: center;

            gap: 2px;

            white-space: nowrap;

        }


        .rating i {

            font-size: 11px;

            color: #e8aa2d;

        }


        .rating-number {

            margin-left: 5px;

            color: var(--text);

            font-size: 10px;

            font-weight: 600;

        }


        /* =====================================
           COMMENT
        ===================================== */

        .comment {

            max-width: 280px;

            color: #566159;

            line-height: 1.5;

            font-size: 10px;

        }


        .no-comment {

            color: #a1aaa4;

            font-style: italic;

        }


        /* =====================================
           STATUS
        ===================================== */

        .badge {

            display: inline-flex;

            align-items: center;

            gap: 5px;

            padding: 5px 9px;

            border-radius: 20px;

            font-size: 9px;

            font-weight: 500;

        }


        .badge-pending {

            background: var(--yellow-soft);

            color: #a77700;

        }


        .badge-approved {

            background: var(--green-soft);

            color: var(--green-dark);

        }


        .badge-hidden {

            background: var(--red-soft);

            color: #c94c4c;

        }


        /* =====================================
           ACTIONS
        ===================================== */

        .actions {

            display: flex;

            align-items: center;

            gap: 6px;

        }


        .action-button {

            border: none;

            padding: 7px 9px;

            border-radius: 7px;

            font-size: 9px;

            cursor: pointer;

            display: inline-flex;

            align-items: center;

            gap: 5px;

            transition: .2s ease;

        }


        .approve-button {

            background: var(--green-soft);

            color: var(--green-dark);

        }


        .approve-button:hover {

            background: var(--green);

            color: white;

        }


        .hide-button {

            background: var(--red-soft);

            color: #c94c4c;

        }


        .hide-button:hover {

            background: var(--red);

            color: white;

        }


        .view-button {

            background: var(--blue-soft);

            color: var(--blue);

        }


        .view-button:hover {

            background: var(--blue);

            color: white;

        }


        /* =====================================
           EMPTY STATE
        ===================================== */

        .empty {

            text-align: center;

            padding: 60px 20px;

        }


        .empty-icon {

            width: 55px;

            height: 55px;

            margin: 0 auto 15px;

            border-radius: 50%;

            background: var(--green-soft);

            color: var(--green-dark);

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 20px;

        }


        .empty h3 {

            font-size: 14px;

            margin-bottom: 6px;

        }


        .empty p {

            color: var(--muted);

            font-size: 10px;

        }


        /* =====================================
           RESPONSIVE
        ===================================== */

        @media(max-width: 1100px) {

            .stats {

                grid-template-columns: repeat(2, 1fr);

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

                width: 100%;

            }


            .mobile-menu {

                display: inline-flex;

                align-items: center;

                justify-content: center;

            }


            .topbar {

                padding: 0 18px;

            }


            .content {

                padding: 20px;

            }


            .search {

                width: 180px;

            }

        }


        @media(max-width: 600px) {

            .stats {

                grid-template-columns: 1fr;

            }


            .search-wrapper {

                display: none;

            }


            .admin-info {

                display: none;

            }


            .content {

                padding: 15px;

            }


            .page-heading h1 {

                font-size: 21px;

            }


            .card-header {

                align-items: flex-start;

                flex-direction: column;

            }


            .header-actions {

                width: 100%;

            }


            .filter-select {

                width: 100%;

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


            <a href="{{ route('admin.dashboard') }}">

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


            <form
                method="POST"
                action="{{ route('logout') }}"
                class="logout-form"
            >

                @csrf

                <button
                    type="submit"
                    class="logout-button"
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
         MAIN
    ====================================== -->

    <main class="main">


        <!-- =====================================
             TOPBAR
        ====================================== -->

        <header class="topbar">


            <div class="top-left">

                <button
                    class="mobile-menu"
                    id="mobileMenu"
                    type="button"
                >

                    <i class="fa-solid fa-bars"></i>

                </button>


                <div class="page-title">
                    Reviews
                </div>

            </div>


            <div class="top-right">


                <div class="search-wrapper">

                    <i class="fa-solid fa-magnifying-glass"></i>

                    <input
                        type="text"
                        class="search"
                        id="reviewSearch"
                        placeholder="Search reviews..."
                    >

                </div>


                <div class="notification">

                    <i class="fa-solid fa-bell"></i>

                    @if($pendingReviews > 0)

                        <span>
                            {{ $pendingReviews }}
                        </span>

                    @endif

                </div>


                <div class="admin-profile">


                    <div class="avatar">

                        {{ strtoupper(
                            substr(
                                auth()->user()->name,
                                0,
                                1
                            )
                        ) }}

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
             CONTENT
        ====================================== -->

        <section class="content">


            <div class="page-heading">

                <h1>
                    Review Management
                </h1>

                <p>
                    Review customer feedback, manage ratings and moderate marketplace reviews.
                </p>

            </div>


            <!-- =====================================
                 SUCCESS MESSAGE
            ====================================== -->

            @if(session('success'))

                <div class="alert alert-success">

                    <i class="fa-solid fa-circle-check"></i>

                    {{ session('success') }}

                </div>

            @endif


            <!-- =====================================
                 STATISTICS
            ====================================== -->

            <div class="stats">


                <!-- TOTAL -->

                <div class="stat-card">

                    <div class="stat-top">

                        <span>
                            Total Reviews
                        </span>

                        <div class="stat-icon stat-green">

                            <i class="fa-solid fa-comments"></i>

                        </div>

                    </div>


                    <h3>
                        {{ $totalReviews }}
                    </h3>


                    <p>
                        Customer reviews submitted
                    </p>

                </div>


                <!-- PENDING -->

                <div class="stat-card">

                    <div class="stat-top">

                        <span>
                            Pending Reviews
                        </span>

                        <div class="stat-icon stat-yellow">

                            <i class="fa-solid fa-clock"></i>

                        </div>

                    </div>


                    <h3>
                        {{ $pendingReviews }}
                    </h3>


                    <p>
                        Reviews waiting for approval
                    </p>

                </div>


                <!-- APPROVED -->

                <div class="stat-card">

                    <div class="stat-top">

                        <span>
                            Approved Reviews
                        </span>

                        <div class="stat-icon stat-blue">

                            <i class="fa-solid fa-circle-check"></i>

                        </div>

                    </div>


                    <h3>
                        {{ $approvedReviews }}
                    </h3>


                    <p>
                        Reviews visible to customers
                    </p>

                </div>


                <!-- RATING -->

                <div class="stat-card">

                    <div class="stat-top">

                        <span>
                            Average Rating
                        </span>

                        <div class="stat-icon stat-purple">

                            <i class="fa-solid fa-star"></i>

                        </div>

                    </div>


                    <h3>

                        {{ $averageRating
                            ? number_format($averageRating, 1)
                            : '0.0'
                        }}

                        <span style="font-size:14px;color:#e7aa32;">
                            ★
                        </span>

                    </h3>


                    <p>
                        Based on approved reviews
                    </p>

                </div>


            </div>


            <!-- =====================================
                 REVIEWS TABLE
            ====================================== -->

            <div class="reviews-card">


                <div class="card-header">


                    <div>

                        <h2>
                            Customer Reviews
                        </h2>

                        <p>
                            Review submitted feedback and manage publication status.
                        </p>

                    </div>


                    <div class="header-actions">

                        <select
                            class="filter-select"
                            id="statusFilter"
                        >

                            <option value="all">
                                All Reviews
                            </option>

                            <option value="pending">
                                Pending
                            </option>

                            <option value="approved">
                                Approved
                            </option>

                            <option value="hidden">
                                Hidden
                            </option>

                        </select>

                    </div>


                </div>


                @if($reviews->count() > 0)


                    <div class="table-wrapper">


                        <table id="reviewsTable">


                            <thead>

                                <tr>

                                    <th>
                                        Customer
                                    </th>

                                    <th>
                                        Livestock
                                    </th>

                                    <th>
                                        Order
                                    </th>

                                    <th>
                                        Rating
                                    </th>

                                    <th>
                                        Review
                                    </th>

                                    <th>
                                        Status
                                    </th>

                                    <th>
                                        Date
                                    </th>

                                    <th>
                                        Action
                                    </th>

                                </tr>

                            </thead>


                            <tbody>


                            @foreach($reviews as $review)


                                <tr
                                    data-status="{{ $review->status }}"
                                >


                                    <!-- CUSTOMER -->

                                    <td>

                                        <div class="customer">


                                            <div class="customer-avatar">

                                                {{ strtoupper(
                                                    substr(
                                                        $review->user->name ?? 'U',
                                                        0,
                                                        1
                                                    )
                                                ) }}

                                            </div>


                                            <div class="customer-details">

                                                <strong>

                                                    {{ $review->user->name ?? 'Unknown Customer' }}

                                                </strong>


                                                <span>

                                                    {{ $review->user->email ?? 'No email' }}

                                                </span>

                                            </div>


                                        </div>

                                    </td>


                                    <!-- LIVESTOCK -->

                                    <td>

                                        <div class="livestock-name">

                                            {{ $review->livestock->name ?? 'Livestock' }}

                                        </div>


                                        <div class="order-number">

                                            {{ $review->livestock->category ?? 'N/A' }}

                                        </div>

                                    </td>


                                    <!-- ORDER -->

                                    <td>

                                        <strong>
                                            #{{ $review->order_id }}
                                        </strong>

                                    </td>


                                    <!-- RATING -->

                                    <td>


                                        <div class="rating">


                                            @for($i = 1; $i <= 5; $i++)

                                                @if($i <= $review->rating)

                                                    <i class="fa-solid fa-star"></i>

                                                @else

                                                    <i
                                                        class="fa-regular fa-star"
                                                        style="color:#d8ddd9;"
                                                    ></i>

                                                @endif

                                            @endfor


                                            <span class="rating-number">

                                                {{ $review->rating }}/5

                                            </span>


                                        </div>


                                    </td>


                                    <!-- COMMENT -->

                                    <td>

                                        @if($review->comment)

                                            <div
                                                class="comment"
                                                title="{{ $review->comment }}"
                                            >

                                                {{ \Illuminate\Support\Str::limit(
                                                    $review->comment,
                                                    90
                                                ) }}

                                            </div>

                                        @else

                                            <span class="no-comment">
                                                No comment
                                            </span>

                                        @endif

                                    </td>


                                    <!-- STATUS -->

                                    <td>


                                        @if($review->status === 'pending')

                                            <span class="badge badge-pending">

                                                <i class="fa-solid fa-clock"></i>

                                                Pending

                                            </span>


                                        @elseif($review->status === 'approved')

                                            <span class="badge badge-approved">

                                                <i class="fa-solid fa-check"></i>

                                                Approved

                                            </span>


                                        @elseif($review->status === 'hidden')

                                            <span class="badge badge-hidden">

                                                <i class="fa-solid fa-eye-slash"></i>

                                                Hidden

                                            </span>


                                        @else

                                            <span class="badge badge-pending">

                                                {{ ucfirst($review->status) }}

                                            </span>

                                        @endif


                                    </td>


                                    <!-- DATE -->

                                    <td>

                                        {{ $review->created_at
                                            ? $review->created_at->format('M d, Y')
                                            : 'N/A'
                                        }}

                                    </td>


                                    <!-- ACTION -->

                                    <td>


                                        <div class="actions">


                                            @if($review->status !== 'approved')

                                                <form
                                                    method="POST"
                                                    action="{{ route(
                                                        'admin.reviews.approve',
                                                        $review->id
                                                    ) }}"
                                                >

                                                    @csrf

                                                    @method('PATCH')

                                                    <button
                                                        type="submit"
                                                        class="action-button approve-button"
                                                    >

                                                        <i class="fa-solid fa-check"></i>

                                                        Approve

                                                    </button>

                                                </form>

                                            @endif


                                            @if($review->status !== 'hidden')

                                                <form
                                                    method="POST"
                                                    action="{{ route(
                                                        'admin.reviews.hide',
                                                        $review->id
                                                    ) }}"
                                                >

                                                    @csrf

                                                    @method('PATCH')

                                                    <button
                                                        type="submit"
                                                        class="action-button hide-button"
                                                    >

                                                        <i class="fa-solid fa-eye-slash"></i>

                                                        Hide

                                                    </button>

                                                </form>

                                            @endif


                                        </div>

                                    </td>


                                </tr>


                            @endforeach


                            </tbody>

                        </table>


                    </div>


                @else


                    <div class="empty">

                        <div class="empty-icon">

                            <i class="fa-solid fa-star"></i>

                        </div>


                        <h3>
                            No reviews yet
                        </h3>


                        <p>
                            Customer reviews will appear here once they are submitted.
                        </p>

                    </div>


                @endif


            </div>


        </section>


    </main>


</div>


<script>

    /*
    |--------------------------------------------------------------------------
    | MOBILE SIDEBAR
    |--------------------------------------------------------------------------
    */

    const mobileMenu = document.getElementById('mobileMenu');

    const sidebar = document.getElementById('sidebar');

    if (mobileMenu && sidebar) {

        mobileMenu.addEventListener('click', function () {

            sidebar.classList.toggle('open');

        });

    }


    /*
    |--------------------------------------------------------------------------
    | SEARCH REVIEWS
    |--------------------------------------------------------------------------
    */

    const reviewSearch =
        document.getElementById('reviewSearch');

    const reviewsTable =
        document.getElementById('reviewsTable');

    if (reviewSearch && reviewsTable) {

        reviewSearch.addEventListener('input', function () {

            const searchValue =
                this.value.toLowerCase().trim();

            const rows =
                reviewsTable.querySelectorAll('tbody tr');

            rows.forEach(function (row) {

                const rowText =
                    row.textContent.toLowerCase();

                row.style.display =
                    rowText.includes(searchValue)
                        ? ''
                        : 'none';

            });

        });

    }


    /*
    |--------------------------------------------------------------------------
    | STATUS FILTER
    |--------------------------------------------------------------------------
    */

    const statusFilter =
        document.getElementById('statusFilter');

    if (statusFilter && reviewsTable) {

        statusFilter.addEventListener('change', function () {

            const selectedStatus =
                this.value;

            const rows =
                reviewsTable.querySelectorAll('tbody tr');

            rows.forEach(function (row) {

                const rowStatus =
                    row.getAttribute('data-status');

                if (
                    selectedStatus === 'all' ||
                    rowStatus === selectedStatus
                ) {

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