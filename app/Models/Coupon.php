<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable = [
        'coupon_title',
        'coupon_code',
        'coupon_offer',
        'coupon_desc',
        'expiry_date'        
    ];
}
