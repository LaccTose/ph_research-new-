<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SMCReport extends Model
{
    //
    protected $table = 'smc_reports';

    protected $fillable = [
    'smc',
    'month_year',
    'smcWalkInCount',
    'smcReferInCount',
    'smcReferInUnitName',
    'smcReferInUnitCount',
    'teleconsultTotal',
    'teleconsultHcToHc',
    'teleconsultHcToHosp',
    'referOutTotal',
    'referOutWalkIn',
    'referOutFromHc',
    'referOutHospName',
    'referOutHospCount',
];

}
