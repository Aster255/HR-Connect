<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use App\Models\Location;
use App\Models\Workschedule;
use Illuminate\Http\Request;

class Logs extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attendance = Attendance::all();
        $employee = Employee::all();
        $locations = Location::all();
        return view('AdminAttendance.Loglist', compact('employee', 'locations', 'attendance'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employee = Employee::all();
        $locations = Location::all();
        return view('AdminAttendance.AttendanceLogIn', compact('employee', 'locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $employee = Employee::where('employee_id', $request->input('employee_id'))->first();
        $schedule_id = $employee->schedule_id;

        if (!$employee->schedule_id) {
            return redirect()->back()->with('fail', "$employee->first_name $employee->last_name didn't choose a schedule.");
        }
        
        $workschedule = Workschedule::where('schedule_id', $schedule_id)->first();
        if (!$workschedule) {
            return redirect()->back()->with('fail', "$employee->first_name $employee->last_name didn't choose a schedule.");
        }

        $start_time = $workschedule->start_time;
        $login_time = now();
        $time_difference = $login_time->diffInMinutes($start_time);
        $sign = ($time_difference < 0) ? '+' : '-';
        $minutes = abs($time_difference);
        $time_difference_formatted = $sign . $minutes;
        
        $attendance = new Attendance;
        $attendance->location_id = $request->input('location_id');
        $attendance->employee_id = $request->input('employee_id');
        
        $acceptable_early_late_minutes = 10;
        
        if ($time_difference_formatted < -$acceptable_early_late_minutes) {
            $attendance->in_status = "Early In";
        } elseif ($time_difference_formatted >= -$acceptable_early_late_minutes && $time_difference_formatted <= $acceptable_early_late_minutes) {
            $attendance->in_status = "In-Time";
        } elseif ($time_difference_formatted > $acceptable_early_late_minutes) {
            $attendance->in_status = "Late";
        }     
        

        $attendance->save();

        return redirect('/Admin/Attendance/Log')->with('success', 'successfully LogIn, Your ' . $attendance->in_status);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $attendance = Attendance::find($id);
        $employee = Employee::all();
        $locations = Location::all();
        return view('AdminAttendance.AttendanceLogOut', compact('employee', 'locations', 'attendance'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $attendance = Attendance::find($id);
        $employeeId = $attendance->employee_id;
        $employee = Employee::find($employeeId);


        $schedule_id = $employee->schedule_id;
        $workschedule = Workschedule::where('schedule_id', $schedule_id)->first();
        $end_time = $workschedule->end_time;
        $login_time = now();
        $time_difference = $login_time->diffInMinutes($end_time);
        $sign = ($time_difference < 0) ? '+' : '-';
        $minutes = abs($time_difference);
        $time_difference_formatted = $sign . $minutes;


        $attendance->out_time = $login_time;
        if ($time_difference_formatted < -60) {
            $attendance->out_status = "Early Out";
        } elseif ($time_difference_formatted <= -10 && $time_difference_formatted >= -10) {
            $attendance->out_status = "Out-Time";
        } elseif ($time_difference_formatted >= 30) {
            $attendance->out_status = "Over Time";
        }

        $attendance->save();

        return redirect('/Admin/Attendance/Log')->with('success', 'Successfully Logged In, Your ' . $attendance->out_status);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
