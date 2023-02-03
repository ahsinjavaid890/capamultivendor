<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerDoc extends Model
{
    use HasFactory;
    protected $fillable = [
        'seller_id',
        'name_of_license',
        'license_no',
        'license_exp_date',
        'company_logo',
        'trade_license_img',
        'passport_img',
        'emirates_id_img',
        'status',
    ];
}
