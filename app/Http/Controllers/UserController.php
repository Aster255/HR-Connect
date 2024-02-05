<?php

namespace App\Http\Controllers;

use App\Events\UserLogInEvent;
use Session;
use App\Models\Role;
use App\Models\User;
use App\Models\Employee;
use App\Models\Position;
use App\Models\Department;
use App\Models\EmployeeDoc;
use Illuminate\Http\Request;
use App\Models\EmployeeNotify;
use App\Models\EmployeeInformation;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends BaseController
{
    // webpage of Login System
    public function ShowLogin()
    {
        return view('Login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            $request->session()->put('user_id', $user->user_id);
            $request->session()->put('role', $user->role);
            $request->session()->put('employee_id', $user->employee_id);

            $employee = Employee::find($user->employee_id);

            event(new UserLogInEvent($user));

            if ($user->role === 1) {
                return redirect(url('/Admin/Dashboard'))->with(compact('employee'))->with('success', 'Logged in as admin!');
            } elseif ($user->role === 2) {
                return redirect(url('/Dashboard'))->with(compact('employee'))->with('success', 'Welcome, ' . $user->username . '!');
            }
        } else {
            return redirect('/')->with('fail', 'Incorrect username or password');
        }
    }



    // Logging Out from the system
    public function logOut()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Successfully Log Out');
    }


    // Create User Webpage
    public function UserCreate()
    {
        $user = User::all();
        $role = Role::all();
        $employee = Employee::whereNotIn('employee_id', $user->pluck('employee_id'))->get();
        return view('CreateUser', compact('user', 'employee', 'role'));
    }

    // User Creation
    public function UserStore(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,employee_id',
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users')->where(function ($query) use ($request) {
                    return $query->where('employee_id', $request->input('employee_id'))
                        ->orWhere('username', $request->input('username'));
                }),
            ],
            'password' => 'required',
            'role' => 'required|string',
        ]);

        $user = new User();
        $user->employee_id = $request->input('employee_id');
        $user->username = $request->input('username');
        $user->password = Hash::make($request->input('password'));
        $user->role = $request->input('role');

        $user->save();

        return redirect('/Admin/CreateUser')->with('success', 'Successfully Created User');
    }

    // Show Profile;
    public function Profile(Request $request)
    {
        $user = Auth::user();

        if ($user) {
            $employee = $user->employee;
            $employeeDoc = $employee->employeeDoc;
            $employeeInfo = $employee->employeeInformation;
            $employeeNotify = $employee->employeeNotify;
            $position = $employee->position;
            $department = $employee->department;

            if ($$user->role === 1) {
                return view('AdminProfile', compact('employee', 'user', 'employeeDoc', 'employeeInfo', 'employeeNotify', 'position', 'department'));
            } elseif ($user->role === 2) {
                return view('Profile', compact('employee', 'user', 'employeeDoc', 'employeeInfo', 'employeeNotify', 'position', 'department'));
            }
        }
    }
}
