<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Customers | Stock Connect</title>

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

            --blue: #4e78d8;
            --blue-soft: #edf3ff;

            --red: #dc5555;
            --red-soft: #ffeded;
        }

        body {
            font-family: 'Poppins', Arial, sans-serif;
            background: var(--background);
            color: var(--text);
        }

        a {
            text-decoration: none;
        }

        .page {
            min-height: 100vh;
            padding: 32px;
        }

        .container {
            max-width: 1450px;
            margin: auto;
        }

        /* HEADER */

        .page-header {
            margin-bottom: 28px;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            color: var(--muted);

            font-size: 12px;

            margin-bottom: 12px;
        }

        .back-button:hover {
            color: var(--green-dark);
        }

        .page-header h1 {
            font-size: 27px;
            margin-bottom: 6px;
        }

        .page-header p {
            color: var(--muted);
            font-size: 13px;
        }

        /* SUMMARY */

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;

            margin-bottom: 22px;
        }

        .summary-card {
            background: white;

            border: 1px solid var(--border);

            border-radius: 13px;

            padding: 20px;

            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .summary-card span {
            display: block;

            color: var(--muted);

            font-size: 11px;

            margin-bottom: 7px;
        }

        .summary-card strong {
            font-size: 24px;
        }

        .summary-icon {
            width: 44px;
            height: 44px;

            border-radius: 10px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: var(--green-soft);

            color: var(--green-dark);
        }

        /* MAIN CARD */

        .customers-card {
            background: white;

            border: 1px solid var(--border);

            border-radius: 14px;

            overflow: hidden;
        }

        .customers-header {
            padding: 20px;

            border-bottom: 1px solid var(--border);

            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .customers-header h2 {
            font-size: 16px;
            margin-bottom: 4px;
        }

        .customers-header p {
            color: var(--muted);
            font-size: 11px;
        }

        /* SEARCH */

        .filters {
            padding: 17px 20px;

            border-bottom: 1px solid var(--border);
        }

        .search-box {
            position: relative;

            max-width: 400px;
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

            height: 40px;

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

        /* TABLE */

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;

            border-collapse: collapse;

            min-width: 900px;
        }

        th {
            padding: 13px 18px;

            background: #fafcfb;

            border-bottom: 1px solid var(--border);

            text-align: left;

            color: var(--muted);

            font-size: 10px;

            text-transform: uppercase;

            letter-spacing: .5px;
        }

        td {
            padding: 15px 18px;

            border-bottom: 1px solid #f0f2f0;

            font-size: 12px;

            vertical-align: middle;
        }

        tbody tr:hover {
            background: #fbfdfb;
        }

        /* CUSTOMER */

        .customer-info {
            display: flex;

            align-items: center;

            gap: 10px;
        }

        .avatar {
            width: 38px;
            height: 38px;

            border-radius: 50%;

            background: var(--green-soft);

            color: var(--green-dark);

            display: flex;

            align-items: center;
            justify-content: center;

            font-weight: 700;

            font-size: 12px;

            flex-shrink: 0;
        }

        .customer-details strong {
            display: block;

            font-size: 12px;

            margin-bottom: 3px;
        }

        .customer-details span {
            display: block;

            color: var(--muted);

            font-size: 10px;
        }

        /* ORDERS */

        .orders-count {
            font-weight: 700;
        }

        .orders-label {
            display: block;

            color: var(--muted);

            font-size: 10px;

            margin-top: 3px;
        }

        /* MONEY */

        .money {
            font-weight: 700;
        }

        /* STATUS */

        .status {
            display: inline-flex;

            align-items: center;

            gap: 6px;

            padding: 6px 9px;

            border-radius: 20px;

            background: var(--green-soft);

            color: var(--green-dark);

            font-size: 10px;

            font-weight: 600;
        }

        .status-dot {
            width: 6px;
            height: 6px;

            border-radius: 50%;

            background: var(--green);
        }

        /* BUTTON */

        .view-button {
            display: inline-flex;

            align-items: center;

            gap: 7px;

            padding: 8px 11px;

            border: 1px solid var(--border);

            border-radius: 7px;

            background: white;

            color: var(--green-dark);

            font-size: 10px;

            font-weight: 600;
        }

        .view-button:hover {
            background: var(--green-soft);

            border-color: #c9e8cf;
        }

        /* EMPTY */

        .empty-state {
            text-align: center;

            padding: 60px 20px;
        }

        .empty-state i {
            font-size: 28px;

            color: var(--green-dark);

            margin-bottom: 12px;
        }

        .empty-state h3 {
            font-size: 16px;

            margin-bottom: 6px;
        }

        .empty-state p {
            color: var(--muted);

            font-size: 12px;
        }

        /* RESPONSIVE */

        @media(max-width: 850px) {

            .page {
                padding: 20px;
            }

            .summary-grid {
                grid-template-columns: 1fr;
            }

            .customers-header {
                align-items: flex-start;

                flex-direction: column;

                gap: 10px;
            }

        }

        @media(max-width: 600px) {

            .page {
                padding: 14px;
            }

            .page-header h1 {
                font-size: 23px;
            }

        }

    </style>

</head>

<body>

<div class="page">

    <div class="container">

        {{-- HEADER --}}

        <div class="page-header">

            <a
                href="{{ route('admin.dashboard') }}"
                class="back-button"
            >
                <i class="fa-solid fa-arrow-left"></i>

                Back to Dashboard
            </a>

            <h1>
                Customer Management
            </h1>

            <p>
                View and manage customers who use the Stock Connect marketplace.
            </p>

        </div>


        {{-- SUMMARY --}}

        <div class="summary-grid">

            <div class="summary-card">

                <div>

                    <span>
                        Total Customers
                    </span>

                    <strong>
                        {{ $customers->count() }}
                    </strong>

                </div>

                <div class="summary-icon">

                    <i class="fa-solid fa-users"></i>

                </div>

            </div>


            <div class="summary-card">

                <div>

                    <span>
                        Total Orders
                    </span>

                    <strong>
                        {{ $customers->sum('orders_count') }}
                    </strong>

                </div>

                <div class="summary-icon">

                    <i class="fa-solid fa-cart-shopping"></i>

                </div>

            </div>


            <div class="summary-card">

                <div>

                    <span>
                        Customer Sales
                    </span>

                    <strong>
                        ₦{{ number_format($customers->sum('orders_sum_total_price'), 0) }}
                    </strong>

                </div>

                <div class="summary-icon">

                    <i class="fa-solid fa-naira-sign"></i>

                </div>

            </div>

        </div>


        {{-- CUSTOMERS --}}

        <div class="customers-card">

            <div class="customers-header">

                <div>

                    <h2>
                        Customers
                    </h2>

                    <p>
                        Customer accounts and purchasing activity.
                    </p>

                </div>

                <div>

                    {{ $customers->count() }} customers

                </div>

            </div>


            {{-- SEARCH --}}

            <div class="filters">

                <div class="search-box">

                    <i class="fa-solid fa-magnifying-glass"></i>

                    <input
                        type="text"
                        id="customerSearch"
                        placeholder="Search customer by name or email..."
                    >

                </div>

            </div>


            {{-- TABLE --}}

            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>

                            <th>
                                Customer
                            </th>

                            <th>
                                Phone
                            </th>

                            <th>
                                Orders
                            </th>

                            <th>
                                Total Spent
                            </th>

                            <th>
                                Joined
                            </th>

                            <th>
                                Status
                            </th>

                            <th>
                                Action
                            </th>

                        </tr>

                    </thead>


                    <tbody id="customersTable">

                    @forelse($customers as $customer)

                        <tr class="customer-row">

                            <td>

                                <div class="customer-info">

                                    <div class="avatar">

                                        {{ strtoupper(
                                            substr(
                                                $customer->name ?? 'C',
                                                0,
                                                1
                                            )
                                        ) }}

                                    </div>

                                    <div class="customer-details">

                                        <strong>
                                            {{ $customer->name ?? 'Customer' }}
                                        </strong>

                                        <span>
                                            {{ $customer->email }}
                                        </span>

                                    </div>

                                </div>

                            </td>


                            <td>

                                {{ $customer->phone ?? 'Not provided' }}

                            </td>


                            <td>

                                <span class="orders-count">

                                    {{ $customer->orders_count }}

                                </span>

                                <span class="orders-label">

                                    Order{{ $customer->orders_count == 1 ? '' : 's' }}

                                </span>

                            </td>


                            <td>

                                <span class="money">

                                    ₦{{ number_format(
                                        $customer->orders_sum_total_price ?? 0,
                                        0
                                    ) }}

                                </span>

                            </td>


                            <td>

                                {{ $customer->created_at
                                    ? $customer->created_at->format('M d, Y')
                                    : 'N/A'
                                }}

                            </td>


                            <td>

                                <span class="status">

                                    <span class="status-dot"></span>

                                    Active

                                </span>

                            </td>


                            <td>

                                <a
                                    href="{{ route(
                                        'admin.customers.show',
                                        $customer->id
                                    ) }}"
                                    class="view-button"
                                >

                                    <i class="fa-solid fa-eye"></i>

                                    View

                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7">

                                <div class="empty-state">

                                    <i class="fa-solid fa-users"></i>

                                    <h3>
                                        No customers yet
                                    </h3>

                                    <p>
                                        Customer accounts will appear here once users register.
                                    </p>

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


<script>

const searchInput =
    document.getElementById('customerSearch');

const rows =
    document.querySelectorAll('.customer-row');

searchInput.addEventListener('input', function () {

    const search =
        this.value.toLowerCase().trim();

    rows.forEach(row => {

        const text =
            row.innerText.toLowerCase();

        row.style.display =
            text.includes(search)
                ? ''
                : 'none';

    });

});

</script>

</body>

</html>