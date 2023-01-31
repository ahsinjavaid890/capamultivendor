<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VarientAttr extends Model
{
    use HasFactory;
    protected $fillable =[
        'varient_name',
        'attribute_name',
        'status',
    ];
}
