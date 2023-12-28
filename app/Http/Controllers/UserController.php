<?php

namespace App\Http\Controllers;

use Session;
use App\Models\User;
use App\Models\Employee;
use App\Models\Position;
use App\Models\Department;
use App\Models\EmployeeDoc;
use Illuminate\Http\Request;
use App\Models\EmployeeNotify;
use App\Models\EmployeeInformation;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // webpage of Login System
    public function ShowLogin()
    {
        return view('Login');
    }


    //Logging In from the system
    public function Login(Request $request)
    {
        $user = User::where("username", "=", $request->username)->first();

        if ($user) {
            // if (Hash::check($request->input('password'), $user->password)) {
            if ($request->input('password') === $user->password) {
                $request->session()->put('user_id', $user->user_id);
                $request->session()->put('role', $user->role);
                $request->session()->put('employee_id', $user->employee_id);

                if ($user->role === 1) {
                    return redirect('/Admin/Dashboard')->with('success', 'Logged in as admin!');
                } else if ($user->role === 2) {
                    return redirect('/Dashboard')->with('success', 'Welcome, ' . $user->username . '!');
                } else if ($user->role === 'head') {
                    return redirect('/HeadDashboard')->with('success', 'Welcome, ' . $user->username . '!');
                }
            } else {
                return redirect('/')->with('fail', 'Incorrect password');
            }
        } else {
            return redirect('/')->with('fail', 'An account with that email does not exist!');
        }
    }

    // Logging Out from the system
    public function LogOut()
    {
        if (Session::has('user_id')) {
            Session::flush();
        }

        return redirect('/')->with('success', 'Successfully Log Out');
    }

    // Create User Webpage
    public function UserCreate()
    {
        $user = User::all();
        $employee = Employee::whereNotIn('employee_id', $user->pluck('employee_id'))->get();
        return view('CreateUser', compact('user', 'employee'));
    }

    // User Creation
    public function UserStore(Request $request)
    {
        $user = new User();
        $user->employee_id = $request->input('employee_id');
        $user->username = $request->input('username');
        $user->password = $request->input('password');
        $password = $user->password;
        $user->password = Hash::make($password);
        $user->role = $request->input('role');

        $user->save();

        return redirect('/Admin/CreateUser')->with('success', 'Successfully Created User');
    }


    // Show Profile;
    public function Profile(Request $request)
    {
        if (Session::has('user_id')) {
            $employee = Employee::query()
                ->select('*')
                ->where("employee_id", "=", Session::get("employee_id"))
                ->get()
                ->first();
            $user = User::query()
                ->select('*')
                ->where("user_id", "=", Session::get("user_id"))
                ->get()
                ->first();
            $employee_doc = EmployeeDoc::query()
                ->select('*')
                ->where("employee_id", "=", Session::get("employee_id"))
                ->get()
                ->first();
            $employeeinfo = EmployeeInformation::query()
                ->select('*')
                ->where("employee_id", "=", Session::get("employee_id"))
                ->get()
                ->first();
            $employeenotify = EmployeeNotify::query()
                ->select('*')
                ->where("employee_id", "=", Session::get("employee_id"))
                ->get()
                ->first();
            $position = Position::query()
                ->select('*')
                ->where("position_id", "=", $employee->position_id)
                ->get()
                ->first();
            $department = Department::query()
                ->select('*')
                ->where("department_id", "=", $employee->department_id)
                ->get()
                ->first();

            if ($user->role === 'admin') {
                return view('AdminProfile', compact('employee', 'user', 'employee_doc', 'employeeinfo', 'employeenotify', 'position', 'department'));
            } elseif ($user->role === 'employee') {
                return view('Profile', compact('employee', 'user', 'employee_doc', 'employeeinfo', 'employeenotify', 'position', 'department'));
            }
        }
    }
}
