<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpressDelivery extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'express_delivery',
        'time_days',
        'delivery_area',
        'delivery_cast'        
    ];
}
