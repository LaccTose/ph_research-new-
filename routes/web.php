<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HealthCenterController;
use App\Http\Controllers\UMSCReportController;
use App\Http\Controllers\SMCReportController;
use App\Http\Controllers\PCUReportController;
use App\Http\Controllers\PHCPReportController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;


/*
| Authentication Routes
*/
/*Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});*/

require __DIR__.'/auth.php';


/*
| PRIMARY (งานปฐมภูมิ)
*/
Route::prefix('primary')->group(function () {

    Route::get('/dashboard', [HealthCenterController::class, 'dashboard'])
        ->name('primary.dashboard');

    Route::prefix('report')->group(function () {
        Route::resource('umsc_report', UMSCReportController::class);
        Route::resource('smc_report', SMCReportController::class);
        Route::resource('pcu_report', PCUReportController::class);
        Route::resource('phcp_report', PHCPReportController::class);
    });

    Route::get('/services', [ServiceController::class, 'index'])
        ->name('primary.services');
});


/*
| RESEARCH (งานวิจัย)
*/
Route::prefix('research')->group(function () {
    // ยังไม่เพิ่ม
});


/*
| CALENDAR (ระบบจองห้องประชุม)
*/
Route::prefix('calendar')->group(function () {

    Route::get('/', [CalendarController::class, 'index'])
        ->name('calendar.index');

    // ใช้ resource เฉพาะ create/store/index
    Route::get('/booking', [BookingController::class, 'index'])
        ->name('booking.index');

    Route::get('/booking/create', [BookingController::class, 'create'])
        ->name('booking.create');

    Route::post('/booking', [BookingController::class, 'store'])
        ->name('booking.store');
});


/*
| HOME PAGE (หน้าหลัก)
*/
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/profile', function () {
    return 'profile page';
})->name('profile.page');

Route::get('/documents', function () {
    return view('documents.index');
})->name('documents.index');