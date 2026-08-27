<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LivestockController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Services\TermiiSmsService;


/*
|--------------------------------------------------------------------------
| TEMPORARY ADMIN CREATION
|--------------------------------------------------------------------------
| Use this ONCE to create the admin account in the Render PostgreSQL
| database.
|
| URL:
| https://stock-connect.onrender.com/create-admin
|
| IMPORTANT:
| Remove this route after successfully creating the admin account.
|--------------------------------------------------------------------------
*/

Route::get('/create-admin', function () {

    $admin = User::updateOrCreate(
        ['email' => 'admin@stockconnect.com'],
        [
            'name' => 'Stock Connect Admin',
            'password' => Hash::make('Admin@12345'),
            'role' => 'admin',
        ]
    );

    return response()->json([
        'message' => 'Admin account created successfully',
        'email' => $admin->email,
        'role' => $admin->role,
    ]);
});


/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('login');
});


/*
|--------------------------------------------------------------------------
| LIVESTOCK
|--------------------------------------------------------------------------
*/

Route::resource('livestock', LivestockController::class);


/*
|--------------------------------------------------------------------------
| CUSTOMER LIVESTOCK MARKETPLACE
|--------------------------------------------------------------------------
*/

Route::get('/shop/livestock', [LivestockController::class, 'shop'])
    ->middleware('auth')
    ->name('customer.livestock');


/*
|--------------------------------------------------------------------------
| ORDERS
|--------------------------------------------------------------------------
*/

Route::get('/livestock/{livestock}/order', [OrderController::class, 'create'])
    ->middleware('auth')
    ->name('orders.create');

Route::post('/livestock/{livestock}/order', [OrderController::class, 'store'])
    ->middleware('auth')
    ->name('orders.store');

Route::get('/orders/{order}', [OrderController::class, 'show'])
    ->middleware('auth')
    ->name('orders.show');

Route::get('/orders/{order}/payment', [OrderController::class, 'payment'])
    ->middleware('auth')
    ->name('orders.payment');

Route::post('/orders/{order}/payment/confirm', [OrderController::class, 'confirmPayment'])
    ->middleware('auth')
    ->name('orders.payment.confirm');

Route::get('/my-orders', [OrderController::class, 'myOrders'])
    ->middleware('auth')
    ->name('orders.my');


/*
|--------------------------------------------------------------------------
| CUSTOMER HOME
|--------------------------------------------------------------------------
*/

Route::get('/home', function () {

    if (auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    $livestocks = \App\Models\Livestock::where('status', 'available')
        ->where('quantity', '>', 0)
        ->latest()
        ->take(8)
        ->get();

    return view('customer.home', compact('livestocks'));

})->middleware('auth')->name('home');


/*
|--------------------------------------------------------------------------
| ADMIN DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
    ->middleware('auth')
    ->name('admin.dashboard');


/*
|--------------------------------------------------------------------------
| ADMIN LIVESTOCK
|--------------------------------------------------------------------------
|
| The resource routes above already provide the CRUD functionality:
|
| GET       /livestock
| GET       /livestock/create
| POST      /livestock
| GET       /livestock/{livestock}
| GET       /livestock/{livestock}/edit
| PUT/PATCH /livestock/{livestock}
| DELETE    /livestock/{livestock}
|
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| ADMIN ORDERS
|--------------------------------------------------------------------------
*/

Route::get('/admin/orders', [OrderController::class, 'adminIndex'])
    ->middleware('auth')
    ->name('admin.orders.index');

Route::get('/admin/orders/{order}', [OrderController::class, 'adminShow'])
    ->middleware('auth')
    ->name('admin.orders.show');

Route::patch('/admin/orders/{order}/status', [OrderController::class, 'updateStatus'])
    ->middleware('auth')
    ->name('admin.orders.status');


/*
|--------------------------------------------------------------------------
| ADMIN PAYMENTS
|--------------------------------------------------------------------------
*/

Route::get('/admin/payments', [OrderController::class, 'adminPayments'])
    ->middleware('auth')
    ->name('admin.payments.index');

Route::patch('/admin/orders/{order}/payment/confirm', [OrderController::class, 'confirmAdminPayment'])
    ->middleware('auth')
    ->name('admin.orders.payment.confirm');

Route::patch('/admin/orders/{order}/payment/reject', [OrderController::class, 'rejectAdminPayment'])
    ->middleware('auth')
    ->name('admin.orders.payment.reject');


/*
|--------------------------------------------------------------------------
| ADMIN CUSTOMERS
|--------------------------------------------------------------------------
*/

Route::get('/admin/customers', [AdminController::class, 'customers'])
    ->middleware('auth')
    ->name('admin.customers.index');

Route::get('/admin/customers/{user}', [AdminController::class, 'customerShow'])
    ->middleware('auth')
    ->name('admin.customers.show');


/*
|--------------------------------------------------------------------------
| CUSTOMER REVIEWS
|--------------------------------------------------------------------------
*/

Route::get('/orders/{order}/review', [ReviewController::class, 'create'])
    ->middleware('auth')
    ->name('reviews.create');

Route::post('/orders/{order}/review', [ReviewController::class, 'store'])
    ->middleware('auth')
    ->name('reviews.store');


/*
|--------------------------------------------------------------------------
| ADMIN REVIEWS
|--------------------------------------------------------------------------
*/

Route::get('/admin/reviews', [ReviewController::class, 'index'])
    ->middleware('auth')
    ->name('admin.reviews.index');

Route::patch('/admin/reviews/{review}/approve', [ReviewController::class, 'approve'])
    ->middleware('auth')
    ->name('admin.reviews.approve');

Route::patch('/admin/reviews/{review}/hide', [ReviewController::class, 'hide'])
    ->middleware('auth')
    ->name('admin.reviews.hide');


/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/

Route::post('/logout', function (Request $request) {

    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login');

})->middleware('auth')->name('logout');


/*
|--------------------------------------------------------------------------
| TEST SMS
|--------------------------------------------------------------------------
|
| Temporary Termii SMS test route.
|
|--------------------------------------------------------------------------
*/

Route::get('/test-sms', function (TermiiSmsService $sms) {

    $sms->send(
        '2348166353167',
        'Stock Connect test SMS. Your Termii integration is working successfully.'
    );

    return 'SMS sent successfully!';
});