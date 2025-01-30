<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'movie_id',
        'studio_id',
        'showtime',
        'showdate_start',
        'showdate_end'
    ];

    protected $casts = [
        'showtime' => 'json', // Simpan sebagai JSON
    ];

    // Getter
    public function getShowtimeAttribute($value)
    {
        return json_decode($value, true) ?: []; // Gunakan null coalescing operator (??)
    }

    // Setter
    public function setShowtimeAttribute($value)
    {
        $this->attributes['showtime'] = json_encode($value);
    }

}

