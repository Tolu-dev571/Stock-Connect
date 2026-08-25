<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Livestock Management | Stock Connect</title>

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
            --green-dark: #269c38;
            --green-soft: #eaf9ed;

            --text: #17201a;
            --muted: #7c867f;

            --border: #e8ece9;
            --background: #f7f9f7;
            --white: #ffffff;

            --danger: #dc5555;
            --danger-soft: #ffeded;

            --warning: #c58b16;
            --warning-soft: #fff6df;
        }

        body {
            font-family: 'Poppins', Arial, sans-serif;
            background: var(--background);
            color: var(--text);
        }

        a {
            text-decoration: none;
        }

        button,
        input,
        select {
            font-family: inherit;
        }


        /* =========================================
           PAGE
        ========================================= */

        .page {
            min-height: 100vh;
            padding: 32px;
        }

        .container {
            max-width: 1450px;
            margin: auto;
        }


        /* =========================================
           HEADER
        ========================================= */

        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 28px;
        }

        .header-left h1 {
            font-size: 27px;
            font-weight: 750;
            margin-bottom: 6px;
        }

        .header-left p {
            font-size: 13px;
            color: var(--muted);
        }

        .add-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;

            background: var(--green);
            color: white;

            padding: 12px 18px;

            border-radius: 9px;

            font-size: 13px;
            font-weight: 600;

            transition: .2s ease;
        }

        .add-button:hover {
            background: var(--green-dark);
            transform: translateY(-1px);
        }


        /* =========================================
           SUMMARY CARDS
        ========================================= */

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 17px;
            margin-bottom: 22px;
        }

        .summary-card {
            background: var(--white);

            border: 1px solid var(--border);
            border-radius: 13px;

            padding: 20px;

            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .summary-info span {
            display: block;

            font-size: 12px;
            color: var(--muted);

            margin-bottom: 7px;
        }

        .summary-info strong {
            font-size: 25px;
            font-weight: 750;
        }

        .summary-icon {
            width: 45px;
            height: 45px;

            border-radius: 11px;

            background: var(--green-soft);
            color: var(--green-dark);

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 18px;
        }

        .summary-card.warning .summary-icon {
            background: var(--warning-soft);
            color: var(--warning);
        }

        .summary-card.danger .summary-icon {
            background: var(--danger-soft);
            color: var(--danger);
        }


        /* =========================================
           INVENTORY CARD
        ========================================= */

        .inventory-card {
            background: white;

            border: 1px solid var(--border);
            border-radius: 14px;

            overflow: hidden;
        }

        .inventory-header {
            padding: 20px;

            border-bottom: 1px solid var(--border);

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 15px;
        }

        .inventory-title h2 {
            font-size: 16px;
            margin-bottom: 4px;
        }

        .inventory-title p {
            color: var(--muted);
            font-size: 11px;
        }


        /* =========================================
           FILTERS
        ========================================= */

        .filters {
            padding: 17px 20px;

            border-bottom: 1px solid var(--border);

            display: flex;
            gap: 10px;
            align-items: center;
        }

        .search-box {
            position: relative;
            flex: 1;
            max-width: 350px;
        }

        .search-box i {
            position: absolute;

            left: 13px;
            top: 50%;

            transform: translateY(-50%);

            color: #929a94;

            font-size: 12px;
        }

        .search-box input {
            width: 100%;
            height: 39px;

            border: 1px solid var(--border);
            border-radius: 8px;

            padding: 0 13px 0 35px;

            outline: none;

            font-size: 12px;

            background: #fbfcfb;
        }

        .search-box input:focus {
            border-color: var(--green);
        }

        .filter-select {
            height: 39px;
            min-width: 150px;

            border: 1px solid var(--border);
            border-radius: 8px;

            padding: 0 12px;

            background: white;

            outline: none;

            color: #444b46;

            font-size: 12px;
        }

        .filter-select:focus {
            border-color: var(--green);
        }


        /* =========================================
           TABLE
        ========================================= */

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;

            border-collapse: collapse;

            min-width: 900px;
        }

        th {
            text-align: left;

            padding: 13px 20px;

            background: #fafcfb;

            border-bottom: 1px solid var(--border);

            color: var(--muted);

            font-size: 10px;

            text-transform: uppercase;

            letter-spacing: .5px;

            font-weight: 600;
        }

        td {
            padding: 15px 20px;

            border-bottom: 1px solid #f0f2f0;

            font-size: 12px;

            vertical-align: middle;
        }

        tbody tr {
            transition: .15s ease;
        }

        tbody tr:hover {
            background: #fbfdfb;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }


        /* =========================================
           LIVESTOCK
        ========================================= */

        .livestock-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .animal-image {
            width: 48px;
            height: 48px;

            border-radius: 9px;

            object-fit: cover;

            background: var(--green-soft);
        }

        .animal-placeholder {
            width: 48px;
            height: 48px;

            border-radius: 9px;

            background: var(--green-soft);

            color: var(--green-dark);

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 18px;
        }

        .animal-name strong {
            display: block;

            font-size: 12px;

            margin-bottom: 4px;
        }

        .animal-name span {
            color: var(--muted);

            font-size: 10px;
        }

        .category {
            color: #4d554f;
        }

        .price {
            font-weight: 700;

            color: #1b241e;
        }

        .quantity {
            font-weight: 600;
        }


        /* =========================================
           STATUS
        ========================================= */

        .status {
            display: inline-flex;

            align-items: center;

            gap: 6px;

            padding: 6px 9px;

            border-radius: 20px;

            font-size: 10px;

            font-weight: 600;
        }

        .status-dot {
            width: 6px;
            height: 6px;

            border-radius: 50%;
        }

        .status.available {
            background: var(--green-soft);
            color: var(--green-dark);
        }

        .status.available .status-dot {
            background: var(--green);
        }

        .status.sold {
            background: var(--danger-soft);
            color: var(--danger);
        }

        .status.sold .status-dot {
            background: var(--danger);
        }


        /* =========================================
           ACTIONS
        ========================================= */

        .actions {
            display: flex;

            align-items: center;

            gap: 7px;
        }

        .action-button {
            width: 32px;
            height: 32px;

            border-radius: 7px;

            border: 1px solid var(--border);

            background: white;

            display: flex;

            align-items: center;
            justify-content: center;

            cursor: pointer;

            font-size: 11px;

            transition: .2s ease;
        }

        .action-edit {
            color: var(--green-dark);
        }

        .action-edit:hover {
            background: var(--green-soft);
            border-color: #c9e8cf;
        }


        /* DELETE BUTTON */

        .delete-button {
            width: 32px;
            height: 32px;

            border-radius: 7px;

            border: 1px solid var(--border);

            background: white;

            color: var(--danger);

            display: flex;

            align-items: center;
            justify-content: center;

            cursor: pointer;

            font-size: 11px;

            transition: .2s ease;
        }

        .delete-button:hover {
            background: var(--danger-soft);
            border-color: #f1cccc;
        }


        /* =========================================
           EMPTY STATE
        ========================================= */

        .empty-state {
            text-align: center;

            padding: 60px 20px;
        }

        .empty-icon {
            width: 60px;
            height: 60px;

            margin: 0 auto 15px;

            border-radius: 50%;

            background: var(--green-soft);

            color: var(--green-dark);

            display: flex;

            align-items: center;
            justify-content: center;

            font-size: 23px;
        }

        .empty-state h3 {
            font-size: 16px;

            margin-bottom: 6px;
        }

        .empty-state p {
            color: var(--muted);

            font-size: 12px;

            margin-bottom: 18px;
        }


        /* =========================================
           SUCCESS MESSAGE
        ========================================= */

        .success-message {
            margin-bottom: 20px;

            padding: 12px 15px;

            background: var(--green-soft);

            border: 1px solid #ccebd2;

            border-radius: 9px;

            color: var(--green-dark);

            font-size: 12px;

            display: flex;

            align-items: center;

            gap: 8px;
        }


        /* =========================================
           DELETE MODAL
        ========================================= */

        .delete-modal {
            position: fixed;

            inset: 0;

            z-index: 9999;

            display: none;

            align-items: center;

            justify-content: center;

            padding: 20px;
        }

        .delete-modal.show {
            display: flex;
        }

        .delete-modal-overlay {
            position: absolute;

            inset: 0;

            background: rgba(15, 25, 19, 0.48);

            backdrop-filter: blur(4px);
        }

        .delete-modal-box {
            position: relative;

            z-index: 2;

            width: 420px;

            max-width: 100%;

            background: white;

            border-radius: 17px;

            padding: 30px;

            text-align: center;

            box-shadow:
                0 20px 60px rgba(0, 0, 0, .18);

            animation: deleteModalIn .2s ease;
        }

        @keyframes deleteModalIn {

            from {
                opacity: 0;

                transform:
                    translateY(12px)
                    scale(.97);
            }

            to {
                opacity: 1;

                transform:
                    translateY(0)
                    scale(1);
            }
        }

        .delete-modal-icon {
            width: 58px;
            height: 58px;

            margin: 0 auto 17px;

            border-radius: 50%;

            background: var(--danger-soft);

            color: var(--danger);

            display: flex;

            align-items: center;
            justify-content: center;

            font-size: 21px;
        }

        .delete-modal-box h2 {
            font-size: 19px;

            margin-bottom: 9px;
        }

        .delete-modal-box p {
            color: var(--muted);

            font-size: 12px;

            line-height: 1.7;

            margin-bottom: 23px;
        }

        .delete-modal-box p strong {
            color: var(--text);
        }

        .delete-modal-actions {
            display: flex;

            align-items: center;

            justify-content: center;

            gap: 10px;
        }

        .cancel-delete,
        .confirm-delete {
            height: 40px;

            padding: 0 17px;

            border-radius: 8px;

            font-size: 12px;

            font-weight: 600;

            cursor: pointer;

            transition: .2s ease;
        }

        .cancel-delete {
            border: 1px solid var(--border);

            background: white;

            color: #4d554f;
        }

        .cancel-delete:hover {
            background: #f7f9f7;
        }

        .confirm-delete {
            border: none;

            background: var(--danger);

            color: white;

            display: inline-flex;

            align-items: center;

            gap: 7px;
        }

        .confirm-delete:hover {
            background: #bd4444;

            transform: translateY(-1px);
        }


        /* =========================================
           RESPONSIVE
        ========================================= */

        @media(max-width: 900px) {

            .page {
                padding: 20px;
            }

            .summary-grid {
                grid-template-columns: 1fr;
            }

            .page-header {
                align-items: flex-start;

                flex-direction: column;
            }

            .filters {
                flex-wrap: wrap;
            }

            .search-box {
                max-width: none;

                width: 100%;
            }
        }

        @media(max-width: 600px) {

            .page {
                padding: 14px;
            }

            .header-left h1 {
                font-size: 23px;
            }

            .inventory-header {
                align-items: flex-start;

                flex-direction: column;
            }

            .add-button {
                width: 100%;

                justify-content: center;
            }

            .filter-select {
                flex: 1;
            }

            .delete-modal-box {
                padding: 25px 20px;
            }

            .delete-modal-actions {
                flex-direction: column-reverse;
            }

            .cancel-delete,
            .confirm-delete {
                width: 100%;

                justify-content: center;
            }
        }

    </style>
</head>


<body>

<div class="page">

    <div class="container">


        {{-- SUCCESS MESSAGE --}}

        @if(session('success'))

            <div class="success-message">

                <i class="fa-solid fa-circle-check"></i>

                {{ session('success') }}

            </div>

        @endif


        {{-- PAGE HEADER --}}

        <div class="page-header">

            <div class="header-left">

                <h1>
                    Livestock Management
                </h1>

                <p>
                    Manage your livestock inventory, pricing and availability.
                </p>

            </div>


            <a
                href="{{ route('livestock.create') }}"
                class="add-button"
            >

                <i class="fa-solid fa-plus"></i>

                Add New Livestock

            </a>

        </div>


        {{-- SUMMARY CARDS --}}

        <div class="summary-grid">


            {{-- TOTAL --}}

            <div class="summary-card">

                <div class="summary-info">

                    <span>
                        Total Livestock
                    </span>

                    <strong>
                        {{ $livestocks->count() }}
                    </strong>

                </div>

                <div class="summary-icon">

                    <i class="fa-solid fa-cow"></i>

                </div>

            </div>


            {{-- AVAILABLE --}}

            <div class="summary-card">

                <div class="summary-info">

                    <span>
                        Available
                    </span>

                    <strong>
                        {{ $livestocks->where('status', 'available')->count() }}
                    </strong>

                </div>

                <div class="summary-icon">

                    <i class="fa-solid fa-circle-check"></i>

                </div>

            </div>


            {{-- SOLD OUT --}}

            <div class="summary-card danger">

                <div class="summary-info">

                    <span>
                        Sold Out
                    </span>

                    <strong>
                        {{ $livestocks->where('status', 'sold_out')->count() }}
                    </strong>

                </div>

                <div class="summary-icon">

                    <i class="fa-solid fa-circle-xmark"></i>

                </div>

            </div>

        </div>


        {{-- INVENTORY CARD --}}

        <div class="inventory-card">


            <div class="inventory-header">

                <div class="inventory-title">

                    <h2>
                        Livestock Inventory
                    </h2>

                    <p>
                        All livestock currently registered in Stock Connect.
                    </p>

                </div>

            </div>


            {{-- FILTERS --}}

            <div class="filters">


                <div class="search-box">

                    <i class="fa-solid fa-magnifying-glass"></i>

                    <input
                        type="text"
                        id="livestockSearch"
                        placeholder="Search livestock..."
                    >

                </div>


                <select
                    class="filter-select"
                    id="categoryFilter"
                >

                    <option value="">
                        All Categories
                    </option>

                    @foreach(
                        $livestocks
                            ->pluck('category')
                            ->filter()
                            ->unique()
                            ->sort()
                        as $category
                    )

                        <option value="{{ strtolower($category) }}">

                            {{ $category }}

                        </option>

                    @endforeach

                </select>


                <select
                    class="filter-select"
                    id="statusFilter"
                >

                    <option value="">
                        All Status
                    </option>

                    <option value="available">
                        Available
                    </option>

                    <option value="sold_out">
                        Sold Out
                    </option>

                </select>

            </div>


            {{-- TABLE --}}

            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>

                            <th>
                                Livestock
                            </th>

                            <th>
                                Category
                            </th>

                            <th>
                                Price
                            </th>

                            <th>
                                Quantity
                            </th>

                            <th>
                                Status
                            </th>

                            <th>
                                Actions
                            </th>

                        </tr>

                    </thead>


                    <tbody id="livestockTable">


                    @forelse($livestocks as $livestock)


                        <tr
                            class="livestock-row"

                            data-name="{{ strtolower($livestock->name) }}"

                            data-category="{{ strtolower($livestock->category) }}"

                            data-status="{{ $livestock->status }}"
                        >


                            {{-- LIVESTOCK --}}

                            <td>

                                <div class="livestock-info">


                                    @if($livestock->image)

                                        <img
                                            src="{{ asset($livestock->image) }}"
                                            alt="{{ $livestock->name }}"
                                            class="animal-image"
                                        >

                                    @else

                                        <div class="animal-placeholder">

                                            <i class="fa-solid fa-cow"></i>

                                        </div>

                                    @endif


                                    <div class="animal-name">

                                        <strong>
                                            {{ $livestock->name }}
                                        </strong>

                                        <span>
                                            {{ $livestock->breed ?? 'Breed not specified' }}
                                        </span>

                                    </div>

                                </div>

                            </td>


                            {{-- CATEGORY --}}

                            <td class="category">

                                {{ $livestock->category }}

                            </td>


                            {{-- PRICE --}}

                            <td class="price">

                                ₦{{ number_format($livestock->price, 0) }}

                            </td>


                            {{-- QUANTITY --}}

                            <td class="quantity">

                                {{ $livestock->quantity }}

                            </td>


                            {{-- STATUS --}}

                            <td>


                                @if($livestock->status === 'available')

                                    <span class="status available">

                                        <span class="status-dot"></span>

                                        Available

                                    </span>

                                @else

                                    <span class="status sold">

                                        <span class="status-dot"></span>

                                        Sold Out

                                    </span>

                                @endif


                            </td>


                            {{-- ACTIONS --}}

                            <td>

                                <div class="actions">


                                    {{-- EDIT --}}

                                    <a
                                        href="{{ route('livestock.edit', $livestock->id) }}"

                                        class="action-button action-edit"

                                        title="Edit livestock"
                                    >

                                        <i class="fa-solid fa-pen"></i>

                                    </a>


                                    {{-- DELETE --}}

                                    <button
                                        type="button"

                                        class="delete-button"

                                        title="Delete livestock"

                                        onclick="openDeleteModal(
                                            {{ $livestock->id }},
                                            @js($livestock->name)
                                        )"
                                    >

                                        <i class="fa-solid fa-trash"></i>

                                    </button>


                                </div>

                            </td>

                        </tr>


                    @empty


                        <tr>

                            <td colspan="6">

                                <div class="empty-state">


                                    <div class="empty-icon">

                                        <i class="fa-solid fa-cow"></i>

                                    </div>


                                    <h3>
                                        No livestock yet
                                    </h3>


                                    <p>
                                        Start building your inventory by adding your first livestock.
                                    </p>


                                    <a
                                        href="{{ route('livestock.create') }}"

                                        class="add-button"
                                    >

                                        <i class="fa-solid fa-plus"></i>

                                        Add Livestock

                                    </a>


                                </div>

                            </td>

                        </tr>


                    @endforelse


                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>



