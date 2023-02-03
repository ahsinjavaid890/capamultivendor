<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable =[
        'subcat_name',
        'category_name',
        'status',
    ];

    public function parentCategory() {
        return $this->belongsTo(Category::class, 'category_name', 'id');
    }
}
