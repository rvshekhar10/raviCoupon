<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Resources\CouponResource;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CouponResource::collection(Coupon::all());
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(CouponRequest $request)
    {
        $coupon = Coupon::create($request->validated());
        return new CouponResource($coupon);
    }

    /**
     * Display the specified resource.
     */
    public function show(Coupon $coupon)
    {
        return new CouponResource($coupon);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CouponRequest $request, Coupon $coupon)
    {
    $coupon->update($request->validated());
    return new CouponResource($coupon);
    
    }


        /**
     * Update the specified resource in storage.
     */
    public function redeem(Coupon $coupon)
    {
        $coupon->update([
            'redeemed_at' => now(),
            'status' => 'redeemed',
        ]);
    return new CouponResource($coupon);
    
    }

    public function redeemCoupon(Request $request)
    {
        // Validate request parameters
        $request->validate([
            'coupon_code' => 'required|string',
            // Add more validation rules if needed
        ]);

        // Check if coupon exists and is valid
        $coupon = Coupon::where('code', $request->coupon_code)
                        ->whereNull('redeemed_at')
                        ->first();

        if (!$coupon) {
            return response()->json(['message' => 'Invalid coupon code'], 404);
        }

        // Redeem the coupon
        $coupon->redeemed_at = now();
        $coupon->status = 'redeemed';
        $coupon->save();

        // Perform any additional actions if needed

        return response()->json(['message' => 'Coupon redeemed successfully']);
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return response()->noContent();
    }
}
