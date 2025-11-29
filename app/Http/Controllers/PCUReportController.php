<?php

namespace App\Http\Controllers;

use App\Models\PCUReport;
use Illuminate\Http\Request;

class PCUReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('report.pcu_report.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('report.pcu_report.create');
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
    public function show(PCUReport $pCUReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PCUReport $pCUReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PCUReport $pCUReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PCUReport $pCUReport)
    {
        //
    }
}
