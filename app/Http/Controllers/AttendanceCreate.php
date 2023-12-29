<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Carbon\Carbon;
use App\Models\Workschedule;
use Illuminate\Http\Request;

class AttendanceCreate extends BaseController
{
    public function ListSchedule()
    {
        $schedule = Workschedule::all();

        return view('AdminAttendance.Schedule', compact('schedule'));
    }
    public function CreateSchedule(Request $request)
    {
        $schedule = new Workschedule;

        $schedule->start_time = $request->input('start_time');
        $schedule->end_time = $request->input('end_time');

        $schedule->save();

        return redirect('/Admin/Attendance/Schedule');
    }
    // ===============================================
    public function ListLocation()
    {
        $location = Location::all();
        return view('AdminAttendance.Location', compact('location'));
    }
    public function CreateLocation(Request $request)
    {
        $location = new Location;
        $location->location = $request->input('Location');
        $location->save();

        return redirect('Admin/Attendance/Location');
    }
}
