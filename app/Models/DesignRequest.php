<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesignRequest extends Model
{
    use HasFactory;
    protected $fillable=[
        'cat_id',
        'cust_id',
        'subcat_id',
        'product_name',
        'product_desc',
        'product_img',
        'height',
        'width',
        'depth',
        'color',
        'material',
        'fabric',
        'cost',
        'weight',
        'delivery_date',
        'delivery_area'
    ];
}
