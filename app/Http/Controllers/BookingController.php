<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Model;

class BookingController extends Controller
{
        public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $start_at = $request->start_date . ' ' . $request->start_time;
        $end_at = $request->end_date . ' ' . $request->end_time;

        Booking::create([
            'title' => $request->title,
            'description' => $request->description,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at,
            'target_group' => $request->target_group,
        ]);

        return redirect()->route('calendar.index')->with('success', 'บันทึกการจองเรียบร้อย');
    }
}

