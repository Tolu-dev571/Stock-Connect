@extends('layouts.app')

@section('title', 'Stock Connect | Livestock Marketplace')


@section('styles')

<style>

    /* =====================================================
       HOME GLOBAL
    ====================================================== */

    .home-page {
        overflow: hidden;
    }

    .home-page .container {
        width: min(1180px, 92%);
        margin: auto;
    }


    /* =====================================================
       HERO
    ====================================================== */

    .hero-wrapper {
        padding-top: 35px;
    }

    .hero {
        min-height: 535px;
        border-radius: 28px;
        overflow: hidden;
        position: relative;

        background:
            radial-gradient(
                circle at 85% 20%,
                rgba(53, 216, 74, .35),
                transparent 25%
            ),
            linear-gradient(
                110deg,
                #101a14,
                #103b20 55%,
                #1e9d39
            );

        color: white;

        display: flex;
        align-items: center;
        padding: 70px;
    }

    .hero-content {
        max-width: 650px;
        position: relative;
        z-index: 5;
        animation: heroIn .8s ease forwards;
    }

    @keyframes heroIn {

        from {
            opacity: 0;
            transform: translateY(25px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }

    }

    .hero-label {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #9affaa;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .8px;
        margin-bottom: 20px;
    }

    .hero-label span {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: var(--green);
    }

    .hero h1 {
        font-size: clamp(42px, 6vw, 68px);
        line-height: 1.08;
        letter-spacing: -2px;
        font-weight: 800;
        margin-bottom: 22px;
    }

    .hero h1 span {
        color: var(--green);
    }

    .hero-description {
        max-width: 570px;
        color: rgba(255, 255, 255, .75);
        font-size: 16px;
        line-height: 1.8;
        margin-bottom: 30px;
    }

    .hero-search {
        max-width: 570px;
        background: white;
        border-radius: 14px;
        padding: 7px;
        display: flex;
        align-items: center;
        box-shadow: 0 20px 50px rgba(0, 0, 0, .2);
        transition: .3s ease;
    }

    .hero-search:focus-within {
        transform: translateY(-3px);
        box-shadow: 0 25px 60px rgba(0, 0, 0, .3);
    }

    .hero-search > i {
        color: #9aa39c;
        margin-left: 14px;
    }

    .hero-search input {
        flex: 1;
        border: none;
        outline: none;
        padding: 14px;
        font-size: 13px;
        color: var(--text);
        background: transparent;
    }

    .search-button {
        border: none;
        background: var(--green);
        color: white;
        padding: 14px 21px;
        border-radius: 10px;
        font-size: 12px;
        font-weight: 700;
        cursor: pointer;
        transition: .25s ease;
    }

    .search-button:hover {
        background: var(--green-dark);
        transform: scale(1.03);
    }

    .hero-decoration {
        position: absolute;
        right: -80px;
        bottom: -100px;
        width: 430px;
        height: 430px;
        border-radius: 50%;
        background: rgba(255, 255, 255, .06);
        animation: float 5s ease-in-out infinite;
    }

    .hero-decoration::before {
        content: '';
        position: absolute;
        inset: 45px;
        border-radius: 50%;
        border: 1px solid rgba(255, 255, 255, .12);
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-15px);
        }

    }


    /* =====================================================
       SECTIONS
    ====================================================== */

    .home-section {
        padding: 85px 0;
    }

    .section-header {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        margin-bottom: 30px;
    }

    .section-title {
        font-size: 30px;
        font-weight: 800;
        letter-spacing: -.8px;
        margin-bottom: 5px;
    }

    .section-subtitle {
        color: var(--muted);
        font-size: 14px;
    }

    .view-all {
        color: var(--green-dark);
        font-size: 13px;
        font-weight: 600;
    }


    /* =====================================================
       CATEGORIES
    ====================================================== */

    .categories {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 18px;
    }

    .category-card {
        background: white;
        border: 1px solid var(--border);
        border-radius: 18px;
        padding: 25px;
        display: flex;
        align-items: center;
        gap: 17px;
        cursor: pointer;

        transition:
            transform .3s ease,
            box-shadow .3s ease,
            border-color .3s ease;
    }

    .category-card:hover {
        transform: translateY(-7px);
        box-shadow: var(--shadow-hover);
        border-color: rgba(53, 216, 74, .3);
    }

    .category-icon {
        width: 52px;
        height: 52px;
        border-radius: 14px;
        background: var(--green-soft);
        color: var(--green-dark);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        transition: .3s ease;
        flex-shrink: 0;
    }

    .category-card:hover .category-icon {
        transform: rotate(-6deg) scale(1.08);
    }

    .category-name {
        font-size: 15px;
        font-weight: 700;
        margin-bottom: 4px;
    }

    .category-description {
        color: var(--muted);
        font-size: 11px;
    }


    /* =====================================================
       PRODUCTS
    ====================================================== */

    .products {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 22px;
    }

    .product-card {
        background: white;
        border-radius: 18px;
        overflow: hidden;
        border: 1px solid var(--border);
        transition:
            transform .35s ease,
            box-shadow .35s ease;
        position: relative;
    }

    .product-card:hover {
        transform: translateY(-9px);
        box-shadow: var(--shadow-hover);
    }

    .product-image-wrapper {
        height: 230px;
        background: #edf5ef;
        overflow: hidden;
        position: relative;
    }

    .product-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .5s ease;
    }

    .product-card:hover .product-image {
        transform: scale(1.07);
    }

    .availability {
        position: absolute;
        top: 14px;
        left: 14px;
        background: white;
        color: var(--green-dark);
        padding: 7px 10px;
        border-radius: 30px;
        font-size: 10px;
        font-weight: 700;
        box-shadow: 0 5px 20px rgba(0, 0, 0, .1);
    }

    .product-body {
        padding: 19px;
    }

    .product-category {
        color: var(--green-dark);
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .5px;
        margin-bottom: 7px;
    }

    .product-name {
        font-size: 17px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .product-meta {
        color: var(--muted);
        font-size: 11px;
        margin-bottom: 18px;
    }

    .product-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
    }

    .product-price {
        font-size: 17px;
        font-weight: 800;
    }

    .product-button {
        border: none;
        background: var(--green-soft);
        color: var(--green-dark);
        padding: 10px 13px;
        border-radius: 9px;
        font-size: 11px;
        font-weight: 700;
        cursor: pointer;
        transition: .25s ease;
    }

    .product-button:hover {
        background: var(--green);
        color: white;
    }

