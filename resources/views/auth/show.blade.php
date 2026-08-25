<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Order #{{ $order->id }} | Stock Connect</title>

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
            font-family: Arial, sans-serif;
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

        .page {
            min-height: 100vh;
            padding: 32px;
        }

        .container {
            max-width: 1200px;
            margin: auto;
        }

        /* HEADER */

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--muted);
            font-size: 12px;
            margin-bottom: 18px;
        }

        .back-button:hover {
            color: var(--green-dark);
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
            margin-bottom: 25px;
        }

        .page-header h1 {
            font-size: 27px;
            margin-bottom: 6px;
        }

        .page-header p {
            color: var(--muted);
            font-size: 13px;
        }

        /* SUCCESS */

        .success-message {
            margin-bottom: 20px;
            padding: 13px 15px;
            background: var(--green-soft);
            border: 1px solid #ccebd2;
            border-radius: 9px;
            color: var(--green-dark);
            font-size: 12px;
        }

        /* GRID */

        .details-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 22px;
        }

        .card.full {
            grid-column: 1 / -1;
        }

        .card-title {
            display: flex;
            align-items: center;
            gap: 9px;
            font-size: 15px;
            margin-bottom: 18px;
        }

        .card-title i {
            color: var(--green-dark);
        }

        /* INFO */

        .info-row {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            padding: 11px 0;
            border-bottom: 1px solid #f0f2f0;
            font-size: 12px;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-label {
            color: var(--muted);
        }

        .info-value {
            text-align: right;
            font-weight: 600;
        }

        /* LIVESTOCK */

        .livestock-box {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .livestock-image,
        .livestock-placeholder {
            width: 70px;
            height: 70px;
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
            font-size: 24px;
        }

        .livestock-name {
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .livestock-category {
            color: var(--muted);
            font-size: 11px;
        }

        /* PAYMENT */

        .payment-status {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 7px 11px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 700;
        }

        .payment-status.unpaid {
            background: #f3f4f3;
            color: #68706a;
        }

        .payment-status.pending {
            background: var(--yellow-soft);
            color: var(--yellow);
        }

        .payment-status.confirmed {
            background: var(--green-soft);
            color: var(--green-dark);
        }

        .payment-status.failed {
            background: var(--red-soft);
            color: var(--red);
        }

        .payment-reference {
            background: #fafcfb;
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 12px;
            margin-top: 15px;
            font-size: 12px;
            word-break: break-word;
        }

        .payment-reference span {
            display: block;
            color: var(--muted);
            font-size: 10px;
            margin-bottom: 5px;
        }

        /* ACTIONS */

        .payment-actions {
            display: flex;
            gap: 10px;
            margin-top: 18px;
        }

        .action-button {
            border: none;
            border-radius: 8px;
            padding: 11px 15px;
            cursor: pointer;
            font-size: 11px;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 7px;
        }

        .confirm-button {
            background: var(--green);
            color: white;
        }

        .confirm-button:hover {
            background: var(--green-dark);
        }

        .reject-button {
            background: var(--red-soft);
            color: var(--red);
        }

        .reject-button:hover {
            background: #ffe0e0;
        }

        /* ORDER STATUS */

        .status-form {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .status-select {
            flex: 1;
            height: 40px;
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 0 12px;
            background: white;
            outline: none;
            font-size: 12px;
        }

        .update-button {
            height: 40px;
            padding: 0 15px;
            border: none;
            border-radius: 8px;
            background: var(--green);
            color: white;
            cursor: pointer;
            font-size: 11px;
            font-weight: 700;
        }

        .update-button:hover {
            background: var(--green-dark);
        }

        /* TOTAL */

        .total-box {
            background: var(--green-soft);
            border-radius: 10px;
            padding: 17px;
            margin-top: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .total-box span {
            color: var(--muted);
            font-size: 11px;
        }

        .total-box strong {
            font-size: 20px;
            color: var(--green-dark);
        }

        /* RESPONSIVE */

        @media(max-width: 800px) {

            .page {
                padding: 20px;
            }

            .details-grid {
                grid-template-columns: 1fr;
            }

            .card.full {
                grid-column: auto;
            }

            .page-header {
                flex-direction: column;
            }

        }

        @media(max-width: 500px) {

            .page {
                padding: 14px;
            }

            .payment-actions,
            .status-form {
                flex-direction: column;
                align-items: stretch;
            }

            .action-button,
            .update-button {
                justify-content: center;
            }

        }

    </style>

</head>

<body>

<div class="page">

    <div class="container">

        {{-- BACK --}}

        <a
            href="{{ route('admin.orders.index') }}"
            class="back-button"
        >

            <i class="fa-solid fa-arrow-left"></i>

            Back to Orders

        </a>


        {{-- SUCCESS MESSAGE --}}

        @if(session('success'))

            <div class="success-message">

                <i class="fa-solid fa-circle-check"></i>

                {{ session('success') }}

            </div>

        @endif


        {{-- HEADER --}}

        <div class="page-header">

            <div>

                <h1>
                    Order #{{ $order->id }}
                </h1>

                <p>
                    Review customer information, payment and order progress.
                </p>

            </div>

        </div>


        <div class="details-grid">


            {{-- CUSTOMER --}}

            <div class="card">

                <div class="card-title">

                    <i class="fa-solid fa-user"></i>

                    Customer Information

                </div>


                <div class="info-row">

                    <span class="info-label">
                        Name
                    </span>

                    <span class="info-value">
                        {{ $order->customer_name }}
                    </span>

                </div>


                <div class="info-row">

                    <span class="info-label">
                        Email
                    </span>

                    <span class="info-value">
                        {{ $order->customer_email }}
                    </span>

                </div>


                <div class="info-row">

                    <span class="info-label">
                        Phone
                    </span>

                    <span class="info-value">
                        {{ $order->customer_phone }}
                    </span>

                </div>


                <div class="info-row">

                    <span class="info-label">
                        Delivery Address
                    </span>

                    <span class="info-value">
                        {{ $order->delivery_address }}
                    </span>

                </div>

            </div>


            {{-- LIVESTOCK --}}

            <div class="card">

                <div class="card-title">

                    <i class="fa-solid fa-cow"></i>

                    Livestock Information

                </div>


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


                    <div>

                        <div class="livestock-name">

                            {{ $order->livestock->name ?? 'Livestock' }}

                        </div>

                        <div class="livestock-category">

                            {{ $order->livestock->category ?? 'N/A' }}

                            · Quantity:
                            {{ $order->quantity }}

                        </div>

                    </div>

                </div>


                <div class="total-box">

                    <span>
                        Total Order Amount
                    </span>

                    <strong>
                        ₦{{ number_format($order->total_price, 2) }}
                    </strong>

                </div>

            </div>


            {{-- PAYMENT --}}

            <div class="card">

                <div class="card-title">

                    <i class="fa-solid fa-credit-card"></i>

                    Payment Information

                </div>


                @php
                    $paymentStatus = $order->payment_status ?? 'unpaid';
                @endphp


                <div class="info-row">

                    <span class="info-label">
                        Payment Status
                    </span>

                    <span class="info-value">

                        @if($paymentStatus === 'confirmed')

                            <span class="payment-status confirmed">
                                <i class="fa-solid fa-circle-check"></i>
                                Confirmed
                            </span>

                        @elseif($paymentStatus === 'pending')

                            <span class="payment-status pending">
                                <i class="fa-solid fa-clock"></i>
                                Pending Verification
                            </span>

                        @elseif($paymentStatus === 'failed')

                            <span class="payment-status failed">
                                <i class="fa-solid fa-circle-xmark"></i>
                                Failed
                            </span>

                        @else

                            <span class="payment-status unpaid">
                                <i class="fa-solid fa-minus-circle"></i>
                                Unpaid
                            </span>

                        @endif

                    </span>

                </div>


                <div class="payment-reference">

                    <span>
                        Payment Reference
                    </span>

                    {{ $order->payment_reference ?? 'No payment reference submitted.' }}

                </div>


                @if($paymentStatus === 'pending')

                    <div class="payment-actions">


                        {{-- CONFIRM PAYMENT --}}

                        <form
                            action="{{ route('admin.orders.payment.confirm', $order->id) }}"
                            method="POST"
                        >

                            @csrf

                            @method('PATCH')

                            <button
                                type="submit"
                                class="action-button confirm-button"
                            >

                                <i class="fa-solid fa-check"></i>

                                Confirm Payment

                            </button>

                        </form>


                        {{-- REJECT PAYMENT --}}

                        <form
                            action="{{ route('admin.orders.payment.reject', $order->id) }}"
                            method="POST"
                        >

                            @csrf

                            @method('PATCH')

                            <button
                                type="submit"
                                class="action-button reject-button"
                            >

                                <i class="fa-solid fa-xmark"></i>

                                Reject Payment

                            </button>

                        </form>

                    </div>

                @endif

            </div>


            {{-- ORDER STATUS --}}

            <div class="card">

                <div class="card-title">

                    <i class="fa-solid fa-box"></i>

                    Order Status

                </div>


                <div class="info-row">

                    <span class="info-label">
                        Current Status
                    </span>

                    <span class="info-value">
                        {{ ucfirst($order->status) }}
                    </span>

                </div>


                <form
                    action="{{ route('admin.orders.status', $order->id) }}"
                    method="POST"
                    class="status-form"
                >

                    @csrf

                    @method('PATCH')


                    <select
                        name="status"
                        class="status-select"
                    >

                        <option
                            value="pending"
                            {{ $order->status === 'pending' ? 'selected' : '' }}
                        >
                            Pending
                        </option>

                        <option
                            value="confirmed"
                            {{ $order->status === 'confirmed' ? 'selected' : '' }}
                        >
                            Confirmed
                        </option>

                        <option
                            value="processing"
                            {{ $order->status === 'processing' ? 'selected' : '' }}
                        >
                            Processing
                        </option>

                        <option
                            value="completed"
                            {{ $order->status === 'completed' ? 'selected' : '' }}
                        >
                            Completed
                        </option>

                        <option
                            value="cancelled"
                            {{ $order->status === 'cancelled' ? 'selected' : '' }}
                        >
                            Cancelled
                        </option>

                    </select>


                    <button
                        type="submit"
                        class="update-button"
                    >

                        Update Status

                    </button>

                </form>

            </div>


            {{-- ORDER DETAILS --}}

            <div class="card full">

                <div class="card-title">

                    <i class="fa-solid fa-receipt"></i>

                    Order Details

                </div>


                <div class="info-row">

                    <span class="info-label">
                        Order Number
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


                <div class="info-row">

                    <span class="info-label">
                        Order Date
                    </span>

                    <span class="info-value">

                        {{ $order->created_at
                            ? $order->created_at->format('M d, Y h:i A')
                            : 'N/A'
                        }}

                    </span>

                </div>


                <div class="info-row">

                    <span class="info-label">
                        Last Updated
                    </span>

                    <span class="info-value">

                        {{ $order->updated_at
                            ? $order->updated_at->format('M d, Y h:i A')
                            : 'N/A'
                        }}

                    </span>

                </div>

            </div>

        </div>

    </div>

</div>

</body>

</html>