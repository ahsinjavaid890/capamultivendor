<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_attr extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'qty',
        'price',
        'color_id',
        'size_id',
        'img_attr'
    ];
}
