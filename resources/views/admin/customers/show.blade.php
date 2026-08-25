<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Customer Details | Stock Connect</title>

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

        body {
            font-family: Arial, sans-serif;
            background: #f7f9f7;
            color: #17201a;
        }

        a {
            text-decoration: none;
        }

        .page {
            min-height: 100vh;
            padding: 32px;
        }

        .container {
            max-width: 1200px;
            margin: auto;
        }

        .back {
            display: inline-flex;
            gap: 8px;

            color: #7c867f;

            font-size: 12px;

            margin-bottom: 20px;
        }

        .back:hover {
            color: #269c38;
        }

        .profile-card {
            background: white;

            border: 1px solid #e8ece9;

            border-radius: 14px;

            padding: 25px;

            margin-bottom: 20px;

            display: flex;

            align-items: center;

            gap: 18px;
        }

        .avatar {
            width: 65px;
            height: 65px;

            border-radius: 50%;

            background: #eaf9ed;

            color: #269c38;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 22px;

            font-weight: 700;
        }

        .profile-info h1 {
            font-size: 22px;

            margin-bottom: 6px;
        }

        .profile-info p {
            color: #7c867f;

            font-size: 12px;

            margin-bottom: 4px;
        }

        .grid {
            display: grid;

            grid-template-columns: repeat(3, 1fr);

            gap: 15px;

            margin-bottom: 20px;
        }

        .stat {
            background: white;

            border: 1px solid #e8ece9;

            border-radius: 12px;

            padding: 20px;
        }

        .stat span {
            display: block;

            color: #7c867f;

            font-size: 11px;

            margin-bottom: 8px;
        }

        .stat strong {
            font-size: 22px;
        }

        .card {
            background: white;

            border: 1px solid #e8ece9;

            border-radius: 14px;

            overflow: hidden;
        }

        .card-header {
            padding: 20px;

            border-bottom: 1px solid #e8ece9;
        }

        .card-header h2 {
            font-size: 16px;

            margin-bottom: 4px;
        }

        .card-header p {
            color: #7c867f;

            font-size: 11px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;

            border-collapse: collapse;

            min-width: 700px;
        }

        th {
            text-align: left;

            padding: 13px 18px;

            background: #fafcfb;

            border-bottom: 1px solid #e8ece9;

            color: #7c867f;

            font-size: 10px;

            text-transform: uppercase;
        }

        td {
            padding: 15px 18px;

            border-bottom: 1px solid #f0f2f0;

            font-size: 12px;
        }

        .status {
            padding: 6px 9px;

            border-radius: 20px;

            background: #eaf9ed;

            color: #269c38;

            font-size: 10px;

            font-weight: 600;
        }

        .empty {
            text-align: center;

            padding: 50px;

            color: #7c867f;

            font-size: 12px;
        }

        @media(max-width: 700px) {

            .page {
                padding: 15px;
            }

            .grid {
                grid-template-columns: 1fr;
            }

            .profile-card {
                align-items: flex-start;

                flex-direction: column;
            }

        }

    </style>

</head>

<body>

<div class="page">

    <div class="container">

        <a
            href="{{ route('admin.customers.index') }}"
            class="back"
        >

            <i class="fa-solid fa-arrow-left"></i>

            Back to Customers

        </a>


        {{-- CUSTOMER PROFILE --}}

        <div class="profile-card">

            <div class="avatar">

                {{ strtoupper(
                    substr(
                        $user->name ?? 'C',
                        0,
                        1
                    )
                ) }}

            </div>

            <div class="profile-info">

                <h1>
                    {{ $user->name ?? 'Customer' }}
                </h1>

                <p>
                    <i class="fa-solid fa-envelope"></i>

                    {{ $user->email }}
                </p>

                <p>
                    <i class="fa-solid fa-phone"></i>

                    {{ $user->phone ?? 'Phone not provided' }}
                </p>

            </div>

        </div>


        {{-- STATISTICS --}}

        <div class="grid">

            <div class="stat">

                <span>
                    Total Orders
                </span>

                <strong>
                    {{ $user->orders->count() }}
                </strong>

            </div>


            <div class="stat">

                <span>
                    Total Spent
                </span>

                <strong>

                    ₦{{ number_format(
                        $user->orders->sum('total_price'),
                        0
                    ) }}

                </strong>

            </div>


            <div class="stat">

                <span>
                    Customer Since
                </span>

                <strong>

                    {{ $user->created_at
                        ? $user->created_at->format('M Y')
                        : 'N/A'
                    }}

                </strong>

            </div>

        </div>


        {{-- ORDER HISTORY --}}

        <div class="card">

            <div class="card-header">

                <h2>
                    Order History
                </h2>

                <p>
                    Orders placed by this customer.
                </p>

            </div>


            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>

                            <th>
                                Order
                            </th>

                            <th>
                                Livestock
                            </th>

                            <th>
                                Quantity
                            </th>

                            <th>
                                Amount
                            </th>

                            <th>
                                Payment
                            </th>

                            <th>
                                Status
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                    @forelse($user->orders as $order)

                        <tr>

                            <td>
                                #{{ $order->id }}
                            </td>

                            <td>

                                {{ $order->livestock->name
                                    ?? 'Livestock'
                                }}

                            </td>

                            <td>
                                {{ $order->quantity }}
                            </td>

                            <td>

                                ₦{{ number_format(
                                    $order->total_price,
                                    0
                                ) }}

                            </td>

                            <td>

                                {{ ucfirst(
                                    $order->payment_status
                                    ?? 'unpaid'
                                ) }}

                            </td>

                            <td>

                                <span class="status">

                                    {{ ucfirst(
                                        $order->status
                                        ?? 'pending'
                                    ) }}

                                </span>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="6"
                                class="empty"
                            >

                                This customer has not placed any orders yet.

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

</body>

</html>