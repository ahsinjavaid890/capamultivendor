<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'seller_id',
        'service_name',
        'cat_id',
        'subcat_id',
        'image',
        'contact_details'
    ];
}
