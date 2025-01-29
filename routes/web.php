<?php

use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\QRCodeScanController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AttendanceController; // Import AttendanceController

// Include the auth routes
require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('/admin/dashboard', function () {
    return view('admin_dashboard');
})->name('admin.dashboard');

Route::get('/student/dashboard', function () {
    $classId = auth()->user()->class_id; // Assuming class_id is a field in the User model
    return view('student_dashboard', compact('classId'));
})->name('student.dashboard');

Route::get('/dashboard', function () {
    // Logic to determine user role and redirect accordingly
    if (auth()->user()->isAdmin()) {
        return redirect()->route('admin.dashboard');
    } else {
        return redirect()->route('student.dashboard');
    }
})->name('dashboard');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');

// Adding the QR code generation route
Route::post('/qrcode/generate', [QRCodeController::class, 'generate'])->name('qrcode.generate');

// Adding the QR code history route
Route::get('/qrcode/history', [QRCodeController::class, 'history'])->name('qrcode.history');

// Adding the attendance history route
Route::get('/attendance/history', [AttendanceController::class, 'attendanceHistory'])->name('attendance.history');

// Adding the attendance mark route
Route::post('/attendance/mark', [AttendanceController::class, 'markAttendance'])->name('attendance.mark');

// Adding CRUD routes for attendance
Route::post('/attendance/create', [AttendanceController::class, 'createAttendance'])->name('attendance.create');
Route::put('/attendance/update/{id}', [AttendanceController::class, 'updateAttendance'])->name('attendance.update');
Route::delete('/attendance/delete/{id}', [AttendanceController::class, 'deleteAttendance'])->name('attendance.delete');
