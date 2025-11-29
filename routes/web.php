<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HealthCenterController;
use App\Http\Controllers\UMSCReportController;
use App\Http\Controllers\SMCReportController;
use App\Http\Controllers\PCUReportController;
use App\Http\Controllers\PHCPReportController;
use App\Models\HealthCenter;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\BookingController;

use App\Http\Controllers\ReportsController;

Route::get('/', function () {
    return view('welcome');
});

//healtecentercontroller ทำให้ dashboard เป็น public
Route::get('/dashboard', [HealthCenterController::class, 'dashboard'])
    ->name('dashboard');

//ทำให้หน้าบันทึกเป็น private (redirect ไปหน้า login)
/*Route::middleware('auth')->group(function () {
    Route::get('/umsc-report/create', [UMSCReportController::class, 'create']);
    Route::get('/umsc-report', [UMSCReportController::class, 'store']);
});*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');

require __DIR__.'/auth.php';

Route::get('/dashboard', [HealthCenterController::class, 'dashboard'])
    ->name('dashboard');

Route::get('/services', [ServiceController::class, 'index'])->name('services');

Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar.index');//calendar

/*Route::get('/', function () {
    $events = App\Models\Event::all(); 
    return view('index', compact('events'));
});*/

Route::prefix('report')->group(function () {
    Route::resource('umsc_report', UMSCReportController::class);
});

Route::prefix('report')->group(function () {
    Route::resource('smc_report', SMCReportController::class);
});

Route::prefix('report')->group(function () {
    Route::resource('pcu_report', PCUReportController::class);
});

Route::prefix('report')->group(function () {
    Route::resource('phcp_report', PHCPReportController::class);
});

Route::get('/test', function () {
    return view('test');
});

