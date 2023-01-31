<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
        'seller_id',
        'cust_id',
        'cust_add_id',
        'cart_id',
        'product_id',
        'qty',
        'payment_mode',
        'status'       
    ];
}
