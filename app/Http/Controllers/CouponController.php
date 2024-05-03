<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCouponRequest;
use App\Http\Requests\UpdateCouponRequest;
use App\Models\Coupon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $coupons = Coupon::latest()->get();
        return view('admin.coupons.index')->with([
            'coupons' => $coupons
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCouponRequest $request)
    {
        //
        if ($request->validated()) {
            Coupon::create([
                'name' => Str::upper($request->name),
                'discount' => $request->discount,
                'validity' => $request->validity,
            ]);

            return redirect()->route('admin.coupons.index')->with([
                'success' => 'Coupon added successfully'
            ]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Coupon $coupon)
    {
        //
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coupon $coupon)
    {
        //
        return view('admin.coupons.edit')->with([
            'coupon'=> $coupon
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCouponRequest $request, Coupon $coupon)
    {
        //
        if ($request->validated()) {
            $coupon->update([
                'name' => Str::upper($request->name),
                'discount' => $request->discount,
                'validity' => $request->validity,
            ]);

            return redirect()->route('admin.coupons.index')->with([
                'success' => 'Coupon updated successfully'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        //
        $coupon->delete();
        return redirect()->route('admin.coupons.index')->with([
            'success'=> 'Coupon deleted successfully'
        ]);

    }
}
