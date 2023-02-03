<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestProposal extends Model
{
    use HasFactory;
    protected $fillable = [
        'request_id',
        'vendor_id',
        'product_cost',
        'product_timeline',
        'message'
    ];
}
