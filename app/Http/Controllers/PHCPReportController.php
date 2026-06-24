<?php

namespace App\Http\Controllers;

use App\Models\PHCPReport;
use Illuminate\Http\Request;

class PHCPReportController extends Controller
{
    public function index()
    {
        return view('primary.report.phcp_report.index');
    }

    public function dashboard()
    {
        return view('primary.report.phcp_report.dashboard');
    }
   
    public function create()
    {
        return view('primary.report.phcp_report.create');
    }
  
    public function store(Request $request)
    {
        //
    }

    public function show(PHCPReport $pHCPReport)
    {
        //
    }

    public function edit(PHCPReport $pHCPReport)
    {
        //
    }

    public function update(Request $request, PHCPReport $pHCPReport)
    {
        //
    }

    public function destroy(PHCPReport $pHCPReport)
    {
        //
    }
}
