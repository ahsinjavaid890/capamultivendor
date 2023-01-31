<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addon_order extends Model
{
    use HasFactory;
    protected $fillable = [
        'plan_id',
        'seller_id',
        'amount',
        'status'
    ];
}
