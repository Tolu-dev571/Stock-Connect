@extends('auth.auth-layout')

@section('page-title', 'Login')

@section('content')

<section class="auth-section">

    <div class="auth-wrapper">


        <!-- LEFT SIDE -->

        <div class="auth-intro reveal reveal-left">

            <div class="eyebrow">

                <i class="fa-solid fa-shield-halved"></i>

                TRUSTED LIVESTOCK MARKETPLACE

            </div>


            <h1>

                Welcome back to

                <span>
                    Stock Connect.
                </span>

            </h1>


            <p>

                Buy healthy livestock from trusted sellers,
                manage your orders and connect with farmers
                through one modern marketplace.

            </p>


            <div class="auth-features">

                <div class="auth-feature">

                    <i class="fa-solid fa-circle-check"></i>

                    Verified livestock sellers

                </div>


                <div class="auth-feature">

                    <i class="fa-solid fa-shield-halved"></i>

                    Secure transactions

                </div>


                <div class="auth-feature">

                    <i class="fa-solid fa-truck-fast"></i>

                    Reliable delivery

                </div>


                <div class="auth-feature">

                    <i class="fa-solid fa-star"></i>

                    Trusted reviews

                </div>

            </div>

        </div>


        <!-- LOGIN CARD -->

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
                Welcome back
            </h2>


            <p class="auth-card-subtitle">

                Login to continue buying and managing
                your livestock orders.

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
                action="{{ route('login') }}"
            >

                @csrf


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
                            autofocus
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
                            placeholder="Enter your password"
                            required
                        >

                    </div>

                </div>


                <div class="form-options">

                    <label class="remember">

                        <input
                            type="checkbox"
                            name="remember"
                        >

                        Remember me

                    </label>


                    @if (Route::has('password.request'))

                        <a
                            href="{{ route('password.request') }}"
                            class="forgot"
                        >
                            Forgot password?
                        </a>

                    @endif

                </div>


                <button
                    type="submit"
                    class="auth-submit"
                >

                    <i class="fa-solid fa-right-to-bracket"></i>

                    Login to Stock Connect

                </button>


            </form>


            <div class="auth-switch">

                Don't have an account?

                <a href="{{ route('register') }}">
                    Create an account
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

                <i class="fa-solid fa-stethoscope"></i>

            </div>

            <div>

                <strong>
                    Verified Livestock
                </strong>

                <span>
                    Quality livestock listings from trusted sellers.
                </span>

            </div>

        </div>


        <div class="trust-card reveal reveal-up">

            <div class="trust-icon">

                <i class="fa-solid fa-user-shield"></i>

            </div>

            <div>

                <strong>
                    Secure Marketplace
                </strong>

                <span>
                    Designed to make livestock transactions safer.
                </span>

            </div>

        </div>


        <div class="trust-card reveal reveal-right">

            <div class="trust-icon">

                <i class="fa-solid fa-truck"></i>

            </div>

            <div>

                <strong>
                    Reliable Delivery
                </strong>

                <span>
                    Stay connected throughout your order journey.
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
            Explore Marketplace
        </div>

        <h2>
            Find the livestock you need
        </h2>

        <p>
            Browse popular livestock categories available
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
                    Healthy cattle from trusted sellers
                </span>

                <span class="category-price">
                    Explore cattle →
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
                    Quality sheep listings
                </span>

                <span class="category-price">
                    Explore sheep →
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
                    Browse available goats
                </span>

                <span class="category-price">
                    Explore goats →
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
                    Farm-raised pigs
                </span>

                <span class="category-price">
                    Explore pigs →
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
                    Quality poultry listings
                </span>

                <span class="category-price">
                    Explore poultry →
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
            Simple Process
        </div>

        <h2>
            Buying livestock should be simple.
        </h2>

        <p>
            Stock Connect makes the process easier from
            discovery to delivery.
        </p>

    </div>


    <div class="steps">


        <div class="step reveal reveal-left">

            <div class="step-number">
                01
            </div>

            <h3>
                Browse
            </h3>

            <p>
                Explore available livestock and compare
                breeds, prices, locations and seller information.
            </p>

        </div>


        <div class="step reveal reveal-up">

            <div class="step-number">
                02
            </div>

            <h3>
                Inspect & Verify
            </h3>

            <p>
                Review livestock details, seller ratings
                and available verification information.
            </p>

        </div>


        <div class="step reveal reveal-right">

            <div class="step-number">
                03
            </div>

            <h3>
                Safe Delivery
            </h3>

            <p>
                Place your order and follow its progress
                until the livestock reaches you.
            </p>

        </div>


    </div>

</section>


<!-- TESTIMONIALS -->

<section
    class="section"
    id="reviews"
>

    <div class="section-heading reveal reveal-up">

        <div class="small-title">
            Customer Stories
        </div>

        <h2>
            Built around trust.
        </h2>

        <p>
            See why farmers and livestock buyers choose
            Stock Connect.
        </p>

    </div>


    <div class="testimonial-grid">


        <div class="testimonial reveal reveal-left">

            <div class="stars">
                ★★★★★
            </div>

            <p>
                “Stock Connect makes finding livestock much
                easier. I can see the animal details and seller
                information before placing an order.”
            </p>

            <div class="person">

                <div class="person-avatar">
                    T
                </div>

                <div>

                    <strong>
                        Tunde A.
                    </strong>

                    <span>
                        Livestock Buyer
                    </span>

                </div>

            </div>

        </div>


        <div class="testimonial reveal reveal-up">

            <div class="stars">
                ★★★★★
            </div>

            <p>
                “The marketplace gives farmers a better way
                to connect with serious buyers without relying
                only on physical markets.”
            </p>

            <div class="person">

                <div class="person-avatar">
                    A
                </div>

                <div>

                    <strong>
                        Ahmed K.
                    </strong>

                    <span>
                        Farmer
                    </span>

                </div>

            </div>

        </div>


        <div class="testimonial reveal reveal-right">

            <div class="stars">
                ★★★★★
            </div>

            <p>
                “Being able to review livestock listings and
                seller ratings makes the buying process feel
                much more transparent.”
            </p>

            <div class="person">

                <div class="person-avatar">
                    M
                </div>

                <div>

                    <strong>
                        Michael O.
                    </strong>

                    <span>
                        Commercial Buyer
                    </span>

                </div>

            </div>

        </div>


    </div>

</section>

@endsection