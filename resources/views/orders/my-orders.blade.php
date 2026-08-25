@extends('layouts.app')

@section('title', 'My Orders | Stock Connect')

@section('styles')

<style>

    /* =========================
       PAGE
    ========================= */

    .orders-page {
        background: #f7f9f7;
        min-height: 100vh;
        padding: 45px 20px 60px;
    }

    .orders-container {
        max-width: 1100px;
        margin: 0 auto;
    }


    /* =========================
       PAGE HEADER
    ========================= */

    .orders-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        gap: 20px;
        margin-bottom: 30px;
    }

    .orders-heading h1 {
        font-size: 32px;
        font-weight: 700;
        color: #17201a;
        margin: 0 0 8px;
    }

    .orders-heading p {
        margin: 0;
        color: #7c867f;
        font-size: 14px;
    }


    /* =========================
       BACK TO MARKETPLACE
    ========================= */

    .marketplace-button {
        display: inline-flex;
        align-items: center;
        gap: 8px;

        padding: 11px 17px;

        background: white;
        color: #269c38;

        border: 1px solid #dfe8e1;
        border-radius: 9px;

        font-size: 12px;
        font-weight: 600;

        text-decoration: none;

        transition: all .2s ease;
    }

    .marketplace-button:hover {
        background: #eaf9ed;
        border-color: #bfe2c5;
        transform: translateY(-1px);
    }


    /* =========================
       SUCCESS MESSAGE
    ========================= */

    .success-message {
        display: flex;
        align-items: center;
        gap: 9px;

        background: #eaf9ed;
        color: #269c38;

        border: 1px solid #ccebd2;
        border-radius: 10px;

        padding: 13px 16px;
        margin-bottom: 22px;

        font-size: 12px;
    }


    /* =========================
       ORDERS
    ========================= */

    .orders-list {
        display: flex;
        flex-direction: column;
        gap: 18px;
    }


    /* =========================
       ORDER CARD
    ========================= */

    .order-card {
        background: white;

        border: 1px solid #e8ece9;
        border-radius: 15px;

        padding: 22px;

        transition: all .2s ease;
    }

    .order-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 28px rgba(23, 32, 26, .06);
    }


    /* =========================
       ORDER HEADER
    ========================= */

    .order-top {
        display: flex;
        justify-content: space-between;
        align-items: center;

        gap: 15px;

        padding-bottom: 17px;
        margin-bottom: 20px;

        border-bottom: 1px solid #e8ece9;
    }

    .order-number {
        font-size: 14px;
        font-weight: 700;
        color: #17201a;
    }

    .order-date {
        margin-top: 5px;
        color: #7c867f;
        font-size: 10px;
    }


    /* =========================
       STATUS
    ========================= */

    .status {
        display: inline-flex;
        align-items: center;
        gap: 7px;

        padding: 7px 11px;

        border-radius: 20px;

        font-size: 10px;
        font-weight: 600;
        white-space: nowrap;
    }

    .status-dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
    }

    .status.pending {
        background: #fff6df;
        color: #c58b16;
    }

    .status.pending .status-dot {
        background: #c58b16;
    }

    .status.confirmed {
        background: #edf3ff;
        color: #4e78d8;
    }

    .status.confirmed .status-dot {
        background: #4e78d8;
    }

    .status.processing {
        background: #f1edff;
        color: #7655b8;
    }

    .status.processing .status-dot {
        background: #7655b8;
    }

    .status.completed {
        background: #eaf9ed;
        color: #269c38;
    }

    .status.completed .status-dot {
        background: #35d84a;
    }

    .status.cancelled {
        background: #ffeded;
        color: #dc5555;
    }

    .status.cancelled .status-dot {
        background: #dc5555;
    }


    /* =========================
       ORDER BODY
    ========================= */

    .order-content {
        display: grid;
        grid-template-columns: 1.4fr 1fr;

        gap: 25px;
        align-items: center;
    }


    /* =========================
       LIVESTOCK
    ========================= */

    .livestock {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .livestock-image,
    .livestock-placeholder {
        width: 82px;
        height: 82px;

        border-radius: 11px;

        flex-shrink: 0;
    }

    .livestock-image {
        object-fit: cover;
    }

    .livestock-placeholder {
        display: flex;
        align-items: center;
        justify-content: center;

        background: #eaf9ed;
        color: #269c38;

        font-size: 25px;
    }

    .livestock-info h2 {
        font-size: 16px;
        font-weight: 700;

        margin: 0 0 7px;

        color: #17201a;
    }

    .livestock-info p {
        margin: 0 0 4px;

        color: #7c867f;
        font-size: 11px;
    }


    /* =========================
       ORDER DETAILS
    ========================= */

    .details {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 11px;
    }

    .detail {
        background: #fafcfb;

        border: 1px solid #e8ece9;
        border-radius: 9px;

        padding: 12px;
    }

    .detail span {
        display: block;

        color: #7c867f;
        font-size: 9px;

        margin-bottom: 6px;
    }

    .detail strong {
        display: block;

        color: #17201a;
        font-size: 12px;
    }


    /* =========================
       PAYMENT SECTION
    ========================= */

    .payment {
        display: flex;
        align-items: center;
        justify-content: space-between;

        gap: 15px;

        margin-top: 20px;
        padding-top: 17px;

        border-top: 1px solid #e8ece9;
    }

    .payment-info {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .payment-label {
        color: #7c867f;
        font-size: 10px;
    }

    .payment-status {
        display: inline-flex;
        align-items: center;
        gap: 5px;

        padding: 6px 9px;

        border-radius: 20px;

        font-size: 9px;
        font-weight: 600;
    }

    .payment-unpaid {
        background: #f3f4f3;
        color: #68706a;
    }

    .payment-pending {
        background: #fff6df;
        color: #c58b16;
    }

    .payment-confirmed {
        background: #eaf9ed;
        color: #269c38;
    }

    .payment-failed {
        background: #ffeded;
        color: #dc5555;
    }


    /* =========================
       VIEW ORDER BUTTON
    ========================= */

    .view-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;

        padding: 10px 15px;

        background: #35d84a;
        color: white;

        border-radius: 8px;

        font-size: 10px;
        font-weight: 600;

        text-decoration: none;

        transition: all .2s ease;
    }

    .view-button:hover {
        background: #269c38;
        transform: translateY(-1px);
    }


    /* =========================
       EMPTY STATE
    ========================= */

    .empty {
        background: white;

        border: 1px solid #e8ece9;
        border-radius: 15px;

        padding: 70px 20px;

        text-align: center;
    }

    .empty-icon {
        width: 68px;
        height: 68px;

        margin: 0 auto 17px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 50%;

        background: #eaf9ed;
        color: #269c38;

        font-size: 25px;
    }

    .empty h2 {
        margin: 0 0 8px;

        color: #17201a;
        font-size: 20px;
    }

    .empty p {
        margin: 0 0 22px;

        color: #7c867f;
        font-size: 12px;
    }

    .browse-button {
        display: inline-flex;
        align-items: center;
        gap: 8px;

        padding: 11px 17px;

        background: #35d84a;
        color: white;

        border-radius: 9px;

        font-size: 11px;
        font-weight: 600;

        text-decoration: none;

        transition: all .2s ease;
    }

    .browse-button:hover {
        background: #269c38;
        transform: translateY(-1px);
    }

    /* =====================================================
   CUSTOMER REVIEW BUTTON
====================================================== */

.review-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;

    padding: 10px 14px;

    border-radius: 9px;

    background: #eaf9ed;
    color: #269c38;

    border: 1px solid #ccebd1;

    font-size: 11px;
    font-weight: 700;

    text-decoration: none;

    transition:
        background .25s ease,
        color .25s ease,
        transform .25s ease,
        box-shadow .25s ease;
}

