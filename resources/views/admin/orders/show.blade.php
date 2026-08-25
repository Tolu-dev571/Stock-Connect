<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Order Details | Stock Connect</title>

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
            max-width: 1200px;
            margin: auto;
        }

        /* =========================
           HEADER
        ========================= */

        .page-header {
            margin-bottom: 25px;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            color: var(--muted);

            font-size: 12px;

            margin-bottom: 15px;

            transition: .2s ease;
        }

        .back-button:hover {
            color: var(--green-dark);
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            gap: 20px;
        }

        .header-left h1 {
            font-size: 27px;
            font-weight: 750;
            margin-bottom: 6px;
        }

        .header-left p {
            color: var(--muted);
            font-size: 12px;
        }

        .order-number {
            color: var(--green-dark);
            font-weight: 700;
        }

        /* =========================
           STATUS BADGES
        ========================= */

        .status {
            display: inline-flex;
            align-items: center;
            gap: 7px;

            padding: 8px 12px;

            border-radius: 20px;

            font-size: 11px;
            font-weight: 600;
        }

        .status-dot {
            width: 7px;
            height: 7px;
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
           GRID
        ========================= */

        .content-grid {
            display: grid;
            grid-template-columns: 1.6fr 1fr;
            gap: 20px;
        }

        /* =========================
           CARD
        ========================= */

        .card {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 14px;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .card:last-child {
            margin-bottom: 0;
        }

        .card-header {
            padding: 18px 20px;
            border-bottom: 1px solid var(--border);
        }

        .card-header h2 {
            font-size: 15px;
            margin-bottom: 4px;
        }

        .card-header p {
            color: var(--muted);
            font-size: 10px;
        }

        .card-body {
            padding: 20px;
        }

        /* =========================
           LIVESTOCK
        ========================= */

        .livestock-box {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .livestock-image,
        .livestock-placeholder {
            width: 75px;
            height: 75px;
            border-radius: 10px;
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

            font-size: 25px;
        }

        .livestock-info h3 {
            font-size: 15px;
            margin-bottom: 5px;
        }

        .livestock-info p {
            color: var(--muted);
            font-size: 11px;
            margin-bottom: 3px;
        }

        /* =========================
           INFO ROWS
        ========================= */

        .info-list {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            gap: 20px;

            padding-bottom: 13px;

            border-bottom: 1px solid #f0f2f0;
        }

        .info-row:last-child {
            padding-bottom: 0;
            border-bottom: none;
        }

        .info-label {
            color: var(--muted);
            font-size: 11px;
        }

        .info-value {
            text-align: right;
            font-size: 12px;
            font-weight: 600;
        }

        /* =========================
           CUSTOMER
        ========================= */

        .customer-box {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
        }

        .customer-avatar {
            width: 45px;
            height: 45px;

            border-radius: 50%;

            background: var(--green-soft);
            color: var(--green-dark);

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 14px;
            font-weight: 700;
        }

        .customer-info strong {
            display: block;
            font-size: 13px;
            margin-bottom: 4px;
        }

        .customer-info span {
            display: block;
            color: var(--muted);
            font-size: 10px;
        }

        /* =========================
           TOTAL
        ========================= */

        .total-box {
            background: var(--green-soft);
            border-radius: 10px;
            padding: 16px;

            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .total-box span {
            color: var(--green-dark);
            font-size: 11px;
        }

        .total-box strong {
            color: var(--green-dark);
            font-size: 20px;
        }

        /* =========================
           PAYMENT
        ========================= */

        .payment-status {
            display: inline-flex;
            align-items: center;
            gap: 6px;

            padding: 7px 10px;

            border-radius: 20px;

            font-size: 10px;
            font-weight: 600;
        }

        .payment-unpaid {
            background: #f3f4f3;
            color: #68706a;
        }

        .payment-pending {
            background: var(--yellow-soft);
            color: var(--yellow);
        }

        .payment-confirmed {
            background: var(--green-soft);
            color: var(--green-dark);
        }

        .payment-failed {
            background: var(--red-soft);
            color: var(--red);
        }

        /* =========================
           DELIVERY
        ========================= */

        .address-box {
            background: #fafcfb;
            border: 1px solid var(--border);
            border-radius: 9px;

            padding: 14px;

            font-size: 12px;
            line-height: 1.6;
        }

        /* =========================
           ADMIN ACTION
        ========================= */

        .action-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .action-group label {
            font-size: 11px;
            color: var(--muted);
        }

        .status-select {
            width: 100%;
            height: 42px;

            border: 1px solid var(--border);
            border-radius: 8px;

            padding: 0 12px;

            background: white;

            outline: none;

            font-size: 12px;
        }

        .status-select:focus {
            border-color: var(--green);
        }

        .update-button {
            height: 42px;

            border: none;
            border-radius: 8px;

            background: var(--green);
            color: white;

            font-size: 12px;
            font-weight: 600;

            cursor: pointer;

            transition: .2s ease;
        }

        .update-button:hover {
            background: var(--green-dark);
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media(max-width: 850px) {

            .page {
                padding: 20px;
            }

            .content-grid {
                grid-template-columns: 1fr;
            }

            .header-content {
                align-items: flex-start;
                flex-direction: column;
            }

        }

        @media(max-width: 600px) {

            .page {
                padding: 14px;
            }

            .header-left h1 {
                font-size: 23px;
            }

            .livestock-box {
                align-items: flex-start;
                flex-direction: column;
            }

            .info-row {
                flex-direction: column;
                gap: 5px;
            }

            .info-value {
                text-align: left;
            }

        }

    </style>

</head>


<body>

<div class="page">

    <div class="container">

        {{-- HEADER --}}

        <div class="page-header">

            <a
                href="{{ route('admin.orders.index') }}"
                class="back-button"
            >

                <i class="fa-solid fa-arrow-left"></i>

                Back to Orders

            </a>


            <div class="header-content">

                <div class="header-left">

                    <h1>
                        Order Details
                    </h1>

                    <p>

                        Order
                        <span class="order-number">
                            #{{ $order->id }}
                        </span>

                        ·

                        {{ $order->created_at
                            ? $order->created_at->format('M d, Y · h:i A')
                            : 'N/A'
                        }}

                    </p>

                </div>


                @php
                    $orderStatus = $order->status ?? 'pending';
                @endphp


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

            </div>

        </div>


        <div class="content-grid">


            {{-- =========================
                 LEFT COLUMN
            ========================= --}}

            <div>


                {{-- LIVESTOCK --}}

                <div class="card">

                    <div class="card-header">

                        <h2>
                            Livestock Ordered
                        </h2>

                        <p>
                            Information about the livestock in this order.
                        </p>

                    </div>


                    <div class="card-body">

                        <div class="livestock-box">


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


                            <div class="livestock-info">

                                <h3>
                                    {{ $order->livestock->name ?? 'Livestock' }}
                                </h3>

                                <p>
                                    Category:
                                    {{ $order->livestock->category ?? 'N/A' }}
                                </p>

                                <p>
                                    Quantity ordered:
                                    {{ $order->quantity }}
                                </p>

                                @if($order->livestock)

                                    <p>
                                        Price per unit:
                                        ₦{{ number_format($order->livestock->price, 2) }}
                                    </p>

                                @endif

                            </div>

                        </div>

                    </div>

                </div>


                {{-- CUSTOMER --}}

                <div class="card">

                    <div class="card-header">

                        <h2>
                            Customer Information
                        </h2>

                        <p>
                            Contact information provided by the customer.
                        </p>

                    </div>


                    <div class="card-body">


                        <div class="customer-box">

                            <div class="customer-avatar">

                                {{ strtoupper(
                                    substr(
                                        $order->customer_name,
                                        0,
                                        1
                                    )
                                ) }}

                            </div>


                            <div class="customer-info">

                                <strong>
                                    {{ $order->customer_name }}
                                </strong>

                                <span>
                                    {{ $order->customer_email }}
                                </span>

                            </div>

                        </div>


                        <div class="info-list">

                            <div class="info-row">

                                <span class="info-label">
                                    Phone Number
                                </span>

                                <span class="info-value">
                                    {{ $order->customer_phone }}
                                </span>

                            </div>


                            <div class="info-row">

                                <span class="info-label">
                                    Email Address
                                </span>

                                <span class="info-value">
                                    {{ $order->customer_email }}
                                </span>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- DELIVERY --}}

                <div class="card">

                    <div class="card-header">

                        <h2>
                            Delivery Information
                        </h2>

                        <p>
                            Address provided for livestock delivery.
                        </p>

                    </div>


                    <div class="card-body">

                        <div class="address-box">

                            <i class="fa-solid fa-location-dot"></i>

                            {{ $order->delivery_address }}

                        </div>

                    </div>

                </div>


                {{-- PAYMENT --}}

<div class="card">

    <div class="card-header">

        <h2>
            Payment Information
        </h2>

        <p>
            Payment details and verification for this order.
        </p>

    </div>


    <div class="card-body">

        @php

            $paymentStatus =
                $order->payment_status ?? 'unpaid';

        @endphp


        <div class="info-list">


            {{-- PAYMENT STATUS --}}

            <div class="info-row">

                <span class="info-label">
                    Payment Status
                </span>

                <span class="info-value">

                    @if($paymentStatus === 'confirmed')

                        <span class="payment-status payment-confirmed">

                            <i class="fa-solid fa-circle-check"></i>

                            Confirmed

                        </span>

                    @elseif($paymentStatus === 'pending')

                        <span class="payment-status payment-pending">

                            <i class="fa-solid fa-clock"></i>

                            Pending Verification

                        </span>

                    @elseif($paymentStatus === 'failed')

                        <span class="payment-status payment-failed">

                            <i class="fa-solid fa-circle-xmark"></i>

                            Failed

                        </span>

                    @else

                        <span class="payment-status payment-unpaid">

                            <i class="fa-solid fa-minus-circle"></i>

                            Unpaid

                        </span>

                    @endif

                </span>

            </div>


            {{-- PAYMENT REFERENCE --}}

            <div class="info-row">

                <span class="info-label">
                    Payment Reference
                </span>

                <span class="info-value">

                    {{ $order->payment_reference ?? 'Not available' }}

                </span>

            </div>


            {{-- PAYMENT PROOF --}}

            <div class="info-row">

                <span class="info-label">
                    Payment Proof
                </span>

                <span class="info-value">

                    @if($order->payment_proof)

                        <a
                            href="{{ asset('storage/' . $order->payment_proof) }}"
                            target="_blank"
                            style="
                                color: var(--green-dark);
                                font-weight: 600;
                            "
                        >

                            <i class="fa-solid fa-file-arrow-up"></i>

                            View Payment Proof

                        </a>

                    @else

                        <span style="color: var(--muted);">
                            Not submitted
                        </span>

                    @endif

                </span>

            </div>


        </div>


        {{-- PAYMENT ACTIONS --}}

        @if($paymentStatus === 'pending')

            <div
                style="
                    margin-top: 20px;
                    padding-top: 20px;
                    border-top: 1px solid var(--border);
                "
            >

                <p
                    style="
                        font-size: 11px;
                        color: var(--muted);
                        margin-bottom: 12px;
                    "
                >
                    Review the customer's payment proof before
                    approving or rejecting the payment.
                </p>


                <div
                    style="
                        display: flex;
                        gap: 10px;
                    "
                >


                    {{-- CONFRIM PAYMENT --}}

                    <form
                        method="POST"
                        action="{{ route('admin.orders.payment.confirm', $order->id) }}"
                        style="flex: 1;"
                    >

                        @csrf
                        @method('PATCH')

                        <button
                            type="submit"
                            style="
                                width: 100%;
                                border: none;
                                border-radius: 8px;
                                padding: 11px;
                                background: var(--green);
                                color: white;
                                font-size: 11px;
                                font-weight: 600;
                                cursor: pointer;
                            "
                        >

                            <i class="fa-solid fa-circle-check"></i>

                            Approve Payment

                        </button>

                    </form>


                    {{-- REJECT PAYMENT --}}

                    <form
                        method="POST"
                        action="{{ route('admin.orders.payment.reject', $order->id) }}"
                        style="flex: 1;"
                    >

                        @csrf
                        @method('PATCH')

                        <button
                            type="submit"
                            style="
                                width: 100%;
                                border: none;
                                border-radius: 8px;
                                padding: 11px;
                                background: var(--red);
                                color: white;
                                font-size: 11px;
                                font-weight: 600;
                                cursor: pointer;
                            "
                        >

                            <i class="fa-solid fa-circle-xmark"></i>

                            Reject Payment

                        </button>

                    </form>


                </div>

            </div>

        @endif


    </div>

</div>



            {{-- =========================
                 RIGHT COLUMN
            ========================= --}}

            <div>


                {{-- ORDER SUMMARY --}}

                <div class="card">

                    <div class="card-header">

                        <h2>
                            Order Summary
                        </h2>

                        <p>
                            Financial summary of this order.
                        </p>

                    </div>


                    <div class="card-body">

                        <div class="info-list">

                            <div class="info-row">

                                <span class="info-label">
                                    Order ID
                                </span>

                                <span class="info-value">
                                    #{{ $order->id }}
                                </span>

                            </div>


                            <div class="info-row">

                                <span class="info-label">
                                    Quantity
                                </span>

                                <span class="info-value">
                                    {{ $order->quantity }}
                                </span>

                            </div>


                            @if($order->livestock)

                                <div class="info-row">

                                    <span class="info-label">
                                        Price Per Unit
                                    </span>

                                    <span class="info-value">

                                        ₦{{ number_format(
                                            $order->livestock->price,
                                            2
                                        ) }}

                                    </span>

                                </div>

                            @endif

                        </div>


                        <br>


                        <div class="total-box">

                            <span>
                                Total Amount
                            </span>

                            <strong>

                                ₦{{ number_format(
                                    $order->total_price,
                                    2
                                ) }}

                            </strong>

                        </div>

                    </div>

                </div>


                {{-- ADMIN ORDER ACTION --}}

                <div class="card">

                    <div class="card-header">

                        <h2>
                            Manage Order
                        </h2>

                        <p>
                            Update the current order status.
                        </p>

                    </div>


                    <div class="card-body">

                        <form
                            action="{{ route(
                                'admin.orders.status',
                                $order->id
                            ) }}"
                            method="POST"
                        >

                            @csrf
                            @method('PATCH')


                            <div class="action-group">

                                <label for="status">
                                    Order Status
                                </label>


                                <select
                                    name="status"
                                    id="status"
                                    class="status-select"
                                >

                                    <option
                                        value="pending"
                                        {{ $orderStatus === 'pending' ? 'selected' : '' }}
                                    >
                                        Pending
                                    </option>

                                    <option
                                        value="confirmed"
                                        {{ $orderStatus === 'confirmed' ? 'selected' : '' }}
                                    >
                                        Confirmed
                                    </option>

                                    <option
                                        value="processing"
                                        {{ $orderStatus === 'processing' ? 'selected' : '' }}
                                    >
                                        Processing
                                    </option>

                                    <option
                                        value="completed"
                                        {{ $orderStatus === 'completed' ? 'selected' : '' }}
                                    >
                                        Completed
                                    </option>

                                    <option
                                        value="cancelled"
                                        {{ $orderStatus === 'cancelled' ? 'selected' : '' }}
                                    >
                                        Cancelled
                                    </option>

                                </select>


                                <button
                                    type="submit"
                                    class="update-button"
                                >

                                    <i class="fa-solid fa-floppy-disk"></i>

                                    Update Order Status

                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</body>

</html>