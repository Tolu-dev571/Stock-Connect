<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Order;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ADMIN — REVIEW MANAGEMENT
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        // Only administrators can access review management
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403);
        }

        // Get all reviews with related information
        $reviews = Review::with([
            'user',
            'livestock',
            'order'
        ])
        ->latest()
        ->get();

        // Review statistics
        $totalReviews = Review::count();

        $pendingReviews = Review::where('status', 'pending')
            ->count();

        $approvedReviews = Review::where('status', 'approved')
            ->count();

        $hiddenReviews = Review::where('status', 'hidden')
            ->count();

        // Average rating from approved reviews only
        $averageRating = Review::where('status', 'approved')
            ->avg('rating');

        // If there are no approved reviews, display 0
        $averageRating = $averageRating ?? 0;

        return view('admin.reviews.index', compact(
            'reviews',
            'totalReviews',
            'pendingReviews',
            'approvedReviews',
            'hiddenReviews',
            'averageRating'
        ));
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN — APPROVE REVIEW
    |--------------------------------------------------------------------------
    */

    public function approve(Review $review)
    {
        // Only administrators
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403);
        }

        $review->update([
            'status' => 'approved',
        ]);

        return redirect()
            ->route('admin.reviews.index')
            ->with(
                'success',
                'Review approved successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN — HIDE REVIEW
    |--------------------------------------------------------------------------
    */

    public function hide(Review $review)
    {
        // Only administrators
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403);
        }

        $review->update([
            'status' => 'hidden',
        ]);

        return redirect()
            ->route('admin.reviews.index')
            ->with(
                'success',
                'Review hidden successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | CUSTOMER — REVIEW FORM
    |--------------------------------------------------------------------------
    */

    public function create(Order $order)
    {
        // Customer must be logged in
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Customer can only review their own order
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        // Only completed orders can be reviewed
        if ($order->status !== 'completed') {
            return redirect()
                ->route('orders.show', $order->id)
                ->with(
                    'error',
                    'You can only review an order after it has been completed.'
                );
        }

        // Prevent duplicate reviews
        if ($order->review) {
            return redirect()
                ->route('orders.show', $order->id)
                ->with(
                    'error',
                    'You have already reviewed this order.'
                );
        }

        // Load livestock information
        $order->load('livestock');

        return view(
            'customer.review',
            compact('order')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | CUSTOMER — SUBMIT REVIEW
    |--------------------------------------------------------------------------
    */

    public function store(Request $request, Order $order)
    {
        // Customer must be logged in
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Customer can only review their own order
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        // Only completed orders can be reviewed
        if ($order->status !== 'completed') {
            return redirect()
                ->route('orders.show', $order->id)
                ->with(
                    'error',
                    'You can only review a completed order.'
                );
        }

        // Prevent duplicate reviews
        if ($order->review) {
            return redirect()
                ->route('orders.show', $order->id)
                ->with(
                    'error',
                    'You have already reviewed this order.'
                );
        }

        // Validate review
        $validated = $request->validate([
            'rating' => [
                'required',
                'integer',
                'min:1',
                'max:5'
            ],

            'comment' => [
                'nullable',
                'string',
                'max:2000'
            ],
        ]);

        // Create review
        Review::create([
            'user_id' => auth()->id(),
            'livestock_id' => $order->livestock_id,
            'order_id' => $order->id,
            'rating' => $validated['rating'],
            'comment' => $validated['comment'] ?? null,
            'status' => 'pending',
        ]);

        return redirect()
            ->route('orders.show', $order->id)
            ->with(
                'success',
                'Your review has been submitted and is waiting for admin approval.'
            );
    }
}