.review-button:hover {
    background: #35d84a;
    color: white;

    transform: translateY(-2px);

    box-shadow:
        0 8px 20px rgba(38, 156, 56, .18);
}


/* REVIEW ALREADY SUBMITTED */

.review-completed {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;

    padding: 10px 14px;

    border-radius: 9px;

    background: #f2f7f3;
    color: #5e6b62;

    border: 1px solid #e1e8e3;

    font-size: 11px;
    font-weight: 700;
}


    /* =========================
       RESPONSIVE
    ========================= */

    @media(max-width: 800px) {

        .orders-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .order-content {
            grid-template-columns: 1fr;
        }

    }


    @media(max-width: 550px) {

        .orders-page {
            padding: 30px 14px 45px;
        }

        .orders-heading h1 {
            font-size: 27px;
        }

        .marketplace-button {
            width: 100%;
            justify-content: center;
        }

        .order-card {
            padding: 17px;
        }

        .order-top {
            align-items: flex-start;
            flex-direction: column;
        }

        .livestock {
            align-items: flex-start;
        }

        .details {
            grid-template-columns: 1fr 1fr;
        }

        .payment {
            align-items: flex-start;
            flex-direction: column;
        }

        .view-button {
            width: 100%;
        }

    }


    @media(max-width: 380px) {

        .details {
            grid-template-columns: 1fr;
        }

    }

