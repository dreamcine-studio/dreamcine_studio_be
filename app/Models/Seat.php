<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    protected $fillable = [
        'studio_id','seat_number', 'isbooked'
    ];

    public static function isSeatBooked($studioId, $seatNumber)
    {
        return self::where('studio_id', $studioId)
                   ->where('seat_number', $seatNumber)
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

}
