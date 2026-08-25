@extends('layouts.app')

@section('title', 'Place Order | Stock Connect')

@section('styles')

<style>

    /* =========================
       ORDER PAGE
    ========================= */

    .order-page {
        background: #f7f9f7;
        min-height: 100vh;
        padding: 45px 20px 70px;
        color: #17201a;
    }

    .order-container {
        max-width: 1100px;
        margin: 0 auto;
    }


    /* =========================
       BACK LINK
    ========================= */

    .back-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;

        color: #269c38;
        text-decoration: none;

        font-size: 13px;
        font-weight: 600;

        margin-bottom: 25px;

        transition: .2s ease;
    }

    .back-link:hover {
        color: #17201a;
        transform: translateX(-2px);
    }


    /* =========================
       PAGE HEADER
    ========================= */

    .order-header {
        margin-bottom: 28px;
    }

    .order-header h1 {
        font-size: 30px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .order-header p {
        color: #7c867f;
        font-size: 13px;
    }


    /* =========================
       MAIN GRID
    ========================= */

    .order-layout {
        display: grid;
        grid-template-columns: 1.35fr .85fr;
        gap: 25px;
        align-items: start;
    }


    /* =========================
       FORM CARD
    ========================= */

    .form-card,
    .summary-card {
        background: #ffffff;
        border: 1px solid #e8ece9;
        border-radius: 16px;
    }


    .form-card {
        padding: 28px;
    }


    .section-title {
        font-size: 17px;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .section-description {
        color: #7c867f;
        font-size: 11px;
        margin-bottom: 25px;
    }


    /* =========================
       ERROR MESSAGE
    ========================= */

    .error-box {
        background: #ffeded;
        border: 1px solid #f3caca;
        color: #c63e3e;

        border-radius: 10px;

        padding: 13px 15px;

        margin-bottom: 20px;

        font-size: 12px;
    }

    .error-box ul {
        margin: 7px 0 0 18px;
    }

    .error-box li {
        margin-bottom: 3px;
    }


    /* =========================
       FORM
    ========================= */

    .form-group {
        margin-bottom: 18px;
    }


    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
    }


    .form-label {
        display: block;

        font-size: 11px;
        font-weight: 600;

        margin-bottom: 7px;

        color: #17201a;
    }


    .form-input,
    .form-textarea {
        width: 100%;

        border: 1px solid #e1e7e2;
        background: #fafcfb;

        border-radius: 9px;

        padding: 12px 13px;

        font-size: 12px;
        color: #17201a;

        outline: none;

        transition: .2s ease;
    }


    .form-input:focus,
    .form-textarea:focus {
        border-color: #35d84a;
        background: #ffffff;

        box-shadow: 0 0 0 3px rgba(53, 216, 74, .10);
    }


    .form-textarea {
        min-height: 100px;
        resize: vertical;
    }


    .form-input::placeholder,
    .form-textarea::placeholder {
        color: #a0a8a2;
    }


    /* =========================
       QUANTITY
    ========================= */

    .quantity-wrapper {
        position: relative;
    }

    .quantity-input {
        padding-right: 90px;
    }

    .quantity-available {
        position: absolute;

        right: 13px;
        top: 50%;

        transform: translateY(-50%);

        font-size: 9px;
        color: #7c867f;
        pointer-events: none;
    }


    /* =========================
       SUBMIT BUTTON
    ========================= */

    .submit-button {
        width: 100%;

        border: none;

        background: #35d84a;
        color: #ffffff;

        padding: 13px 18px;

        border-radius: 9px;

        font-size: 12px;
        font-weight: 700;

        cursor: pointer;

        transition: .2s ease;

        margin-top: 5px;
    }


    .submit-button:hover {
        background: #269c38;
        transform: translateY(-1px);
        box-shadow: 0 7px 18px rgba(38, 156, 56, .18);
    }


    /* =========================
       SUMMARY CARD
    ========================= */

    .summary-card {
        overflow: hidden;
    }


    .summary-header {
        padding: 20px;

        border-bottom: 1px solid #e8ece9;
    }


    .summary-header h2 {
        font-size: 16px;
        margin-bottom: 4px;
    }


    .summary-header p {
        color: #7c867f;
        font-size: 10px;
    }


    /* =========================
       LIVESTOCK PREVIEW
    ========================= */

    .livestock-preview {
        padding: 20px;
    }


    .livestock-image {
        width: 100%;
        height: 210px;

        object-fit: cover;

        border-radius: 11px;

        background: #eaf9ed;

        margin-bottom: 15px;
    }


    .livestock-placeholder {
        width: 100%;
        height: 210px;

        border-radius: 11px;

        background: #eaf9ed;
        color: #269c38;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 45px;

        margin-bottom: 15px;
    }


    .livestock-name {
        font-size: 19px;
        font-weight: 700;

        margin-bottom: 7px;
    }


    .livestock-meta {
        color: #7c867f;
        font-size: 11px;

        margin-bottom: 4px;
    }


    .unit-price {
        color: #269c38;
        font-size: 19px;
        font-weight: 700;

        margin-top: 13px;
    }


    .unit-label {
        color: #7c867f;
        font-size: 9px;
        font-weight: 400;
    }


    /* =========================
       TOTAL
    ========================= */

    .summary-total {
        margin-top: 20px;

        padding: 16px;

        background: #eaf9ed;

        border-radius: 10px;

        display: flex;
        justify-content: space-between;
        align-items: center;
    }


    .summary-total span {
        color: #7c867f;
        font-size: 11px;
    }


    .summary-total strong {
        color: #269c38;
        font-size: 19px;
    }


    /* =========================
       INFORMATION
    ========================= */

    .order-note {
        margin: 0 20px 20px;

        padding: 13px;

        background: #fafcfb;

        border: 1px solid #e8ece9;

        border-radius: 9px;

        color: #7c867f;

        font-size: 10px;

        line-height: 1.6;
    }


    .order-note i {
        color: #269c38;
        margin-right: 5px;
    }


    /* =========================
       MOBILE
    ========================= */

    @media(max-width: 800px) {

        .order-layout {
            grid-template-columns: 1fr;
        }

        .summary-card {
            order: -1;
        }

    }


    @media(max-width: 550px) {

        .order-page {
            padding: 30px 14px 50px;
        }

        .form-card {
            padding: 20px;
        }

        .order-header h1 {
            font-size: 25px;
        }

        .form-row {
            grid-template-columns: 1fr;
            gap: 0;
        }

        .livestock-image,
        .livestock-placeholder {
            height: 180px;
        }

    }

</style>

@endsection


@section('content')

<div class="order-page">

    <div class="order-container">


        {{-- =========================
             BACK TO MARKETPLACE
        ========================= --}}

        <a
            href="{{ route('livestock.index') }}"
            class="back-link"
        >
            <i class="fa-solid fa-arrow-left"></i>

            Back to Marketplace
        </a>



        {{-- =========================
             PAGE HEADER
        ========================= --}}

        <div class="order-header">

            <h1>
                Place Your Order
            </h1>

            <p>
                Provide your details and choose the quantity you want to purchase.
            </p>

        </div>



        {{-- =========================
             ERROR MESSAGE
        ========================= --}}

        @if($errors->any())

            <div class="error-box">

                <strong>
                    Please check the following:
                </strong>

                <ul>

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif



        {{-- =========================
             MAIN LAYOUT
        ========================= --}}

        <div class="order-layout">


            {{-- =========================
                 CUSTOMER FORM
            ========================= --}}

            <div class="form-card">

                <div class="section-title">
                    Customer Information
                </div>

                <div class="section-description">
                    Enter the information we need to process your order.
                </div>


                <form
                    action="{{ route('orders.store', $livestock->id) }}"
                    method="POST"
                >

                    @csrf


                    {{-- NAME + EMAIL --}}

                    <div class="form-row">


                        <div class="form-group">

                            <label
                                for="customer_name"
                                class="form-label"
                            >
                                Full Name
                            </label>

                            <input
                                type="text"
                                id="customer_name"
                                name="customer_name"
                                class="form-input"
                                value="{{ old('customer_name', auth()->user()->name ?? '') }}"
                                placeholder="Enter your full name"
                                required
                            >

                        </div>



                        <div class="form-group">

                            <label
                                for="customer_email"
                                class="form-label"
                            >
                                Email Address
                            </label>

                            <input
                                type="email"
                                id="customer_email"
                                name="customer_email"
                                class="form-input"
                                value="{{ old('customer_email', auth()->user()->email ?? '') }}"
                                placeholder="Enter your email"
                                required
                            >

                        </div>


                    </div>



                    {{-- PHONE --}}

                    <div class="form-group">

                        <label
                            for="customer_phone"
                            class="form-label"
                        >
                            Phone Number
                        </label>

                        <input
                            type="tel"
                            id="customer_phone"
                            name="customer_phone"
                            class="form-input"
                            value="{{ old('customer_phone') }}"
                            placeholder="Enter your phone number"
                            required
                        >

                    </div>



                    {{-- DELIVERY ADDRESS --}}

                    <div class="form-group">

                        <label
                            for="delivery_address"
                            class="form-label"
                        >
                            Delivery Address
                        </label>

                        <textarea
                            id="delivery_address"
                            name="delivery_address"
                            class="form-textarea"
                            placeholder="Enter the address where the livestock should be delivered"
                            required
                        >{{ old('delivery_address') }}</textarea>

                    </div>



                    {{-- QUANTITY --}}

                    <div class="form-group">

                        <label
                            for="quantity"
                            class="form-label"
                        >
                            Quantity
                        </label>


                        <div class="quantity-wrapper">

                            <input
                                type="number"
                                id="quantity"
                                name="quantity"
                                class="form-input quantity-input"
                                value="{{ old('quantity', 1) }}"
                                min="1"
                                max="{{ $livestock->quantity }}"
                                required
                            >


                            <span class="quantity-available">

                                {{ $livestock->quantity }} available

                            </span>

                        </div>

                    </div>



                    {{-- SUBMIT --}}

                    <button
                        type="submit"
                        class="submit-button"
                    >

                        Continue to Order

                        <i class="fa-solid fa-arrow-right"></i>

                    </button>


                </form>

            </div>



            {{-- =========================
                 ORDER SUMMARY
            ========================= --}}

            <div class="summary-card">


                <div class="summary-header">

                    <h2>
                        Order Summary
                    </h2>

                    <p>
                        Review your selected livestock before continuing.
                    </p>

                </div>



                <div class="livestock-preview">


                    {{-- IMAGE --}}

                    @if($livestock->image)

                        <img
                            src="{{ asset($livestock->image) }}"
                            alt="{{ $livestock->name }}"
                            class="livestock-image"
                        >

                    @else

                        <div class="livestock-placeholder">

                            <i class="fa-solid fa-cow"></i>

                        </div>

                    @endif



                    {{-- INFORMATION --}}

                    <div class="livestock-name">

                        {{ $livestock->name }}

                    </div>


                    <div class="livestock-meta">

                        Category:
                        {{ $livestock->category }}

                    </div>


                    @if($livestock->breed)

                        <div class="livestock-meta">

                            Breed:
                            {{ $livestock->breed }}

                        </div>

                    @endif


                    <div class="livestock-meta">

                        Available:
                        {{ $livestock->quantity }}

                    </div>


                    <div class="unit-price">

                        ₦{{ number_format($livestock->price, 2) }}

                        <span class="unit-label">
                            / unit
                        </span>

                    </div>



                    {{-- TOTAL --}}

                    <div class="summary-total">

                        <span>
                            Estimated Total
                        </span>

                        <strong id="totalPrice">

                            ₦{{ number_format($livestock->price, 2) }}

                        </strong>

                    </div>

                </div>



                {{-- NOTE --}}

                <div class="order-note">

                    <i class="fa-solid fa-circle-info"></i>

                    Your order will be reviewed and processed after you continue.
                    Payment instructions will be provided on the next step.

                </div>


            </div>


        </div>

    </div>

</div>


{{-- =========================
     TOTAL PRICE SCRIPT
========================= --}}

<script>

    document.addEventListener('DOMContentLoaded', function () {

        const quantityInput = document.getElementById('quantity');

        const totalPrice = document.getElementById('totalPrice');

        const unitPrice = {{ $livestock->price }};


        function updateTotal() {

            let quantity = parseInt(quantityInput.value) || 1;

            if (quantity < 1) {
                quantity = 1;
            }

            const total = unitPrice * quantity;


            totalPrice.textContent =
                '₦' +
                total.toLocaleString('en-NG', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                });

        }


        quantityInput.addEventListener(
            'input',
            updateTotal
        );


        updateTotal();

    });

</script>

@endsection