</style>

@endsection


@section('content')

<div class="orders-page">

    <div class="orders-container">


        {{-- =========================
             PAGE HEADER
        ========================= --}}

        <div class="orders-header">

            <div class="orders-heading">

                <h1>
                    My Orders
                </h1>

                <p>
                    Track your livestock orders and payment status.
                </p>

            </div>


            {{-- BACK TO MARKETPLACE --}}

            <a
                href="{{ route('home') }}"
                class="marketplace-button"
            >

                <i class="fa-solid fa-arrow-left"></i>

                Back to Marketplace

            </a>

        </div>


        {{-- =========================
             SUCCESS MESSAGE
        ========================= --}}

        @if(session('success'))

            <div class="success-message">

                <i class="fa-solid fa-circle-check"></i>

                <span>
                    {{ session('success') }}
                </span>

            </div>

        @endif


        {{-- =========================
             ORDERS
        ========================= --}}

        @if($orders->count() > 0)

            <div class="orders-list">


                @foreach($orders as $order)

                    <div class="order-card">


                        {{-- ORDER HEADER --}}

                        <div class="order-top">

                            <div>

                                <div class="order-number">

                                    Order #{{ $order->id }}

                                </div>

                                <div class="order-date">

                                    Placed on
                                    {{ $order->created_at->format('d M Y · h:i A') }}

                                </div>

                            </div>

                            {{-- =====================================================
     CUSTOMER REVIEW
====================================================== --}}

@if($order->status === 'completed')

    @if($order->review)

        <div class="review-completed">

            <i class="fa-solid fa-circle-check"></i>

            Review Submitted

        </div>

    @else

        <a
            href="{{ route('reviews.create', $order->id) }}"
            class="review-button"
        >

            <i class="fa-solid fa-star"></i>

            Leave a Review

        </a>

    @endif

@endif


                            {{-- ORDER STATUS --}}

                            @php

                                $orderStatus =
                                    $order->status ?? 'pending';

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


                        {{-- =========================
                             ORDER CONTENT
                        ========================= --}}

                        <div class="order-content">


                            {{-- LIVESTOCK --}}

                            <div class="livestock">

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

                                    <h2>

                                        {{ $order->livestock->name ?? 'Livestock' }}

                                    </h2>

                                    <p>

                                        Category:
                                        {{ $order->livestock->category ?? 'N/A' }}

                                    </p>

                                    <p>

                                        Quantity:
                                        {{ $order->quantity }}

                                    </p>

                                </div>

                            </div>


                            {{-- ORDER DETAILS --}}

                            <div class="details">

                                <div class="detail">

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


                                <div class="detail">

                                    <span>
                                        Order Status
                                    </span>

                                    <strong>

                                        {{ ucfirst($orderStatus) }}

                                    </strong>

                                </div>

                            </div>

                        </div>


                        {{-- =========================
                             PAYMENT
                        ========================= --}}

                        <div class="payment">


                            <div class="payment-info">

                                <span class="payment-label">
                                    Payment:
                                </span>


                                @php

                                    $paymentStatus =
                                        $order->payment_status ?? 'unpaid';

                                @endphp


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

                            </div>


                            {{-- VIEW ORDER --}}

                            <a
                                href="{{ route('orders.show', $order->id) }}"
                                class="view-button"
                            >

                                View Order

                                <i class="fa-solid fa-arrow-right"></i>

                            </a>

                        </div>


                    </div>

                @endforeach

            </div>


        @else


            {{-- =========================
                 EMPTY STATE
            ========================= --}}

            <div class="empty">

                <div class="empty-icon">

                    <i class="fa-solid fa-cart-shopping"></i>

                </div>


                <h2>
                    No Orders Yet
                </h2>


                <p>
                    You haven't placed any livestock orders yet.
                </p>


                <a
                    href="{{ route('livestock.index') }}"
                    class="browse-button"
                >

                    <i class="fa-solid fa-cow"></i>

                    Browse Livestock

                </a>

            </div>

        @endif


    </div>

</div>

@endsection