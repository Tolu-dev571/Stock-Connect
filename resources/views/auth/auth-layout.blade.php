<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Stock Connect | @yield('page-title')
    </title>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

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
            --green-light: #69ef78;
            --green-dark: #0c5f27;
            --green-deep: #063d1b;

            --dark: #04180c;
            --dark-2: #062b15;
            --dark-3: #0a3a1b;

            --white: #ffffff;
            --soft: #f5faf6;

            --text: #122017;
            --muted: #7b8b80;

            --border: rgba(255,255,255,.12);

            --shadow:
                0 25px 70px rgba(0,0,0,.20);
        }


        html {
            scroll-behavior: smooth;
        }


        body {

            font-family: 'Inter', sans-serif;

            background: var(--dark);

            color: var(--white);

            overflow-x: hidden;
        }


        a {
            text-decoration: none;
            color: inherit;
        }


        button,
        input {
            font-family: inherit;
        }


        /* =========================================
           BACKGROUND BUBBLES
        ========================================= */

        .bubble-container {

            position: fixed;

            inset: 0;

            pointer-events: none;

            overflow: hidden;

            z-index: 0;
        }


        .bubble {

            position: absolute;

            border-radius: 50%;

            background: rgba(53,216,74,.08);

            filter: blur(1px);

            animation: bubbleFloat linear infinite;
        }


        .bubble:nth-child(1) {

            width: 180px;
            height: 180px;

            left: 5%;
            bottom: -200px;

            animation-duration: 18s;
        }


        .bubble:nth-child(2) {

            width: 90px;
            height: 90px;

            left: 28%;
            bottom: -100px;

            animation-duration: 13s;

            animation-delay: 2s;
        }


        .bubble:nth-child(3) {

            width: 240px;
            height: 240px;

            right: 5%;
            bottom: -250px;

            animation-duration: 22s;

            animation-delay: 4s;
        }


        .bubble:nth-child(4) {

            width: 120px;
            height: 120px;

            right: 30%;
            bottom: -150px;

            animation-duration: 16s;

            animation-delay: 7s;
        }


        .bubble:nth-child(5) {

            width: 55px;
            height: 55px;

            left: 60%;
            bottom: -80px;

            animation-duration: 11s;

            animation-delay: 5s;
        }


        @keyframes bubbleFloat {

            0% {

                transform:
                    translateY(0)
                    translateX(0)
                    scale(.8);

                opacity: 0;
            }

            15% {
                opacity: 1;
            }

            50% {

                transform:
                    translateY(-55vh)
                    translateX(35px)
                    scale(1);
            }

            100% {

                transform:
                    translateY(-120vh)
                    translateX(-45px)
                    scale(1.2);

                opacity: 0;
            }

        }


        /* =========================================
           NAVBAR
        ========================================= */

        .navbar {

            position: fixed;

            top: 0;
            left: 0;

            width: 100%;

            height: 76px;

            z-index: 1000;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 0 6%;

            background: rgba(4,24,12,.82);

            backdrop-filter: blur(18px);

            border-bottom: 1px solid rgba(255,255,255,.08);
        }


        .nav-logo {

            display: flex;

            align-items: center;

            gap: 10px;

            font-size: 20px;

            font-weight: 800;

            color: white;
        }


        .nav-logo img {

            width: 42px;

            height: 42px;

            object-fit: contain;
        }


        .nav-links {

            display: flex;

            align-items: center;

            gap: 30px;
        }


        .nav-links a {

            color: rgba(255,255,255,.75);

            font-size: 13px;

            transition: .25s ease;
        }


        .nav-links a:hover {

            color: var(--green-light);

            transform: translateY(-1px);
        }


        .nav-auth {

            display: flex;

            align-items: center;

            gap: 10px;
        }


        .nav-login {

            padding: 10px 17px;

            border: 1px solid rgba(255,255,255,.18);

            border-radius: 9px;

            font-size: 12px;

            transition: .25s ease;
        }


        .nav-login:hover {

            border-color: var(--green);

            color: var(--green-light);
        }


        .nav-register {

            padding: 10px 17px;

            background: var(--green);

            color: #05200d;

            border-radius: 9px;

            font-size: 12px;

            font-weight: 700;

            transition: .25s ease;
        }


        .nav-register:hover {

            background: var(--green-light);

            transform: translateY(-2px);

            box-shadow: 0 10px 25px rgba(53,216,74,.22);
        }


        /* =========================================
           HERO
        ========================================= */

        .hero {

            min-height: 850px;

            position: relative;

            display: grid;

            grid-template-columns: 1.05fr .95fr;

            align-items: center;

            gap: 50px;

            padding:
                130px 7%
                80px;

            overflow: hidden;

            background:

                radial-gradient(
                    circle at 15% 25%,
                    rgba(53,216,74,.17),
                    transparent 30%
                ),

                radial-gradient(
                    circle at 90% 70%,
                    rgba(31,122,51,.20),
                    transparent 30%
                ),

                linear-gradient(
                    135deg,
                    #03150a,
                    #062b15
                );
        }


        .hero-content {

            position: relative;

            z-index: 2;
        }


        .eyebrow {

            display: inline-flex;

            align-items: center;

            gap: 8px;

            padding: 8px 12px;

            border: 1px solid rgba(105,239,120,.25);

            background: rgba(53,216,74,.08);

            border-radius: 30px;

            color: var(--green-light);

            font-size: 10px;

            font-weight: 700;

            margin-bottom: 22px;
        }


        .eyebrow i {
            font-size: 9px;
        }


        .hero h1 {

            font-size: clamp(42px, 5vw, 70px);

            line-height: 1.02;

            letter-spacing: -2.8px;

            max-width: 760px;

            margin-bottom: 24px;
        }


        .hero h1 span {

            color: var(--green);

            position: relative;
        }


        .hero-text {

            max-width: 600px;

            color: rgba(255,255,255,.68);

            font-size: 15px;

            line-height: 1.8;

            margin-bottom: 32px;
        }


        .hero-actions {

            display: flex;

            align-items: center;

            gap: 12px;

            flex-wrap: wrap;
        }


        .primary-button {

            display: inline-flex;

            align-items: center;

            gap: 9px;

            padding: 14px 21px;

            border-radius: 10px;

            background: var(--green);

            color: #05200d;

            font-size: 12px;

            font-weight: 800;

            transition: .25s ease;

            box-shadow:
                0 12px 30px
                rgba(53,216,74,.20);
        }


        .primary-button:hover {

            transform: translateY(-3px);

            background: var(--green-light);

            box-shadow:
                0 18px 35px
                rgba(53,216,74,.28);
        }


        .secondary-button {

            display: inline-flex;

            align-items: center;

            gap: 9px;

            padding: 14px 21px;

            border: 1px solid rgba(255,255,255,.15);

            border-radius: 10px;

            color: white;

            font-size: 12px;

            transition: .25s ease;
        }


        .secondary-button:hover {

            border-color: var(--green);

            color: var(--green-light);

            transform: translateY(-3px);
        }


        .hero-trust {

            display: flex;

            gap: 22px;

            margin-top: 35px;

            flex-wrap: wrap;
        }


        .hero-trust-item {

            display: flex;

            align-items: center;

            gap: 8px;

            color: rgba(255,255,255,.65);

            font-size: 10px;
        }


        .hero-trust-item i {

            color: var(--green);

            font-size: 13px;
        }


        /* HERO IMAGE */

        .hero-visual {

            position: relative;

            z-index: 2;

            min-height: 560px;

            display: flex;

            align-items: center;

            justify-content: center;
        }


        .hero-image-card {

            width: min(100%, 530px);

            height: 570px;

            border-radius: 28px;

            overflow: hidden;

            position: relative;

            box-shadow: var(--shadow);

            border: 1px solid rgba(255,255,255,.12);

            transform: rotate(1.5deg);

            transition: .5s ease;
        }


        .hero-image-card:hover {

            transform:
                rotate(0deg)
                translateY(-8px);
        }


        .hero-image-card img {

            width: 100%;
            height: 100%;

            object-fit: cover;
        }


        .hero-image-overlay {

            position: absolute;

            inset: 0;

            background:
                linear-gradient(
                    to top,
                    rgba(0,20,8,.82),
                    transparent 55%
                );
        }


        .floating-card {

            position: absolute;

            z-index: 5;

            background: rgba(255,255,255,.96);

            color: var(--text);

            border-radius: 15px;

            padding: 14px;

            box-shadow: 0 20px 50px rgba(0,0,0,.22);

            animation: cardFloat 4s ease-in-out infinite;
        }


        .floating-card.one {

            left: -35px;

            bottom: 80px;
        }


        .floating-card.two {

            right: -20px;

            top: 80px;

            animation-delay: 1.3s;
        }


        .floating-card-icon {

            width: 35px;

            height: 35px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 10px;

            background: #eaf9ed;

            color: var(--green-dark);

            float: left;

            margin-right: 9px;
        }


        .floating-card strong {

            display: block;

            font-size: 11px;

            margin-top: 3px;
        }


        .floating-card span {

            color: #7a887d;

            font-size: 9px;
        }


        @keyframes cardFloat {

            0%,100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }


        /* =========================================
           TRUST
        ========================================= */

        .trust-section {

            background: white;

            color: var(--text);

            padding: 55px 7%;
        }


        .trust-grid {

            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 18px;
        }


        .trust-card {

            display: flex;

            align-items: center;

            gap: 15px;

            padding: 20px;

            border: 1px solid #e5ebe6;

            border-radius: 14px;

            background: #fff;

            transition: .3s ease;
        }


        .trust-card:hover {

            transform: translateY(-5px);

            box-shadow:
                0 15px 35px rgba(0,0,0,.06);
        }


        .trust-icon {

            min-width: 46px;

            height: 46px;

            display: flex;

            align-items: center;

            justify-content: center;

            background: #eaf9ed;

            color: var(--green-dark);

            border-radius: 12px;

            font-size: 17px;
        }


        .trust-card strong {

            display: block;

            font-size: 12px;

            margin-bottom: 4px;
        }


        .trust-card span {

            display: block;

            font-size: 10px;

            color: var(--muted);

            line-height: 1.5;
        }


        /* =========================================
           SECTION
        ========================================= */

        .section {

            padding: 90px 7%;

            background: var(--soft);

            color: var(--text);
        }


        .section.dark {

            background:
                linear-gradient(
                    135deg,
                    #04180c,
                    #082d16
                );

            color: white;
        }


        .section-heading {

            text-align: center;

            max-width: 650px;

            margin:
                0 auto
                50px;
        }


        .section-heading .small-title {

            color: var(--green-dark);

            text-transform: uppercase;

            letter-spacing: 1.5px;

            font-size: 10px;

            font-weight: 800;

            margin-bottom: 10px;
        }


        .dark .section-heading .small-title {

            color: var(--green-light);
        }


        .section-heading h2 {

            font-size: clamp(27px, 3vw, 40px);

            letter-spacing: -1px;

            margin-bottom: 12px;
        }


        .section-heading p {

            color: var(--muted);

            font-size: 12px;

            line-height: 1.7;
        }


        .dark .section-heading p {

            color: rgba(255,255,255,.6);
        }


        /* =========================================
           CATEGORIES
        ========================================= */

        .category-grid {

            display: grid;

            grid-template-columns:
                repeat(5, 1fr);

            gap: 15px;
        }


        .category-card {

            background: white;

            border-radius: 16px;

            overflow: hidden;

            border: 1px solid #e4eae5;

            transition: .3s ease;

            cursor: pointer;
        }


        .category-card:hover {

            transform: translateY(-8px);

            box-shadow:
                0 20px 40px rgba(0,0,0,.08);
        }


        .category-image {

            height: 145px;

            overflow: hidden;
        }


        .category-image img {

            width: 100%;
            height: 100%;

            object-fit: cover;

            transition: .5s ease;
        }


        .category-card:hover
        .category-image img {

            transform: scale(1.08);
        }


        .category-content {

            padding: 14px;
        }


        .category-content h3 {

            font-size: 13px;

            margin-bottom: 5px;
        }


        .category-content span {

            color: var(--muted);

            font-size: 9px;
        }


        .category-price {

            display: block;

            color: var(--green-dark) !important;

            font-weight: 800;

            margin-top: 10px;
        }


        /* =========================================
           HOW IT WORKS
        ========================================= */

        .steps {

            display: grid;

            grid-template-columns:
                repeat(3,1fr);

            gap: 22px;

            max-width: 1000px;

            margin: auto;
        }


        .step {

            text-align: center;

            padding: 28px;

            border-radius: 17px;

            background: rgba(255,255,255,.05);

            border: 1px solid rgba(255,255,255,.08);

            transition: .3s ease;
        }


        .step:hover {

            background: rgba(53,216,74,.08);

            transform: translateY(-7px);

            border-color:
                rgba(53,216,74,.22);
        }


        .step-number {

            width: 52px;
            height: 52px;

            border-radius: 50%;

            margin:
                0 auto
                18px;

            display: flex;

            align-items: center;

            justify-content: center;

            background: var(--green);

            color: #05200d;

            font-size: 15px;

            font-weight: 900;
        }


        .step h3 {

            font-size: 14px;

            margin-bottom: 8px;
        }


        .step p {

            color: rgba(255,255,255,.55);

            font-size: 10px;

            line-height: 1.7;
        }


        /* =========================================
           FEATURED LISTINGS
        ========================================= */

        .listing-grid {

            display: grid;

            grid-template-columns:
                repeat(4,1fr);

            gap: 18px;
        }


        .listing-card {

            background: white;

            color: var(--text);

            border-radius: 16px;

            overflow: hidden;

            border: 1px solid #e5ebe6;

            transition: .3s ease;
        }


        .listing-card:hover {

            transform: translateY(-7px);

            box-shadow:
                0 18px 40px rgba(0,0,0,.08);
        }


        .listing-image {

            height: 190px;

            position: relative;

            overflow: hidden;
        }


        .listing-image img {

            width: 100%;
            height: 100%;

            object-fit: cover;

            transition: .5s ease;
        }


        .listing-card:hover
        .listing-image img {

            transform: scale(1.07);
        }


        .listing-tag {

            position: absolute;

            top: 10px;
            left: 10px;

            padding: 5px 8px;

            background: var(--green);

            color: #05200d;

            border-radius: 20px;

            font-size: 8px;

            font-weight: 800;
        }


        .listing-content {

            padding: 16px;
        }


        .listing-content h3 {

            font-size: 14px;

            margin-bottom: 7px;
        }


        .listing-meta {

            display: grid;

            grid-template-columns:
                1fr 1fr;

            gap: 7px;

            margin: 12px 0;
        }


        .meta {

            color: var(--muted);

            font-size: 9px;
        }


        .meta i {

            color: var(--green-dark);

            margin-right: 4px;
        }


        .listing-bottom {

            display: flex;

            justify-content: space-between;

            align-items: center;

            padding-top: 12px;

            border-top: 1px solid #edf0ed;
        }


        .listing-price {

            color: var(--green-dark);

            font-weight: 800;

            font-size: 13px;
        }


        .seller-rating {

            color: #d69b20;

            font-size: 9px;
        }


        /* =========================================
           TESTIMONIALS
        ========================================= */

        .testimonial-grid {

            display: grid;

            grid-template-columns:
                repeat(3,1fr);

            gap: 20px;
        }


        .testimonial {

            background: white;

            color: var(--text);

            border-radius: 17px;

            padding: 25px;

            border: 1px solid #e5ebe6;

            transition: .3s ease;
        }


        .testimonial:hover {

            transform: translateY(-5px);
        }


        .stars {

            color: #e8aa2d;

            font-size: 11px;

            margin-bottom: 15px;
        }


        .testimonial p {

            color: #657169;

            font-size: 11px;

            line-height: 1.8;

            margin-bottom: 20px;
        }


        .person {

            display: flex;

            align-items: center;

            gap: 10px;
        }


        .person-avatar {

            width: 38px;
            height: 38px;

            border-radius: 50%;

            background: var(--green-soft);

            color: var(--green-dark);

            display: flex;

            align-items: center;

            justify-content: center;

            font-weight: 800;
        }


        .person strong {

            display: block;

            font-size: 11px;
        }


        .person span {

            color: var(--muted);

            font-size: 9px;
        }


        /* =========================================
           AUTH AREA
        ========================================= */

        .auth-section {

            min-height: 100vh;

            padding:
                130px 7%
                80px;

            display: flex;

            align-items: center;

            justify-content: center;

            background:
                radial-gradient(
                    circle at 20% 30%,
                    rgba(53,216,74,.14),
                    transparent 35%
                ),
                #04180c;
        }


        .auth-wrapper {

            width: 100%;

            max-width: 1050px;

            display: grid;

            grid-template-columns:
                1fr 420px;

            gap: 50px;

            align-items: center;
        }


        .auth-intro h1 {

            font-size: clamp(35px, 4vw, 55px);

            line-height: 1.05;

            letter-spacing: -2px;

            margin-bottom: 18px;
        }


        .auth-intro h1 span {

            color: var(--green);
        }


        .auth-intro p {

            color: rgba(255,255,255,.62);

            line-height: 1.8;

            font-size: 13px;

            max-width: 530px;
        }


        .auth-features {

            display: grid;

            grid-template-columns:
                1fr 1fr;

            gap: 12px;

            margin-top: 28px;
        }


        .auth-feature {

            display: flex;

            align-items: center;

            gap: 9px;

            font-size: 10px;

            color: rgba(255,255,255,.7);
        }


        .auth-feature i {

            color: var(--green);

            font-size: 12px;
        }


        .auth-card {

            background: white;

            color: var(--text);

            border-radius: 22px;

            padding: 32px;

            box-shadow:
                0 30px 80px rgba(0,0,0,.28);
        }


        .auth-card-logo {

            display: flex;

            align-items: center;

            gap: 9px;

            margin-bottom: 25px;
        }


        .auth-card-logo img {

            width: 38px;
            height: 38px;

            object-fit: contain;
        }


        .auth-card-logo strong {

            color: var(--green-dark);

            font-size: 16px;
        }


        .auth-card h2 {

            font-size: 25px;

            margin-bottom: 7px;
        }


        .auth-card-subtitle {

            color: var(--muted);

            font-size: 10px;

            margin-bottom: 23px;

            line-height: 1.6;
        }


        .form-group {

            margin-bottom: 16px;
        }


        .form-group label {

            display: block;

            font-size: 10px;

            font-weight: 700;

            margin-bottom: 7px;
        }


        .input-wrapper {

            position: relative;
        }


        .input-wrapper i {

            position: absolute;

            left: 13px;

            top: 50%;

            transform: translateY(-50%);

            color: #8b968e;

            font-size: 12px;
        }


        .form-input {

            width: 100%;

            height: 46px;

            border: 1px solid #dfe6e1;

            border-radius: 9px;

            padding:
                0 13px 0 38px;

            outline: none;

            font-size: 11px;

            transition: .2s ease;

            background: #fbfdfb;
        }


        .form-input:focus {

            border-color: var(--green);

            background: white;

            box-shadow:
                0 0 0 3px
                rgba(53,216,74,.10);
        }


        .form-options {

            display: flex;

            align-items: center;

            justify-content: space-between;

            margin: 3px 0 20px;
        }


        .remember {

            display: flex;

            align-items: center;

            gap: 6px;

            color: var(--muted);

            font-size: 9px;
        }


        .remember input {

            accent-color: var(--green-dark);
        }


        .forgot {

            color: var(--green-dark);

            font-size: 9px;

            font-weight: 700;
        }


        .auth-submit {

            width: 100%;

            height: 46px;

            border: none;

            border-radius: 9px;

            background: var(--green-dark);

            color: white;

            font-weight: 800;

            font-size: 11px;

            cursor: pointer;

            transition: .25s ease;
        }


        .auth-submit:hover {

            background: var(--green);

            color: #05200d;

            transform: translateY(-2px);

            box-shadow:
                0 12px 25px
                rgba(53,216,74,.20);
        }


        .auth-switch {

            text-align: center;

            margin-top: 20px;

            color: var(--muted);

            font-size: 10px;
        }


        .auth-switch a {

            color: var(--green-dark);

            font-weight: 800;
        }


        .errors {

            padding: 12px;

            border-radius: 9px;

            background: #fff0f0;

            border: 1px solid #ffd4d4;

            color: #b83c3c;

            margin-bottom: 17px;

            font-size: 10px;

            line-height: 1.7;
        }


        /* =========================================
           FOOTER
        ========================================= */

        footer {

            background: #021108;

            padding: 35px 7%;

            text-align: center;

            color: rgba(255,255,255,.45);

            font-size: 10px;
        }


        footer strong {

            color: var(--green);
        }


        /* =========================================
           REVEAL ANIMATIONS
        ========================================= */

        .reveal {

            opacity: 0;

            transition:
                opacity .8s ease,
                transform .8s cubic-bezier(.2,.8,.2,1);
        }


        .reveal-left {

            transform: translateX(-80px);
        }


        .reveal-right {

            transform: translateX(80px);
        }


        .reveal-up {

            transform: translateY(60px);
        }


        .reveal.show {

            opacity: 1;

            transform: translate(0);
        }


        /* =========================================
           MOBILE
        ========================================= */

        @media(max-width: 1050px) {

            .hero {

                grid-template-columns: 1fr;

                padding-top: 120px;
            }


            .hero-content {

                text-align: center;
            }


            .hero-text {

                margin-left: auto;
                margin-right: auto;
            }


            .hero-actions,
            .hero-trust {

                justify-content: center;
            }


            .hero-visual {

                min-height: 500px;
            }


            .category-grid {

                grid-template-columns:
                    repeat(3,1fr);
            }


            .listing-grid {

                grid-template-columns:
                    repeat(2,1fr);
            }


            .auth-wrapper {

                grid-template-columns: 1fr 420px;
            }

        }


        @media(max-width: 800px) {

            .nav-links {

                display: none;
            }


            .navbar {

                padding: 0 20px;
            }


            .hero {

                padding:
                    110px 20px
                    70px;
            }


            .trust-section,
            .section {

                padding:
                    65px 20px;
            }


            .trust-grid {

                grid-template-columns: 1fr;
            }


            .category-grid {

                grid-template-columns:
                    repeat(2,1fr);
            }


            .steps {

                grid-template-columns: 1fr;
            }


            .testimonial-grid {

                grid-template-columns: 1fr;
            }


            .auth-section {

                padding:
                    110px 20px
                    60px;
            }


            .auth-wrapper {

                grid-template-columns: 1fr;
            }


            .auth-intro {

                text-align: center;
            }


            .auth-intro p {

                margin: auto;
            }


            .auth-features {

                justify-content: center;
            }


            .floating-card {

                display: none;
            }

        }


        @media(max-width: 500px) {

            .nav-auth .nav-login {

                display: none;
            }


            .nav-register {

                padding: 9px 12px;

                font-size: 10px;
            }


            .hero h1 {

                font-size: 38px;
            }


            .hero-image-card {

                height: 430px;
            }


            .category-grid,
            .listing-grid {

                grid-template-columns: 1fr;
            }


            .auth-card {

                padding: 23px;

                border-radius: 17px;
            }


            .auth-features {

                grid-template-columns: 1fr;
            }

        }

    </style>

