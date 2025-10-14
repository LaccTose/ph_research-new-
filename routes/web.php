<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HealthCenterController;
use App\Http\Controllers\UMSCReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//healtecentercontroller ทำให้ dashboard เป็น public
Route::get('/dashboard', [HealthCenterController::class, 'dashboard']);

//ทำให้หน้าบันทึกเป็น private (redirect ไปหน้า login)
Route::middleware('auth')->group(function () {
    Route::get('/umsc-report/create', [UMSCReportController::class, 'create']);
    Route::get('/umsc-report', [UMSCReportController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
