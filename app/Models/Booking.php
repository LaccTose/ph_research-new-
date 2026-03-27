<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 
class Booking extends Model
{
    protected $fillable = [
        'title',
        'description',
        'start_at',
        'end_at',
        'target_group',
    ];

}

