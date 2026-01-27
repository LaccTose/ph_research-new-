<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Booking extends Model
{
    protected $fillable = [
        'title',
        'start_at',
        'end_at',
        'status',
        'user_id',
    ];

    protected $casts = [
        'start_at' => 'datetime',
        'end_at' => 'datetime',
    ];
}
