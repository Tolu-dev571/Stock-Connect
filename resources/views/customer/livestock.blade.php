@extends('layouts.app')

@section('title', 'Browse Livestock | Stock Connect')


@section('styles')

<style>

/* =====================================================
   LIVESTOCK MARKETPLACE PAGE
===================================================== */

.livestock-page {
    background: #f7faf8;
    color: #17201a;
    min-height: 70vh;
    padding: 45px 0 80px;
}

.livestock-page .livestock-container {
    width: min(1180px, 92%);
    margin: 0 auto;
}


/* =====================================================
   PAGE HEADER
===================================================== */

.livestock-header {
    margin-bottom: 32px;
}

.livestock-top-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    margin-bottom: 25px;
}

.back-marketplace {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: #269c38;
    text-decoration: none;
    font-size: 12px;
    font-weight: 650;
    transition: .25s ease;
}

.back-marketplace:hover {
    color: #176d25;
    gap: 11px;
}

.marketplace-label {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    color: #269c38;
    font-size: 10px;
    font-weight: 750;
    letter-spacing: 1.3px;
    text-transform: uppercase;
    margin-bottom: 10px;
}

.marketplace-label span {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: #35d84a;
}

.livestock-header h1 {
    margin: 0 0 9px;
    font-size: clamp(30px, 4vw, 42px);
    line-height: 1.15;
    letter-spacing: -.9px;
    font-weight: 800;
    color: #17201a;
}

.livestock-header p {
    margin: 0;
    color: #7c867f;
    font-size: 13px;
    line-height: 1.7;
}


/* =====================================================
   SEARCH / FILTER BAR
===================================================== */

.livestock-toolbar {
    display: grid;
    grid-template-columns: 1fr 190px auto;
    gap: 12px;
    padding: 14px;
    background: #ffffff;
    border: 1px solid #e5ebe6;
    border-radius: 16px;
    box-shadow: 0 10px 30px rgba(20, 60, 30, .04);
    margin-bottom: 35px;
}

.livestock-search {
    position: relative;
}

.livestock-search i {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    color: #9aa49d;
    font-size: 13px;
}

.livestock-search input,
.livestock-filter select {
    width: 100%;
    height: 44px;
    border: 1px solid #e1e8e2;
    border-radius: 10px;
    outline: none;
    background: #fafcfb;
    color: #17201a;
    font-size: 12px;
    transition: .2s ease;
}

.livestock-search input {
    padding: 0 14px 0 40px;
}

.livestock-filter select {
    padding: 0 12px;
    cursor: pointer;
}

.livestock-search input:focus,
.livestock-filter select:focus {
    background: #ffffff;
    border-color: #35d84a;
    box-shadow: 0 0 0 3px rgba(53, 216, 74, .09);
}

.livestock-search input::placeholder {
    color: #a5ada7;
}

.reset-filter {
    height: 44px;
    padding: 0 17px;
    border: 1px solid #dfe7e1;
    border-radius: 10px;
    background: #ffffff;
    color: #5f6962;
    font-size: 11px;
    font-weight: 650;
    cursor: pointer;
    transition: .2s ease;
}

.reset-filter:hover {
    border-color: #b9dfc0;
    background: #f1fbf3;
    color: #269c38;
}


/* =====================================================
   RESULTS HEADER
===================================================== */

.results-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    margin-bottom: 18px;
}

.results-title {
    font-size: 17px;
    font-weight: 750;
    color: #17201a;
}

.results-count {
    color: #89928b;
    font-size: 11px;
}


/* =====================================================
   LIVESTOCK GRID
===================================================== */

.livestock-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 22px;
}


/* =====================================================
   LIVESTOCK CARD
===================================================== */

.livestock-card {
    background: #ffffff;
    border: 1px solid #e5ebe6;
    border-radius: 18px;
    overflow: hidden;
    position: relative;

    transition:
        transform .3s ease,
        box-shadow .3s ease,
        border-color .3s ease;
}

.livestock-card:hover {
    transform: translateY(-7px);
    border-color: rgba(53, 216, 74, .28);
    box-shadow: 0 18px 40px rgba(20, 60, 30, .09);
}


