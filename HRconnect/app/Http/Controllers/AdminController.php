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

class AdminController extends Controller
{
    public function ShowDashboard(Request $request)
    {
        $user_id = $request->session()->get('user_id');
        $employee_id = $request->session()->get('employee_id');

        $employee = Employee::query()
            ->select('*')
            ->where('employee_id', '=', $employee_id)
            ->first();

        return view('AdminDashboard/Dashboard', compact('employee'));
    }
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
    public function ShowCalendar()
    {
        return view('AdminAttendance.Calendar');
    }
    public function ShowLeave()
    {
        $leave = Leaf::all();
        $leavetypes = LeaveType::all();
        $employee = Employee::all();
        return view('AdminLeave.Leave', compact('leave', 'leavetypes', 'employee'));
    }

    public function trial()
    {
        return redirect()->back()->with('info', 'NOT PART OF OUR DEMO');
    }
}
