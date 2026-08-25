<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'Stock Connect | Livestock Marketplace')
    </title>

    {{-- =====================================================
         POPPINS FONT
    ====================================================== --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    {{-- =====================================================
         FONT AWESOME
    ====================================================== --}}
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    >

    {{-- =====================================================
         GLOBAL STYLES
    ====================================================== --}}
    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --green: #35d84a;
            --green-dark: #239638;
            --green-deep: #0d3b1c;
            --green-soft: #eaf9ed;

            --black: #101512;
            --text: #17201a;
            --muted: #748078;

            --white: #ffffff;
            --background: #f7f9f7;

            --border: #e8eee9;

            --shadow: 0 15px 45px rgba(22, 49, 29, .08);
            --shadow-hover: 0 25px 60px rgba(22, 49, 29, .15);
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--background);
            color: var(--text);
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button,
        input,
        textarea,
        select {
            font-family: inherit;
        }

        .container {
            width: min(1180px, 92%);
            margin: auto;
        }


        /* =====================================================
           CUSTOMER NAVBAR
        ====================================================== */

        .navbar {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: rgba(255, 255, 255, .96);
            backdrop-filter: blur(18px);
            border-bottom: 1px solid rgba(232, 238, 233, .8);
            transition: .3s ease;
        }

        .navbar.scrolled {
            box-shadow: 0 8px 30px rgba(0, 0, 0, .07);
        }

        .nav-inner {
            min-height: 78px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 25px;
        }

        .logo {
    display: flex;
    align-items: center;
    gap: 10px;
    text-decoration: none;
}



.brand-name {
    font-weight: 1000;
    font-size: 25px;
    color: #17201a;
    line-height: 1;
    white-space: nowrap;
    color: #17201a
}
        .nav-links {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .nav-links a {
            position: relative;
            color: #59645d;
            font-size: 13px;
            font-weight: 500;
            transition: .25s ease;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -9px;
            width: 0;
            height: 2px;
            border-radius: 10px;
            background: var(--green);
            transition: .25s ease;
        }

        .nav-links a:hover {
            color: var(--green-dark);
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .nav-user {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: var(--green-soft);
            color: var(--green-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 13px;
            flex-shrink: 0;
        }

        .user-name {
            font-size: 12px;
            font-weight: 600;
        }

        .nav-auth {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .login-button,
        .register-button,
        .logout-button {
            border: none;
            cursor: pointer;
            font-family: inherit;
            font-size: 12px;
            font-weight: 600;
            border-radius: 9px;
            padding: 10px 14px;
            transition: .25s ease;
        }

        .login-button {
            color: var(--green-dark);
            background: var(--green-soft);
        }

        .register-button,
        .logout-button {
            color: white;
            background: var(--green);
        }

        .login-button:hover {
            background: var(--green);
            color: white;
        }

        .register-button:hover,
        .logout-button:hover {
            background: var(--green-dark);
            transform: translateY(-2px);
        }

        .mobile-menu {
            display: none;
            border: none;
            background: transparent;
            font-size: 22px;
            cursor: pointer;
            color: var(--text);
        }

.logo {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    text-decoration: none;
    color: #17201a;
    flex-shrink: 0;
}

.brand-logo {
    width: 70px !important;
    height: 70px !important;
    max-width: 70px !important;
    max-height: 70px !important;
    object-fit: contain;
    display: block;
    flex-shrink: 0;
}


        /* =====================================================
           GLOBAL FOOTER
        ====================================================== */

        .site-footer {
            background: #101712;
            color: white;
            margin-top: 0;
        }

        .footer-container {
            width: min(1180px, 92%);
            margin: auto;
        }

        .footer-main {
            display: grid;
            grid-template-columns: 1.5fr 1fr 1fr 1fr;
            gap: 50px;
            padding: 70px 0 55px;
        }

        .footer-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 18px;
            font-size: 18px;
            font-weight: 700;
        }

        .footer-logo-icon {
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            background: #35d84a;
            color: white;
        }

        .footer-brand p {
            max-width: 330px;
            color: #9ba69e;
            font-size: 11px;
            line-height: 1.8;
        }

        .footer-socials {
            display: flex;
            gap: 9px;
            margin-top: 22px;
        }

        .footer-socials a {
            width: 34px;
            height: 34px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #26332a;
            border-radius: 9px;
            color: #a9b2ac;
            font-size: 12px;
            transition: .25s ease;
        }

        .footer-socials a:hover {
            background: #35d84a;
            border-color: #35d84a;
            color: white;
            transform: translateY(-3px);
        }

        .footer-column {
            display: flex;
            flex-direction: column;
            gap: 11px;
        }

        .footer-column h4 {
            margin-bottom: 8px;
            color: white;
            font-size: 12px;
            font-weight: 650;
        }

        .footer-column a {
            color: #8f9a92;
            font-size: 11px;
            transition: .2s ease;
        }

        .footer-column a:hover {
            color: #35d84a;
            transform: translateX(3px);
        }

        .footer-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
            border-top: 1px solid #253028;
            color: #78837b;
            font-size: 10px;
        }

        .footer-bottom p {
            margin: 0;
        }

        .footer-bottom span {
            color: #657069;
        }


        /* =====================================================
           RESPONSIVE NAVBAR
        ====================================================== */

        @media (max-width: 950px) {

            .nav-links {
                display: none;
            }

            .mobile-menu {
                display: block;
            }

            .nav-links.mobile-open {
                display: flex;
                position: absolute;
                top: 78px;
                left: 0;
                right: 0;

                flex-direction: column;
                align-items: flex-start;
                gap: 0;

                background: white;
                padding: 15px 4% 20px;

                border-bottom: 1px solid var(--border);
                box-shadow: 0 15px 30px rgba(0, 0, 0, .08);
            }

            .nav-links.mobile-open a {
                width: 100%;
                padding: 13px 0;
            }

            .nav-links.mobile-open a::after {
                display: none;
            }

            .footer-main {
                grid-template-columns: 1fr 1fr;
            }
        }


        @media (max-width: 650px) {

            .nav-inner {
                min-height: 68px;
            }

            .nav-user .user-name {
                display: none;
            }

            .nav-auth {
                gap: 6px;
            }

            .login-button,
            .register-button,
            .logout-button {
                padding: 8px 10px;
                font-size: 11px;
            }

            .footer-main {
                grid-template-columns: 1fr;
                gap: 35px;
            }

            .footer-bottom {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }
        }

    </style>

    {{-- Page-specific CSS --}}
    @yield('styles')

</head>


<body>


{{-- =====================================================
     CUSTOMER NAVBAR
====================================================== --}}

<nav class="navbar" id="navbar">

    <div class="container nav-inner">

        <a
            href="{{ route('home') }}"
            class="logo"
        >
                <img
                src="{{ asset('images/stock-connect-logo.png') }}"
                class="brand-logo"
                alt="Stock Connect Logo"
            >

        <span class="brand-name">
            Stock Connect
        </span> 
        </a>


        <div class="nav-links">

            <a href="{{ route('home') }}">
                Home
            </a>

            <a href="{{ route('customer.livestock') }}">
                Shop
            </a>

            <a href="{{ route('customer.livestock') }}">
                Categories
            </a>

            <a href="{{ route('orders.my') }}">
                My Orders
            </a>

        </div>


        @auth

            <div class="nav-user">

                <div class="user-avatar">

                    {{ strtoupper(
                        substr(auth()->user()->name, 0, 1)
                    ) }}

                </div>

                <span class="user-name">
                    {{ auth()->user()->name }}
                </span>

                <form
                    action="{{ route('logout') }}"
                    method="POST"
                    style="margin:0;"
                >

                    @csrf

                    <button
                        type="submit"
                        class="logout-button"
                    >
                        Logout
                    </button>

                </form>

            </div>

        @else

            <div class="nav-auth">

                <a
                    href="{{ route('login') }}"
                    class="login-button"
                >
                    Login
                </a>

                <a
                    href="{{ route('register') }}"
                    class="register-button"
                >
                    Register
                </a>

            </div>

        @endauth


        <button
            class="mobile-menu"
            id="mobileMenu"
            type="button"
            aria-label="Open navigation menu"
            aria-expanded="false"
        >

            <i class="fa-solid fa-bars"></i>

        </button>

    </div>

</nav>


{{-- =====================================================
     PAGE CONTENT
====================================================== --}}

<main>

    @yield('content')

</main>


{{-- =====================================================
     GLOBAL FOOTER
====================================================== --}}

<footer class="site-footer">

    <div class="footer-container">

        <div class="footer-main">


            <div class="footer-brand">

                <div class="footer-logo">

                    <div class="brand-logo">
                         <img
                src="{{ asset('images/stock-connect-logo.png') }}"
                class="brand-logo"
                alt="Stock Connect Logo"
            >
                    </div>

                    <span>
                        Stock Connect
                    </span>

                </div>


                <p>
                    A modern livestock marketplace connecting buyers
                    with quality livestock in a simple and trusted way.
                </p>


                <div class="footer-socials">

                    <a href="#" aria-label="Facebook">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>

                    <a href="#" aria-label="Instagram">
                        <i class="fa-brands fa-instagram"></i>
                    </a>

                    <a href="#" aria-label="Twitter">
                        <i class="fa-brands fa-x-twitter"></i>
                    </a>

                    <a href="#" aria-label="WhatsApp">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>

                </div>

            </div>


            <div class="footer-column">

                <h4>
                    Marketplace
                </h4>

                <a href="{{ route('customer.livestock') }}">
                    Shop Livestock
                </a>

                <a href="{{ route('orders.my') }}">
                    My Orders
                </a>

                <a href="{{ route('customer.livestock') }}">
                    Browse Categories
                </a>

            </div>


            <div class="footer-column">

                <h4>
                    Support
                </h4>

                <a href="#">
                    Contact Us
                </a>

                <a href="{{ route('home') }}#contact">
                    Help Center
                </a>

                <a href="#">
                    Delivery Information
                </a>

                <a href="#">
                    Payment Information
                </a>

            </div>


            <div class="footer-column">

                <h4>
                    Stock Connect
                </h4>

                <a href="#">
                    About Us
                </a>

                <a href="#">
                    How It Works
                </a>

                <a href="#">
                    Terms of Service
                </a>

                <a href="#">
                    Privacy Policy
                </a>

            </div>

        </div>


        <div class="footer-bottom">

            <p>
                © {{ date('Y') }} Stock Connect.
                All rights reserved.
            </p>

            <span>
                Built for a better livestock marketplace.
            </span>

        </div>

    </div>

</footer>


{{-- =====================================================
     GLOBAL JAVASCRIPT
====================================================== --}}

<script>

    /* =====================================================
       NAVBAR SCROLL
    ====================================================== */

    const navbar = document.getElementById('navbar');

    if (navbar) {

        window.addEventListener('scroll', function () {

            if (window.scrollY > 30) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }

        });

    }


    /* =====================================================
       MOBILE MENU
    ====================================================== */

    const mobileMenu =
        document.getElementById('mobileMenu');

    const navLinks =
        document.querySelector('.nav-links');


    if (mobileMenu && navLinks) {

        mobileMenu.addEventListener('click', function () {

            const isOpen =
                navLinks.classList.toggle('mobile-open');

            mobileMenu.setAttribute(
                'aria-expanded',
                isOpen ? 'true' : 'false'
            );


            const icon =
                mobileMenu.querySelector('i');


            if (icon) {

                icon.classList.toggle(
                    'fa-bars',
                    !isOpen
                );

                icon.classList.toggle(
                    'fa-xmark',
                    isOpen
                );

            }

        });


        navLinks.querySelectorAll('a').forEach(function (link) {

            link.addEventListener('click', function () {

                navLinks.classList.remove('mobile-open');

                mobileMenu.setAttribute(
                    'aria-expanded',
                    'false'
                );


                const icon =
                    mobileMenu.querySelector('i');


                if (icon) {

                    icon.classList.remove('fa-xmark');

                    icon.classList.add('fa-bars');

                }

            });

        });

    }

</script>


{{-- Page-specific JavaScript --}}
@yield('scripts')


</body>

</html>