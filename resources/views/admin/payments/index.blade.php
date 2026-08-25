<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Payments | Stock Connect Admin</title>

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
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
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
           APP
        ===================================== */

        .app {
            min-height: 100vh;
        }

        /* =====================================
           SIDEBAR
        ===================================== */

        .sidebar {

            width: 255px;
            height: 100vh;

            position: fixed;
            left: 0;
            top: 0;

            background: var(--white);

            border-right: 1px solid var(--border);

            padding: 28px 18px;

            overflow-y: auto;

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
        }

        .logout-form {
            width: 100%;
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

            background: white;

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

        .page-title i {

            color: var(--green-dark);

        }

        .top-right {

            display: flex;

            align-items: center;

            gap: 22px;
        }

        .search {

            width: 235px;

            background: #f6f8f6;

            border: 1px solid var(--border);

            border-radius: 8px;

            padding: 10px 13px;

            outline: none;

            font-size: 11px;
        }

        .search:focus {

            border-color: var(--green);
        }

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

            font-size: 14px;
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
           STAT CARDS
        ===================================== */

        .stats {

            display: grid;

            grid-template-columns: repeat(4, 1fr);

            gap: 16px;

            margin-bottom: 22px;
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
           MAIN CARD
        ===================================== */

        .card {

            background: white;

            border: 1px solid var(--border);

            border-radius: 13px;

            padding: 20px;

            margin-bottom: 20px;
        }

        .card-header {

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 15px;

            margin-bottom: 18px;
        }

        .card-header h2 {

            font-size: 15px;
        }

        .card-header p {

            font-size: 10px;

            color: var(--muted);

            margin-top: 4px;
        }

        /* =====================================
           FILTERS
        ===================================== */

        .filters {

            display: flex;

            gap: 10px;

            flex-wrap: wrap;

            margin-bottom: 18px;
        }

        .filter-search {

            flex: 1;

            min-width: 200px;

            position: relative;
        }

        .filter-search i {

            position: absolute;

            left: 13px;

            top: 50%;

            transform: translateY(-50%);

            color: #9aa39d;

            font-size: 11px;
        }

        .filter-search input {

            width: 100%;

            height: 40px;

            border: 1px solid var(--border);

            border-radius: 8px;

            padding: 0 12px 0 34px;

            outline: none;

            font-size: 11px;
        }

        .filter-search input:focus {

            border-color: var(--green);
        }

        .filter-select {

            height: 40px;

            border: 1px solid var(--border);

            border-radius: 8px;

            padding: 0 12px;

            background: white;

            outline: none;

            color: var(--text);

            font-size: 11px;

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

            padding: 12px 9px;

            border-bottom: 1px solid var(--border);

            white-space: nowrap;
        }

        td {

            padding: 14px 9px;

            font-size: 11px;

            border-bottom: 1px solid #f0f2f0;

            vertical-align: middle;
        }

        tbody tr:hover {

            background: #fafcfb;
        }

        /* =====================================
           CUSTOMER
        ===================================== */

        .customer {

            display: flex;

            align-items: center;

            gap: 9px;
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

        .customer strong {

            display: block;

            font-size: 11px;
        }

        .customer span {

            display: block;

            color: var(--muted);

            font-size: 9px;

            margin-top: 2px;
        }

        /* =====================================
           PAYMENT STATUS
        ===================================== */

        .badge {

            display: inline-flex;

            align-items: center;

            gap: 5px;

            padding: 5px 9px;

            border-radius: 20px;

            font-size: 9px;

            font-weight: 600;
        }

        .badge-pending {

            background: var(--yellow-soft);

            color: #a77700;
        }

        .badge-confirmed {

            background: var(--green-soft);

            color: var(--green-dark);
        }

        .badge-failed {

            background: var(--red-soft);

            color: #c94c4c;
        }

        .badge-unpaid {

            background: #f1f3f2;

            color: #68726b;
        }

        /* =====================================
           AMOUNT
        ===================================== */

        .amount {

            font-weight: 700;

            color: var(--text);
        }

        /* =====================================
           PROOF
        ===================================== */

        .proof-link {

            display: inline-flex;

            align-items: center;

            gap: 6px;

            color: var(--green-dark);

            font-size: 10px;

            font-weight: 600;

            padding: 7px 9px;

            background: var(--green-soft);

            border-radius: 7px;

            transition: .2s ease;
        }

        .proof-link:hover {

            background: #dff4e3;
        }

        .no-proof {

            color: var(--muted);

            font-size: 10px;
        }

        /* =====================================
           ACTIONS
        ===================================== */

        .actions {

            display: flex;

            align-items: center;

            gap: 6px;

            flex-wrap: wrap;
        }

        .action-button {

            border: none;

            cursor: pointer;

            border-radius: 7px;

            padding: 7px 10px;

            font-size: 9px;

            font-weight: 600;

            display: inline-flex;

            align-items: center;

            gap: 5px;

            transition: .2s ease;
        }

        .confirm-button {

            background: var(--green-soft);

            color: var(--green-dark);
        }

        .confirm-button:hover {

            background: var(--green);

            color: white;
        }

        .reject-button {

            background: var(--red-soft);

            color: #c94c4c;
        }

        .reject-button:hover {

            background: var(--red);

            color: white;
        }

        .view-button {

            background: var(--blue-soft);

            color: #456dc3;
        }

        .view-button:hover {

            background: var(--blue);

            color: white;
        }

        /* =====================================
           EMPTY
        ===================================== */

        .empty {

            text-align: center;

            padding: 55px 20px;

            color: var(--muted);
        }

        .empty i {

            font-size: 35px;

            color: #cfd6d1;

            margin-bottom: 12px;
        }

        .empty h3 {

            font-size: 14px;

            color: var(--text);

            margin-bottom: 5px;
        }

        .empty p {

            font-size: 10px;
        }

        /* =====================================
           SUCCESS MESSAGE
        ===================================== */

        .alert {

            padding: 13px 15px;

            border-radius: 9px;

            margin-bottom: 20px;

            font-size: 11px;

            display: flex;

            align-items: center;

            gap: 8px;
        }

        .alert-success {

            background: var(--green-soft);

            color: var(--green-dark);

            border: 1px solid #d5eed9;
        }

        /* =====================================
           MOBILE MENU
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

            .topbar .search {

                display: none;
            }

            .content {

                padding: 20px;
            }

        }

        @media(max-width: 600px) {

            .stats {

                grid-template-columns: 1fr;
            }

            .content {

                padding: 15px;
            }

            .admin-info {

                display: none;
            }

            .top-right {

                gap: 10px;
            }

            .welcome h1 {

                font-size: 21px;
            }

            .filters {

                flex-direction: column;
            }

            .filter-search {

                min-width: 100%;
            }

            .filter-select {

                width: 100%;
            }

        }

    </style>

</head>


<body>

<div class="app">


    {{-- =====================================================
         SIDEBAR
    ====================================================== --}}

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

                Dashboard

            </a>


            <a href="{{ route('livestock.index') }}">

                <span class="menu-icon">
                    <i class="fa-solid fa-cow"></i>
                </span>

                Livestock

            </a>


            <a href="{{ route('admin.orders.index') }}">

                <span class="menu-icon">
                    <i class="fa-solid fa-cart-shopping"></i>
                </span>

                Orders

            </a>


            <a href="{{ route('admin.customers.index') }}">

                <span class="menu-icon">
                    <i class="fa-solid fa-users"></i>
                </span>

                Customers

            </a>


            <a
                href="{{ route('admin.payments.index') }}"
                class="active"
            >

                <span class="menu-icon">
                    <i class="fa-solid fa-credit-card"></i>
                </span>

                Payments

            </a>


            <a href="#">

                <span class="menu-icon">
                    <i class="fa-solid fa-star"></i>
                </span>

                Reviews

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

                Reports

            </a>


            <a href="#">

                <span class="menu-icon">
                    <i class="fa-solid fa-chart-pie"></i>
                </span>

                Analytics

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

                    Logout

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


    {{-- =====================================================
         MAIN
    ====================================================== --}}

    <main class="main">


        {{-- TOPBAR --}}

        <header class="topbar">

            <div style="display:flex;align-items:center;gap:12px;">

                <button
                    type="button"
                    class="mobile-menu"
                    id="mobileMenu"
                >

                    <i class="fa-solid fa-bars"></i>

                </button>


                <div class="page-title">

                    <i class="fa-solid fa-credit-card"></i>

                    Payments

                </div>

            </div>


            <div class="top-right">


                <input
                    type="text"
                    class="search"
                    id="topSearch"
                    placeholder="Search payments..."
                >


                <div class="notification">

                    <i class="fa-solid fa-bell"></i>

                    @if($pendingPayments > 0)

                        <span>
                            {{ $pendingPayments }}
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


        {{-- CONTENT --}}

        <section class="content">


            <div class="welcome">

                <h1>
                    Payment Management
                </h1>

                <p>
                    Review customer payments, verify payment proofs and manage payment status.
                </p>

            </div>


            {{-- SUCCESS MESSAGE --}}

            @if(session('success'))

                <div class="alert alert-success">

                    <i class="fa-solid fa-circle-check"></i>

                    {{ session('success') }}

                </div>

            @endif


            {{-- =================================================
                 STATISTICS
            ================================================== --}}

            <div class="stats">


                <div class="stat-card">

                    <div class="stat-top">

                        Pending Verification

                        <div class="stat-icon">

                            <i class="fa-solid fa-clock"></i>

                        </div>

                    </div>


                    <h3>
                        {{ $pendingPayments }}
                    </h3>


                    <p>
                        Payments waiting for review
                    </p>

                </div>


                <div class="stat-card">

                    <div class="stat-top">

                        Confirmed Payments

                        <div class="stat-icon">

                            <i class="fa-solid fa-circle-check"></i>

                        </div>

                    </div>


                    <h3>
                        {{ $confirmedPayments }}
                    </h3>


                    <p>
                        Successfully verified payments
                    </p>

                </div>


                <div class="stat-card">

                    <div class="stat-top">

                        Rejected Payments

                        <div
                            class="stat-icon"
                            style="
                                background:#ffeaea;
                                color:#c94c4c;
                            "
                        >

                            <i class="fa-solid fa-circle-xmark"></i>

                        </div>

                    </div>


                    <h3>
                        {{ $rejectedPayments }}
                    </h3>


                    <p>
                        Payments rejected by admin
                    </p>

                </div>


                <div class="stat-card">

                    <div class="stat-top">

                        Confirmed Revenue

                        <div class="stat-icon">

                            <i class="fa-solid fa-naira-sign"></i>

                        </div>

                    </div>


                    <h3>

                        ₦{{ number_format(
                            $confirmedRevenue,
                            0
                        ) }}

                    </h3>


                    <p>
                        Revenue from confirmed payments
                    </p>

                </div>

            </div>


            {{-- =================================================
                 PAYMENT TABLE
            ================================================== --}}

            <div class="card">


                <div class="card-header">

                    <div>

                        <h2>
                            Payment Transactions
                        </h2>

                        <p>
                            Review submitted payment information and receipts.
                        </p>

                    </div>

                </div>


                {{-- FILTERS --}}

                <div class="filters">


                    <div class="filter-search">

                        <i class="fa-solid fa-magnifying-glass"></i>

                        <input
                            type="text"
                            id="paymentSearch"
                            placeholder="Search customer, order or reference..."
                        >

                    </div>


                    <select
                        class="filter-select"
                        id="statusFilter"
                    >

                        <option value="all">
                            All Payments
                        </option>

                        <option value="pending">
                            Pending
                        </option>

                        <option value="confirmed">
                            Confirmed
                        </option>

                        <option value="failed">
                            Rejected
                        </option>

                    </select>


                </div>


                <div class="table-wrapper">

                    <table id="paymentsTable">

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
                                    Reference
                                </th>

                                <th>
                                    Proof
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


                        @forelse($payments as $payment)

                            <tr
                                data-status="{{ $payment->payment_status ?? 'unpaid' }}"
                            >


                                {{-- ORDER --}}

                                <td>

                                    <strong>
                                        #{{ $payment->id }}
                                    </strong>

                                </td>


                                {{-- CUSTOMER --}}

                                <td>

                                    <div class="customer">

                                        <div class="customer-avatar">

                                            {{ strtoupper(
                                                substr(
                                                    $payment->customer_name,
                                                    0,
                                                    1
                                                )
                                            ) }}

                                        </div>


                                        <div>

                                            <strong>
                                                {{ $payment->customer_name }}
                                            </strong>

                                            <span>
                                                {{ $payment->customer_email }}
                                            </span>

                                        </div>

                                    </div>

                                </td>


                                {{-- LIVESTOCK --}}

                                <td>

                                    {{ $payment->livestock->name ?? 'Livestock' }}

                                </td>


                                {{-- AMOUNT --}}

                                <td>

                                    <span class="amount">

                                        ₦{{ number_format(
                                            $payment->total_price,
                                            0
                                        ) }}

                                    </span>

                                </td>


                                {{-- REFERENCE --}}

                                <td>

                                    @if($payment->payment_reference)

                                        <span
                                            style="
                                                font-size:10px;
                                                font-weight:600;
                                            "
                                        >

                                            {{ $payment->payment_reference }}

                                        </span>

                                    @else

                                        <span class="no-proof">
                                            Not submitted
                                        </span>

                                    @endif

                                </td>


                                {{-- PAYMENT PROOF --}}

                                <td>

                                    @if($payment->payment_proof)

                                        <a
                                            href="{{ asset(
                                                'storage/' .
                                                $payment->payment_proof
                                            ) }}"
                                            target="_blank"
                                            class="proof-link"
                                        >

                                            <i class="fa-solid fa-file-image"></i>

                                            View Proof

                                        </a>

                                    @else

                                        <span class="no-proof">
                                            No proof
                                        </span>

                                    @endif

                                </td>


                                {{-- STATUS --}}

                                <td>

                                    @if($payment->payment_status === 'pending')

                                        <span class="badge badge-pending">

                                            <i class="fa-solid fa-clock"></i>

                                            Pending

                                        </span>

                                    @elseif($payment->payment_status === 'confirmed')

                                        <span class="badge badge-confirmed">

                                            <i class="fa-solid fa-circle-check"></i>

                                            Confirmed

                                        </span>

                                    @elseif($payment->payment_status === 'failed')

                                        <span class="badge badge-failed">

                                            <i class="fa-solid fa-circle-xmark"></i>

                                            Rejected

                                        </span>

                                    @else

                                        <span class="badge badge-unpaid">

                                            <i class="fa-solid fa-minus"></i>

                                            Unpaid

                                        </span>

                                    @endif

                                </td>


                                {{-- DATE --}}

                                <td>

                                    <span style="font-size:10px;">

                                        {{ $payment->created_at->format(
                                            'M d, Y'
                                        ) }}

                                    </span>

                                </td>


                                {{-- ACTIONS --}}

                                <td>

                                    <div class="actions">


                                        {{-- VIEW ORDER --}}

                                        <a
                                            href="{{ route(
                                                'admin.orders.show',
                                                $payment->id
                                            ) }}"
                                            class="action-button view-button"
                                        >

                                            <i class="fa-solid fa-eye"></i>

                                            View

                                        </a>


                                        {{-- CONFIRM --}}

                                        @if(
                                            $payment->payment_status === 'pending'
                                        )

                                            <form
                                                method="POST"
                                                action="{{ route(
                                                    'admin.orders.payment.confirm',
                                                    $payment->id
                                                ) }}"
                                                onsubmit="return confirm('Are you sure you want to confirm this payment?');"
                                            >

                                                @csrf

                                                @method('PATCH')

                                                <button
                                                    type="submit"
                                                    class="action-button confirm-button"
                                                >

                                                    <i class="fa-solid fa-check"></i>

                                                    Confirm

                                                </button>

                                            </form>


                                            {{-- REJECT --}}

                                            <form
                                                method="POST"
                                                action="{{ route(
                                                    'admin.orders.payment.reject',
                                                    $payment->id
                                                ) }}"
                                                onsubmit="return confirm('Are you sure you want to reject this payment?');"
                                            >

                                                @csrf

                                                @method('PATCH')

                                                <button
                                                    type="submit"
                                                    class="action-button reject-button"
                                                >

                                                    <i class="fa-solid fa-xmark"></i>

                                                    Reject

                                                </button>

                                            </form>

                                        @endif


                                    </div>

                                </td>


                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="9"
                                    style="
                                        padding:0;
                                        border:none;
                                    "
                                >

                                    <div class="empty">

                                        <i class="fa-solid fa-credit-card"></i>

                                        <h3>
                                            No payment transactions yet
                                        </h3>

                                        <p>
                                            Customer payment submissions will appear here.
                                        </p>

                                    </div>

                                </td>

                            </tr>

                        @endforelse


                        </tbody>

                    </table>

                </div>

            </div>

        </section>

    </main>

</div>


<script>

    /* =====================================
       MOBILE SIDEBAR
    ===================================== */

    const mobileMenu =
        document.getElementById('mobileMenu');

    const sidebar =
        document.getElementById('sidebar');

    if (mobileMenu) {

        mobileMenu.addEventListener(
            'click',
            function () {

                sidebar.classList.toggle('open');

            }
        );

    }


    /* =====================================
       PAYMENT SEARCH
    ===================================== */

    const searchInput =
        document.getElementById('paymentSearch');

    const topSearch =
        document.getElementById('topSearch');

    const statusFilter =
        document.getElementById('statusFilter');

    const table =
        document.getElementById('paymentsTable');


    function filterPayments() {

        const searchValue =
            searchInput.value
                .toLowerCase()
                .trim();

        const statusValue =
            statusFilter.value;

        const rows =
            table.querySelectorAll(
                'tbody tr[data-status]'
            );


        rows.forEach(function (row) {

            const text =
                row.textContent
                    .toLowerCase();

            const rowStatus =
                row.dataset.status;


            const matchesSearch =
                text.includes(searchValue);


            const matchesStatus =
                statusValue === 'all' ||
                rowStatus === statusValue;


            if (
                matchesSearch &&
                matchesStatus
            ) {

                row.style.display = '';

            } else {

                row.style.display = 'none';

            }

        });

    }


    if (searchInput) {

        searchInput.addEventListener(
            'input',
            filterPayments
        );

    }


    if (statusFilter) {

        statusFilter.addEventListener(
            'change',
            filterPayments
        );

    }


    /* =====================================
       TOP SEARCH
    ===================================== */

    if (topSearch) {

        topSearch.addEventListener(
            'input',
            function () {

                if (searchInput) {

                    searchInput.value =
                        this.value;

                    filterPayments();

                }

            }
        );

    }

</script>


</body>

</html>