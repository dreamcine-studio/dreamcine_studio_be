<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable =[
        'user_id', 'schedule_showtime_id','seat_id','quantity', 'amount'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function scheduleShowtime() {
        return $this->belongsTo(ScheduleShowtime::class);
    }
    public function seat() {
        return $this->belongsTo(Seat::class);
    }

}
