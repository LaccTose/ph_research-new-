<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportsController extends Controller
{
    // แสดงหน้ารายงานทั้งหมด
    public function index()
    {
        return view('report.index');
    }

    // แสดงหน้าฟอร์มเพิ่มรายงานใหม่
    public function create()
    {
        return view('report.create');
    }

    // บันทึกข้อมูลรายงานใหม่
    public function store(Request $request)
    {
        // TODO: เพิ่มโค้ดบันทึกข้อมูลในอนาคต
        return redirect()->route('report.index')->with('success', 'บันทึกรายงานเรียบร้อย');
    }

    // แสดงหน้าฟอร์มแก้ไขรายงาน
    public function edit($id)
    {
        // TODO: ดึงข้อมูลรายงานตาม $id
        return view('report.edit');
    }

    // อัปเดตข้อมูลรายงาน
    public function update(Request $request, $id)
    {
        // TODO: เพิ่มโค้ดอัปเดตข้อมูลในอนาคต
        return redirect()->route('report.index')->with('success', 'แก้ไขข้อมูลเรียบร้อย');
    }

    // ลบรายงาน
    public function destroy($id)
    {
        // TODO: เพิ่มโค้ดลบข้อมูลในอนาคต
        return redirect()->route('report.index')->with('success', 'ลบข้อมูลเรียบร้อย');
    }
}
