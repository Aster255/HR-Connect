<?php

use App\Http\Controllers\Logs;
use App\Http\Controllers\LeaveCreate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceCreate;
use App\Http\Controllers\AuditLogController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeUserEmployee;
use App\Http\Controllers\LeaveController;
use Illuminate\Support\Facades\Artisan;

// log-out=====================================================
Route::get('/logout', [UserController::class, 'logout']);
// Log-in======================================================
Route::get('/', [UserController::class, 'showLogin']);
Route::post('/', [UserController::class, 'Login']);

// Admin=================================================

Route::prefix('Admin')->group(function () {
    Route::get('Dashboard', [AdminController::class, 'ShowDashboard']);
    Route::get('Auditlog', [AuditLogController::class, 'index']);

    Route::prefix('Employee')->group(function () {
        Route::resource('', EmployeeController::class);
        Route::get('{id}/CreateUser', [UserController::class, 'UserCreate']);
        Route::post('{id}/CreateUser', [UserController::class, 'UserStore']);
        Route::get('search', [AdminController::class, 'index'])->name('admin.employee.search');
    });

    Route::prefix('Organization')->group(function () {
        Route::get('', [AdminController::class, 'Show']);
        Route::resource('Department', DepartmentController::class);
        Route::resource('Position', PositionController::class);
    });

    Route::prefix('Attendance')->group(function () {
        Route::get('', [AdminController::class, 'ShowAttendace']);
        Route::get('Calendar', [AdminController::class, 'ShowCalendar']);
        Route::get('Schedule', [AttendanceCreate::class, 'ListSchedule']);
        Route::post('Schedule', [AttendanceCreate::class, 'CreateSchedule']);
        Route::get('Location', [AttendanceCreate::class, 'ListLocation']);
        Route::post('Location', [AttendanceCreate::class, 'CreateLocation']);
        Route::resource('Log', Logs::class);
    });

    Route::prefix('Leave')->group(function () {
        Route::get('', [AdminController::class, 'ShowLeave']);
        Route::get('Create', [LeaveCreate::class, 'LeaveCreate']);
        Route::post('Create', [LeaveCreate::class, 'LeaveStore']);
    });
});

// ===================================================================
Route::get('/Dashboard', [EmployeeUserEmployee::class, 'EmployeeDashboard']);
Route::get('/Profile', [UserController::class, 'Profile']);
Route::get('/trial', [AdminController::class, 'trial']);

// ==========================================================
Route::get('/Attendance', [EmployeeUserEmployee::class, 'Attendance']);
Route::post('/Attendance', [EmployeeUserEmployee::class, 'AttendanceLogIn']);
Route::put('/Attendance', [EmployeeUserEmployee::class, 'AttendanceLogOut']);
Route::post('/Schedule/{id}', [EmployeeUserEmployee::class, 'getschedule']);
Route::put('/Schedule/{id}', [EmployeeUserEmployee::class, 'requestschedule']);
// ==========================================================

Route::resource('/Leave', LeaveController::class);

Route::get('/run-migration', function () {
    Artisan::call('optimize:clear');
    Artisan::call('migrate:refresh --seed');
    return "Migrations executed successfully";
});
