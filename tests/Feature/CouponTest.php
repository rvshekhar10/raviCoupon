<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Coupon;

class CouponTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_can_create_coupon()
    {
        $response = $this->post('/coupons', [
            // Provide coupon data here
        ]);
        
        $response->assertStatus(201);
    }
    
    public function test_can_retrieve_coupon()
    {
        $coupon = Coupon::factory()->create();
        
        $response = $this->get('/coupons/' . $coupon->id);
        
        $response->assertStatus(200);
    }
    
    public function test_can_update_coupon()
    {
        $coupon = Coupon::factory()->create();
        
        $response = $this->put('/coupons/' . $coupon->id, [
            // Provide updated coupon data here
        ]);
        
        $response->assertStatus(200);
    }
    
    public function test_can_delete_coupon()
    {
        $coupon = Coupon::factory()->create();
        
        $response = $this->delete('/coupons/' . $coupon->id);
        
        $response->assertStatus(204);
    }
    
    public function test_can_redeem_coupon()
    {
        $coupon = Coupon::factory()->create();
        
        $response = $this->post('/coupons/' . $coupon->id . '/redeem');
        
        $response->assertStatus(200);
    }
}
