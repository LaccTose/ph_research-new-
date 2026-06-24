<?php

namespace App\Http\Controllers;

use App\Models\PCUReport;
use Illuminate\Http\Request;

class PCUReportController extends Controller
{
    public function index()
    {
        return view('primary.report.pcu_report.index');
    }

    public function dashboard()
    {
        return view('primary.report.pcu_report.dashboard');
    }

    public function create()
    {
        return view('primary.report.pcu_report.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(PCUReport $pCUReport)
    {
        //
    }

    public function edit(PCUReport $pCUReport)
    {
        //
    }

    public function update(Request $request, PCUReport $pCUReport)
    {
        //
    }

    public function destroy(PCUReport $pCUReport)
    {
        //
    }
}
