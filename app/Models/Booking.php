<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable =[
        'user_id', 'schedule_id','quantity', 'showtime'
    ];
}
