@extends('layouts.app')

@section('title', 'Payment | Stock Connect')

@section('styles')

<style>

    /* =====================================================
       PAYMENT PAGE
    ====================================================== */

    .payment-page {
        background: #f7f9f7;
        min-height: 100vh;
        padding: 45px 20px 70px;
        color: #17201a;
    }

    .payment-container {
        max-width: 1050px;
        margin: auto;
    }


    /* =====================================================
       BACK LINK
    ====================================================== */

    .payment-back {
        display: inline-flex;
        align-items: center;
        gap: 8px;

        color: #269c38;
        text-decoration: none;

        font-size: 13px;
        font-weight: 600;

        margin-bottom: 24px;

        transition: .2s ease;
    }

    .payment-back:hover {
        color: #17201a;
        transform: translateX(-2px);
    }


    /* =====================================================
       HEADER
    ====================================================== */

    .payment-header {
        margin-bottom: 28px;
    }

    .payment-header h1 {
        font-size: 30px;
        font-weight: 700;
        margin-bottom: 7px;
    }

    .payment-header p {
        color: #7c867f;
        font-size: 13px;
    }


    /* =====================================================
       LAYOUT
    ====================================================== */

    .payment-layout {
        display: grid;
        grid-template-columns: .9fr 1.1fr;
        gap: 24px;
        align-items: start;
    }


    /* =====================================================
       CARD
    ====================================================== */

    .payment-card {
        background: #ffffff;
        border: 1px solid #e8ece9;
        border-radius: 17px;
        padding: 25px;
    }

    .payment-card + .payment-card {
        margin-top: 18px;
    }


    .card-title {
        font-size: 17px;
        font-weight: 700;
        margin-bottom: 6px;
    }

    .card-description {
        color: #7c867f;
        font-size: 11px;
        line-height: 1.6;
    }


    /* =====================================================
       ORDER SUMMARY
    ====================================================== */

    .order-summary {
        position: sticky;
        top: 25px;
    }


    .livestock-preview {
        margin-top: 20px;
    }


    .livestock-image {
        width: 100%;
        height: 210px;

        object-fit: cover;

        border-radius: 12px;

        background: #eaf9ed;
    }


    .livestock-placeholder {
        width: 100%;
        height: 210px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 12px;

        background: #eaf9ed;
        color: #269c38;

        font-size: 45px;
    }


    .livestock-name {
        font-size: 19px;
        font-weight: 700;

        margin-top: 16px;
        margin-bottom: 7px;
    }


    .livestock-meta {
        color: #7c867f;
        font-size: 11px;
        margin-bottom: 5px;
    }


    /* =====================================================
       TOTAL
    ====================================================== */

    .total-box {
        margin-top: 20px;

        padding: 17px;

        background: #eaf9ed;

        border-radius: 11px;

        display: flex;
        justify-content: space-between;
        align-items: center;
    }


    .total-box span {
        color: #7c867f;
        font-size: 11px;
    }


    .total-box strong {
        color: #269c38;
        font-size: 20px;
    }


    /* =====================================================
       BANK DETAILS
    ====================================================== */

    .bank-box {
        margin-top: 20px;

        background: #f2fbf4;

        border: 1px solid #d7ecd9;

        border-radius: 12px;

        padding: 17px;
    }


    .bank-row {
        display: flex;
        justify-content: space-between;
        align-items: center;

        gap: 20px;

        padding: 12px 0;

        border-bottom: 1px solid #d7ecd9;

        font-size: 12px;
    }


    .bank-row:first-child {
        padding-top: 0;
    }


    .bank-row:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }


    .bank-label {
        color: #7c867f;
    }


    .bank-value {
        color: #17201a;
        font-weight: 700;
        text-align: right;
    }


    .amount-value {
        color: #269c38;
        font-size: 14px;
    }


    /* =====================================================
       WARNING
    ====================================================== */

    .payment-warning {
        display: flex;
        gap: 10px;

        margin: 20px 0;

        padding: 14px;

        background: #fff6df;

        border: 1px solid #f0dfae;

        border-radius: 10px;

        color: #8a6718;

        font-size: 10px;
        line-height: 1.6;
    }


    .payment-warning i {
        margin-top: 2px;
        flex-shrink: 0;
    }


    /* =====================================================
       FORM
    ====================================================== */

    .payment-form {
        margin-top: 22px;
    }


    .form-group {
        margin-bottom: 19px;
    }


    .form-label {
        display: block;

        margin-bottom: 7px;

        font-size: 11px;
        font-weight: 600;

        color: #17201a;
    }


    .required {
        color: #dc5555;
    }


    .form-input {
        width: 100%;

        border: 1px solid #e0e6e1;

        background: #fafcfb;

        border-radius: 9px;

        padding: 12px 13px;

        font-family: inherit;
        font-size: 12px;

        color: #17201a;

        outline: none;

        transition: .2s ease;
    }


    .form-input:focus {
        border-color: #35d84a;

        background: white;

        box-shadow:
            0 0 0 3px rgba(53, 216, 74, .10);
    }


    .file-input {
        padding: 10px;
        cursor: pointer;
    }


    .form-help {
        margin-top: 7px;

        color: #8a938c;

        font-size: 9px;

        line-height: 1.5;
    }


    /* =====================================================
       ERROR
    ====================================================== */

    .error-message {
        margin-top: 7px;

        color: #dc5555;

        font-size: 10px;
    }


    .error-box {
        margin-bottom: 20px;

        padding: 13px 15px;

        background: #ffeded;

        border: 1px solid #f3cccc;

        border-radius: 9px;

        color: #c84747;

        font-size: 11px;
    }


    .error-box ul {
        margin: 7px 0 0 17px;
    }


    .error-box li {
        margin-bottom: 3px;
    }


    /* =====================================================
       SUBMIT BUTTON
    ====================================================== */

    .payment-submit {
        width: 100%;

        display: flex;

        align-items: center;
        justify-content: center;

        gap: 8px;

        border: none;

        background: #35d84a;

        color: white;

        padding: 13px 18px;

        border-radius: 9px;

        font-family: inherit;

        font-size: 12px;

        font-weight: 700;

        cursor: pointer;

        transition: .2s ease;
    }


    .payment-submit:hover {
        background: #269c38;

        transform: translateY(-1px);

        box-shadow:
            0 8px 20px rgba(38, 156, 56, .18);
    }


    .payment-submit:disabled {
        opacity: .7;
        cursor: not-allowed;
        transform: none;
    }


    /* =====================================================
       SECURITY NOTE
    ====================================================== */

    .secure-note {
        display: flex;
        align-items: center;
        justify-content: center;

        gap: 7px;

        margin-top: 14px;

        color: #8a938c;

        font-size: 9px;
    }


    .secure-note i {
        color: #269c38;
    }


    /* =====================================================
       RESPONSIVE
    ====================================================== */

    @media(max-width: 800px) {

        .payment-layout {
            grid-template-columns: 1fr;
        }

        .order-summary {
            position: static;
        }

    }


    @media(max-width: 550px) {

        .payment-page {
            padding: 30px 14px 50px;
        }

        .payment-card {
            padding: 20px;
        }

        .payment-header h1 {
            font-size: 25px;
        }

        .bank-row {
            align-items: flex-start;
            flex-direction: column;
            gap: 4px;
        }

        .bank-value {
            text-align: left;
        }

        .livestock-image,
        .livestock-placeholder {
            height: 180px;
        }

    }

