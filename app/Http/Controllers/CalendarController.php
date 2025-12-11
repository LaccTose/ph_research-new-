<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
{
    $events = [
        [
            'title' => 'ประชุมแผนงานสุขาภิบาล',
            'start' => '2025-11-03T09:00:00',
            'end' => '2025-11-03T12:00:00',
            'chairman' => 'นพ.สมชาย สุขดี',
            'target' => 'แพทย์',
            'coordinator' => 'คุณศิริพร โทร. 081-2345678',
        ],
        [
            'title' => 'อบรมพยาบาลประจำปี',
            'start' => '2025-11-05T13:00:00',
            'end' => '2025-11-05T16:00:00',
            'chairman' => 'พญ.จันทร์จิรา รัตนากร',
            'target' => 'พยาบาลวิชาชีพ',
            'coordinator' => 'คุณณัฐกานต์ โทร. 081-9876543',
        ],
    ];

    return view('calendar.index', compact('events'));
}
}