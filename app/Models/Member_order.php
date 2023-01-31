<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member_order extends Model
{
    use HasFactory;
    protected $fillable = [        
        'seller_id',
        'plan_id',
        'status'
    ];
}
