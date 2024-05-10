<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'status', 'redeemed_at'];
    
        public function brand(): HasOne
        {
            return $this->hasOne(Brand::class);
        }
}
