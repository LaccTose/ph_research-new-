<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class BookingController extends Controller
{
    public function create()
    {
        return view('calendar.bookings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'start_date' => 'required|unique:bookings,title',
            'end_date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'target' => 'required|array',
        ], [
            'title.unique' => 'ชื่อเรื่องนี้มีการจองในระบบแล้ว กรุณาตรวจสอบอีกครั้ง',
        ]);

        $start_at = $request->start_date . ' ' . $request->start_time; //
        $end_at = $request->end_date . ' ' . $request->end_time;

        Booking::create([
            'title' => $request->title,
            'description' => $request->description,
            'start_at' => $start_at,
            'end_at' => $end_at,
            'target_group' => implode(', ', $request->target), //
        ]);
        return redirect()->route('booking.create')->with('success', 'บันทึกข้อมูลสำเร็จ');
    }
}

