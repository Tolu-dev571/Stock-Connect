<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Order Management | Stock Connect</title>

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
            --green-dark: #269c38;
            --green-soft: #eaf9ed;

            --text: #17201a;
            --muted: #7c867f;

            --border: #e8ece9;
            --background: #f7f9f7;
            --white: #ffffff;

            --yellow: #c58b16;
            --yellow-soft: #fff6df;

            --blue: #4e78d8;
            --blue-soft: #edf3ff;

            --purple: #7655b8;
            --purple-soft: #f1edff;

            --red: #dc5555;
            --red-soft: #ffeded;
        }

        body {
            font-family: 'Poppins', Arial, sans-serif;
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

        /* =========================
           PAGE
        ========================= */

        .page {
            min-height: 100vh;
            padding: 32px;
        }

        .container {
            max-width: 1450px;
            margin: auto;
        }

        /* =========================
           HEADER
        ========================= */

        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 28px;
        }

        .header-left h1 {
            font-size: 27px;
            font-weight: 750;
            margin-bottom: 6px;
        }

        .header-left p {
            font-size: 13px;
            color: var(--muted);
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--muted);
            font-size: 12px;
            margin-bottom: 10px;
        }

        .back-button:hover {
            color: var(--green-dark);
        }

        /* =========================
           SUMMARY
        ========================= */

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 15px;
            margin-bottom: 22px;
        }

        .summary-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 13px;
            padding: 18px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .summary-info span {
            display: block;
            color: var(--muted);
            font-size: 11px;
            margin-bottom: 7px;
        }

        .summary-info strong {
            font-size: 23px;
            font-weight: 750;
        }

        .summary-icon {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--green-soft);
            color: var(--green-dark);
        }

        .summary-card.pending .summary-icon {
            background: var(--yellow-soft);
            color: var(--yellow);
        }

        .summary-card.processing .summary-icon {
            background: var(--purple-soft);
            color: var(--purple);
        }

        .summary-card.completed .summary-icon {
            background: var(--green-soft);
            color: var(--green-dark);
        }

        .summary-card.cancelled .summary-icon {
            background: var(--red-soft);
            color: var(--red);
        }

        /* =========================
           SUCCESS
        ========================= */

        .success-message {
            margin-bottom: 20px;
            padding: 12px 15px;
            background: var(--green-soft);
            border: 1px solid #ccebd2;
            border-radius: 9px;
            color: var(--green-dark);
            font-size: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* =========================
           MAIN CARD
        ========================= */

        .orders-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            overflow: hidden;
        }

        .orders-header {
            padding: 20px;
            border-bottom: 1px solid var(--border);

            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
        }

        .orders-title h2 {
            font-size: 16px;
            margin-bottom: 4px;
        }

        .orders-title p {
            color: var(--muted);
            font-size: 11px;
        }

        .orders-count {
            font-size: 11px;
            color: var(--muted);
        }

        /* =========================
           FILTERS
        ========================= */

        .filters {
            padding: 17px 20px;
            border-bottom: 1px solid var(--border);

            display: flex;
            align-items: center;
            gap: 10px;
        }

        .search-box {
            position: relative;
            flex: 1;
            max-width: 350px;
        }

        .search-box i {
            position: absolute;
            left: 13px;
            top: 50%;
            transform: translateY(-50%);
            color: #929a94;
            font-size: 12px;
        }

        .search-box input {
            width: 100%;
            height: 39px;

            border: 1px solid var(--border);
            border-radius: 8px;

            padding: 0 13px 0 35px;

            outline: none;
            background: #fbfcfb;

            font-size: 12px;
        }

        .search-box input:focus {
            border-color: var(--green);
        }

        .filter-select {
            height: 39px;
            min-width: 155px;

            border: 1px solid var(--border);
            border-radius: 8px;

            padding: 0 12px;

            background: white;
            color: #444b46;

            outline: none;

            font-size: 12px;
        }

        .filter-select:focus {
            border-color: var(--green);
        }

        /* =========================
           TABLE
        ========================= */

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1050px;
        }

        th {
            text-align: left;

            padding: 13px 18px;

            background: #fafcfb;

            border-bottom: 1px solid var(--border);

            color: var(--muted);

            font-size: 10px;

            text-transform: uppercase;

            letter-spacing: .5px;

            font-weight: 600;
        }

        td {
            padding: 15px 18px;

            border-bottom: 1px solid #f0f2f0;

            font-size: 12px;

            vertical-align: middle;
        }

        tbody tr {
            transition: .15s ease;
        }

        tbody tr:hover {
            background: #fbfdfb;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        /* =========================
           ORDER ID
        ========================= */

        .order-id {
            font-weight: 700;
            color: var(--text);
        }

        .order-date {
            display: block;
            margin-top: 4px;
            color: var(--muted);
            font-size: 10px;
        }

        /* =========================
           CUSTOMER
        ========================= */

        .customer-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .customer-avatar {
            width: 35px;
            height: 35px;

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
            font-size: 12px;
            margin-bottom: 3px;
        }

        .customer-details span {
            display: block;
            color: var(--muted);
            font-size: 10px;
        }

        /* =========================
           LIVESTOCK
        ========================= */

        .livestock-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .livestock-image,
        .livestock-placeholder {
            width: 40px;
            height: 40px;

            border-radius: 8px;

            flex-shrink: 0;
        }

        .livestock-image {
            object-fit: cover;
        }

        .livestock-placeholder {
            background: var(--green-soft);
            color: var(--green-dark);

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .livestock-details strong {
            display: block;
            font-size: 11px;
            margin-bottom: 3px;
        }

        .livestock-details span {
            color: var(--muted);
            font-size: 10px;
        }

        /* =========================
           AMOUNT
        ========================= */

        .amount {
            font-weight: 700;
            white-space: nowrap;
        }

        .quantity {
            color: var(--muted);
            font-size: 10px;
            margin-top: 3px;
        }

        /* =========================
           STATUS
        ========================= */

        .status {
            display: inline-flex;
            align-items: center;
            gap: 6px;

            padding: 6px 9px;

            border-radius: 20px;

            font-size: 10px;
            font-weight: 600;

            white-space: nowrap;
        }

        .status-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
        }

        .status.pending {
            background: var(--yellow-soft);
            color: var(--yellow);
        }

        .status.pending .status-dot {
            background: var(--yellow);
        }

        .status.confirmed {
            background: var(--blue-soft);
            color: var(--blue);
        }

        .status.confirmed .status-dot {
            background: var(--blue);
        }

        .status.processing {
            background: var(--purple-soft);
            color: var(--purple);
        }

        .status.processing .status-dot {
            background: var(--purple);
        }

        .status.completed {
            background: var(--green-soft);
            color: var(--green-dark);
        }

        .status.completed .status-dot {
            background: var(--green);
        }

        .status.cancelled {
            background: var(--red-soft);
            color: var(--red);
        }

        .status.cancelled .status-dot {
            background: var(--red);
        }

        /* =========================
           PAYMENT
        ========================= */

        .payment {
            display: inline-flex;
            align-items: center;
            gap: 6px;

            padding: 6px 9px;

            border-radius: 20px;

            font-size: 10px;
            font-weight: 600;

            white-space: nowrap;
        }

        .payment.unpaid {
            background: #f3f4f3;
            color: #68706a;
        }

        .payment.pending {
            background: var(--yellow-soft);
            color: var(--yellow);
        }

        .payment.confirmed {
            background: var(--green-soft);
            color: var(--green-dark);
        }

        .payment.failed {
            background: var(--red-soft);
            color: var(--red);
        }

        /* =========================
           ACTION
        ========================= */

        .view-button {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            gap: 7px;

            padding: 8px 11px;

            border: 1px solid var(--border);

            border-radius: 7px;

            background: white;

            color: var(--green-dark);

            font-size: 10px;
            font-weight: 600;

            transition: .2s ease;
        }

        .view-button:hover {
            background: var(--green-soft);
            border-color: #c9e8cf;
        }

        /* =========================
           EMPTY
        ========================= */

        .empty-state {
            text-align: center;
            padding: 60px 20px;
        }

        .empty-icon {
            width: 60px;
            height: 60px;

            margin: 0 auto 15px;

            border-radius: 50%;

            background: var(--green-soft);

            color: var(--green-dark);

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 22px;
        }

        .empty-state h3 {
            font-size: 16px;
            margin-bottom: 6px;
        }

        .empty-state p {
            color: var(--muted);
            font-size: 12px;
        }

        /* =========================
           NO FILTER RESULTS
        ========================= */

        #noResults {
            display: none;
            text-align: center;
            padding: 45px 20px;
        }

        #noResults i {
            font-size: 25px;
            color: var(--muted);
            margin-bottom: 10px;
        }

        #noResults h3 {
            font-size: 15px;
            margin-bottom: 5px;
        }

        #noResults p {
            color: var(--muted);
            font-size: 11px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media(max-width: 1100px) {

            .summary-grid {
                grid-template-columns: repeat(3, 1fr);
            }

        }

        @media(max-width: 850px) {

            .page {
                padding: 20px;
            }

            .summary-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .page-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .filters {
                flex-wrap: wrap;
            }

            .search-box {
                max-width: none;
                width: 100%;
            }

            .filter-select {
                flex: 1;
            }

        }

        @media(max-width: 600px) {

            .page {
                padding: 14px;
            }

            .header-left h1 {
                font-size: 23px;
            }

            .summary-grid {
                grid-template-columns: 1fr;
            }

            .orders-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .filter-select {
                width: 100%;
            }

        }

    </style>

