<!DOCTYPE html>
<html lang="en">

<head>
    @include("Layout.Head")
    <title>System Admin</title>
    @include('Layout.Button')
</head>

<body>
    @include("Layout.NavBarAdmin")
    <h1 class="Title_navbar" data-aos="zoom-in">{{$employee->first_name}} {{$employee->last_name}}</h1>

    <div data-aos="zoom-in" class="mt-2">
        <a class="btn btn-brand" href="{{ route('Employee.index') }}">BACK</a>
        <a class="btn btn-brand" href="/Admin/Employee/{{$employee->employee_id}}/edit">EDIT</a>
        <a class="btn btn-danger" data-bs-toggle='modal' data-bs-target='#delete_{{$employee->employee_id}}'>DELETE</a>
    </div>


    <div class="modal fade" id="delete_{{$employee->employee_id}}" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm deletion of Employee</h5>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this {{$employee->first_name}} {{$employee->last_name}}?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <form action="/Admin/Employee/{{$employee->employee_id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-red" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <h1 data-aos="zoom-in">Show Employee Details</h1>

    <div data-aos="zoom-in">
        <h3>Primary Information</h3>
        <div>
            <img src="{{ asset('img/user_profiles/' . $employee->picture) }}" />
        </div>
        <table>
            <tr>
                <th>Employee ID: </th>
                <td>{{$employee->employee_id}}</td>
            </tr>
            <tr>
                <th>Title: </th>
                <td>{{$employee->title}}</td>
            </tr>
            <tr>
                <th>First Name: </th>
                <td>{{$employee->first_name}}</td>
            </tr>
            <tr>
                <th>Last Name:</th>
                <td>{{$employee->last_name}}</td>
            </tr>
            <tr>
                <th>Middle Name: </th>
                <td>{{$employee->middle_name}}</td>
            </tr>
            <tr>
                <th>Maiden Name: </th>
                <td>{{$employee->maiden_name}}</td>
            </tr>
            <tr>
                <th>Nickname: </th>
                <td>{{$employee->nick_name}}</td>
            </tr>
        </table>
        <div>
            <table>
                <tr>
                    <th>Position:</th>
                    <td>{{ $position->position_name }}</td>
                </tr>
                <tr>
                    <th>Department:</th>
                    <td>{{ $department->department_name }}</td>
                </tr>
                <tr>
                    <th>Hire Date:</th>
                    <td>{{$employee->hire_date}}</td>
                </tr>
                <tr>
                    <th>Salary:</th>
                    <td>{{$employee->salary}}</td>
                </tr>
            </table>
        </div>
    </div>

    <div>
        <h3>Personal Information</h3>
        <table>
            <tr>
                <th>Date of Birth:</th>
                <td>{{$employeeinformation->date_of_birth}}</td>
            </tr>
            <tr>
                <th>Place of Birth:</th>
                <td>{{$employeeinformation->place_of_birth}}</td>
            </tr>
            <tr>
                <th>Nationality:</th>
                <td>{{$employeeinformation->nationality}}</td>
            </tr>
            <tr>
                <th>Status:</th>
                <td>{{$employeeinformation->civil_status}}</td>
            </tr>
            <tr>
                <th>Gender:</th>
                <td>{{$employeeinformation->gender}}</td>
            </tr>
        </table>
    </div>

    <div>
        <h3>Contact Information</h3>
        <table>
            <tr>
                <th>Mobile No:</th>
                <td>{{$employeeinformation->mobile_no}}</td>
            </tr>
            <tr>
                <th>Phone No:</th>
                <td>{{$employeeinformation->phone_no}}</td>
            </tr>
            <tr>
                <th>Email:</th>
                <td>{{$employeeinformation->email_address}}</td>
            </tr>
            <tr>
                <th>Address:</th>
                <td>
                    {{$employeeinformation->zip}}
                    {{$employeeinformation->city}}
                    {{$employeeinformation->street}}
                    {{$employeeinformation->province}}
                </td>
            </tr>

        </table>
    </div>

    <div>
        <h3>Person to Notify incase of emergency</h3>
        <table>
            <tr>
                <th>Name: </th>
                <td>{{$employeenotify->name}}</td>
            </tr>
            <tr>
                <th>Relationship: </th>
                <td>{{$employeenotify->relationship}}</td>
            </tr>
            <tr>
                <th>Mobile No: </th>
                <td>{{$employeenotify->mobile_no}}</td>
            </tr>
            <tr>
                <th>Address: </th>
                <td>{{$employeenotify->address}}</td>
            </tr>
        </table>
    </div>

    <div>
        <h3>Contributions</h3>
        <table>
            <tr>
                <th>SSS:</th>
                <td>{{$employeedoc->sss}}</td>
            </tr>
        </table>
        <table>
            <tr>
                <th>TIN:</th>
                <td>{{$employeedoc->tin}}</td>
            </tr>
        </table>
        <table>
            <tr>
                <th>PhilHealth:</th>
                <td>{{$employeedoc->philhealth}}</td>
            </tr>
        </table>
        <table>
            <tr>
                <th>HDMF:</th>
                <td>{{$employeedoc->hdmf}}</td>
            </tr>
        </table>
    </div>

    <div>
        <h3>Educations</h3>
        <a class="btn btn-brand" href=" /SystemAdmin/SystemAdminEmployee/Employee">Add</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Record No.</th>
                    <th>Level</th>
                    <th>School</th>
                    <th>Course</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($employeeeducation))
                @foreach ($employeeeducation as $education)
                <tr>
                    <td>{{$education->record_id}}</td>
                    <td>{{$education->level}}</td>
                    <td>{{$education->school}}</td>
                    <td>{{$education->course}}</td>
                    <td>{{$education->year_from}}</td>
                    <td>{{$education->year_to}}</td>
                    <td>
                        <a href="{{ route('employee.education.edit', ['id' => $education->id]) }}">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('employee.education.destroy', ['id' => $education->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-red" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            @else
            <p>No education records found for this employee.</p>
            @endif
        </table>

    </div>

</body>

</html>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>