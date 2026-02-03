<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class CalendarController extends Controller
{
    public function index()
    {
        $bookings = Booking::select(
            'id',
            'title',
            'start_at',
            'end_at',
            'status',
        )->get();

        return view('calendar.index', compact('bookings'));

        //เอาไว้เช็ค fullcalendar
        $events = Booking::all()->map(function ($booking) {
        return [
            'id' => $booking->id,
            'title' => $booking->title,
            'start' => $booking->start_at->toISOString(),
            'end' => $booking->end_at->toISOString(),
        ];
    });

        return view('calendar.index', compact('events'));
    }
}