/* =====================================================
   ABOUT STOCK CONNECT
====================================================== */

.about-section {
    padding: 90px 0;
    background: #f7faf8;
}

.about-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 55px;
    align-items: center;
}

.about-content {
    max-width: 600px;
}

.about-eyebrow {
    display: inline-block;
    margin-bottom: 12px;
    color: #269c38;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 1.5px;
}

.about-content h2 {
    margin: 0 0 18px;
    color: #17201a;
    font-size: clamp(30px, 4vw, 45px);
    line-height: 1.15;
    font-weight: 800;
    letter-spacing: -.8px;
}

.about-content h2 span {
    color: #269c38;
}

.about-content p {
    margin: 0 0 16px;
    color: #748078;
    font-size: 14px;
    line-height: 1.85;
}

.about-features {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 14px;
    margin-top: 28px;
}

.about-feature {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 15px;
    background: white;
    border: 1px solid #e5ece7;
    border-radius: 14px;
    transition: .3s ease;
}

.about-feature:hover {
    transform: translateY(-4px);
    border-color: #bfe7c6;
    box-shadow: 0 12px 30px rgba(30, 70, 40, .07);
}

.about-feature-icon {
    width: 40px;
    height: 40px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 11px;
    background: #eaf9ed;
    color: #269c38;
}

.about-feature h4 {
    margin: 0 0 3px;
    color: #17201a;
    font-size: 12px;
    font-weight: 700;
}

.about-feature p {
    margin: 0;
    color: #8a938c;
    font-size: 10px;
    line-height: 1.4;
}

.about-visual {
    position: relative;
    min-height: 390px;
    border-radius: 25px;
    overflow: hidden;
    background:
        radial-gradient(
            circle at 70% 25%,
            rgba(53, 216, 74, .28),
            transparent 30%
        ),
        linear-gradient(
            135deg,
            #102017,
            #17652c,
            #35d84a
        );
    display: flex;
    align-items: center;
    justify-content: center;
}

.about-visual::before {
    content: '';
    position: absolute;
    width: 280px;
    height: 280px;
    border: 1px solid rgba(255,255,255,.15);
    border-radius: 50%;
}

.about-visual::after {
    content: '';
    position: absolute;
    width: 190px;
    height: 190px;
    border: 1px solid rgba(255,255,255,.12);
    border-radius: 50%;
}

.about-visual-icon {
    position: relative;
    z-index: 2;
    width: 120px;
    height: 120px;
    border-radius: 35px;
    background: rgba(255,255,255,.12);
    border: 1px solid rgba(255,255,255,.18);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 52px;
    backdrop-filter: blur(10px);
    animation: aboutFloat 4s ease-in-out infinite;
}

@keyframes aboutFloat {
    0%, 100% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-12px);
    }
}

.about-badge {
    position: absolute;
    bottom: 25px;
    left: 25px;
    right: 25px;
    z-index: 3;
    padding: 18px;
    border-radius: 15px;
    background: rgba(255,255,255,.10);
    border: 1px solid rgba(255,255,255,.15);
    backdrop-filter: blur(10px);
    color: white;
}

.about-badge strong {
    display: block;
    margin-bottom: 4px;
    font-size: 15px;
}

.about-badge span {
    color: rgba(255,255,255,.7);
    font-size: 11px;
}


/* =====================================================
   FAQ
====================================================== */

.faq-section {
    padding: 90px 0;
    background: white;
}

.faq-heading {
    max-width: 650px;
    margin: 0 auto 45px;
    text-align: center;
}

.faq-eyebrow {
    display: inline-block;
    margin-bottom: 12px;
    color: #269c38;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 1.5px;
}

.faq-heading h2 {
    margin: 0 0 12px;
    color: #17201a;
    font-size: clamp(30px, 4vw, 45px);
    line-height: 1.15;
    font-weight: 800;
}

