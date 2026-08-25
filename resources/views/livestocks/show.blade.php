<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $livestock->name }} - Stock Connect</title>
</head>

<body>

    <h1>Stock Connect</h1>

    <h2>{{ $livestock->name }}</h2>

    <p>
        <strong>Category:</strong>
        {{ $livestock->category }}
    </p>

    <p>
        <strong>Breed:</strong>
        {{ $livestock->breed ?? 'Not specified' }}
    </p>

    <p>
        <strong>Price:</strong>
        ₦{{ number_format($livestock->price) }}
    </p>

    <p>
        <strong>Quantity Available:</strong>
        {{ $livestock->quantity }}
    </p>

    <p>
        <strong>Age:</strong>
        {{ $livestock->age ?? 'Not specified' }}
    </p>

    <p>
        <strong>Weight:</strong>
        {{ $livestock->weight ?? 'Not specified' }} kg
    </p>

    <p>
        <strong>Status:</strong>
        {{ $livestock->status }}
    </p>

    <h3>Description</h3>

    <p>
        {{ $livestock->description ?? 'No description available.' }}
    </p>

    @if($livestock->status === 'available' && $livestock->quantity > 0)

    <a href="{{ route('orders.create', $livestock->id) }}">
    <button type="button">
        Order Now
    </button>
    </a>

    @else

        <p>Currently unavailable.</p>

    @endif

    <br><br>

    <a href="{{ route('livestock.index') }}">
        ← Back to Livestock
    </a>

</body>
</html>