/* =====================================================
   IMAGE
===================================================== */

.livestock-image-wrapper {
    height: 225px;
    position: relative;
    overflow: hidden;
    background: #edf7ef;
}

.livestock-image {
    width: 100%;
    height: 100%;
    display: block;
    object-fit: cover;
    transition: transform .5s ease;
}

.livestock-card:hover .livestock-image {
    transform: scale(1.06);
}

.image-placeholder {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(
        135deg,
        #eaf8ed,
        #dff3e3
    );
    color: #35b947;
    font-size: 55px;
}


/* =====================================================
   AVAILABILITY BADGE
===================================================== */

.availability-badge {
    position: absolute;
    top: 14px;
    left: 14px;

    display: inline-flex;
    align-items: center;
    gap: 6px;

    padding: 7px 10px;
    border-radius: 30px;

    background: rgba(255, 255, 255, .94);
    color: #269c38;

    font-size: 9px;
    font-weight: 750;

    box-shadow: 0 5px 18px rgba(0, 0, 0, .10);
}

.availability-badge span {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: #35d84a;
}


/* =====================================================
   CARD CONTENT
===================================================== */

.livestock-body {
    padding: 20px;
}

.livestock-category {
    margin-bottom: 7px;

    color: #269c38;
    font-size: 9px;
    font-weight: 750;

    letter-spacing: .8px;
    text-transform: uppercase;
}

.livestock-name {
    margin: 0 0 12px;

    color: #17201a;
    font-size: 18px;
    font-weight: 750;
    line-height: 1.3;
}

.livestock-details {
    display: flex;
    flex-direction: column;
    gap: 7px;
    margin-bottom: 18px;
}

.livestock-detail {
    display: flex;
    align-items: center;
    gap: 8px;

    color: #7c867f;
    font-size: 11px;
}

.livestock-detail i {
    width: 15px;
    color: #72a67a;
    text-align: center;
}

.livestock-divider {
    height: 1px;
    background: #edf1ee;
    margin-bottom: 16px;
}


/* =====================================================
   PRICE + ORDER
===================================================== */

.livestock-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
}

.livestock-price-label {
    display: block;
    margin-bottom: 3px;

    color: #9aa39d;
    font-size: 9px;
}

.livestock-price {
    color: #17201a;
    font-size: 17px;
    font-weight: 800;
}

.order-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;

    min-width: 105px;
    padding: 11px 13px;

    background: #35d84a;
    color: #ffffff;

    border-radius: 9px;
    text-decoration: none;

    font-size: 10px;
    font-weight: 700;

    transition: .25s ease;
}

.order-button:hover {
    background: #269c38;
    transform: translateY(-2px);
    box-shadow: 0 8px 18px rgba(38, 156, 56, .18);
}


/* =====================================================
   NO RESULTS
===================================================== */

.no-results {
    display: none;

    text-align: center;
    padding: 70px 25px;

    background: #ffffff;
    border: 1px solid #e5ebe6;
    border-radius: 18px;
}

.no-results i {
    display: block;
    margin-bottom: 15px;

    color: #35d84a;
    font-size: 42px;
}

.no-results h3 {
    margin: 0 0 7px;
    color: #17201a;
    font-size: 18px;
}

.no-results p {
    margin: 0;
    color: #89928b;
    font-size: 12px;
}


/* =====================================================
   EMPTY DATABASE STATE
===================================================== */

.empty-state {
    text-align: center;
    padding: 80px 25px;

    background: #ffffff;
    border: 1px solid #e5ebe6;
    border-radius: 20px;
}

.empty-state i {
    display: block;
    margin-bottom: 18px;

    color: #35d84a;
    font-size: 48px;
}

.empty-state h3 {
    margin: 0 0 8px;

    color: #17201a;
    font-size: 20px;
}

.empty-state p {
    margin: 0 auto 22px;
    max-width: 420px;

    color: #89928b;
    font-size: 12px;
    line-height: 1.7;
}

.empty-back-button {
    display: inline-flex;
    align-items: center;
    gap: 8px;

    padding: 12px 17px;

    background: #35d84a;
    color: #ffffff;

    border-radius: 9px;
    text-decoration: none;

    font-size: 11px;
    font-weight: 700;

    transition: .25s ease;
}