.faq-heading p {
    margin: 0;
    color: #7c867f;
    font-size: 14px;
    line-height: 1.8;
}

.faq-list {
    max-width: 850px;
    margin: auto;
}

.faq-item {
    border: 1px solid #e5ece7;
    border-radius: 15px;
    margin-bottom: 13px;
    overflow: hidden;
    background: white;
    transition: .3s ease;
}

.faq-item:hover {
    border-color: #bfe7c6;
}

.faq-question {
    width: 100%;
    border: none;
    background: transparent;
    padding: 20px 22px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    text-align: left;
    color: #17201a;
    font-size: 13px;
    font-weight: 700;
    cursor: pointer;
}

.faq-question i {
    width: 30px;
    height: 30px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 9px;
    background: #eaf9ed;
    color: #269c38;
    font-size: 11px;
    transition: .3s ease;
}

.faq-item.active .faq-question i {
    background: #35d84a;
    color: white;
    transform: rotate(45deg);
}

.faq-answer {
    max-height: 0;
    overflow: hidden;
    transition: max-height .35s ease;
}

.faq-answer-inner {
    padding: 0 22px 20px;
    color: #7c867f;
    font-size: 12px;
    line-height: 1.8;
}


/* =====================================================
   ABOUT + FAQ RESPONSIVE
====================================================== */

@media (max-width: 850px) {

    .about-grid {
        grid-template-columns: 1fr;
        gap: 35px;
    }

    .about-content {
        max-width: 100%;
    }

    .about-visual {
        min-height: 330px;
    }

}

