<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Store new review
     */
    public function store(Request $request)
    {
        $review = Review::where([
            'product_id' => $request->product_id,
            'user_id' => $request->user_id,
        ])->first();

        if($review) {
            return response()->json([
                'success' => false,
                'message' => 'You have already reviewed this product!',
            ]);
        } else {
            $data = $request->all();
            Review::create($data);

            return response()->json([
                'success' => true,
                'message' => 'Your review has been added and will be published soon!',
            ]);

        }

    }

    /**
     * Update review
     */
     public function updateReview(Request $request)
     {
        $review = Review::where([
            'product_id' => $request->product_id,
            'user_id' => $request->user_id,
        ])->first();

        if ($review) {
            $review->update([
                'title' => $request->title,
                'body' => $request->body,
                'rating' => $request->rating,
                'approved' => 0
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Your review has been updated and will be published soon!',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong try again later!',
            ]);
        }

     }

     /**
      * Delete review
      */
      public function deleteReview(Request $request)
      {
        $review = Review::where([
            'product_id' => $request->product_id,
            'user_id' => $request->user_id,
        ])->first();

        if ($review) {
            $review->delete();
            return response()->json([
                'success' => true,
                'message' => 'Review removed successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong try again later!'
            ]);
        }

      }

}