.empty-back-button:hover {
    background: #269c38;
    transform: translateY(-2px);
}


/* =====================================================
   RESPONSIVE
===================================================== */

@media (max-width: 900px) {

    .livestock-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .livestock-toolbar {
        grid-template-columns: 1fr 1fr;
    }

    .reset-filter {
        grid-column: 1 / -1;
    }

}


@media (max-width: 650px) {

    .livestock-page {
        padding: 30px 0 55px;
    }

    .livestock-top-row {
        align-items: flex-start;
        flex-direction: column;
        margin-bottom: 22px;
    }

    .livestock-grid {
        grid-template-columns: 1fr;
    }

    .livestock-toolbar {
        grid-template-columns: 1fr;
        padding: 12px;
    }

    .reset-filter {
        grid-column: auto;
    }

    .livestock-image-wrapper {
        height: 240px;
    }

    .results-header {
        align-items: flex-start;
        flex-direction: column;
        gap: 5px;
    }

}

</style>

@endsection


@section('content')

<div class="livestock-page">

    <div class="livestock-container">


        {{-- =================================================
             PAGE HEADER
        ================================================== --}}

        <div class="livestock-header">

            <div class="livestock-top-row">

                <a
                    href="{{ route('home') }}"
                    class="back-marketplace"
                >

                    <i class="fa-solid fa-arrow-left"></i>

                    Back to Marketplace

                </a>

            </div>


            <div class="marketplace-label">

                <span></span>

                Stock Connect Marketplace

            </div>


            <h1>
                Browse Livestock
            </h1>


            <p>
                Explore quality livestock available for purchase
                and find the right animals for your needs.
            </p>

        </div>


        {{-- =================================================
             SEARCH + FILTER
        ================================================== --}}

        <div class="livestock-toolbar">

            <div class="livestock-search">

                <i class="fa-solid fa-magnifying-glass"></i>

                <input
                    type="text"
                    id="livestockSearch"
                    placeholder="Search livestock, breed or category..."
                    autocomplete="off"
                >

            </div>


            <div class="livestock-filter">

                <select id="categoryFilter">

                    <option value="all">
                        All categories
                    </option>

                    <option value="cattle">
                        Cattle
                    </option>

                    <option value="sheep">
                        Sheep
                    </option>

                    <option value="goat">
                        Goats
                    </option>

                    <option value="poultry">
                        Poultry
                    </option>

                </select>

            </div>


            <button
                type="button"
                class="reset-filter"
                id="resetFilters"
            >

                <i class="fa-solid fa-rotate-left"></i>

                Reset

            </button>

        </div>


        {{-- =================================================
             RESULTS HEADER
        ================================================== --}}

        @if($livestocks->count())

            <div class="results-header">

                <div class="results-title">
                    Available livestock
                </div>

                <div class="results-count">

                    <span id="resultsCount">
                        {{ $livestocks->count() }}
                    </span>

                    livestock listed

                </div>

            </div>


            {{-- =============================================
                 LIVESTOCK GRID
            ============================================== --}}

            <div
                class="livestock-grid"
                id="livestockGrid"
            >


                @foreach($livestocks as $livestock)

                    <div
                        class="livestock-card"
                        data-name="{{ strtolower($livestock->name) }}"
                        data-category="{{ strtolower($livestock->category) }}"
                        data-breed="{{ strtolower($livestock->breed ?? '') }}"
                    >


                        {{-- IMAGE --}}

                        <div class="livestock-image-wrapper">


                            @if($livestock->image)

                                <img
                                    src="{{ asset($livestock->image) }}"
                                    alt="{{ $livestock->name }}"
                                    class="livestock-image"
                                >

                            @else

                                <div class="image-placeholder">

                                    <i class="fa-solid fa-cow"></i>

                                </div>

                            @endif


                            <div class="availability-badge">

                                <span></span>

                                Available

                            </div>


                        </div>


                        {{-- BODY --}}

                        <div class="livestock-body">


                            <div class="livestock-category">

                                {{ $livestock->category }}

                            </div>


                            <h2 class="livestock-name">

                                {{ $livestock->name }}

                            </h2>


                            <div class="livestock-details">


                                @if($livestock->breed)

                                    <div class="livestock-detail">

                                        <i class="fa-solid fa-tag"></i>

                                        <span>
                                            Breed:
                                            {{ $livestock->breed }}
                                        </span>

                                    </div>

                                @endif


                                <div class="livestock-detail">

                                    <i class="fa-solid fa-boxes-stacked"></i>

                                    <span>
                                        {{ $livestock->quantity }}
                                        available
                                    </span>

                                </div>


                                <div class="livestock-detail">

                                    <i class="fa-solid fa-circle-check"></i>

                                    <span>
                                        Ready for order
                                    </span>

                                </div>


                            </div>


                            <div class="livestock-divider"></div>


                            <div class="livestock-footer">


                                <div>

                                    <span class="livestock-price-label">
                                        Price
                                    </span>

                                    <div class="livestock-price">

                                        ₦{{ number_format(
                                            $livestock->price,
                                            2
                                        ) }}

                                    </div>

                                </div>


                                <a
                                    href="{{ route(
                                        'orders.create',
                                        $livestock->id
                                    ) }}"
                                    class="order-button"
                                >

                                    Order Now

                                    <i class="fa-solid fa-arrow-right"></i>

                                </a>


                            </div>


                        </div>

                    </div>

                @endforeach


            </div>


            {{-- =============================================
                 NO SEARCH RESULTS
            ============================================== --}}

            <div
                class="no-results"
                id="noResults"
            >

                <i class="fa-solid fa-magnifying-glass"></i>

                <h3>
                    No livestock found
                </h3>

                <p>
                    Try a different search term or choose another
                    category.
                </p>

            </div>


        @else


            {{-- =============================================
                 EMPTY DATABASE
            ============================================== --}}

            <div class="empty-state">

                <i class="fa-solid fa-cow"></i>

                <h3>
                    No livestock available
                </h3>

                <p>
                    There are currently no livestock listings available.
                    Please check back later for new animals.
                </p>


                <a
                    href="{{ route('home') }}"
                    class="empty-back-button"
                >

                    <i class="fa-solid fa-arrow-left"></i>

                    Back to Marketplace

                </a>

            </div>

        @endif


    </div>

