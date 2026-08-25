@extends('layouts.app')

@section('title', 'Order Details | Stock Connect')

@section('content')

<style>

    /* =========================
       PAGE
    ========================= */

    .order-page {
        min-height: 100vh;
        padding: 35px 20px 50px;
        background: #f7f9f7;
        color: #17201a;
    }

    .order-container {
        max-width: 1050px;
        margin: auto;
    }


    /* =========================
       SUCCESS HEADER
    ========================= */

    .success-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .success-icon {
        width: 70px;
        height: 70px;

        margin: 0 auto 18px;

        border-radius: 50%;

        background: #eaf9ed;
        color: #269c38;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 30px;
    }

    .success-header h1 {
        font-size: 28px;
        margin-bottom: 8px;
        color: #17201a;
    }

    .success-header p {
        color: #7c867f;
        font-size: 13px;
    }

    .order-number {
        color: #269c38;
        font-weight: 700;
    }


    /* =========================
       GRID
    ========================= */

    .order-content-grid {
        display: grid;
        grid-template-columns: 1.5fr 1fr;
        gap: 20px;
        align-items: start;
    }


    /* =========================
       CARD
    ========================= */

    .order-card {
        background: #ffffff;
        border: 1px solid #e8ece9;
        border-radius: 15px;
        overflow: hidden;
        margin-bottom: 20px;
    }

    .order-card:last-child {
        margin-bottom: 0;
    }

    .order-card-header {
        padding: 18px 20px;
        border-bottom: 1px solid #e8ece9;
    }

    .order-card-header h2 {
        font-size: 15px;
        margin-bottom: 4px;
        color: #17201a;
    }

    .order-card-header p {
        color: #7c867f;
        font-size: 10px;
        margin: 0;
    }

    .order-card-body {
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
        width: 80px;
        height: 80px;
        border-radius: 11px;
        flex-shrink: 0;
    }

    .livestock-image {
        object-fit: cover;
    }

    .livestock-placeholder {
        background: #eaf9ed;
        color: #269c38;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 26px;
    }

    .livestock-info h3 {
        font-size: 16px;
        margin: 0 0 6px;
        color: #17201a;
    }

    .livestock-info p {
        color: #7c867f;
        font-size: 11px;
        margin: 0 0 4px;
    }


    /* =========================
       STATUS
    ========================= */

    .status-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
    }

    .status-box {
        border-radius: 10px;
        padding: 15px;
    }

    .status-box span {
        display: block;
        font-size: 10px;
        color: #7c867f;
        margin-bottom: 7px;
    }

    .status-box strong {
        display: flex;
        align-items: center;
        gap: 7px;
        font-size: 12px;
    }

    .status-order {
        background: #edf3ff;
        color: #4e78d8;
    }

    .status-payment {
        background: #eaf9ed;
        color: #269c38;
    }


    /* =========================
       INFO
    ========================= */

    .info-list {
        display: flex;
        flex-direction: column;
        gap: 13px;
    }

    .info-row {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 20px;

        padding-bottom: 12px;

        border-bottom: 1px solid #f0f2f0;
    }

    .info-row:last-child {
        padding-bottom: 0;
        border-bottom: none;
    }

    .info-label {
        color: #7c867f;
        font-size: 11px;
    }

    .info-value {
        text-align: right;
        font-size: 12px;
        font-weight: 600;
        color: #17201a;
        word-break: break-word;
    }


    /* =========================
       CUSTOMER
    ========================= */

    .customer-box {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 18px;
    }

    .customer-avatar {
        width: 45px;
        height: 45px;

        border-radius: 50%;

        background: #eaf9ed;
        color: #269c38;

        display: flex;
        align-items: center;
        justify-content: center;

        font-weight: 700;
        flex-shrink: 0;
    }

    .customer-info strong {
        display: block;
        font-size: 13px;
        margin-bottom: 3px;
        color: #17201a;
    }

    .customer-info span {
        color: #7c867f;
        font-size: 10px;
    }


    /* =========================
       DELIVERY
    ========================= */

    .address-box {
        background: #fafcfb;
        border: 1px solid #e8ece9;
        border-radius: 9px;
        padding: 14px;

        font-size: 12px;
        line-height: 1.7;
        color: #17201a;
    }

    .address-box i {
        color: #269c38;
        margin-right: 6px;
    }


    /* =========================
       TOTAL
    ========================= */

    .total-box {
        background: #eaf9ed;
        border-radius: 11px;

        padding: 18px;

        display: flex;
        align-items: center;
        justify-content: space-between;

        gap: 15px;
    }

    .total-box span {
        color: #269c38;
        font-size: 11px;
    }

    .total-box strong {
        color: #269c38;
        font-size: 21px;
    }


    /* =========================
       PAYMENT REFERENCE
    ========================= */

    .reference {
        background: #fafcfb;
        border: 1px solid #e8ece9;
        border-radius: 8px;

        padding: 11px;

        font-size: 11px;
        word-break: break-all;
    }


    /* =========================
       WAITING MESSAGE
    ========================= */

    .waiting-box {
        background: #fff6df;
        color: #c58b16;

        border-radius: 10px;

        padding: 14px;

        font-size: 11px;

        line-height: 1.6;
    }


    /* =========================
       PAYMENT STATES
    ========================= */

    .payment-message {
        border-radius: 10px;
        padding: 14px;
        font-size: 11px;
        line-height: 1.6;
    }

    .payment-confirmed {
        background: #eaf9ed;
        color: #269c38;
    }

    .payment-pending {
        background: #fff6df;
        color: #8a6718;
    }

    .payment-unpaid {
        background: #f3f4f3;
        color: #68706a;
    }

    .payment-failed {
        background: #ffeded;
        color: #dc5555;
    }


    /* =========================
       ACTION BUTTONS
    ========================= */

    .order-actions {
        display: flex;
        gap: 10px;
        margin-top: 25px;
    }

    .order-button {
        flex: 1;

        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;

        min-height: 44px;

        border-radius: 9px;

        font-size: 12px;
        font-weight: 600;

        text-decoration: none;

        transition: .2s ease;
    }

    .primary-order-button {
        background: #35d84a;
        color: #ffffff;
    }

    .primary-order-button:hover {
        background: #269c38;
        color: #ffffff;
    }

    .secondary-order-button {
        background: #ffffff;
        color: #17201a;
        border: 1px solid #e8ece9;
    }

    .secondary-order-button:hover {
        border-color: #35d84a;
        color: #269c38;
    }


    /* =========================
       PAYMENT BUTTON
    ========================= */

    .payment-button {
        width: 100%;

        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;

        min-height: 44px;

        margin-top: 15px;

        border-radius: 9px;

        background: #35d84a;
        color: #ffffff;

        font-size: 12px;
        font-weight: 600;

        text-decoration: none;

        transition: .2s ease;
    }

    .payment-button:hover {
        background: #269c38;
        color: #ffffff;
    }


    /* =========================
       RESPONSIVE
    ========================= */

    @media(max-width: 800px) {

        .order-content-grid {
            grid-template-columns: 1fr;
        }

    }


    @media(max-width: 600px) {

        .order-page {
            padding: 25px 14px 40px;
        }

        .success-header h1 {
            font-size: 23px;
        }

        .status-row {
            grid-template-columns: 1fr;
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

        .order-actions {
            flex-direction: column;
        }

        .total-box {
            align-items: flex-start;
            flex-direction: column;
        }

    }

</style>


<div class="order-page">

    <div class="order-container">


        {{-- =========================
             SUCCESS HEADER
        ========================= --}}

        <div class="success-header">

            <div class="success-icon">

                <i class="fa-solid fa-circle-check"></i>

            </div>

            <h1>
                Order Details
            </h1>

            <p>

                Order
                <span class="order-number">
                    #{{ $order->id }}
                </span>

                was successfully received.

            </p>

        </div>


        <div class="order-content-grid">


            {{-- =====================================================
                 LEFT COLUMN
            ====================================================== --}}

            <div>


                {{-- =========================
                     LIVESTOCK ORDERED
                ========================= --}}

                <div class="order-card">

                    <div class="order-card-header">

                        <h2>
                            Livestock Ordered
                        </h2>

                        <p>
                            Details of the livestock included in this order.
                        </p>

                    </div>


                    <div class="order-card-body">

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
                                    Quantity:
                                    {{ $order->quantity }}
                                </p>

                                <p>
                                    Price per unit:
                                    ₦{{ number_format(
                                        $order->livestock->price ?? 0,
                                        2
                                    ) }}
                                </p>

                            </div>

                        </div>

                    </div>

                </div>



                {{-- =========================
                     CUSTOMER INFORMATION
                ========================= --}}

                <div class="order-card">

                    <div class="order-card-header">

                        <h2>
                            Customer Information
                        </h2>

                        <p>
                            Information attached to this order.
                        </p>

                    </div>


                    <div class="order-card-body">

                        <div class="customer-box">

                            <div class="customer-avatar">

                                {{ strtoupper(
                                    substr(
                                        $order->customer_name ?? 'C',
                                        0,
                                        1
                                    )
                                ) }}

                            </div>


                            <div class="customer-info">

                                <strong>
                                    {{ $order->customer_name ?? 'Customer' }}
                                </strong>

                                <span>
                                    {{ $order->customer_email ?? 'No email provided' }}
                                </span>

                            </div>

                        </div>


                        <div class="info-list">

                            <div class="info-row">

                                <span class="info-label">
                                    Phone
                                </span>

                                <span class="info-value">
                                    {{ $order->customer_phone ?? 'N/A' }}
                                </span>

                            </div>


                            <div class="info-row">

                                <span class="info-label">
                                    Email
                                </span>

                                <span class="info-value">
                                    {{ $order->customer_email ?? 'N/A' }}
                                </span>

                            </div>

                        </div>

                    </div>

                </div>



                {{-- =========================
                     DELIVERY INFORMATION
                ========================= --}}

                <div class="order-card">

                    <div class="order-card-header">

                        <h2>
                            Delivery Information
                        </h2>

                        <p>
                            Your livestock will be delivered to this address.
                        </p>

                    </div>


                    <div class="order-card-body">

                        <div class="address-box">

                            <i class="fa-solid fa-location-dot"></i>

                            {{ $order->delivery_address ?? 'No delivery address provided.' }}

                        </div>

                    </div>

                </div>

            </div>



            {{-- =====================================================
                 RIGHT COLUMN
            ====================================================== --}}

            <div>


                {{-- =========================
                     ORDER STATUS
                ========================= --}}

                <div class="order-card">

                    <div class="order-card-header">

                        <h2>
                            Order Status
                        </h2>

                        <p>
                            Current status of your order.
                        </p>

                    </div>


                    <div class="order-card-body">

                        @php

                            $orderStatus =
                                $order->status ?? 'pending';

                            $paymentStatus =
                                $order->payment_status ?? 'unpaid';

                        @endphp


                        <div class="status-row">


                            <div class="status-box status-order">

                                <span>
                                    Order
                                </span>

                                <strong>

                                    @if($orderStatus === 'completed')

                                        <i class="fa-solid fa-circle-check"></i>

                                    @elseif($orderStatus === 'cancelled')

                                        <i class="fa-solid fa-circle-xmark"></i>

                                    @elseif($orderStatus === 'processing')

                                        <i class="fa-solid fa-rotate"></i>

                                    @elseif($orderStatus === 'confirmed')

                                        <i class="fa-solid fa-circle-check"></i>

                                    @else

                                        <i class="fa-solid fa-clock"></i>

                                    @endif

                                    {{ ucfirst($orderStatus) }}

                                </strong>

                            </div>


                            <div class="status-box status-payment">

                                <span>
                                    Payment
                                </span>

                                <strong>

                                    @if($paymentStatus === 'confirmed')

                                        <i class="fa-solid fa-circle-check"></i>

                                    @elseif($paymentStatus === 'failed')

                                        <i class="fa-solid fa-circle-xmark"></i>

                                    @elseif($paymentStatus === 'pending')

                                        <i class="fa-solid fa-clock"></i>

                                    @else

                                        <i class="fa-solid fa-minus-circle"></i>

                                    @endif

                                    {{ ucfirst($paymentStatus) }}

                                </strong>

                            </div>


                        </div>

                    </div>

                </div>



                {{-- =========================
                     ORDER SUMMARY
                ========================= --}}

                <div class="order-card">

                    <div class="order-card-header">

                        <h2>
                            Order Summary
                        </h2>

                        <p>
                            Your order and payment information.
                        </p>

                    </div>


                    <div class="order-card-body">

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
                                    Order Date
                                </span>

                                <span class="info-value">

                                    {{ $order->created_at
                                        ? $order->created_at->format('d M Y')
                                        : 'N/A'
                                    }}

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
                                    Payment Reference
                                </span>

                                <span class="info-value">

                                    @if($order->payment_reference)

                                        {{ $order->payment_reference }}

                                    @else

                                        Not submitted

                                    @endif

                                </span>

                            </div>


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


                        {{-- PAYMENT BUTTON --}}

                        @if(
                            $paymentStatus === 'unpaid'
                            ||
                            $paymentStatus === 'failed'
                        )

                            <a
                                href="{{ route('orders.payment', $order->id) }}"
                                class="payment-button"
                            >

                                <i class="fa-solid fa-credit-card"></i>

                                Make Payment

                            </a>

                        @endif


                    </div>

                </div>



                {{-- =========================
                     PAYMENT STATUS MESSAGE
                ========================= --}}

                @if($paymentStatus === 'pending')

                    <div class="order-card">

                        <div class="order-card-body">

                            <div class="payment-message payment-pending">

                                <i class="fa-solid fa-clock"></i>

                                <strong>
                                    Payment Under Verification
                                </strong>

                                <br>

                                Your payment proof has been submitted
                                and is currently waiting for verification
                                by the Stock Connect admin.

                            </div>

                        </div>

                    </div>


                @elseif($paymentStatus === 'confirmed')

                    <div class="order-card">

                        <div class="order-card-body">

                            <div class="payment-message payment-confirmed">

                                <i class="fa-solid fa-circle-check"></i>

                                <strong>
                                    Payment Confirmed
                                </strong>

                                <br>

                                Your payment has been successfully verified
                                by Stock Connect.

                            </div>

                        </div>

                    </div>


                @elseif($paymentStatus === 'failed')

                    <div class="order-card">

                        <div class="order-card-body">

                            <div class="payment-message payment-failed">

                                <i class="fa-solid fa-circle-xmark"></i>

                                <strong>
                                    Payment Verification Failed
                                </strong>

                                <br>

                                Your payment could not be verified.
                                Please review the payment information and try again.

                            </div>

                        </div>

                    </div>


                @else

                    <div class="order-card">

                        <div class="order-card-body">

                            <div class="payment-message payment-unpaid">

                                <i class="fa-solid fa-circle-info"></i>

                                <strong>
                                    Payment Required
                                </strong>

                                <br>

                                Your order has been created but payment
                                has not yet been submitted.

                            </div>

                        </div>

                    </div>

                @endif



                {{-- =========================
                     ACTION BUTTONS
                ========================= --}}

                <div class="order-actions">

                    <a
                        href="{{ route('customer.livestock') }}"
                        class="order-button primary-order-button"
                    >

                        <i class="fa-solid fa-store"></i>

                        Continue Shopping

                    </a>


                    <a
                        href="{{ route('orders.my') }}"
                        class="order-button secondary-order-button"
                    >

                        <i class="fa-solid fa-box"></i>

                        My Orders

                    </a>

                </div>


            </div>

        </div>

    </div>

</div>

@endsection