{{-- =========================================
     DELETE CONFIRMATION MODAL
========================================= --}}

<div
    class="delete-modal"
    id="deleteModal"
    aria-hidden="true"
>


    {{-- OVERLAY --}}

    <div
        class="delete-modal-overlay"
        onclick="closeDeleteModal()"
    ></div>


    {{-- MODAL BOX --}}

    <div
        class="delete-modal-box"
        role="dialog"
        aria-modal="true"
        aria-labelledby="deleteModalTitle"
    >


        <div class="delete-modal-icon">

            <i class="fa-solid fa-trash"></i>

        </div>


        <h2 id="deleteModalTitle">
            Delete livestock?
        </h2>


        <p>

            Are you sure you want to delete

            <strong id="deleteLivestockName"></strong>?

            <br>

            This action cannot be undone.

        </p>


        <div class="delete-modal-actions">


            {{-- CANCEL --}}

            <button
                type="button"

                class="cancel-delete"

                onclick="closeDeleteModal()"
            >

                Cancel

            </button>


            {{-- ACTUAL DELETE FORM --}}

            <form
                id="confirmDeleteForm"

                method="POST"
            >

                @csrf

                @method('DELETE')


                <button
                    type="submit"

                    class="confirm-delete"
                >

                    <i class="fa-solid fa-trash"></i>

                    Delete Livestock

                </button>

            </form>


        </div>

    </div>