@media (max-width: 550px) {

    .about-section,
    .faq-section {
        padding: 70px 0;
    }

    .about-features {
        grid-template-columns: 1fr;
    }

    .about-visual {
        min-height: 290px;
    }

    .faq-question {
        padding: 17px;
        font-size: 12px;
    }

    .faq-answer-inner {
        padding: 0 17px 18px;
    }

}

    /* =====================================================
       STATS
    ====================================================== */

    .stats-section {
        background: var(--green-deep);
        color: white;
        padding: 70px 0;
        margin-top: 20px;
    }

    .stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
        text-align: center;
    }

    .stat {
        padding: 15px;
        border-right: 1px solid rgba(255, 255, 255, .1);
    }

    .stat:last-child {
        border-right: none;
    }

    .stat-number {
        font-size: 42px;
        font-weight: 800;
        color: var(--green);
        margin-bottom: 5px;
    }

    .stat-label {
        color: rgba(255, 255, 255, .65);
        font-size: 13px;
    }


    /* =====================================================
       CTA
    ====================================================== */

    .cta-section {
        padding: 80px 0;
    }

    .cta {
        border-radius: 25px;
        padding: 60px;
        background: linear-gradient(
            120deg,
            #dff7e4,
            #f4fff5
        );

        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 30px;
    }

    .cta h2 {
        font-size: 30px;
        font-weight: 800;
        margin-bottom: 8px;
    }

    .cta p {
        color: var(--muted);
        font-size: 14px;
    }

    .cta-button {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: var(--green);
        color: white;
        padding: 14px 22px;
        border-radius: 10px;
        font-size: 12px;
        font-weight: 700;
        transition: .25s ease;
        white-space: nowrap;
    }

    .cta-button:hover {
        background: var(--green-dark);
        transform: translateY(-3px);
    }


    /* =====================================================
       CONTACT
    ====================================================== */

    .contact-section {
        padding: 110px 0 90px;
        background: #f7faf8;
    }

    .contact-heading {
        max-width: 650px;
        margin-bottom: 50px;
    }

    .contact-eyebrow {
        display: inline-block;
        margin-bottom: 12px;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 1.5px;
        color: #269c38;
    }

    .contact-heading h2 {
        margin: 0 0 12px;
        font-size: clamp(30px, 4vw, 46px);
        line-height: 1.15;
        font-weight: 750;
        color: #17201a;
    }

    .contact-heading p {
        margin: 0;
        font-size: 14px;
        line-height: 1.8;
        color: #7c867f;
    }

    .contact-grid {
        display: grid;
        grid-template-columns: .9fr 1.1fr;
        gap: 30px;
        align-items: stretch;
    }

    .contact-info {
        display: flex;
        flex-direction: column;
        gap: 14px;
    }

    .contact-card {
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 20px;
        background: #ffffff;
        border: 1px solid #e7ece8;
        border-radius: 16px;

        transition:
            transform .3s ease,
            box-shadow .3s ease,
            border-color .3s ease;
    }

    .contact-card:hover {
        transform: translateY(-5px);
        border-color: #bfe7c6;
        box-shadow: 0 15px 35px rgba(30, 70, 40, .08);
    }

    .contact-icon {
        width: 46px;
        height: 46px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 13px;
        background: #eaf9ed;
        color: #269c38;
        font-size: 17px;
        transition: .3s ease;
    }

    .contact-card:hover .contact-icon {
        background: #35d84a;
        color: white;
        transform: scale(1.08) rotate(-4deg);
    }

    .contact-card span {
        display: block;
        margin-bottom: 4px;
        color: #8a938c;
        font-size: 10px;
        font-weight: 500;
    }

    .contact-card h4 {
        margin: 0 0 4px;
        color: #17201a;
        font-size: 13px;
        font-weight: 650;
    }

    .contact-card p {
        margin: 0;
        color: #8a938c;
        font-size: 10px;
    }

    .whatsapp-card .contact-icon {
        color: #1fa84b;
        background: #e9f9ef;
    }

    .whatsapp-link {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        color: #269c38;
        font-size: 11px;
        font-weight: 600;
        transition: .2s ease;
    }

    .whatsapp-link:hover {
        gap: 9px;
    }


    /* =====================================================
       CONTACT FORM
    ====================================================== */

    .contact-form-wrapper {
        padding: 32px;
        background: white;
        border: 1px solid #e7ece8;
        border-radius: 20px;
        box-shadow: 0 15px 40px rgba(20, 60, 30, .05);
    }

    .form-header {
        margin-bottom: 25px;
    }

    .form-header span {
        color: #269c38;
        font-size: 10px;
        font-weight: 700;
        letter-spacing: 1.2px;
    }

    .form-header h3 {
        margin: 6px 0 0;
        font-size: 24px;
        font-weight: 700;
        color: #17201a;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 14px;
    }

    .form-group {
        margin-bottom: 17px;
    }

    .form-group label {
        display: block;
        margin-bottom: 7px;
        color: #39423c;
        font-size: 11px;
        font-weight: 600;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        border: 1px solid #e2e8e3;
        border-radius: 10px;
        background: #fafcfb;
        padding: 13px 14px;
        outline: none;
        color: #17201a;
        font-size: 12px;

        transition:
            border-color .2s ease,
            box-shadow .2s ease,
            background .2s ease;
    }

    .form-group textarea {
        resize: vertical;
        min-height: 120px;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        background: white;
        border-color: #35d84a;
        box-shadow: 0 0 0 3px rgba(53, 216, 74, .10);
    }

    .form-group input::placeholder,
    .form-group textarea::placeholder {
        color: #a5ada7;
    }

    .contact-submit {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 14px;
        border: none;
        border-radius: 10px;
        background: #35d84a;
        color: white;
        font-size: 12px;
        font-weight: 650;
        cursor: pointer;

        transition:
            background .2s ease,
            transform .2s ease,
            box-shadow .2s ease;
    }

    .contact-submit:hover {
        background: #269c38;
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(38, 156, 56, .20);
    }


    /* =====================================================
       ANIMATIONS
    ====================================================== */

    .reveal,
    .fade-in {
        opacity: 0;
        transform: translateY(35px);
        transition:
            opacity .7s ease,
            transform .7s ease;
    }

    .reveal.active,
    .fade-in.visible {
        opacity: 1;
        transform: translateY(0);
    }


    /* =====================================================
       RESPONSIVE
    ====================================================== */

    @media (max-width: 950px) {

        .hero {
            padding: 50px;
        }

        .categories,
        .products {
            grid-template-columns: repeat(2, 1fr);
        }

        .contact-grid {
            grid-template-columns: 1fr;
        }

    }


    @media (max-width: 650px) {

        .hero-wrapper {
            padding-top: 20px;
        }

        .hero {
            min-height: 520px;
            padding: 35px 25px;
            border-radius: 20px;
        }

        .hero h1 {
            font-size: 42px;
            letter-spacing: -1.5px;
        }

        .hero-description {
            font-size: 14px;
        }

        .hero-search {
            flex-direction: column;
            align-items: stretch;
            padding: 7px;
        }

        .hero-search > i {
            display: none;
        }

        .hero-search input {
            width: 100%;
        }

        .search-button {
            width: 100%;
        }

        .home-section {
            padding: 60px 0;
        }

        .section-header {
            align-items: flex-start;
            gap: 15px;
            flex-direction: column;
        }

        .section-title {
            font-size: 26px;
        }

        .categories,
        .products {
            grid-template-columns: 1fr;
        }

        .product-image-wrapper {
            height: 260px;
        }

        .stats {
            grid-template-columns: 1fr;
        }

        .stat {
            border-right: none;
            border-bottom: 1px solid rgba(255, 255, 255, .1);
            padding-bottom: 25px;
        }

        .stat:last-child {
            border-bottom: none;
        }

        .cta {
            padding: 35px 25px;
            flex-direction: column;
            align-items: flex-start;
        }

        .cta h2 {
            font-size: 25px;
        }

        .contact-section {
            padding: 75px 0;
        }

        .contact-form-wrapper {
            padding: 22px;
        }

        .form-row {
            grid-template-columns: 1fr;
        }

        .contact-heading h2 {
            font-size: 32px;
        }

    }

</style>

@endsection


@section('content')

