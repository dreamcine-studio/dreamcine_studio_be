<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable =[
        'payment_code','booking_id','payment_method_id','amount','payment_date', 'status'
    ];

}
