<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Model;

class BookingController extends Controller
{
    /*public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required',
        'start_date' => 'required|date',
        'end_date' => 'required|date',
        'start_time' => 'required',
        'end_time' => 'required',
    ]);

    // เก็บข้อมูลลงฐานข้อมูล (ตัวอย่าง)
    Booking::create([
        'title' => $request->title,
        'start' => $request->start_date . ' ' . $request->start_time,
        'end' => $request->end_date . ' ' . $request->end_time,
        'chairman' => $request->chairman_name,
        'targets' => json_encode($request->targets),
        'participants' => $request->participants,
        'department' => $request->department,
        'coordinator' => $request->coordinator_name,
        'phone' => $request->coordinator_phone,
    ]);

    return redirect()->route('calendar.index')->with('success', 'บันทึกการจองเรียบร้อย');
}*/

public function create()
{
    return view('calendar.bookings.create');

}

public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required',
        'start_date' => 'required|date',
        'end_date' => 'required|date',
        'start_time' => 'required',
        'end_time' => 'required',
    ]);

    Booking::create([
        'title' => $request->title,
        'start' => $request->start_date . ' ' . $request->start_time,
        'end' => $request->end_date . ' ' . $request->end_time,
        'chairman' => $request->chairman_name,
        'targets' => json_encode($request->targets),
        'participants' => $request->participants,
        'department' => $request->department,
        'coordinator' => $request->coordinator_name,
        'phone' => $request->coordinator_phone,
    ]);
    
    return redirect()->route('calendar.index')->with('success', 'บันทึกการจองสำเร็จ');
}

}

