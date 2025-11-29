<?php

namespace App\Http\Controllers;

use App\Models\PHCPReport;
use Illuminate\Http\Request;

class PHCPReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('report.phcp_report.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('report.phcp_report.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PHCPReport $pHCPReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PHCPReport $pHCPReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PHCPReport $pHCPReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PHCPReport $pHCPReport)
    {
        //
    }
}
