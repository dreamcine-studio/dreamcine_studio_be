<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScheduleShowtime extends Model
{
    protected $fillable = [
        'schedule_id', 'showtime_id'
    ];

    public function schedule() {
        return $this->belongsTo(Schedule::class);
    }
    public function showtime() {
        return $this->belongsTo(Showtime::class);
    }

}
