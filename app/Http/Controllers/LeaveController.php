<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Leave;
use App\Models\Employee;
use App\Models\LeaveType;
use Illuminate\Http\Request;

class LeaveController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Session::has('user_id')) {
            $employee = Employee::query()
                ->select('*')
                ->where("employee_id", "=", Session::get("employee_id"))
                ->first();

            $leaves = LeaveType::all();
            $leave = Leave::all();

            return view('Employee.Leave', compact('leave', 'leaves', 'employee'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Session::has('user_id')) {
            $employee = Employee::query()
                ->select('*')
                ->where("employee_id", "=", Session::get("employee_id"))
                ->first();
            $leave = Leave::query()
                ->select('*')
                ->where("employee_id", "=", Session::get("employee_id"))
                ->get();
            $leavelist = LeaveType::all();
            return view('Employee.CreateLeave', compact('leave', 'leavelist', 'employee'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestleave = new Leave;
        $requestleave->start_date = $request->input('start_date');
        $requestleave->end_date = $request->input('end_date');
        $requestleave->status = $request->input('status');
        $requestleave->leavetype_id = $request->input('leavetype_id');

        if (Session::has('user_id')) {
            $employee_id = Session::get('employee_id');
            $requestleave->employee_id = $employee_id;
            $requestleave->save();

            return redirect('/Leave')->with("success", "Successfully sent a Leave Request!");
        }
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
        $employee = Employee::findOrFail($id);
        $leave = Leave::all();
        return view('AdminLeave.ShowLeave', compact('employee', 'leave'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $leave = Leave::findOrFail($id);
        $leave->update([
            'status' => $request->input('status'),
            'department_status' => $request->input('department_status')
        ]);
        return redirect('/Admin/Leave')->with("success", "Successfully sent a Leave Request!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
