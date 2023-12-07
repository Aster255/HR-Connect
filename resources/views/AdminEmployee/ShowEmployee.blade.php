<!DOCTYPE html>
<html lang="en">

<head>
    @include("Layout.Head")
    <title>System Admin</title>
    @include('Layout.Button')
    <style>
        body {
            user-select: none;
        }

        .profile-picture {
            height: 300px;

        }

        .section {
            margin-bottom: 20px;
            border: 1px solid rgba(146, 53, 232, 1);
            padding: 50px;
            border-radius: 10px;
        }

        .section-title {
            font-weight: bold;
            color: rgba(146, 53, 232, 1);
            margin-bottom: 10px;
        }

        .section-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .card-body {
            background-color: rgba(241, 243, 245, 1);

        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            color: rgba(59, 16, 134, 1);
            margin-bottom: 5px;
        }

        .none {
            background-color: gray;
            border: 1px solid rgba(41, 90, 111, 1);
        }

        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group input[type="tel"],
        .form-group input[type="email"],
        .form-group input[type="date"] {
            width: 100%;
            padding: 10px;
            border: 1px solid rgba(41, 10, 111, 1);
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .form-group textarea {
            width: 100%;
            height: 100px;
            padding: 10px;
            border: 1px solid rgba(41, 10, 111, 1);
            border-radius: 5px;
        }

        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            background-color: white;
        }

        .top_section {
            display: flex;
            justify-content: space-between;
        }
    </style>
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


    <div class="container-fluid mt-2" data-aos="zoom-in">

        <!-- Personal Information -->
        <div class="section">
            <div class="top_section">
                <h2 class="section-title">Personal Information</h2>
                <button type="button" class="btn btn-brand" data-toggle="modal" data-target="#EditpersonalInformation">
                    Edit
                </button>
            </div>


            <div class="section-content">
                <div class="form-group">
                    <label>Employee ID:</label>
                    <input disabled value="{{$employee->employee_id}}" type="text">
                </div>
                <div class="form-group">
                    <label>Title:</label>
                    <input disabled value="{{$employee->title}}" type="text">
                </div>
                <div class="form-group">
                    <label>First Name:</label>
                    <input disabled value="{{$employee->first_name}}" type="text">
                </div>
                <div class="form-group">
                    <label>Last Name:</label>
                    <input disabled value="{{$employee->last_name}}" type="text">
                </div>
                <div class="form-group">
                    <label>Maiden Name:</label>
                    <input disabled value="{{$employee->maiden_name ?: 'none'}}" type="text" class="{{$employee->maiden_name ?: 'none'}}">
                </div>
                <div class="form-group">
                    <label>Maiden Name:</label>
                    <input disabled value="{{$employee->maiden_name}}" type="text">
                </div>
                <div class="form-group">
                    <label>Nick Name:</label>
                    <input disabled value="{{$employee->nick_name}}" type="text">
                </div>
            </div>
        </div>


    </div>


    <div class="modal fade" id="EditpersonalInformation" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/Admin/Employee/{{$employee->employee_id}}" enctype="multipart/form-data" method="POST" class="form-group">
                        @csrf
                        @method('PUT')
                        <label for="title">Title</label>
                        <select name="title" id="title">
                            <option value="Mr" @if($employee->title === 'Mr') selected @endif>Mr.</option>
                            <option value="Mrs" @if($employee->title === 'Mrs') selected @endif>Mrs.</option>
                            <option value="Ms" @if($employee->title === 'Ms') selected @endif>Ms.</option>
                        </select>
                        <br>
                        <!-- first name -->
                        <label for="first_name">First Name:</label>
                        <input type="text" name="first_name" id="first_name" value="{{$employee->first_name}}">
                        <br>
                        <!-- middle name -->
                        <label for="last_name">Last Name:</label>
                        <input type="text" name="last_name" id="last_name" value="{{$employee->last_name}}">
                        <br>
                        <!-- last name -->
                        <label for="middle_name">Middle Name:</label>
                        <input type="text" name="middle_name" id="middle_name" value="{{$employee->middle_name}}">
                        <br>
                        <!-- maiden -->
                        <label for="maiden_name">Maiden Name:</label>
                        <input type="text" name="maiden_name" id="maiden_name" value="{{$employee->maiden_name}}">
                        <br>
                        <!-- nickname -->
                        <label for="nick_name">Nick Name:</label>
                        <input type="text" name="nick_name" id="nick_name" value="{{$employee->nick_name}}">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>














    <!-- Department and Position -->
    <div class="section">
        <div class="top_section">
            <h2 class="section-title">Department and Position</h2>
            <button type="button" class="btn btn-brand" data-toggle="modal" data-target="#EditDepartment_Position">
                Edit
            </button>
        </div>

        <div class="section-content">
            <div class="form-group">
                <label>Department:</label>
                <input disabled value="{{$department->department_name}}" type="text">
            </div>
            <div class="form-group">
                <label>Position:</label>
                <input disabled value="{{$position->position_name}}" type="text">
            </div>
        </div>
    </div>

    <div class="modal fade" id="EditDepartment_Position" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/Admin/Employee/{{$employee->employee_id}}" enctype="multipart/form-data" method="POST" class="form-group">
                        @csrf
                        @method('PUT')
                        <div>
                            <!-- position -->
                            <label for="position_id">Position:</label>
                            <select name="position_id" id="position_id">
                                <option value="">Select Position</option>
                                @foreach ($positionlist as $pos)
                                <option value="{{ $pos->position_id }}">{{ $pos->position_name }}</option>
                                @endforeach
                            </select>
                            <br>
                            <!-- department -->
                            <label for="department_id">Department:</label>
                            <select name="department_id" id="department_id">
                                <option value="">Select Department</option>
                                @foreach ($departmentlist as $dept)
                                <option value="{{ $dept->department_id }}">{{ $dept->department_name }}</option>
                                @endforeach
                            </select>
                            <br>
                            <!-- Salary -->
                            <label for="salary">Salary:</label>
                            <input type="number" name="salary" id="salary" min="5000">
                            <hr>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>












    <!-- Date of Birth, Nationality, Status, Gender -->
    <div class="section">
        <h2 class="section-title">Personal Information</h2>
        <div class="section-content">
            <div class="form-group">
                <label>Date of Birth:</label>
                <input disabled value="{{$employeeinformation->date_of_birth}}" type="text">
            </div>
            <div class="form-group">
                <label>Place of Birth:</label>
                <input disabled value="{{$employeeinformation->place_of_birth}}" type="text">
            </div>
            <div class="form-group">
                <label>Nationality:</label>
                <input disabled value="{{$employeeinformation->nationality}}" type="text">
            </div>
            <div class="form-group">
                <label>Status:</label>
                <input disabled value="{{$employeeinformation->status}}" type="text">
            </div>
            <div class="form-group">
                <label>Gender:</label>
                <input disabled value="{{$employeeinformation->gender}}" type="text">
            </div>
        </div>
    </div>

    <!-- Contact Information -->
    <div class="section">
        <h2 class="section-title">Contact Information</h2>
        <div class="section-content">
            <div class="form-group">
                <label>Mobile No:</label>
                <input disabled value="{{$employeeinformation->mobile_no}}" type="text">
            </div>
            <div class="form-group">
                <label>Phone No:</label>
                <input disabled value="{{$employeeinformation->phone_no}}" type="text">
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input disabled value="{{$employeeinformation->email_address}}" type="text">
            </div>
            <div class="form-group">
                <label>Address:</label>
                <input disabled value="{{$employeeinformation->zip}}" type="text">
                <input disabled value="{{$employeeinformation->city}}" type="text">
                <input disabled value="{{$employeeinformation->street}}" type="text">
                <input disabled value="{{$employeeinformation->province}}" type="text">
            </div>
        </div>
    </div>

    <!-- Emergency Contact Information -->
    <div class="section">
        <h2 class="section-title">Emergency Contact Information</h2>
        <div class="section-content">
            @if($employeenotify)
            <div class="form-group">
                <label>Name:</label>
                <input disabled value="{{$employeenotify->name}}" type="text">
            </div>
            <div class="form-group">
                <label>Relationship:</label>
                <input disabled value="{{$employeenotify->relationship}}" type="text">
            </div>
            <div class="form-group">
                <label>Mobile No:</label>
                <input disabled value="{{$employeenotify->mobile_no}}" type="text">
            </div>
            <div class="form-group">
                <label>Address:</label>
                <input disabled value="{{$employeenotify->address}}" type="text">
            </div>
            @else
            <p>No emergency contact information available.</p>
            @endif
        </div>
    </div>


    <!-- Contributions -->
    <div class="section">
        <h2 class="section-title">Contributions</h2>
        <div class="section-content">
            @if($employeedoc)
            <div class="form-group">
                <label>SSS:</label>
                <input disabled value="{{ $employeedoc ? $employeedoc->sss : '' }}" type="text">
            </div>
            <div class="form-group">
                <label>TIN:</label>
                <input disabled value="{{ $employeedoc ? $employeedoc->tin : '' }}" type="text">
            </div>
            <div class="form-group">
                <label>PhilHealth:</label>
                <input disabled value="{{ $employeedoc ? $employeedoc->philhealth : '' }}" type="text">
            </div>
            <div class="form-group">
                <label>HDMF:</label>
                <input disabled value="{{ $employeedoc ? $employeedoc->hdmf : '' }}" type="text">
            </div>
            @else
            <p>No Contributions information available.</p>
            @endif
        </div>
    </div>


    </div>

    <!-- <div>
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

    </div> -->

</body>

</html>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>