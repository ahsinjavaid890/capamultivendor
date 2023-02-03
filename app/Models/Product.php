<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_title',
        'product_code',
        'category',
        'subcategory',
        'prod_price',
        'sale_price',
        'cast_price',
        'prodict_unit',
        'stock_alert',
        'short_desc',
        'long_desc',
        'varient',
        'express_delivery',
        'delivery_with_fess',
        'delivery_location',
        'delivery_area',
        'featured_img',
        'video',
        'gallery',
        'warranty',
        'status',
    ];

    public function scopeActive($query) {
        $query->where('status', 2);
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category', 'id');
    }

    public function subCategory() {
        return $this->belongsTo(SubCategory::class, 'subcategory', 'id');
    }
}
