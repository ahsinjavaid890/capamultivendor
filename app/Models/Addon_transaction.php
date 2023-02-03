<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addon_transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'seller_id',
        'payment_id',
        'amount',
        'status'
    ];
}
