<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'movie_id',
        'studio_id',
        'showdate_start',
        'showdate_end'
    ];


// public function showtimes() {
//     return $this->hasMany(ScheduleShowtime::class);
// }




}
