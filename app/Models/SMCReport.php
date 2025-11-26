<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SMCReport extends Model
{
    //
    protected $table = 'smc_reports';

    protected $fillable = [
        'user_id',
        'health_center_id',
        'report_date',
        'patient_count',
        'activity',
        'notes',
    ];

}
