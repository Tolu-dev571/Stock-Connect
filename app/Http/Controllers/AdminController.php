<?php

namespace App\Http\Controllers;

use App\Models\Livestock;
use App\Models\Order;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Only administrators can access this dashboard
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403);
        }

        /*
        |--------------------------------------------------------------------------
        | DASHBOARD STATISTICS
        |--------------------------------------------------------------------------
        */

        $totalLivestock = Livestock::count();

        $totalOrders = Order::count();

        $totalCustomers = User::where('role', 'customer')->count();


        /*
        |--------------------------------------------------------------------------
        | REVENUE
        |--------------------------------------------------------------------------
        | Only orders with confirmed payments are included.
        */

        $totalRevenue = Order::where('payment_status', 'confirmed')
            ->sum('total_price');


        /*
        |--------------------------------------------------------------------------
        | ORDER STATUS
        |--------------------------------------------------------------------------
        */

        $pendingOrders = Order::where('status', 'pending')->count();

        $confirmedOrders = Order::where('status', 'confirmed')->count();

        $processingOrders = Order::where('status', 'processing')->count();

        $completedOrders = Order::where('status', 'completed')->count();

        $cancelledOrders = Order::where('status', 'cancelled')->count();


        /*
        |--------------------------------------------------------------------------
        | PAYMENT STATUS
        |--------------------------------------------------------------------------
        */

        $pendingPayments = Order::where('payment_status', 'pending')->count();

        $confirmedPayments = Order::where('payment_status', 'confirmed')->count();


        /*
        |--------------------------------------------------------------------------
        | RECENT ORDERS
        |--------------------------------------------------------------------------
        */

        $recentOrders = Order::with('livestock')
            ->latest()
            ->take(6)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | RECENT CUSTOMERS
        |--------------------------------------------------------------------------
        */

        $recentCustomers = User::where('role', 'customer')
            ->latest()
            ->take(5)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | SEND DATA TO DASHBOARD
        |--------------------------------------------------------------------------
        */

        return view('admin.dashboard', compact(
            'totalLivestock',
            'totalOrders',
            'totalCustomers',
            'totalRevenue',

            'pendingOrders',
            'confirmedOrders',
            'processingOrders',
            'completedOrders',
            'cancelledOrders',

            'pendingPayments',
            'confirmedPayments',

            'recentOrders',
            'recentCustomers'
        ));
    }

    public function customers()
    {
    $customers = \App\Models\User::where('role', '!=', 'admin')
        ->withCount('orders')
        ->withSum('orders', 'total_price')
        ->latest()
        ->get();

    return view('admin.customers.index', compact('customers'));
    }

public function customerShow(\App\Models\User $user)
    {
    $user->load([
        'orders' => function ($query) {
            $query->with('livestock')->latest();
        }
    ]);

    return view('admin.customers.show', compact('user'));
    }
}