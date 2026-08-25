<?php

namespace App\Http\Controllers;

use App\Models\Livestock;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Notifications\OrderCreatedNotification;
use App\Notifications\PaymentConfirmedNotification;
use App\Notifications\PaymentRejectedNotification;
use App\Notifications\OrderCompletedNotification;
use Illuminate\Support\Facades\Notification;

class OrderController extends Controller
{
    public function create(Livestock $livestock)
    {
        return view('orders.create', compact('livestock'));
    }

    public function store(Request $request, Livestock $livestock)
    {
       $validated = $request->validate([
        'customer_name' => 'required|string|max:255',
        'customer_email' => 'required|email|max:255',
        'customer_phone' => 'required|string|max:20',
        'delivery_address' => 'required|string',
        'quantity' => 'required|integer|min:1',
    ]);

    // Check if enough livestock is available
    if ($validated['quantity'] > $livestock->quantity) {
        return back()
            ->withErrors([
                'quantity' => 'Only ' . $livestock->quantity . ' animals are currently available.'
            ])
            ->withInput();
    }

    // Calculate total price
    $totalPrice = $livestock->price * $validated['quantity'];

    // Create the order
    $order = Order::create([
        'user_id' => auth()->id(),
        'livestock_id' => $livestock->id,
        'customer_name' => $validated['customer_name'],
        'customer_email' => $validated['customer_email'],
        'customer_phone' => $validated['customer_phone'],
        'delivery_address' => $validated['delivery_address'],
        'quantity' => $validated['quantity'],
        'total_price' => $totalPrice,
        'status' => 'pending',
    ]);

   // Load livestock information for the notification
$order->load('livestock');

// Reduce available livestock quantity
$livestock->decrement('quantity', $validated['quantity']);

// Send order confirmation notification
    Notification::route('mail', $order->customer_email)
    ->notify(new OrderCreatedNotification($order));

    // Redirect to order confirmation
    return redirect()
    ->route('orders.payment', $order->id)
    ->with('success', 'Order created successfully!');
    }

 public function show(Order $order)
{
    if ($order->user_id !== auth()->id()) {
        abort(403);
    }

    $order->load('livestock');

    return view('orders.show', compact('order'));
}

    public function payment(Order $order)
    {
    return view('orders.payment', compact('order'));
    }

    public function paymentForm(Order $order)
    {
    return view('orders.payment-confirm', compact('order'));
    }

    public function myOrders()
    {
    $orders = auth()->user()
        ->orders()
        ->with('livestock')
        ->latest()
        ->get();

    return view('orders.my-orders', compact('orders'));
    }

    public function adminIndex()
{
    $orders = Order::with('livestock', 'user')
        ->latest()
        ->get();

    return view('admin.orders.index', compact('orders'));
}

    public function adminShow(Order $order)
    {
    $order->load('livestock', 'user');

    return view('admin.orders.show', compact('order'));
    }

public function updateStatus(Request $request, Order $order)
{
    $validated = $request->validate([
        'status' => 'required|in:pending,confirmed,processing,completed,cancelled',
    ]);

    $order->update([
        'status' => $validated['status'],
    ]);

    // Send completion notification when the order is completed
    if ($validated['status'] === 'completed') {

        $order->load('livestock');

        Notification::route('mail', $order->customer_email)
            ->notify(new OrderCompletedNotification($order));
    }

    return redirect()
        ->route('admin.orders.show', $order->id)
        ->with('success', 'Order status updated successfully.');
}  

public function confirmPayment(Request $request, Order $order)
{
    if ($order->user_id !== auth()->id()) {
        abort(403);
    }

    $validated = $request->validate([
        'payment_reference' => 'required|string|max:255',
        'payment_proof' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
    ]);

    // Save payment proof
    $paymentProofPath = $request
        ->file('payment_proof')
        ->store('payment-proofs', 'public');

    // Update order
    $order->update([
        'payment_reference' => $validated['payment_reference'],
        'payment_proof' => $paymentProofPath,
        'payment_status' => 'pending',
    ]);

    return redirect()
        ->route('orders.show', $order->id)
        ->with(
            'success',
            'Payment proof submitted successfully. Your payment is now waiting for verification.'
        );
}

public function confirmAdminPayment(Order $order)
{
    $order->update([
        'payment_status' => 'confirmed',
        'status' => 'confirmed',
    ]);

    // Load livestock information for the email
    $order->load('livestock');

    // Send payment confirmation email to the customer
    Notification::route('mail', $order->customer_email)
        ->notify(new PaymentConfirmedNotification($order));

    return redirect()
        ->route('admin.orders.show', $order->id)
        ->with(
            'success',
            'Payment confirmed successfully.'
        );
}

public function rejectAdminPayment(Order $order)
{
    $order->update([
        'payment_status' => 'failed',
    ]);

    // Load livestock information for the email
    $order->load('livestock');

    // Send payment rejection email to the customer
    Notification::route('mail', $order->customer_email)
        ->notify(new PaymentRejectedNotification($order));

    return redirect()
        ->route('admin.orders.show', $order->id)
        ->with('success', 'Payment rejected successfully.');
}

public function adminPayments()
{
    $payments = Order::with('livestock', 'user')
        ->whereNotNull('payment_reference')
        ->latest()
        ->get();

    $pendingPayments = Order::where('payment_status', 'pending')
        ->whereNotNull('payment_reference')
        ->count();

    $confirmedPayments = Order::where('payment_status', 'confirmed')
        ->count();

    $rejectedPayments = Order::where('payment_status', 'failed')
        ->count();

    $confirmedRevenue = Order::where('payment_status', 'confirmed')
        ->sum('total_price');

    return view('admin.payments.index', compact(
        'payments',
        'pendingPayments',
        'confirmedPayments',
        'rejectedPayments',
        'confirmedRevenue'
    ));
}

}