</head>

<body>

<div class="page">

    <div class="container">

        {{-- SUCCESS MESSAGE --}}

        @if(session('success'))

            <div class="success-message">

                <i class="fa-solid fa-circle-check"></i>

                {{ session('success') }}

            </div>

        @endif


        {{-- PAGE HEADER --}}

        <div class="page-header">

            <div class="header-left">

                <a
                    href="{{ route('admin.dashboard') }}"
                    class="back-button"
                >
                    <i class="fa-solid fa-arrow-left"></i>
                    Back to Dashboard
                </a>

                <h1>
                    Order Management
                </h1>

                <p>
                    Manage customer orders, payments and order progress.
                </p>

            </div>

        </div>


        {{-- =========================
             SUMMARY CARDS
        ========================= --}}

        <div class="summary-grid">


            {{-- TOTAL --}}

            <div class="summary-card">

                <div class="summary-info">

                    <span>
                        Total Orders
                    </span>

                    <strong>
                        {{ $orders->count() }}
                    </strong>

                </div>

                <div class="summary-icon">

                    <i class="fa-solid fa-cart-shopping"></i>

                </div>

            </div>


            {{-- PENDING --}}

            <div class="summary-card pending">

                <div class="summary-info">

                    <span>
                        Pending
                    </span>

                    <strong>
                        {{ $orders->where('status', 'pending')->count() }}
                    </strong>

                </div>

                <div class="summary-icon">

                    <i class="fa-solid fa-clock"></i>

                </div>

            </div>


            {{-- PROCESSING --}}

            <div class="summary-card processing">

                <div class="summary-info">

                    <span>
                        Processing
                    </span>

                    <strong>
                        {{ $orders->where('status', 'processing')->count() }}
                    </strong>

                </div>

                <div class="summary-icon">

                    <i class="fa-solid fa-box"></i>

                </div>

            </div>


            {{-- COMPLETED --}}

            <div class="summary-card completed">

                <div class="summary-info">

                    <span>
                        Completed
                    </span>

                    <strong>
                        {{ $orders->where('status', 'completed')->count() }}
                    </strong>

                </div>

                <div class="summary-icon">

                    <i class="fa-solid fa-circle-check"></i>

                </div>

            </div>


            {{-- CANCELLED --}}

            <div class="summary-card cancelled">

                <div class="summary-info">

                    <span>
                        Cancelled
                    </span>

                    <strong>
                        {{ $orders->where('status', 'cancelled')->count() }}
                    </strong>

                </div>

                <div class="summary-icon">

                    <i class="fa-solid fa-circle-xmark"></i>

                </div>

            </div>

        </div>


        {{-- =========================
             ORDERS TABLE
        ========================= --}}

        <div class="orders-card">


            <div class="orders-header">

                <div class="orders-title">

                    <h2>
                        Customer Orders
                    </h2>

                    <p>
                        Review and manage orders placed through Stock Connect.
                    </p>

                </div>

                <div class="orders-count">

                    Showing
                    <strong id="visibleCount">
                        {{ $orders->count() }}
                    </strong>
                    orders

                </div>

            </div>


            {{-- FILTERS --}}

            <div class="filters">


                <div class="search-box">

                    <i class="fa-solid fa-magnifying-glass"></i>

                    <input
                        type="text"
                        id="orderSearch"
                        placeholder="Search order, customer or livestock..."
                    >

                </div>


                <select
                    id="statusFilter"
                    class="filter-select"
                >

                    <option value="">
                        All Order Status
                    </option>

                    <option value="pending">
                        Pending
                    </option>

                    <option value="confirmed">
                        Confirmed
                    </option>

                    <option value="processing">
                        Processing
                    </option>

                    <option value="completed">
                        Completed
                    </option>

                    <option value="cancelled">
                        Cancelled
                    </option>

                </select>


                <select
                    id="paymentFilter"
                    class="filter-select"
                >

                    <option value="">
                        All Payment Status
                    </option>

                    <option value="unpaid">
                        Unpaid
                    </option>

                    <option value="pending">
                        Pending
                    </option>

                    <option value="confirmed">
                        Confirmed
                    </option>

                    <option value="failed">
                        Failed
                    </option>

                </select>

            </div>


            {{-- TABLE --}}

            <div class="table-wrapper">

                <table>

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
                                Payment
                            </th>

                            <th>
                                Status
                            </th>

                            <th>
                                Action
                            </th>

                        </tr>

                    </thead>


                    <tbody id="ordersTable">


                    @forelse($orders as $order)

                        @php

                            $paymentStatus =
                                $order->payment_status ?? 'unpaid';

                            $orderStatus =
                                $order->status ?? 'pending';

                        @endphp


                        <tr
                            class="order-row"

                            data-search="
                                {{ strtolower(
                                    $order->id . ' ' .
                                    $order->customer_name . ' ' .
                                    ($order->livestock->name ?? '')
                                ) }}
                            "

                            data-status="{{ strtolower($orderStatus) }}"

                            data-payment="{{ strtolower($paymentStatus) }}"
                        >


                            {{-- ORDER --}}

                            <td>

                                <span class="order-id">
                                    #{{ $order->id }}
                                </span>

                                <span class="order-date">

                                    {{ $order->created_at
                                        ? $order->created_at->format('M d, Y')
                                        : 'N/A'
                                    }}

                                </span>

                            </td>


                            {{-- CUSTOMER --}}

                            <td>

                                <div class="customer-info">

                                    <div class="customer-avatar">

                                        {{ strtoupper(
                                            substr(
                                                $order->customer_name,
                                                0,
                                                1
                                            )
                                        ) }}

                                    </div>


                                    <div class="customer-details">

                                        <strong>
                                            {{ $order->customer_name }}
                                        </strong>

                                        <span>
                                            {{ $order->customer_email }}
                                        </span>

                                    </div>

                                </div>

                            </td>


                            {{-- LIVESTOCK --}}

                            <td>

                                <div class="livestock-info">


                                    @if($order->livestock && $order->livestock->image)

                                        <img
                                            src="{{ asset($order->livestock->image) }}"
                                            alt="{{ $order->livestock->name }}"
                                            class="livestock-image"
                                        >

                                    @else

                                        <div class="livestock-placeholder">

                                            <i class="fa-solid fa-cow"></i>

                                        </div>

                                    @endif


                                    <div class="livestock-details">

                                        <strong>

                                            {{ $order->livestock->name
                                                ?? 'Livestock'
                                            }}

                                        </strong>

                                        <span>

                                            {{ $order->livestock->category
                                                ?? 'N/A'
                                            }}

                                            ·

                                            Qty {{ $order->quantity }}

                                        </span>

                                    </div>

                                </div>

                            </td>


                            {{-- AMOUNT --}}

                            <td>

                                <div class="amount">

                                    ₦{{ number_format(
                                        $order->total_price,
                                        0
                                    ) }}

                                </div>

                                <div class="quantity">

                                    {{ $order->quantity }}
                                    item{{ $order->quantity == 1 ? '' : 's' }}

                                </div>

                            </td>


                            {{-- PAYMENT --}}

                            <td>

                                @if($paymentStatus === 'confirmed')

                                    <span class="payment confirmed">

                                        <i class="fa-solid fa-circle-check"></i>

                                        Confirmed

                                    </span>

                                @elseif($paymentStatus === 'pending')

                                    <span class="payment pending">

                                        <i class="fa-solid fa-clock"></i>

                                        Pending

                                    </span>

                                @elseif($paymentStatus === 'failed')

                                    <span class="payment failed">

                                        <i class="fa-solid fa-circle-xmark"></i>

                                        Failed

                                    </span>

                                @else

                                    <span class="payment unpaid">

                                        <i class="fa-solid fa-minus-circle"></i>

                                        Unpaid

                                    </span>

                                @endif

                            </td>


                            {{-- STATUS --}}

                            <td>

                                @if($orderStatus === 'confirmed')

                                    <span class="status confirmed">

                                        <span class="status-dot"></span>

                                        Confirmed

                                    </span>

                                @elseif($orderStatus === 'processing')

                                    <span class="status processing">

                                        <span class="status-dot"></span>

                                        Processing

                                    </span>

                                @elseif($orderStatus === 'completed')

                                    <span class="status completed">

                                        <span class="status-dot"></span>

                                        Completed

                                    </span>

                                @elseif($orderStatus === 'cancelled')

                                    <span class="status cancelled">

                                        <span class="status-dot"></span>

                                        Cancelled

                                    </span>

                                @else

                                    <span class="status pending">

                                        <span class="status-dot"></span>

                                        Pending

                                    </span>

                                @endif

                            </td>


                            {{-- ACTION --}}

                            <td>

                                <a
                                    href="{{ route(
                                        'admin.orders.show',
                                        $order->id
                                    ) }}"
                                    class="view-button"
                                >

                                    <i class="fa-solid fa-eye"></i>

                                    View

                                </a>

                            </td>


                        </tr>

                    @empty

                        <tr>

                            <td colspan="7">

                                <div class="empty-state">

                                    <div class="empty-icon">

                                        <i class="fa-solid fa-cart-shopping"></i>

                                    </div>

                                    <h3>
                                        No orders yet
                                    </h3>

                                    <p>
                                        Customer orders will appear here once they are placed.
                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endforelse


                    </tbody>

                </table>


                {{-- NO FILTER RESULTS --}}

                <div id="noResults">

                    <i class="fa-solid fa-magnifying-glass"></i>

                    <h3>
                        No matching orders
                    </h3>

                    <p>
                        Try changing your search or filters.
                    </p>

                </div>


            </div>

        </div>

    </div>

