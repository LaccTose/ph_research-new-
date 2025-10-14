<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        // จะไปแสดงที่ไฟล์ views/services.blade.php
        return view('services');
    }
}