<div class="home-page">


    {{-- =====================================================
         HERO
    ====================================================== --}}

    <section class="hero-wrapper">

        <div class="container">

            <div class="hero">

                <div class="hero-content">

                    <div class="hero-label">

                        <span></span>

                        Your Livestock Marketplace

                    </div>


                    <h1>

                        Find the right
                        <span>livestock.</span>

                        Buy with
                        confidence.

                    </h1>


                    <p class="hero-description">

                        Discover quality livestock available for purchase
                        and connect your needs with the right animals
                        through Stock Connect.

                    </p>


                    <form
                        class="hero-search"
                        action="{{ route('customer.livestock') }}"
                        method="GET"
                    >

                        <i class="fa-solid fa-magnifying-glass"></i>

                        <input
                            type="text"
                            name="search"
                            placeholder="Search cattle, sheep, goats, poultry..."
                        >

                        <button
                            type="submit"
                            class="search-button"
                        >
                            Search
                        </button>

                    </form>

                </div>


                <div class="hero-decoration"></div>

            </div>

        </div>

    </section>


    {{-- =====================================================
         CATEGORIES
    ====================================================== --}}

    <section class="home-section">

        <div class="container">

            <div class="section-header reveal">

                <div>

                    <h2 class="section-title">
                        Browse categories
                    </h2>

                    <p class="section-subtitle">
                        Explore livestock by category.
                    </p>

                </div>

                <a
                    href="{{ route('customer.livestock') }}"
                    class="view-all"
                >

                    View all

                    <i class="fa-solid fa-arrow-right"></i>

                </a>

            </div>


            <div class="categories">


                <a
                    href="{{ route('customer.livestock') }}"
                    class="category-card reveal"
                >

                    <div class="category-icon">

                        <i class="fa-solid fa-cow"></i>

                    </div>

                    <div>

                        <div class="category-name">
                            Cattle
                        </div>

                        <div class="category-description">
                            Browse cattle
                        </div>

                    </div>

                </a>


                <a
                    href="{{ route('customer.livestock') }}"
                    class="category-card reveal"
                >

                    <div class="category-icon">

                        {{-- Paw used instead of fa-sheep --}}
                        <i class="fa-solid fa-paw"></i>

                    </div>

                    <div>

                        <div class="category-name">
                            Sheep
                        </div>

                        <div class="category-description">
                            Browse sheep
                        </div>

                    </div>

                </a>


                <a
                    href="{{ route('customer.livestock') }}"
                    class="category-card reveal"
                >

                    <div class="category-icon">

                        <i class="fa-solid fa-paw"></i>

                    </div>

                    <div>

                        <div class="category-name">
                            Goats
                        </div>

                        <div class="category-description">
                            Browse goats
                        </div>

                    </div>

                </a>


                <a
                    href="{{ route('customer.livestock') }}"
                    class="category-card reveal"
                >

                    <div class="category-icon">

                        <i class="fa-solid fa-egg"></i>

                    </div>

                    <div>

                        <div class="category-name">
                            Poultry
                        </div>

                        <div class="category-description">
                            Browse poultry
                        </div>

                    </div>

                </a>


            </div>

        </div>

    </section>


    {{-- =====================================================
         FEATURED LIVESTOCK
    ====================================================== --}}

    <section
        class="home-section"
        style="padding-top:0;"
    >

        <div class="container">

            <div class="section-header reveal">

                <div>

                    <h2 class="section-title">
                        Featured livestock
                    </h2>

                    <p class="section-subtitle">
                        Available animals ready for purchase.
                    </p>

                </div>

                <a
                    href="{{ route('customer.livestock') }}"
                    class="view-all"
                >

                    Shop all

                    <i class="fa-solid fa-arrow-right"></i>

                </a>

            </div>


            <div class="products">


                @forelse($livestocks as $livestock)


                    <div class="product-card reveal">


                        <div class="product-image-wrapper">


                            @if($livestock->image)

                                <img
                                    src="{{ asset($livestock->image) }}"
                                    alt="{{ $livestock->name }}"
                                    class="product-image"
                                >

                            @else

                                <div
                                    style="
                                        height:100%;
                                        display:flex;
                                        align-items:center;
                                        justify-content:center;
                                        font-size:60px;
                                        color:#239638;
                                    "
                                >

                                    <i class="fa-solid fa-cow"></i>

                                </div>

                            @endif


                            <div class="availability">

                                <i
                                    class="fa-solid fa-circle"
                                    style="font-size:7px;"
                                ></i>

                                Available

                            </div>


                        </div>


                        <div class="product-body">


                            <div class="product-category">

                                {{ $livestock->category }}

                            </div>


                            <div class="product-name">

                                {{ $livestock->name }}

                            </div>


                            <div class="product-meta">

                                @if($livestock->breed)

                                    {{ $livestock->breed }} ·

                                @endif

                                {{ $livestock->quantity }}
                                available

                            </div>


                            <div class="product-footer">


                                <div class="product-price">

                                    ₦{{ number_format(
                                        $livestock->price,
                                        0
                                    ) }}

                                </div>


                                <a
                                    href="{{ route(
                                        'orders.create',
                                        $livestock->id
                                    ) }}"
                                    class="product-button"
                                >

                                    View livestock

                                </a>


                            </div>


                        </div>


                    </div>


                @empty


                    <div
                        style="
                            grid-column:1/-1;
                            text-align:center;
                            padding:70px 20px;
                            background:white;
                            border-radius:18px;
                            border:1px solid var(--border);
                        "
                    >

                        <i
                            class="fa-solid fa-box-open"
                            style="
                                font-size:45px;
                                color:#35d84a;
                                margin-bottom:15px;
                            "
                        ></i>

                        <h3 style="margin-bottom:8px;">
                            No livestock available
                        </h3>

                        <p
                            style="
                                color:#748078;
                                font-size:13px;
                            "
                        >
                            Check back soon for new livestock.
                        </p>

                    </div>


                @endforelse


            </div>

        </div>

    </section>


    {{-- =====================================================
     ABOUT STOCK CONNECT
====================================================== --}}

