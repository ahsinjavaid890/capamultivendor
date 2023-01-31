<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Seller extends Authenticatable
{
    use Notifiable;    
    use HasFactory;
    protected $guard = 'seller';
    protected $fillable=[
        'fname',
        'lname',
        'email',
        'mobile',
        'password',
        'emirates_id',
        'account_title',
        'bank',
        'account_no',
        'paypal_id',
        'stripe_id',
        'registered_as',
        'company_name',
        'company_address',
        'payment_option',
        'delivery_by',
        'contact_address',
        'zipcode',        
        'city',
        'product_type',
        'otp',
        'status',
    ];
}