</style>

@endsection


@section('content')

<div class="payment-page">

    <div class="payment-container">


        {{-- =====================================================
             BACK
        ====================================================== --}}

        <a
            href="{{ route('orders.show', $order->id) }}"
            class="payment-back"
        >

            <i class="fa-solid fa-arrow-left"></i>

            Back to Order

        </a>



        {{-- =====================================================
             HEADER
        ====================================================== --}}

        <div class="payment-header">

            <h1>
                Complete Your Payment
            </h1>

            <p>
                Complete payment for Order #{{ $order->id }}
            </p>

        </div>



        {{-- =====================================================
             VALIDATION ERRORS
        ====================================================== --}}

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



        {{-- =====================================================
             PAYMENT LAYOUT
        ====================================================== --}}

        <div class="payment-layout">


            {{-- =================================================
                 ORDER SUMMARY
            ================================================== --}}

            <div class="payment-card order-summary">

                <div class="card-title">
                    Order Summary
                </div>

                <div class="card-description">
                    Review the order before making payment.
                </div>


                <div class="livestock-preview">


                    {{-- IMAGE --}}

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


                    {{-- LIVESTOCK DETAILS --}}

                    <div class="livestock-name">

                        {{ $order->livestock->name ?? 'Livestock' }}

                    </div>


                    <div class="livestock-meta">

                        <strong>Order:</strong>
                        #{{ $order->id }}

                    </div>


                    <div class="livestock-meta">

                        <strong>Category:</strong>
                        {{ $order->livestock->category ?? 'N/A' }}

                    </div>


                    <div class="livestock-meta">

                        <strong>Quantity:</strong>
                        {{ $order->quantity }}

                    </div>


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



            {{-- =================================================
                 PAYMENT
            ================================================== --}}

            <div>


                {{-- BANK TRANSFER --}}

                <div class="payment-card">

                    <div class="card-title">
                        Bank Transfer
                    </div>

                    <div class="card-description">

                        Transfer the exact amount below to the
                        Stock Connect account.

                    </div>


                    <div class="bank-box">


                        <div class="bank-row">

                            <span class="bank-label">
                                Bank
                            </span>

                            <span class="bank-value">
                                YOUR BANK NAME
                            </span>

                        </div>


                        <div class="bank-row">

                            <span class="bank-label">
                                Account Name
                            </span>

                            <span class="bank-value">
                                STOCK CONNECT
                            </span>

                        </div>


                        <div class="bank-row">

                            <span class="bank-label">
                                Account Number
                            </span>

                            <span class="bank-value">
                                0000000000
                            </span>

                        </div>


                        <div class="bank-row">

                            <span class="bank-label">
                                Amount
                            </span>

                            <span class="bank-value amount-value">

                                ₦{{ number_format(
                                    $order->total_price,
                                    2
                                ) }}

                            </span>

                        </div>


                    </div>

                </div>



                {{-- PAYMENT FORM --}}

                <div class="payment-card">

                    <div class="card-title">
                        Submit Payment
                    </div>

                    <div class="card-description">

                        After completing the bank transfer,
                        submit your payment details below.

                    </div>


                    <div class="payment-warning">

                        <i class="fa-solid fa-triangle-exclamation"></i>

                        <div>

                            <strong>Important:</strong>

                            Make sure the payment reference matches
                            your bank transaction. Your order will remain
                            pending until an administrator verifies your payment.

                        </div>

                    </div>


                    <form
                        method="POST"
                        action="{{ route(
                            'orders.payment.confirm',
                            $order->id
                        ) }}"
                        enctype="multipart/form-data"
                        class="payment-form"
                        id="paymentForm"
                    >

                        @csrf



                        {{-- PAYMENT REFERENCE --}}

                        <div class="form-group">

                            <label
                                for="payment_reference"
                                class="form-label"
                            >

                                Payment Reference

                                <span class="required">
                                    *
                                </span>

                            </label>


                            <input
                                type="text"
                                id="payment_reference"
                                name="payment_reference"
                                class="form-input"
                                value="{{ old('payment_reference') }}"
                                placeholder="Enter your bank transfer reference"
                                required
                            >


                            @error('payment_reference')

                                <div class="error-message">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>



                        {{-- PAYMENT PROOF --}}

                        <div class="form-group">

                            <label
                                for="payment_proof"
                                class="form-label"
                            >

                                Payment Proof / Receipt

                                <span class="required">
                                    *
                                </span>

                            </label>


                            <input
                                type="file"
                                id="payment_proof"
                                name="payment_proof"
                                class="form-input file-input"
                                accept="image/jpeg,image/png,image/jpg,application/pdf"
                                required
                            >


                            <div class="form-help">

                                Upload a screenshot or receipt of your payment.
                                Accepted formats: JPG, PNG or PDF.
                                Maximum file size: 5MB.

                            </div>


                            @error('payment_proof')

                                <div class="error-message">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>



                        {{-- SUBMIT --}}

                        <button
                            type="submit"
                            class="payment-submit"
                            id="paymentSubmit"
                        >

                            <i class="fa-solid fa-check"></i>

                            I Have Made Payment

                        </button>


                        <div class="secure-note">

                            <i class="fa-solid fa-shield-halved"></i>

                            Your payment information will be reviewed securely.

                        </div>


                    </form>

                </div>

            </div>


        </div>

    </div>

</div>


@endsection


@section('scripts')

<script>

    document.addEventListener('DOMContentLoaded', function () {

        const form =
            document.getElementById('paymentForm');

        const button =
            document.getElementById('paymentSubmit');


        if (!form || !button) {
            return;
        }


        form.addEventListener('submit', function () {

            button.disabled = true;

            button.innerHTML = `
                <i class="fa-solid fa-spinner fa-spin"></i>
                Submitting Payment...
            `;

        });

    });

</script>

@endsection