</div>



<script>

    /* =========================================
       SEARCH + FILTER
    ========================================= */

    const searchInput =
        document.getElementById('livestockSearch');

    const categoryFilter =
        document.getElementById('categoryFilter');

    const statusFilter =
        document.getElementById('statusFilter');


    function filterLivestock() {

        const searchValue =
            searchInput.value
                .toLowerCase()
                .trim();


        const categoryValue =
            categoryFilter.value
                .toLowerCase();


        const statusValue =
            statusFilter.value
                .toLowerCase();


        const rows =
            document.querySelectorAll('.livestock-row');


        rows.forEach(row => {


            const name =
                row.dataset.name || '';


            const category =
                row.dataset.category || '';


            const status =
                row.dataset.status || '';


            const matchesSearch =
                name.includes(searchValue);


            const matchesCategory =
                categoryValue === '' ||
                category === categoryValue;


            const matchesStatus =
                statusValue === '' ||
                status === statusValue;


            if (
                matchesSearch &&
                matchesCategory &&
                matchesStatus
            ) {

                row.style.display = '';

            } else {

                row.style.display = 'none';

            }

        });

    }


    searchInput.addEventListener(
        'input',
        filterLivestock
    );


    categoryFilter.addEventListener(
        'change',
        filterLivestock
    );


    statusFilter.addEventListener(
        'change',
        filterLivestock
    );



    /* =========================================
       DELETE MODAL
    ========================================= */

    function openDeleteModal(id, name) {

        const modal =
            document.getElementById('deleteModal');


        const nameElement =
            document.getElementById('deleteLivestockName');


        const form =
            document.getElementById('confirmDeleteForm');


        /*
         * Display livestock name
         */

        nameElement.textContent = name;


        /*
         * Set the DELETE form action.
         *
         * This is the important part that was
         * broken in the previous version.
         */

        form.action =
            "{{ url('/livestock') }}/" + id;


        /*
         * Show modal
         */

        modal.classList.add('show');

        modal.setAttribute(
            'aria-hidden',
            'false'
        );


        /*
         * Prevent page scrolling
         */

        document.body.style.overflow = 'hidden';

    }



    function closeDeleteModal() {

        const modal =
            document.getElementById('deleteModal');


        modal.classList.remove('show');

        modal.setAttribute(
            'aria-hidden',
            'true'
        );


        /*
         * Restore scrolling
         */

        document.body.style.overflow = '';

    }



    /* =========================================
       ESCAPE KEY
    ========================================= */

    document.addEventListener(
        'keydown',
        function(event) {

            if (event.key === 'Escape') {

                closeDeleteModal();

            }

        }
    );


</script>

</body>
</html>