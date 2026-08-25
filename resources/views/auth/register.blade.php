@extends('auth.auth-layout')

@section('page-title', 'Create Account')

@section('content')

<section class="auth-section">

    <div class="auth-wrapper">


        <!-- LEFT -->

        <div class="auth-intro reveal reveal-left">

            <div class="eyebrow">

                <i class="fa-solid fa-leaf"></i>

                JOIN THE STOCK CONNECT MARKETPLACE

            </div>


            <h1>

                Your livestock

                <span>
                    marketplace starts here.
                </span>

            </h1>


            <p>

                Create your Stock Connect account and
                discover a simpler way to buy, manage and
                connect with trusted livestock sellers.

            </p>


            <div class="auth-features">

                <div class="auth-feature">

                    <i class="fa-solid fa-check-circle"></i>

                    Easy livestock discovery

                </div>


                <div class="auth-feature">

                    <i class="fa-solid fa-shield-halved"></i>

                    Secure account

                </div>


                <div class="auth-feature">

                    <i class="fa-solid fa-box"></i>

                    Manage your orders

                </div>


                <div class="auth-feature">

                    <i class="fa-solid fa-star"></i>

                    Review your purchases

                </div>

            </div>

        </div>


        <!-- REGISTER CARD -->

        <div class="auth-card reveal reveal-right">


            <div class="auth-card-logo">

                <img
                    src="{{ asset('images/stock-connect-logo.png') }}"
                    alt="Stock Connect"
                >

                <strong>
                    Stock Connect
                </strong>

            </div>


            <h2>
                Create your account
            </h2>


            <p class="auth-card-subtitle">

                Join Stock Connect and start exploring
                the livestock marketplace.

            </p>


            @if ($errors->any())

                <div class="errors">

                    <strong>
                        Please check the following:
                    </strong>

                    <ul style="padding-left:16px;">

                        @foreach ($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <form
                method="POST"
                action="{{ route('register') }}"
            >

                @csrf


                <!-- NAME -->

                <div class="form-group">

                    <label>
                        Full Name
                    </label>

                    <div class="input-wrapper">

                        <i class="fa-solid fa-user"></i>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            class="form-input"
                            placeholder="Enter your full name"
                            required
                            autofocus
                        >

                    </div>

                </div>


                <!-- EMAIL -->

                <div class="form-group">

                    <label>
                        Email Address
                    </label>

                    <div class="input-wrapper">

                        <i class="fa-solid fa-envelope"></i>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="form-input"
                            placeholder="you@example.com"
                            required
                        >

                    </div>

                </div>


                <!-- PASSWORD -->

                <div class="form-group">

                    <label>
                        Password
                    </label>

                    <div class="input-wrapper">

                        <i class="fa-solid fa-lock"></i>

                        <input
                            type="password"
                            name="password"
                            class="form-input"
                            placeholder="Create a password"
                            required
                        >

                    </div>

                </div>


                <!-- CONFIRM PASSWORD -->

                <div class="form-group">

                    <label>
                        Confirm Password
                    </label>

                    <div class="input-wrapper">

                        <i class="fa-solid fa-lock"></i>

                        <input
                            type="password"
                            name="password_confirmation"
                            class="form-input"
                            placeholder="Confirm your password"
                            required
                        >

                    </div>

                </div>


                <button
                    type="submit"
                    class="auth-submit"
                >

                    <i class="fa-solid fa-user-plus"></i>

                    Create Stock Connect Account

                </button>


            </form>


            <div class="auth-switch">

                Already have an account?

                <a href="{{ route('login') }}">
                    Login
                </a>

            </div>


        </div>


    </div>

</section>


<!-- TRUST -->

<section class="trust-section">

    <div class="trust-grid">


        <div class="trust-card reveal reveal-left">

            <div class="trust-icon">

                <i class="fa-solid fa-store"></i>

            </div>

            <div>

                <strong>
                    One Marketplace
                </strong>

                <span>
                    Discover livestock from different sellers.
                </span>

            </div>

        </div>


        <div class="trust-card reveal reveal-up">

            <div class="trust-icon">

                <i class="fa-solid fa-clipboard-check"></i>

            </div>

            <div>

                <strong>
                    Transparent Listings
                </strong>

                <span>
                    See important livestock and order information.
                </span>

            </div>

        </div>


        <div class="trust-card reveal reveal-right">

            <div class="trust-icon">

                <i class="fa-solid fa-headset"></i>

            </div>

            <div>

                <strong>
                    Customer Support
                </strong>

                <span>
                    Get assistance throughout your marketplace journey.
                </span>

            </div>

        </div>


    </div>

</section>


<!-- CATEGORIES -->

<section
    class="section"
    id="categories"
>

    <div class="section-heading reveal reveal-up">

        <div class="small-title">
            Livestock Categories
        </div>

        <h2>
            Everything in one marketplace.
        </h2>

        <p>
            Explore the major livestock categories available
            through Stock Connect.
        </p>

    </div>


    <div class="category-grid">


        <div class="category-card reveal reveal-left">

            <div class="category-image">

                <img
                    data-livestock="cattle"
                    alt="Cattle"
                >

            </div>

            <div class="category-content">

                <h3>
                    Cattle
                </h3>

                <span>
                    Explore cattle listings
                </span>

                <span class="category-price">
                    View marketplace →
                </span>

            </div>

        </div>


        <div class="category-card reveal reveal-up">

            <div class="category-image">

                <img
                    data-livestock="sheep"
                    alt="Sheep"
                >

            </div>

            <div class="category-content">

                <h3>
                    Sheep
                </h3>

                <span>
                    Explore sheep listings
                </span>

                <span class="category-price">
                    View marketplace →
                </span>

            </div>

        </div>


        <div class="category-card reveal reveal-up">

            <div class="category-image">

                <img
                    data-livestock="goats"
                    alt="Goats"
                >

            </div>

            <div class="category-content">

                <h3>
                    Goats
                </h3>

                <span>
                    Explore goat listings
                </span>

                <span class="category-price">
                    View marketplace →
                </span>

            </div>

        </div>


        <div class="category-card reveal reveal-right">

            <div class="category-image">

                <img
                    data-livestock="pigs"
                    alt="Pigs"
                >

            </div>

            <div class="category-content">

                <h3>
                    Pigs
                </h3>

                <span>
                    Explore pig listings
                </span>

                <span class="category-price">
                    View marketplace →
                </span>

            </div>

        </div>


        <div class="category-card reveal reveal-right">

            <div class="category-image">

                <img
                    data-livestock="poultry"
                    alt="Poultry"
                >

            </div>

            <div class="category-content">

                <h3>
                    Poultry
                </h3>

                <span>
                    Explore poultry listings
                </span>

                <span class="category-price">
                    View marketplace →
                </span>

            </div>

        </div>


    </div>

</section>


<!-- HOW IT WORKS -->

<section
    class="section dark"
    id="how-it-works"
>

    <div class="section-heading reveal reveal-up">

        <div class="small-title">
            How Stock Connect Works
        </div>

        <h2>
            From discovery to delivery.
        </h2>

        <p>
            Everything is designed to make livestock
            transactions easier.
        </p>

    </div>


    <div class="steps">


        <div class="step reveal reveal-left">

            <div class="step-number">
                01
            </div>

            <h3>
                Create an Account
            </h3>

            <p>
                Register your Stock Connect account and
                enter the marketplace.
            </p>

        </div>


        <div class="step reveal reveal-up">

            <div class="step-number">
                02
            </div>

            <h3>
                Browse & Connect
            </h3>

            <p>
                Find livestock, inspect listings and
                connect through the marketplace.
            </p>

        </div>


        <div class="step reveal reveal-right">

            <div class="step-number">
                03
            </div>

            <h3>
                Order & Receive
            </h3>

            <p>
                Place your order and monitor the progress
                of your purchase.
            </p>

        </div>


    </div>

</section>


<!-- FINAL CTA -->

<section
    class="section"
    style="text-align:center;"
>

    <div
        class="section-heading reveal reveal-up"
        style="margin-bottom:0;"
    >

        <div class="small-title">
            Stock Connect
        </div>

        <h2>
            Your livestock marketplace starts here.
        </h2>

        <p>
            Create your account and discover a smarter
            way to buy livestock.
        </p>

        <br>

        <a
            href="{{ route('register') }}"
            class="primary-button"
        >

            Create Account

            <i class="fa-solid fa-arrow-right"></i>

        </a>

    </div>

</section>

@endsection