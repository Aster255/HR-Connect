<?php

use App\Http\Controllers\Logs;
use App\Http\Controllers\LeaveCreate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceCreate;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeUserEmployee;
use App\Http\Controllers\LeaveController;


Route::get('/Admin/CreateUser', [UserController::class, 'UserCreate']);
Route::post('/Admin/CreateUser', [UserController::class, 'UserStore']);
// log-out=====================================================
Route::get('/logout', [UserController::class, 'logout']);
// Log-in======================================================
Route::get('/', [UserController::class, 'showLogin']);
Route::post('/', [UserController::class, 'Login']);

// Admin=================================================
Route::get('Admin/Dashboard', [AdminController::class, 'ShowDashboard']);
Route::get('Admin/Organization', [AdminController::class, 'ShowOrganization']);
Route::resource('Admin/Organization/Department', DepartmentController::class);
Route::resource('Admin/Organization/Position', PositionController::class);
Route::resource('Admin/Employee', EmployeeController::class);
Route::get('Admin/Attendance', [AdminController::class, 'ShowAttendace']);
Route::get('Admin/Attendance/Calendar', [AdminController::class, 'ShowCalendar']);
Route::get('Admin/Attendance/Schedule', [AttendanceCreate::class, 'ListSchedule']);
Route::post('Admin/Attendance/Schedule', [AttendanceCreate::class, 'CreateSchedule']);
Route::get('Admin/Attendance/Location', [AttendanceCreate::class, 'ListLocation']);
Route::post('Admin/Attendance/Location', [AttendanceCreate::class, 'CreateLocation']);
Route::resource('Admin/Attendance/Log', Logs::class);
Route::get('Admin/Leave', [AdminController::class, 'ShowLeave']);
Route::get('Admin/Leave/Create', [LeaveCreate::class, 'LeaveCreate']);
Route::post('Admin/Leave/Create', [LeaveCreate::class, 'LeaveStore']);
// ===================================================================
Route::get('/Dashboard', [EmployeeUserEmployee::class, 'EmployeeDashboard']);
Route::get('/Profile', [UserController::class, 'Profile']);
Route::get('/trial', [AdminController::class, 'trial']);
Route::get('/Admin/Employee/search', [AdminController::class, 'index'])->name('admin.employee.search');


// ==========================================================
Route::get('/Attendance', [EmployeeUserEmployee::class, 'Attendance']);
Route::post('/Attendance', [EmployeeUserEmployee::class, 'AttendanceLogIn']);
Route::put('/Attendance', [EmployeeUserEmployee::class, 'AttendanceLogOut']);
Route::get('/Schedule', [EmployeeUserEmployee::class, 'schedule']);
Route::post('/Schedule/{id}', [EmployeeUserEmployee::class, 'getschedule']);
Route::put('/Schedule/{id}', [EmployeeUserEmployee::class, 'requestschedule']);
// ==========================================================

Route::resource('/Leave', LeaveController::class);

Route::get('/run-migration', function () {
    Artisan::call('optimize:clear');
    Artisan::call('migrate:refresh --seed');
    return "Migrations executed successfully";
});
