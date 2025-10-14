<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UMSCReport extends Model
{
     use HasFactory;

    protected $fillable = [
        'user_id',
        'health_center_id',
        'report_date',
        'patient_count',
        'activity',
        'notes',
    ];

    public function healthCenter()
    {
        return $this->belongsTo(HealthCenter::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $table = 'umsc_reports'; // ชื่อ table ที่ตรงกับ Migration

}