<section
    class="about-section"
    id="about"
>

    <div class="container">

        <div class="about-grid">

            <div class="about-content reveal">

                <span class="about-eyebrow">
                    ABOUT STOCK CONNECT
                </span>

                <h2>
                    A simpler way to
                    <span>buy quality livestock.</span>
                </h2>

                <p>
                    Stock Connect is a livestock marketplace designed
                    to make buying livestock easier, more convenient
                    and more transparent.
                </p>

                <p>
                    Instead of searching through different sellers
                    and relying on scattered information, customers
                    can explore available livestock, compare their
                    options and place orders from one convenient
                    marketplace.
                </p>

                <div class="about-features">

                    <div class="about-feature">

                        <div class="about-feature-icon">
                            <i class="fa-solid fa-shield-halved"></i>
                        </div>

                        <div>

                            <h4>
                                Trusted Marketplace
                            </h4>

                            <p>
                                Shop with confidence.
                            </p>

                        </div>

                    </div>


                    <div class="about-feature">

                        <div class="about-feature-icon">
                            <i class="fa-solid fa-cow"></i>
                        </div>

                        <div>

                            <h4>
                                Quality Livestock
                            </h4>

                            <p>
                                Discover available animals.
                            </p>

                        </div>

                    </div>


                    <div class="about-feature">

                        <div class="about-feature-icon">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </div>

                        <div>

                            <h4>
                                Easy Ordering
                            </h4>

                            <p>
                                Place orders with ease.
                            </p>

                        </div>

                    </div>


                    <div class="about-feature">

                        <div class="about-feature-icon">
                            <i class="fa-solid fa-headset"></i>
                        </div>

                        <div>

                            <h4>
                                Customer Support
                            </h4>

                            <p>
                                We're here to help.
                            </p>

                        </div>

                    </div>

                </div>

            </div>


            <div class="about-visual reveal">

                <div class="about-visual-icon">

                    <i class="fa-solid fa-cow"></i>

                </div>


                <div class="about-badge">

                    <strong>
                        Connecting customers with livestock
                    </strong>

                    <span>
                        A modern marketplace built for simpler
                        livestock purchasing.
                    </span>

                </div>

            </div>

        </div>

    </div>

</section>

    {{-- =====================================================
         STATS
    ====================================================== --}}

    <section class="stats-section">

        <div class="container">

            <div class="stats">


                <div class="stat reveal">

                    <div
                        class="stat-number"
                        data-target="500"
                    >
                        0
                    </div>

                    <div class="stat-label">
                        Livestock listed
                    </div>

                </div>


                <div class="stat reveal">

                    <div
                        class="stat-number"
                        data-target="120"
                    >
                        0
                    </div>

                    <div class="stat-label">
                        Successful orders
                    </div>

                </div>


                <div class="stat reveal">

                    <div
                        class="stat-number"
                        data-target="98"
                    >
                        0
                    </div>

                    <div class="stat-label">
                        Customer satisfaction
                    </div>

                </div>


            </div>

        </div>

    </section>


    {{-- =====================================================
     FAQ
====================================================== --}}

<section
    class="faq-section"
    id="faq"
