<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class HealthCenter extends Model
{
    //Model นี้สามารถใช้ factory ได้
    use HasFactory;

    protected $fillable = [
        'name',
        'district',
        'subdistrict',
        'phone',
        'facebook',
        'line',
        'address',
    ];

    public function reports()
    {
        return $this->hasMany(UMSCReport::class);
    }
}
