<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Position;
use App\Models\Department;
use App\Models\EmployeeDoc;
use App\Models\Workschedule;
use Illuminate\Http\Request;
use App\Models\EmployeeNotify;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use App\Models\EmployeeEducation;
use App\Models\EmployeeEmployment;
use App\Models\EmployeeInformation;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();

        return view('AdminEmployee.Employee', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::query()
            ->select('positions.*', 'employees.*', 'departments.*', 'employee_docs.*', 'employee_educations.*', 'employee_employments.*', 'employee_informations.*', 'employee_notifies.*')
            ->join('positions', 'positions.position_id', '=', 'employees.position_id')
            ->join('departments', 'departments.department_id', '=', 'departments.department_id')
            ->join('employee_docs', 'employee_docs.employee_id', '=', 'employees.employee_id')
            ->join('employee_educations', 'employee_educations.employee_id', '=', 'employees.employee_id')
            ->join('employee_employments', 'employee_employments.employee_id', '=', 'employees.employee_id')
            ->join('employee_informations', 'employee_informations.employee_id', '=', 'employees.employee_id')
            ->join('employee_notifies', 'employee_notifies.employee_id', '=', 'employees.employee_id')
            ->get();
        $position = Position::all();
        $department = Department::all();
        $schedule = Workschedule::all();

        return view('AdminEmployee.AddEmployee', compact('schedule', 'employees', 'position', 'department'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'title' => 'required',
        //     'first_name' => 'required|max:50',
        //     'last_name' => 'required|max:50',
        //     'middle_name' => 'required|max:50',
        //     'maiden_name' => 'nullable|max:50',
        //     'nick_name' => 'required|max:50',
        //     'position_id' => 'required',
        //     'department_id' => 'required',
        //     'hire_date' => [
        //         'required',
        //         'date',
        //         'after:' . (Carbon::now()->subMonth()->startOfMonth()),
        //     ],
        //     'salary' => 'required|numeric',
        //     'schedule_id' => 'required',
        //     'picture' => 'required',

        //     'sss' => 'numeric|min:10|max:10',
        //     'tin' => 'numeric|min:9|max:12',
        //     'philhealth' => 'numeric|min:12|max:12',
        //     'hdmf' => 'numeric|min:12|max:12',

        //     'date_of_birth' => ['date', 'before:' . (Carbon::now())],
        //     'place_of_birth' => 'max:200',
        //     'nationality' => 'max:100',
        //     'civil_status' => 'max:50',
        //     'mobile_no' => 'numeric|min:11|max:11',
        //     'phone_no' => 'numeric|min:11|max:11',
        //     'email' => 'email|unique:employee_informations,email_address',
        //     'zip' => "numeric|max: 5",
        //     'street' => 'max:100',
        //     'city' => 'max:100',
        //     'province' => 'max:100',
        //     'gender' => 'max:20',

        //     'name' => 'max:50',
        //     'relationship' => 'max:50',
        //     'mobile_no_contact' => 'numeric|min:11|max:11',
        //     'address_contact' => 'max:200',
        // ]);

        $newemployee = new Employee();

        $newemployee->title = $request->input('title');
        $newemployee->first_name = $request->input('first_name');
        $newemployee->last_name = $request->input('last_name');
        $newemployee->middle_name = $request->input('middle_name');
        $newemployee->maiden_name = $request->input('maiden_name');
        $newemployee->nick_name = $request->input('nick_name');
        $newemployee->position_id = $request->input('position_id');
        $newemployee->department_id = $request->input('department_id');
        $newemployee->hire_date = $request->input('hire_date');
        $newemployee->salary = $request->input('salary');
        $newemployee->schedule_id = $request->input('schedule_id');
        $newemployee->employee_status = 'Added';

        if ($request->file('picture')) {
            $file = $request->file('picture');
            $filename = date('YmdHiu') . $file->getClientOriginalName();
            $file->move(public_path('img/user_profiles'), $filename);
            $newemployee->picture = $filename;
        }

        $newemployee->save();

        $newemployeedoc = new EmployeeDoc();
        $newemployeedoc->employee_id = $newemployee->employee_id;
        $newemployeedoc->sss = $request->input('sss');
        $newemployeedoc->tin = $request->input('tin');
        $newemployeedoc->philhealth = $request->input('philhealth');
        $newemployeedoc->hdmf = $request->input('hdmf');

        $newemployeedoc->save();

        $newemployeeinformation = new EmployeeInformation();
        $newemployeeinformation->employee_id = $newemployee->employee_id;
        $newemployeeinformation->date_of_birth = $request->input('date_of_birth');
        $newemployeeinformation->place_of_birth = $request->input('place_of_birth');
        $newemployeeinformation->nationality = $request->input('nationality');
        $newemployeeinformation->civil_status = $request->input('civil_status');
        $newemployeeinformation->mobile_no = $request->input('mobile_no');
        $newemployeeinformation->email_address = $request->input('email');
        $newemployeeinformation->zip = $request->input('zip');
        $newemployeeinformation->street = $request->input('street');
        $newemployeeinformation->city = $request->input('city');
        $newemployeeinformation->province = $request->input('province');
        $newemployeeinformation->phone_no = $request->input('phone_no');
        $newemployeeinformation->gender = $request->input('gender');

        $newemployeeinformation->save();

        $newemployeenotifies = new EmployeeNotify();
        $newemployeenotifies->employee_id = $newemployee->employee_id;
        $newemployeenotifies->name = $request->input('name');
        $newemployeenotifies->relationship = $request->input('relationship');
        $newemployeenotifies->mobile_no = $request->input('mobile_no_contact');
        $newemployeenotifies->address = $request->input('address_contact');

        $newemployeenotifies->save();
        return redirect('/Admin/Employee')->with('success', 'New Employee added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = Employee::query()
            ->where('employee_id', $id)
            ->first();

        $employeedoc = EmployeeDoc::query()
            ->where('employee_id', $id)
            ->first();

        $employeeinformation = EmployeeInformation::query()
            ->where('employee_id', $id)
            ->first();

        $employeenotify = EmployeeNotify::query()
            ->where('employee_id', $id)
            ->first();

        $employeeeducation = EmployeeEducation::query()
            ->where('employee_id', $id)
            ->first();

        $employeeemployment = EmployeeEmployment::query()
            ->where('employee_id', $id)
            ->first();

        $position = Position::query()
            ->select('employees.*', 'positions.*')
            ->join('employees', 'employees.position_id', '=', 'positions.position_id')
            ->where('employees.employee_id', $id)
            ->first();

        $department = Department::query()
            ->select('departments.*', 'employees.*')
            ->join('employees', 'employees.department_id', '=', 'departments.department_id')
            ->where('employee_id', $id)
            ->first();

        $positionlist = Position::all();
        $departmentlist = Department::all();
        return view('AdminEmployee.ShowEmployee', compact('departmentlist', 'positionlist', 'employee', 'position', 'department', 'employeedoc', 'employeeinformation', 'employeenotify', 'employeeeducation', 'employeeemployment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $employee = Employee::query()
            ->where('employee_id', $id)
            ->first();

        $employeedoc = EmployeeDoc::query()
            ->where('employee_id', $id)
            ->first();

        $employeeinformation = EmployeeInformation::query()
            ->where('employee_id', $id)
            ->first();

        $employeenotify = EmployeeNotify::query()
            ->where('employee_id', $id)
            ->first();

        $employeeeducation = EmployeeEducation::query()
            ->where('employee_id', $id)
            ->first();

        $employeeemployment = EmployeeEmployment::query()
            ->where('employee_id', $id)
            ->first();

        $position = Position::query()
            ->select('employees.*', 'positions.*')
            ->join('employees', 'employees.position_id', '=', 'positions.position_id')
            ->where('employees.employee_id', $id)
            ->first();

        $department = Department::query()
            ->select('departments.*', 'employees.*')
            ->join('employees', 'employees.department_id', '=', 'departments.department_id')
            ->where('employee_id', $id)
            ->first();

        $positionlist = Position::all();
        $departmentlist = Department::all();
        return view('AdminEmployee.EditEmployee', compact('departmentlist', 'positionlist', 'employee', 'position', 'department', 'employeedoc', 'employeeinformation', 'employeenotify', 'employeeeducation', 'employeeemployment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $this->validate($request, [
            'title' => '',
            'first_name' => '|max:50',
            'last_name' => '|max:50',
            'middle_name' => '|max:50',
            'maiden_name' => 'nullable|max:50',
            'nick_name' => '|max:50',
            'position_id' => '',
            'department_id' => '',
            'hire_date' => [
                '',
                'date',
                'after:' . (Carbon::now()->subMonth()->startOfMonth()),
            ],
            'salary' => '|numeric',
            'schedule_id' => '',
            'picture' => '',

            'sss' => 'numeric|min:10|max:10',
            'tin' => 'numeric|min:9|max:12',
            'philhealth' => 'numeric|min:12|max:12',
            'hdmf' => 'numeric|min:12|max:12',

            'date_of_birth' => ['date', 'before:' . (Carbon::now())],
            'place_of_birth' => 'max:200',
            'nationality' => 'max:100',
            'civil_status' => 'max:50',
            'mobile_no' => 'numeric|min:11|max:11',
            'phone_no' => 'numeric|min:10|max:10',
            'email' => 'email|unique:employee_informations,email_address',
            'zip' => "numeric|max: 5",
            'street' => 'max:100',
            'city' => 'max:100',
            'province' => 'max:100',
            'gender' => 'max:20',

            'name' => 'max:50',
            'relationship' => 'max:50',
            'mobile_no_contact' => 'numeric|min:12|max:12',
            'address_contact' => 'max:200',
        ]);


        $employee = Employee::find($id);

        if ($request->has('title') && $request->filled('title')) {
            $employee->title = $request->input('title');
        }
        if ($request->has('first_name') && $request->filled('first_name')) {
            $employee->first_name = $request->input('first_name');
        }
        if ($request->has('last_name') && $request->filled('last_name')) {
            $employee->last_name = $request->input('last_name');
        }
        if ($request->has('middle_name') && $request->filled('middle_name')) {
            $employee->middle_name = $request->input('middle_name');
        }
        if ($request->has('maiden_name') && $request->filled('maiden_name')) {
            $employee->maiden_name = $request->input('maiden_name');
        }
        if ($request->has('department_id') && $request->filled('department_id')) {
            $department = Department::find($request->input('department_id'));
            if ($department) {
                $employee->department_id = $request->input('department_id');
            }
        }
        if ($request->has('position_id') && $request->filled('position_id')) {
            $position = Position::find($request->input('position_id'));
            if ($position) {
                $employee->position_id = $request->input("position_id");
            }
        }
        if ($request->has('salary') && $request->filled('salary')) {
            $employee->salary = $request->input('salary');
        }
        if ($request->file('picture')) {
            if ($employee->picture) {
                $picturePath = public_path('img/user_profiles/') . $employee->picture;
                if (file_exists($picturePath)) {
                    unlink($picturePath);
                }
            }
            $file = $request->file('picture');
            $filename = date('YmdHiu') . $file->getClientOriginalName();
            $file->move(public_path('img/user_profiles'), $filename);
            $employee->picture = $filename;
        }
        $employee->update();


        $employeeinformation = EmployeeInformation::find($id);

        if ($request->has('date_of_birth') && $request->filled('date_of_birth')) {
            $employeeinformation->date_of_birth = $request->input('date_of_birth');
        }

        if ($request->has('place_of_birth') && $request->filled('place_of_birth')) {
            $employeeinformation->place_of_birth = $request->input('place_of_birth');
        }
        if ($request->has('nationality') && $request->filled('nationality')) {
            $employeeinformation->nationality = $request->input('nationality');
        }
        if ($request->has('civil_status') && $request->filled('civil_status')) {
            $employeeinformation->civil_status = $request->input('civil_status');
        }
        if ($request->has('gender') && $request->filled('gender')) {
            $employeeinformation->gender = $request->input('gender');
        }
        if ($request->has('mobile_no') && $request->filled('mobile_no')) {
            $employeeinformation->mobile_no = $request->input('mobile_no');
        }
        if ($request->has('email_address') && $request->filled('email_address')) {
            $employeeinformation->email_address = $request->input('email_address');
        }
        if ($request->has('zip') && $request->filled('zip')) {
            $employeeinformation->zip = $request->input('zip');
        }
        if ($request->has('street') && $request->filled('street')) {
            $employeeinformation->street = $request->input('street');
        }
        if ($request->has('city') && $request->filled('city')) {
            $employeeinformation->city = $request->input('city');
        }
        if ($request->has('province') && $request->filled('province')) {
            $employeeinformation->province = $request->input('province');
        }
        if ($request->has('phone_no') && $request->filled('phone_no')) {
            $employeeinformation->phone_no = $request->input('phone_no');
        }
        $employeeinformation->update();


        $employeenotify = EmployeeNotify::find($id);
        if ($request->has('name') && $request->filled('name')) {
            $employeenotify->name = $request->input('name');
        }
        if ($request->has('relationship') && $request->filled('relationship')) {
            $employeenotify->relationship = $request->input('relationship');
        }
        if ($request->has('mobile_no') && $request->filled('mobile_no')) {
            $employeenotify->mobile_no = $request->input('mobile_no');
        }
        if ($request->has('address') && $request->filled('address')) {
            $employeenotify->address = $request->input('address');
        }
        $employeenotify->update();


        $employeedoc = EmployeeDoc::find($id);
        if ($request->has('sss') && $request->filled('sss')) {
            $employeedoc->sss = $request->input('sss');
        }
        if ($request->has('tin') && $request->filled('tin')) {
            $employeedoc->tin = $request->input('tin');
        }
        if ($request->has('philhealth') && $request->filled('philhealth')) {
            $employeedoc->philhealth = $request->input('philhealth');
        }
        if ($request->has('hdmf') && $request->filled('hdmf')) {
            $employeedoc->hdmf = $request->input('hdmf');
        }
        $employeedoc->update();

        return redirect("/Admin/Employee/{$id}")->with('Success', 'Successfully Edited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delemployee = Employee::find($id);


        $delemployeedoc = EmployeeDoc::find($id);
        $delemployeedoc->employee_id = $delemployee->employee_id;


        $delemployeeinformation = EmployeeInformation::find($id);
        $delemployeeinformation->employee_id = $delemployee->employee_id;


        $delemployeenotify = EmployeeNotify::find($id);
        $delemployeenotify->employee_id = $delemployee->employee_id;

        if ($delemployee) {
            $employeeName = $delemployee->nick_name;
            $delemployee->update(['employee_status' => 'Deleted']);
            $delemployee->delete();
            $delemployeedoc->delete();
            $delemployeeinformation->delete();
            $delemployeenotify->delete();
            return redirect('/Admin/Employee')->with('success', $employeeName . ' is successfully deleted!');
        }
        return redirect('/Admin/Employee')->with('error', 'Department not found!');
    }
}
