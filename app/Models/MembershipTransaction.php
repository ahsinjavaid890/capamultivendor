<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipTransaction extends Model
{
    use HasFactory;
    protected $fillable=[
        'seller_id',
        'plan',
        'title',
        'amount',
        'order_id',
        'transaction_id',
    ];
}
