<?php

namespace App\Http\Controllers;

use App\Models\SMCReport;
use Illuminate\Http\Request;

class SMCReportController extends Controller
{
    public function index()
    {
        $reports = SMCReport::orderBy('created_at', 'desc')->get();
        return view('primary.report.smc_report.index', compact('reports'));
    }

    public function create()
    {
        return view('primary.report.smc_report.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'smc' => 'required',
            'month_year' => 'required',

            'smcReferInCount' => 'nullable|integer|min:0',
            'teleconsultTotal' => 'nullable|integer|min:0',
            'smcWalkInCount' => 'nullable|integer|min:0',
            'referOutTotal' => 'nullable|integer|min:0',
            'referOutWalkIn' => 'nullable|integer|min:0',
            'referOutFromHc' => 'nullable|integer|min:0',

            'smcReferInUnitName' => [
                function ($attribute, $value, $fail) use ($request) {
                    if ($request->smcReferInCount > 0 && empty($value)) {
                        $fail('กรุณาระบุชื่อหน่วยบริการ');
                    }
                }
            ],

            'smcReferInUnitCount' => [
                function ($attribute, $value, $fail) use ($request) {
                    if ($request->smcReferInCount > 0 && ($value === null || $value === '')) {
                        $fail('กรุณาระบุจำนวนครั้ง');
                    }
                }
            ],
        ]);

        SMCReport::create($request->only([
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
        ]));

        return redirect()->route('smc_report.index')->with('success', 'บันทึกสำเร็จ');
    }

    public function destroy(string $id)
    {
        $report = SMCReport::findOrFail($id);
        $report->delete();
        return redirect()->route('smc_report.index')->with('success', 'ลบข้อมูลเรียบร้อย');
    }

    public function dashboard()
    {
        return view('primary.report.smc_report.dashboard');
    }

    // ฟังก์ชันอื่นๆ (show, edit, update) อย่าลืมใส่ Logic 
}
