<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the reviews
     */
    public function index()
    {
        //
        $reviews = Review::latest()->get();
        return view('admin.reviews.index')->with([
            'reviews' => $reviews
        ]);
    }

    /**
     * Change review status
     */
    public function toggleReviewStatus(Review $review, $status)
    {
        $review->update([
            'approved' => $status
        ]);

        return redirect()->route('admin.reviews.index')->with([
            'success' => 'Review updated successfully'
        ]);
    }

    /**
     * Delete review
     */
    public function destroy(Review $review)
    {
        $review->delete();

        return redirect()->route('admin.reviews.index')->with([
            'success' => 'Review deleted successfully'
        ]);
    }

}
