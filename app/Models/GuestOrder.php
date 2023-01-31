<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'guser_id',
        'seller_id',
        'product_id',
        'qty',
        'payment_mode',
        'payment_id',
        'amount'
    ];
}