</div>


<script>

    /*
    |--------------------------------------------------------------------------
    | ORDER SEARCH + FILTER
    |--------------------------------------------------------------------------
    */

    const searchInput =
        document.getElementById('orderSearch');

    const statusFilter =
        document.getElementById('statusFilter');

    const paymentFilter =
        document.getElementById('paymentFilter');

    const orderRows =
        document.querySelectorAll('.order-row');

    const visibleCount =
        document.getElementById('visibleCount');

    const noResults =
        document.getElementById('noResults');


    function filterOrders() {

        const searchValue =
            searchInput.value
                .toLowerCase()
                .trim();

        const statusValue =
            statusFilter.value
                .toLowerCase();

        const paymentValue =
            paymentFilter.value
                .toLowerCase();


        let visible = 0;


        orderRows.forEach(row => {

            const searchData =
                row.dataset.search
                    .toLowerCase();

            const status =
                row.dataset.status;

            const payment =
                row.dataset.payment;


            const matchesSearch =
                searchData.includes(searchValue);

            const matchesStatus =
                statusValue === '' ||
                status === statusValue;

            const matchesPayment =
                paymentValue === '' ||
                payment === paymentValue;


            if (
                matchesSearch &&
                matchesStatus &&
                matchesPayment
            ) {

                row.style.display = '';

                visible++;

            } else {

                row.style.display = 'none';

            }

        });


        visibleCount.textContent =
            visible;


        if (
            visible === 0 &&
            orderRows.length > 0
        ) {

            noResults.style.display =
                'block';

        } else {

            noResults.style.display =
                'none';

        }

    }


    searchInput.addEventListener(
        'input',
        filterOrders
    );


    statusFilter.addEventListener(
        'change',
        filterOrders
    );


    paymentFilter.addEventListener(
        'change',
        filterOrders
    );

</script>

</body>

</html>