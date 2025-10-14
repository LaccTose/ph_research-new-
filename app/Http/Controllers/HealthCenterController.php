<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HealthCenter;
use App\Models\UMSCReport;

class HealthCenterController extends Controller
{
    public function dashboard()
    {
        $totalCenters = HealthCenter::count();
        $totalReports = UMSCReport::count();
        $recentReports = UMSCReport::latest()->take(10)->get();

        return view('dashboard', compact('totalCenters', 'totalReports', 'recentReports'));
    }
}
