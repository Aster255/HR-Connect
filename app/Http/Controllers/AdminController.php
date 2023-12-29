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
        $attendance = Attendance::paginate(10);
        $employee = Employee::paginate(10);
        $totalemployee = $employee->count();
        $today = Carbon::today()->toDateString();

        $totalEmployeesLoggedInToday = Attendance::whereDate('attendance_date', $today)
            ->distinct('employee_id')
            ->count('employee_id');

        // $TotalLogIn = [$totalemployee, $totalEmployeesLoggedInToday];
        // $InStatus_EarlyIn = Attendance::whereDate('attendance_date', $today)
        //     ->where('in_status', 'Early In')
        //     ->distinct('employee_id')
        //     ->count('employee_id');
        // $InStatus_Intime = Attendance::whereDate('attendance_date', $today)
        //     ->where('in_status', 'In-Time')
        //     ->distinct('employee_id')
        //     ->count('employee_id');
        // $InStatus_Late = Attendance::whereDate('attendance_date', $today)
        //     ->where('in_status', 'Late')
        //     ->distinct('employee_id')
        //     ->count('employee_id');
        // $OutStatus_EarlyOut = Attendance::whereDate('attendance_date', $today)
        //     ->where('out_status', 'Early Out')
        //     ->distinct('employee_id')
        //     ->count('employee_id');
        // $OutStatus_OutTime = Attendance::whereDate('attendance_date', $today)
        //     ->where('out_status', 'Out-Time')
        //     ->distinct('employee_id')
        //     ->count('employee_id');
        // $OutStatus_OverTime = Attendance::whereDate('attendance_date', $today)
        //     ->where('out_status', 'Over Time')
        //     ->distinct('employee_id')
        //     ->count('employee_id');

        // $TotalStatus = [$InStatus_EarlyIn, $InStatus_Intime, $InStatus_Late, $OutStatus_EarlyOut, $OutStatus_OutTime, $OutStatus_OverTime];

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
}
