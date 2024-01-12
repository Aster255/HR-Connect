<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Leaf;
use App\Models\User;
use App\Models\Employee;
use App\Models\Location;
use App\Models\Workschedule;
use Illuminate\Http\Request;
use Session;

class EmployeeUserEmployee extends BaseController
{
    public function EmployeeDashboard(Request $request)
    {
        if (Session::has('user_id')) {

            $employee = Employee::query()
                ->select('*')
                ->where("employee_id", "=", Session::get("employee_id"))
                ->get()
                ->first();
            $attendance = Attendance::query()
                ->select('*')
                ->where('employee_id', '=', $employee->employee_id)
                ->get()
                ->first();
            $schedule = Workschedule::query()
                ->select('*')
                ->where('schedule_id', '=', $employee->schedule_id)
                ->get()
                ->first();

            $locations = Location::all();

            return view('Employee.Dashboard', compact('employee', 'attendance', 'schedule', 'locations'));
        }
    }

    public function Attendance()
    {
        if (Session::has('user_id')) {
            $employee = Employee::query()
                ->select('*')
                ->where("employee_id", "=", Session::get("employee_id"))
                ->first(); 
            $attendance = Attendance::query()
                ->select('*')
                ->where('employee_id', '=', $employee->employee_id)
                ->get();

            $schedule = Workschedule::query()
                ->select('*')
                ->where('schedule_id', '=', $employee->schedule_id)
                ->first(); 

            $locations = Location::all();
        }

        return view('Employee.Attendance', compact('employee', 'attendance', 'locations', 'schedule'));
    }



    public function AttendanceLogIn(Request $request)
    {
        if (Session::has('user_id')) {
            $employee = Employee::query()
                ->select('*')
                ->where("employee_id", "=", Session::get("employee_id"))
                ->get()
                ->first();
            $employee_id = $employee->employee_id;
            $schedule_id = $employee->schedule_id;

            $existingAttendance = Attendance::where('employee_id', Session::get("employee_id"))
                ->whereNull('out_time')
                ->first();

            if ($existingAttendance) {
                return redirect('/Attendance')->with('fail', 'You are already logged in. Please log out first.');
            }


            $workschedule = Workschedule::where('schedule_id', $schedule_id)->first();
            if (!$workschedule) {
                return redirect('/Schedule')->with('fail', "You have not selected your schedule");
            }


            $start_time = $workschedule->start_time;
            $login_time = now();
            $time_difference = $login_time->diffInMinutes($start_time);
            $sign = ($time_difference < 0) ? '+' : '-';
            $minutes = abs($time_difference);
            $time_difference_formatted = $sign . $minutes;

            $attendance = new Attendance;
            $attendance->location_id = $request->input('location_id');
            $attendance->employee_id = $employee_id;

            if ($time_difference_formatted < -60) {
                $attendance->in_status = "Early In";
            } elseif ($time_difference_formatted <= -10 && $time_difference_formatted >= -10) {
                $attendance->in_status = "In-Time";
            } elseif ($time_difference_formatted > 30) {
                $attendance->in_status = "Late";
            }

            $attendance->save();

            return redirect('/Attendance')->with('success', 'successfully LogIn, Your ' . $attendance->in_status);
        }
    }

    public function AttendanceLogOut()
    {
        if (Session::has('user_id')) {
            $employee = Employee::query()
                ->select('*')
                ->where("employee_id", "=", Session::get("employee_id"))
                ->first();
            $attendance = Attendance::where('employee_id', $employee->employee_id)
                ->whereNotNull('in_status')
                ->whereNull('out_time')
                ->orderBy('created_at', 'desc')
                ->first();

            if (!$attendance) {
                return redirect('/Attendance')->with('fail', 'You have already logged out.');
            }

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
        }
        return redirect('/Attendance')->with('success', 'Successfully Logged Out, Your ' . $attendance->out_status);
    }

    public function schedule()
    {
        if (Session::has('user_id')) {
            $employee = Employee::query()
                ->select('*')
                ->where("employee_id", "=", Session::get("employee_id"))
                ->first();

            $scheduleId = $employee->schedule_id;
            $schedule = WorkSchedule::where('schedule_id', $scheduleId)->first();
            $workschedule = Workschedule::all();
        }

        return view('Employee.Schedule', compact('employee', 'schedule', 'workschedule'));
    }

    public function getschedule(Request $request, string $id)
    {
        $request->validate([
            'selectschedule' => 'required',
        ]);

        if (Session::has('user_id')) {
            $employee = Employee::where("employee_id", $id)->first();

            if ($employee) {
                $employee->update([
                    'schedule_id' => $request->input('selectschedule'),
                ]);

                return redirect('/Schedule')->with('success', 'You successfully selected your schedule!');
            }
        }

        return redirect()->back()->with('fail', 'Unable to update schedule. Please try again.');
    }

    public function requestschedule(Request $request, string $id)
    {
        $request->validate([
            'requestschedule' => 'required',
        ]);

        if (Session::has('user_id')) {
            $employee = Employee::where("employee_id", $id)->first();

            if ($employee) {
               // Update the schedule only if it's not commented out in your original code
                // $employee->update([
                //     'schedule_id' => $request->input('requestschedule'),
                // ]); 

                return redirect('/Schedule')->with('info', 'THIS IS NOT PART OF OUR DEMO!');
            }
        }

        return redirect()->back()->with('fail', 'Unable to update schedule. Please try again.');
    }
}
