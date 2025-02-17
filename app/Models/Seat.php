<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    protected $fillable = [
        'schedule_showtime_id', 'showdate', 'seat_number', 'isbooked'
    ];

    public static function isSeatBooked($scheduleShowtimeId, $seatNumber)
    {
        return self::where('schedule_showtime_id', $scheduleShowtimeId)
                   ->whereIn('seat_number', $seatNumber)
                   ->where('isbooked', true)
                   ->exists();
    }

    protected $casts = [
        'seat_number' => 'json', // Simpan sebagai JSON
    ];

    public function getSeatNumberAttribute($value)
    {
        return json_decode($value, true) ?: []; // Gunakan null coalescing operator (??)
    }

    // Setter
    public function setSeatNumberAttribute($value)
    {
        $this->attributes['seat_number'] = json_encode($value);
    }

    public function scheduleSHowtime() {
        return $this->belongsTo(ScheduleShowtime::class);
    }


}
