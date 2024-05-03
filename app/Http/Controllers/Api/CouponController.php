<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Apply coupon
     */
    public function applyCoupon(Request $request)
    {
        $coupon = Coupon::whereName($request->name)
                        ->where('validity', '>=', Carbon::now()
                        ->format('Y-m-d h:i:s'))
                        ->first();

        if($coupon) {
            return response()->json([
                'success' => true,
                'message' => 'Coupon applied successfully',
                'coupon' => $coupon
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Invalid or expired coupon!',
            ]);
        }


    }
}