</head>


<body>


<!-- =========================================
     BUBBLES
========================================= -->

<div class="bubble-container">

    <span class="bubble"></span>
    <span class="bubble"></span>
    <span class="bubble"></span>
    <span class="bubble"></span>
    <span class="bubble"></span>

</div>


<!-- =========================================
     NAVBAR
========================================= -->

<nav class="navbar">


    <a
        href="{{ route('home') }}"
        class="nav-logo"
    >

        <img
            src="{{ asset('images/stock-connect-logo.png') }}"
            alt="Stock Connect"
        >

        <span>
            Stock Connect
        </span>

    </a>


    <div class="nav-links">

        <a href="#categories">
            Categories
        </a>

        <a href="#how-it-works">
            How It Works
        </a>

        <a href="#featured">
            Marketplace
        </a>

        <a href="#reviews">
            Reviews
        </a>

    </div>


    <div class="nav-auth">

        <a
            href="{{ route('login') }}"
            class="nav-login"
        >
            Login
        </a>

        <a
            href="{{ route('register') }}"
            class="nav-register"
        >
            Get Started
        </a>

    </div>


</nav>


@yield('content')


<footer>

    © {{ date('Y') }}

    <strong>
        Stock Connect
    </strong>

    — Connecting buyers with trusted livestock sellers.

