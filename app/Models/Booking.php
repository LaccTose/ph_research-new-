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
        'chairman',
        'targets',
        'participants',
        'department',
        'coodinatot',
        'phone',
    ];

    protected $dates = [
        'start_at'=>'start_date',
        'end_at'=>'end_date',
    ];
}

