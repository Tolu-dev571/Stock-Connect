@extends('layouts.app')

@section('title', 'Review Your Order | Stock Connect')

@section('styles')

<style>

    /* =====================================================
       REVIEW PAGE
    ====================================================== */

    .review-page {
        min-height: 80vh;
        padding: 60px 0 100px;
        background:
            radial-gradient(
                circle at 10% 10%,
                rgba(53, 216, 74, .08),
                transparent 25%
            ),
            #f7faf8;
    }

    .review-container {
        width: min(850px, 92%);
        margin: auto;
    }


    /* =====================================================
       BACK LINK
    ====================================================== */

    .review-back {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 25px;

        color: #269c38;
        font-size: 12px;
        font-weight: 650;

        transition: .25s ease;
    }

    .review-back:hover {
        gap: 12px;
        color: #176d27;
    }


    /* =====================================================
       CARD
    ====================================================== */

    .review-card {
        background: #ffffff;
        border: 1px solid #e2e9e4;
        border-radius: 24px;
        overflow: hidden;

        box-shadow:
            0 20px 60px rgba(20, 60, 30, .08);

        animation: reviewCardIn .7s ease forwards;
    }

    @keyframes reviewCardIn {

        from {
            opacity: 0;
            transform: translateY(25px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }

    }


    /* =====================================================
       HEADER
    ====================================================== */

    .review-header {
        padding: 40px 40px 25px;
        text-align: center;
    }

    .review-eyebrow {
        display: inline-block;
        margin-bottom: 10px;

        color: #269c38;
        font-size: 10px;
        font-weight: 750;
        letter-spacing: 1.5px;
        text-transform: uppercase;
    }

    .review-header h1 {
        margin: 0 0 10px;

        color: #17201a;
        font-size: clamp(28px, 5vw, 38px);
        font-weight: 800;
        letter-spacing: -.8px;
    }

    .review-header p {
        margin: 0 auto;

        max-width: 500px;

        color: #7c867f;
        font-size: 13px;
        line-height: 1.7;
    }


    /* =====================================================
       ORDER PRODUCT
    ====================================================== */

    .review-product {
        width: calc(100% - 80px);
        margin: 10px auto 30px;

        display: flex;
        align-items: center;
        gap: 20px;

        padding: 18px;

        background: #f7faf8;
        border: 1px solid #e5ece7;
        border-radius: 17px;
    }

    .review-product-image {
        width: 90px;
        height: 90px;

        flex-shrink: 0;

        border-radius: 14px;
        overflow: hidden;

        background: #eaf7ed;

        display: flex;
        align-items: center;
        justify-content: center;
    }

    .review-product-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .review-product-placeholder {
        color: #269c38;
        font-size: 32px;
    }

    .review-product-info {
        min-width: 0;
    }

    .review-product-category {
        margin-bottom: 5px;

        color: #269c38;
        font-size: 10px;
        font-weight: 750;
        text-transform: uppercase;
        letter-spacing: .6px;
    }

    .review-product-name {
        margin-bottom: 7px;

        color: #17201a;
        font-size: 17px;
        font-weight: 750;
    }

    .review-product-meta {
        color: #7c867f;
        font-size: 11px;
        line-height: 1.6;
    }


    /* =====================================================
       FORM
    ====================================================== */

    .review-form {
        padding: 10px 40px 40px;
    }

    .review-group {
        margin-bottom: 25px;
    }

    .review-label {
        display: block;
        margin-bottom: 10px;

        color: #273029;
        font-size: 12px;
        font-weight: 700;
    }


    /* =====================================================
       STAR RATING
    ====================================================== */

    .rating-wrapper {
        display: flex;
        justify-content: center;
        padding: 12px 0 20px;
    }

    .rating {
        display: flex;
        flex-direction: row-reverse;
        justify-content: center;
        gap: 7px;
    }

    .rating input {
        display: none;
    }

    .rating label {
        cursor: pointer;

        color: #d8ded9;
        font-size: 38px;
        line-height: 1;

        transition:
            color .2s ease,
            transform .2s ease;
    }

    .rating label:hover {
        transform: scale(1.12);
    }

    .rating label:hover,
    .rating label:hover ~ label,
    .rating input:checked ~ label {
        color: #35d84a;
    }

    .rating-text {
        text-align: center;

        color: #8a938c;
        font-size: 11px;

        min-height: 17px;
        transition: .2s ease;
    }


    /* =====================================================
       TEXTAREA
    ====================================================== */

    .review-textarea {
        width: 100%;
        min-height: 150px;

        resize: vertical;

        border: 1px solid #e1e8e3;
        border-radius: 13px;

        background: #fafcfb;

        padding: 15px;

        outline: none;

        color: #17201a;
        font-family: inherit;
        font-size: 12px;
        line-height: 1.7;

        transition:
            border-color .2s ease,
            box-shadow .2s ease,
            background .2s ease;
    }

    .review-textarea:focus {
        background: white;
        border-color: #35d84a;

        box-shadow:
            0 0 0 4px rgba(53, 216, 74, .10);
    }

    .review-textarea::placeholder {
        color: #a5ada7;
    }


    /* =====================================================
       SUBMIT
    ====================================================== */

    .review-submit {
        width: 100%;

        display: flex;
        align-items: center;
        justify-content: center;
        gap: 9px;

        border: none;
        border-radius: 11px;

        padding: 15px;

        background: #35d84a;
        color: white;

        font-size: 12px;
        font-weight: 750;

        cursor: pointer;

        transition:
            background .25s ease,
            transform .25s ease,
            box-shadow .25s ease;
    }

    .review-submit:hover {
        background: #269c38;

        transform: translateY(-2px);

        box-shadow:
            0 12px 30px rgba(38, 156, 56, .22);
    }

    .review-submit:active {
        transform: translateY(0);
    }


    /* =====================================================
       ERROR
    ====================================================== */

    .review-errors {
        margin-bottom: 25px;

        padding: 15px 17px;

        border-radius: 12px;

        background: #fff1f1;
        border: 1px solid #f3cccc;

        color: #a72b2b;

        font-size: 11px;
        line-height: 1.7;
    }

    .review-errors strong {
        display: block;
        margin-bottom: 5px;
    }

    .review-errors ul {
        margin: 0;
        padding-left: 18px;
    }


    /* =====================================================
       RESPONSIVE
    ====================================================== */

    @media (max-width: 600px) {

        .review-page {
            padding: 35px 0 70px;
        }

        .review-header {
            padding: 30px 22px 20px;
        }

        .review-form {
            padding: 10px 22px 28px;
        }

        .review-product {
            width: calc(100% - 44px);

            align-items: flex-start;

            padding: 14px;
        }

        .review-product-image {
            width: 72px;
            height: 72px;
        }

        .review-product-name {
            font-size: 15px;
        }

        .rating label {
            font-size: 32px;
        }

    }

</style>

@endsection


@section('content')

<div class="review-page">

    <div class="review-container">

        {{-- Back --}}
        <a
            href="{{ route('orders.show', $order->id) }}"
            class="review-back"
        >

            <i class="fa-solid fa-arrow-left"></i>

            Back to order

        </a>


        <div class="review-card">


            {{-- =====================================================
                 HEADER
            ====================================================== --}}

            <div class="review-header">

                <span class="review-eyebrow">
                    STOCK CONNECT
                </span>

                <h1>
                    How was your purchase?
                </h1>

                <p>
                    Your feedback helps us improve Stock Connect
                    and helps other customers make better decisions.
                </p>

            </div>


            {{-- =====================================================
                 LIVESTOCK INFORMATION
            ====================================================== --}}

            <div class="review-product">

                <div class="review-product-image">

                    @if($order->livestock && $order->livestock->image)

                        <img
                            src="{{ asset($order->livestock->image) }}"
                            alt="{{ $order->livestock->name }}"
                        >

                    @else

                        <div class="review-product-placeholder">

                            <i class="fa-solid fa-cow"></i>

                        </div>

                    @endif

                </div>


                <div class="review-product-info">

                    <div class="review-product-category">

                        {{ $order->livestock->category ?? 'Livestock' }}

                    </div>


                    <div class="review-product-name">

                        {{ $order->livestock->name ?? 'Livestock order' }}

                    </div>


                    <div class="review-product-meta">

                        @if($order->livestock && $order->livestock->breed)

                            {{ $order->livestock->breed }}

                            ·

                        @endif

                        Quantity:
                        {{ $order->quantity }}

                        ·

                        Order #{{ $order->id }}

                    </div>

                </div>

            </div>


            {{-- =====================================================
                 REVIEW FORM
            ====================================================== --}}

            <form
                action="{{ route('reviews.store', $order->id) }}"
                method="POST"
                class="review-form"
            >

                @csrf


                {{-- Errors --}}

                @if($errors->any())

                    <div class="review-errors">

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


                {{-- Rating --}}

                <div class="review-group">

                    <label class="review-label">

                        Rate your experience

                    </label>


                    <div class="rating-wrapper">

                        <div class="rating">

                            <input
                                type="radio"
                                name="rating"
                                id="star5"
                                value="5"
                            >

                            <label
                                for="star5"
                                title="Excellent"
                            >
                                ★
                            </label>


                            <input
                                type="radio"
                                name="rating"
                                id="star4"
                                value="4"
                            >

                            <label
                                for="star4"
                                title="Very good"
                            >
                                ★
                            </label>


                            <input
                                type="radio"
                                name="rating"
                                id="star3"
                                value="3"
                            >

                            <label
                                for="star3"
                                title="Good"
                            >
                                ★
                            </label>


                            <input
                                type="radio"
                                name="rating"
                                id="star2"
                                value="2"
                            >

                            <label
                                for="star2"
                                title="Fair"
                            >
                                ★
                            </label>


                            <input
                                type="radio"
                                name="rating"
                                id="star1"
                                value="1"
                            >

                            <label
                                for="star1"
                                title="Poor"
                            >
                                ★
                            </label>

                        </div>

                    </div>


                    <div
                        class="rating-text"
                        id="ratingText"
                    >
                        Select a rating
                    </div>

                </div>


                {{-- Comment --}}

                <div class="review-group">

                    <label
                        for="comment"
                        class="review-label"
                    >

                        Tell us about your experience

                    </label>


                    <textarea
                        name="comment"
                        id="comment"
                        class="review-textarea"
                        maxlength="1000"
                        placeholder="What did you like about your livestock purchase? How was the quality, communication or overall experience?"
                    >{{ old('comment') }}</textarea>

                </div>


                {{-- Submit --}}

                <button
                    type="submit"
                    class="review-submit"
                >

                    <span>
                        Submit Review
                    </span>

                    <i class="fa-solid fa-arrow-right"></i>

                </button>

            </form>

        </div>

    </div>

</div>

@endsection


@section('scripts')

<script>

    /* =====================================================
       RATING TEXT
    ====================================================== */

    const ratingInputs =
        document.querySelectorAll(
            '.rating input'
        );

    const ratingText =
        document.getElementById(
            'ratingText'
        );


    const ratingLabels = {

        1: 'Poor experience',

        2: 'Fair experience',

        3: 'Good experience',

        4: 'Very good experience',

        5: 'Excellent experience'

    };


    ratingInputs.forEach(function (input) {

        input.addEventListener(
            'change',
            function () {

                ratingText.textContent =
                    ratingLabels[this.value];

                ratingText.style.color =
                    '#269c38';

            }
        );

    });

</script>

@endsection