>

    <div class="container">

        <div class="faq-heading reveal">

            <span class="faq-eyebrow">
                FREQUENTLY ASKED QUESTIONS
            </span>

            <h2>
                Questions? We've got answers.
            </h2>

            <p>
                Find quick answers to some of the most common
                questions about buying livestock through
                Stock Connect.
            </p>

        </div>


        <div class="faq-list">


            <div class="faq-item reveal">

                <button
                    type="button"
                    class="faq-question"
                >

                    <span>
                        How do I purchase livestock?
                    </span>

                    <i class="fa-solid fa-plus"></i>

                </button>


                <div class="faq-answer">

                    <div class="faq-answer-inner">

                        Browse the available livestock on Stock Connect,
                        select the animal you are interested in and
                        proceed with the ordering process. You will be
                        provided with the necessary payment instructions
                        after placing your order.

                    </div>

                </div>

            </div>


            <div class="faq-item reveal">

                <button
                    type="button"
                    class="faq-question"
                >

                    <span>
                        How do I know if livestock is available?
                    </span>

                    <i class="fa-solid fa-plus"></i>

                </button>


                <div class="faq-answer">

                    <div class="faq-answer-inner">

                        Available livestock is displayed on the
                        marketplace with its current quantity and
                        availability information.

                    </div>

                </div>

            </div>


            <div class="faq-item reveal">

                <button
                    type="button"
                    class="faq-question"
                >

                    <span>
                        How do I make payment for my order?
                    </span>

                    <i class="fa-solid fa-plus"></i>

                </button>


                <div class="faq-answer">

                    <div class="faq-answer-inner">

                        After placing your order, Stock Connect will
                        provide the payment instructions required to
                        complete your purchase. Once payment has been
                        made, you can confirm your payment so that the
                        order can be verified.

                    </div>

                </div>

            </div>


            <div class="faq-item reveal">

                <button
                    type="button"
                    class="faq-question"
                >

                    <span>
                        Can I track my order?
                    </span>

                    <i class="fa-solid fa-plus"></i>

                </button>


                <div class="faq-answer">

                    <div class="faq-answer-inner">

                        Yes. You can view your orders from your customer
                        account and check the current status of your
                        order.

                    </div>

                </div>

            </div>


            <div class="faq-item reveal">

                <button
                    type="button"
                    class="faq-question"
                >

                    <span>
                        Can I review livestock I purchased?
                    </span>

                    <i class="fa-solid fa-plus"></i>

                </button>


                <div class="faq-answer">

                    <div class="faq-answer-inner">

                        Yes. Once your order has been completed, you
                        will be able to leave a rating and review for
                        the livestock you purchased.

                    </div>

                </div>

            </div>


            <div class="faq-item reveal">

                <button
                    type="button"
                    class="faq-question"
                >

                    <span>
                        What if I need help with my order?
                    </span>

                    <i class="fa-solid fa-plus"></i>

                </button>


                <div class="faq-answer">

                    <div class="faq-answer-inner">

                        You can contact the Stock Connect support team
                        through the contact section on this page for
                        assistance with your order, payment or other
                        marketplace questions.

                    </div>

                </div>

            </div>


        </div>

    </div>

</section>

    {{-- =====================================================
         CTA
    ====================================================== --}}

    <section class="cta-section">

        <div class="container">

            <div class="cta reveal">

                <div>

                    <h2>
                        Ready to find your livestock?
                    </h2>

                    <p>
                        Browse available animals and place your order today.
                    </p>

                </div>


                <a
                    href="{{ route('customer.livestock') }}"
                    class="cta-button"
                >

                    Start shopping

                    <i class="fa-solid fa-arrow-right"></i>

                </a>

            </div>

        </div>

    </section>


    {{-- =====================================================
         CONTACT
    ====================================================== --}}

    <section
        class="contact-section"
        id="contact"
    >

        <div class="container">


            <div class="contact-heading fade-in">

                <span class="contact-eyebrow">
                    STOCK CONNECT SUPPORT
                </span>

                <h2>
                    Need help with your order?
                </h2>

                <p>
                    Have a question about livestock, payment,
                    delivery or your order?
                    Our team is here to help.
                </p>

            </div>


            <div class="contact-grid">


                <div class="contact-info fade-in">


                    <div class="contact-card">

                        <div class="contact-icon">

                            <i class="fa-solid fa-phone"></i>

                        </div>

                        <div>

                            <span>
                                Call us
                            </span>

                            <h4>
                                +234 816 635 3167
                            </h4>

                            <p>
                                Available during business hours.
                            </p>

                        </div>

                    </div>


                    <div class="contact-card">

                        <div class="contact-icon">

                            <i class="fa-solid fa-envelope"></i>

                        </div>

                        <div>

                            <span>
                                Email support
                            </span>

                            <h4>
                                stockconnect@gmail.com
                            </h4>

                            <p>
                                Send us your questions anytime.
                            </p>

                        </div>

                    </div>


                    <div class="contact-card">

                        <div class="contact-icon">

                            <i class="fa-solid fa-location-dot"></i>

                        </div>

                        <div>

                            <span>
                                Our location
                            </span>

                            <h4>
                                Ozoro, Delta State
                            </h4>

                            <p>
                                Stock Connect marketplace.
                            </p>

                        </div>

                    </div>


                    <div class="contact-card whatsapp-card">

                        <div class="contact-icon">

                            <i class="fa-brands fa-whatsapp"></i>

                        </div>

                        <div>

                            <span>
                                WhatsApp
                            </span>

                            <h4>
                                Chat with our team
                            </h4>

                            <a
                                href="#"
                                target="_blank"
                                class="whatsapp-link"
                            >

                                Contact support

                                <i class="fa-solid fa-arrow-up-right-from-square"></i>

                            </a>

                        </div>

                    </div>


                </div>


                <div class="contact-form-wrapper fade-in">


                    <div class="form-header">

                        <span>
                            SEND A MESSAGE
                        </span>

                        <h3>
                            How can we help?
                        </h3>

                    </div>


                    <form
                        action="#"
                        method="POST"
                        id="contactForm"
                        autocomplete="off"
                    >

                        @csrf


                        <div class="form-row">


                            <div class="form-group">

                                <label for="name">
                                    Full name
                                </label>

                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    placeholder="Enter your name"
                                    required
                                >

                            </div>


                            <div class="form-group">

                                <label for="email">
                                    Email address
                                </label>

                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    placeholder="you@example.com"
                                    required
                                >

                            </div>


                        </div>


                        <div class="form-group">

                            <label for="phone">
                                Phone number
                            </label>

                            <input
                                type="tel"
                                id="phone"
                                name="phone"
                                placeholder="080..."
                            >

                        </div>


                        <div class="form-group">

                            <label for="message">
                                Message
                            </label>

                            <textarea
                                id="message"
                                name="message"
                                rows="5"
                                placeholder="Tell us how we can help..."
                                required
                            ></textarea>

                        </div>


                        <button
                            type="submit"
                            class="contact-submit"
                        >

                            <span>
                                Send Message
                            </span>

                            <i class="fa-solid fa-arrow-right"></i>

                        </button>


                    </form>


                </div>


            </div>


        </div>

    </section>