</footer>


<script>

    /* =========================================
       SCROLL REVEAL
    ========================================= */

    const revealElements =
        document.querySelectorAll('.reveal');


    const observer =
        new IntersectionObserver(
            entries => {

                entries.forEach(entry => {

                    if (entry.isIntersecting) {

                        entry.target.classList.add('show');

                        observer.unobserve(entry.target);

                    }

                });

            },
            {
                threshold: .12
            }
        );


    revealElements.forEach(element => {

        observer.observe(element);

    });


    /* =========================================
       LIVESTOCK IMAGE API STRUCTURE
    ========================================= */

    const livestockImages = {

        cattle:
            'https://loremflickr.com/900/650/cow,cattle?lock=21',

        sheep:
            'https://loremflickr.com/900/650/sheep?lock=22',

        goats:
            'https://loremflickr.com/900/650/goat?lock=23',

        pigs:
            'https://loremflickr.com/900/650/pig?lock=24',

        poultry:
            'https://loremflickr.com/900/650/chicken,poultry?lock=25',

        farm:
            'https://loremflickr.com/1200/900/farm,livestock?lock=26'

    };


    /*
     * This function allows us to later replace
     * LoremFlickr with a real livestock image API.
     */

    function livestockImage(category) {

        return livestockImages[category]
            || livestockImages.farm;

    }


    document
        .querySelectorAll('[data-livestock]')
        .forEach(image => {

            const category =
                image.dataset.livestock;

            image.src =
                livestockImage(category);

            image.onerror = function () {

                this.src =
                    livestockImages.farm;

            };

        });


    /* =========================================
       IMAGE LAZY LOADING
    ========================================= */

    document
        .querySelectorAll('img')
        .forEach(image => {

            image.loading = 'lazy';

        });


    /* =========================================
       MOBILE NAV SCROLL
    ========================================= */

    document
        .querySelectorAll('.nav-links a')
        .forEach(link => {

            link.addEventListener(
                'click',
                () => {

                    document
                        .querySelector('.nav-links')
                        ?.classList.remove('open');

                }
            );

        });

</script>


</body>

</html>