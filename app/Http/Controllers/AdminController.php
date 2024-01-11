<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Position;
use App\Models\Attendance;
use App\Models\Department;
use App\Models\Leaf;
use App\Models\LeaveType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdminController extends BaseController
{
    // Show the DashBoard
    public function ShowDashboard(Request $request)
    {
        $user_id = $request->session()->get('user_id');
        $employee_id = $request->session()->get('employee_id');
        $employee = Employee::query()
            ->select('*')
            ->where('employee_id', '=', $employee_id)
            ->first();

        //get Employee with attendance
        $employeelist = Employee::all();
        $totalemployee = $employeelist->count();
        $today = Carbon::today()->toDateString();

        $totalEmployeesLoggedInToday = Attendance::whereDate('attendance_date', $today)
            ->distinct('employee_id')
            ->count('employee_id');

        $pendingLeaveCount = Leaf::where('status', 'pending')
            ->count();


        return view('AdminDashboard/Dashboard', compact('employee', 'totalemployee', 'totalEmployeesLoggedInToday', 'pendingLeaveCount'));
    }


    //Show the Organization webpage
    public function ShowOrganization()
    {
        $positionlist = Position::query()
            ->select('positions.*', 'departments.*')
            ->join('departments', 'departments.department_id', '=', 'positions.department_id')
            ->orderByDesc('positions.position_id')
            ->paginate(10);
        $departmentlist = Department::query()
            ->select('*')
            ->orderbyDesc('department_id')
            ->paginate(10);
        return view('AdminOrganization.Organization', compact('departmentlist', 'positionlist'));
    }

    //Show the Attendance webpage
    public function ShowAttendace()
    {
        $attendance = Attendance::all();
        $employee = Employee::all();
        $totalemployee = $employee->count();
        $today = Carbon::today()->toDateString();

        $totalEmployeesLoggedInToday = Attendance::whereDate('attendance_date', $today)
            ->distinct('employee_id')
            ->count('employee_id');

        return view('AdminAttendance.Attendance', compact('employee', 'totalEmployeesLoggedInToday', 'attendance', 'totalemployee', 'totalEmployeesLoggedInToday'));
    }

    // SHow the Calendar webpage
    public function ShowCalendar()
    {
        return view('AdminAttendance.Calendar');
    }

    // Show the Leave webpage
    public function ShowLeave()
    {
        $leave = Leaf::all();
        $leavetypes = LeaveType::all();
        $employee = Employee::all();
        return view('AdminLeave.Leave', compact('leave', 'leavetypes', 'employee'));
    }


    // This is Demo info show
    public function trial()
    {
        return redirect()->back()->with('info', 'NOT PART OF OUR DEMO');
    }

    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $employees = Employee::where('employee_id', 'LIKE', "%$search%")
                ->orWhere(function ($query) use ($search) {
                    $query->where('first_name', 'LIKE', "%$search%")
                        ->orWhere('last_name', 'LIKE', "%$search%");
                })
                ->get();
        } else {
            $employees = Employee::all();
        }

        return view('adminemployee.employee', compact('employees'));
    }
}