</div>

@endsection


@section('scripts')

<script>

    /* =====================================================
       REVEAL ANIMATION
    ====================================================== */

    const revealElements =
        document.querySelectorAll('.reveal');


    if ('IntersectionObserver' in window) {

        const revealObserver =
            new IntersectionObserver(
                function (entries) {

                    entries.forEach(function (entry) {

                        if (entry.isIntersecting) {

                            entry.target.classList.add('active');

                            revealObserver.unobserve(
                                entry.target
                            );

                        }

                    });

                },
                {
                    threshold: 0.12
                }
            );


        revealElements.forEach(function (element) {

            revealObserver.observe(element);

        });

    } else {

        revealElements.forEach(function (element) {

            element.classList.add('active');

        });

    }


    /* =====================================================
       CONTACT FADE-IN
    ====================================================== */

    const fadeElements =
        document.querySelectorAll('.fade-in');


    if ('IntersectionObserver' in window) {

        const fadeObserver =
            new IntersectionObserver(
                function (entries) {

                    entries.forEach(function (entry) {

                        if (entry.isIntersecting) {

                            entry.target.classList.add('visible');

                            fadeObserver.unobserve(
                                entry.target
                            );

                        }

                    });

                },
                {
                    threshold: 0.12
                }
            );


        fadeElements.forEach(function (element, index) {

            element.style.transitionDelay =  `${index * 0.08}s`;

            fadeObserver.observe(element);

        });

    } else {

        fadeElements.forEach(function (element) {

            element.classList.add('visible');

        });

    }


    /* =====================================================
       ANIMATED STATISTICS
    ====================================================== */

    const counters =
        document.querySelectorAll('.stat-number');


    if ('IntersectionObserver' in window) {

        const counterObserver =
            new IntersectionObserver(
                function (entries) {

                    entries.forEach(function (entry) {

                        if (!entry.isIntersecting) {
                            return;
                        }


                        const counter =
                            entry.target;


                        const target =
                            Number(
                                counter.dataset.target
                            );


                        let current = 0;

                        const increment =
                            target / 70;


                        function updateCounter() {

                            current += increment;


                            if (current < target) {

                                counter.textContent =
                                    Math.ceil(current);

                                requestAnimationFrame(
                                    updateCounter
                                );

                            } else {

                                counter.textContent =
                                    target + '+';

                            }

                        }


                        updateCounter();


                        counterObserver.unobserve(
                            counter
                        );

                    });

                },
                {
                    threshold: .7
                }
            );


        counters.forEach(function (counter) {

            counterObserver.observe(counter);

        });

    }


    /* =====================================================
       CONTACT FORM DEMO
    ====================================================== */

    const contactForm =
        document.getElementById('contactForm');


    if (contactForm) {

        contactForm.addEventListener(
            'submit',
            function (event) {

                event.preventDefault();


                const button =
                    contactForm.querySelector(
                        '.contact-submit'
                    );


                if (!button) {
                    return;
                }


                const originalHTML =
                    button.innerHTML;


                button.innerHTML = `
                    <span>Sending...</span>
                    <i class="fa-solid fa-spinner fa-spin"></i>
                `;


                button.disabled = true;


                setTimeout(function () {

                    alert(
                        'Thanks for contacting Stock Connect. Our team will get back to you shortly.'
                    );


                    contactForm.reset();


                    button.innerHTML =
                        originalHTML;


                    button.disabled = false;

                }, 1500);

            }
        );

    }

    /* =====================================================
   FAQ ACCORDION
====================================================== */

const faqItems =
    document.querySelectorAll('.faq-item');


faqItems.forEach(function (item) {

    const question =
        item.querySelector('.faq-question');

    const answer =
        item.querySelector('.faq-answer');


    question.addEventListener('click', function () {

        const isActive =
            item.classList.contains('active');


        /*
         * Close all other FAQ items
         */

        faqItems.forEach(function (otherItem) {

            if (otherItem !== item) {

                otherItem.classList.remove('active');

                const otherAnswer =
                    otherItem.querySelector('.faq-answer');

                otherAnswer.style.maxHeight = null;

            }

        });


        /*
         * Toggle current FAQ
         */

        if (isActive) {

            item.classList.remove('active');

            answer.style.maxHeight = null;

        } else {

            item.classList.add('active');

            answer.style.maxHeight =
                answer.scrollHeight + 'px';

        }

    });

});

</script>

@endsection