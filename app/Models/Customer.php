<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use Notifiable;    
    use HasFactory;

    protected $guard = 'cust';
    protected $fillable=[
        'fname',
        'lname',
        'email',
        'mobile',
        'password',
        'status',
    ];
}
