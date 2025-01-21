<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'title',
        'description',
        'poster',
        'price',
        'cast',
        'duration',
        'release_date',
        'genre_id',
    ];
}
