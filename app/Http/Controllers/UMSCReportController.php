<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UMSCReportController extends Controller
{
    public function index()
    {
        return view('primary.report.umsc_report.index');
    }

    public function create()
    {
        return view('primary.report.umsc_report.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('umsc_report.index')
            ->with('success', 'บันทึกรายงานเรียบร้อย');
    }

    public function edit($id)
    {
        return view('report.umsc_report.edit');
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('umsc_report.index')
            ->with('success', 'แก้ไขข้อมูลเรียบร้อย');
    }

    public function destroy($id)
    {
        return redirect()->route('umsc_report.index')
            ->with('success', 'ลบข้อมูลเรียบร้อย');
    }
}