</div>

@endsection


@section('scripts')

<script>

document.addEventListener('DOMContentLoaded', function () {


    const searchInput =
        document.getElementById('livestockSearch');

    const categoryFilter =
        document.getElementById('categoryFilter');

    const resetButton =
        document.getElementById('resetFilters');

    const cards =
        document.querySelectorAll('.livestock-card');

    const noResults =
        document.getElementById('noResults');

    const resultsCount =
        document.getElementById('resultsCount');


    if (!searchInput || !categoryFilter || !cards.length) {
        return;
    }


    function filterLivestock() {

        const search =
            searchInput.value
                .trim()
                .toLowerCase();


        const category =
            categoryFilter.value
                .trim()
                .toLowerCase();


        let visibleCount = 0;


        cards.forEach(function (card) {


            const name =
                card.dataset.name || '';


            const cardCategory =
                card.dataset.category || '';


            const breed =
                card.dataset.breed || '';


            const matchesSearch =
                !search ||
                name.includes(search) ||
                cardCategory.includes(search) ||
                breed.includes(search);


            const matchesCategory =
                category === 'all' ||
                cardCategory.includes(category);


            if (
                matchesSearch &&
                matchesCategory
            ) {

                card.style.display = '';

                visibleCount++;

            } else {

                card.style.display = 'none';

            }

        });


        if (resultsCount) {

            resultsCount.textContent =
                visibleCount;

        }


        if (noResults) {

            noResults.style.display =
                visibleCount === 0
                    ? 'block'
                    : 'none';

        }

    }


    searchInput.addEventListener(
        'input',
        filterLivestock
    );


    categoryFilter.addEventListener(
        'change',
        filterLivestock
    );


    resetButton.addEventListener(
        'click',
        function () {

            searchInput.value = '';

            categoryFilter.value = 'all';

            filterLivestock();

        }
    );


});

</script>

@endsection