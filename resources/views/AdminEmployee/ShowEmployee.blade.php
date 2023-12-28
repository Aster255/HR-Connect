<!DOCTYPE html>
<html lang="en">

<head>
    @include("Layout.Head")
    <title>System Admin</title>
    <link rel="stylesheet" href="{{ asset('css/AdminShowEmployee.css') }}">
</head>

<body>
    @include("Layout.NavBarAdmin")
    <div class="greetings">
        <h1 class="Title_navbar" data-aos="zoom-in">{{$employee->first_name}} {{$employee->last_name}}</h1>
    </div>

    <div class="button">
        <a class="btn btn-brand" href="{{ route('Employee.index') }}">BACK</a>
        <a class="btn btn-brand" href="/Admin/Employee/{{$employee->employee_id}}/edit">EDIT</a>
        <a class="btn btn-red" data-bs-toggle='modal' data-bs-target='#delete_{{$employee->employee_id}}'>DELETE</a>
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

    {{-- picture --}}
    <div class="picture">
        <img src="/img/user_profiles/{{$employee->picture}}" alt="{{$employee->first_name}} pictures" width="100px">
    </div>

    {{-- Personal Information --}}
    <div class="section">
        <div class="top_section">
            <h4 class="section_title">Personal Information</h4>
            <button type="button" class="btn btn-brand" data-toggle="modal" data-target="#EditpersonalInformation">
                Edit
            </button>
        </div>

        {{-- edit section --}}
        <div class="modal fade" id="EditpersonalInformation" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Edit Main Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/Admin/Employee/{{$employee->employee_id}}" enctype="multipart/form-data"
                            method="POST" class="form-group">
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
                        <button type="button" class="btn btn-grey" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- personal information --}}
        <div class="personal_information">
            <div>
                <p class="title_information">Employee ID:</p>
                <p class="information">{{$employee->employee_id}}</p>
            </div>
            <div>
                <p class="title_information">Title: </p>
                <p class="information">{{$employee->title}}</p>
            </div>
            <div>
                <p class="title_information">First Name: </p>
                <p class="information">{{$employee->first_name}}</p>
            </div>
            <div>
                <p class="title_information">Last Name: </p>
                <p class="information">{{$employee->last_name}}</p>
            </div>
            <div>
                <p class="title_information">Maiden Name: </p>
                <p class="information">{{$employee->maiden_name ?? 'none'}}</p>
            </div>
            <div>
                <p class="title_information">Nick Name: </p>
                <p class="information">{{$employee->nick_name ?? 'none'}}</p>
            </div>
        </div>

        <div class="top_section">
            <h4 class="section_title">Other Information</h4>
            <button type="button" class="btn btn-brand" data-toggle="modal" data-target="#EditpersonalInformation">
                Edit
            </button>
        </div>

        {{-- other information --}}
        <div class="other_information">
            <div>
                <p class="title_information">Date of Birth: </p>
                <p class="information">{{$employeeinformation->date_of_birth}}</p>
            </div>
            <div>
                <p class="title_information">Place of Birth: </p>
                <p class="information">{{$employeeinformation->place_of_birth}}</p>
            </div>
            <div>
                <p class="title_information">Nationanlity: </p>
                <p class="information">{{$employeeinformation->nationality}}</p>
            </div>
            <div>
                <p class="title_information">Status: </p>
                <p class="information">{{$employeeinformation->status}}</p>
            </div>
            <div>
                <p class="title_information">Gender: </p>
                <p class="information">{{$employeeinformation->gender}}</p>

            </div>
        </div>

        <div class="top_section">
            <h4 class="section_title">Contact Information</h4>
            <button type="button" class="btn btn-brand" data-toggle="modal" data-target="#EditpersonalInformation">
                Edit
            </button>
        </div>

        {{-- contact_information --}}
        <div class="contact_information">
            <div>
                <p class="title_information">Phone No. : </p>
                <p class="information">{{$employeeinformation->mobile_no }}</p>
            </div>
            <div>
                <p class="title_information">Telephone No. : </p>
                <p class="information">{{$employeeinformation->phone_no}}</p>
            </div>
            <div>
                <p class="title_information">Email: </p>
                <p class="information">{{$employeeinformation->email_address}}</p>
            </div>
            <div>
                <p class="title_information">Address: </p>
                <p class="information">{{$employeeinformation->zip}}, {{$employeeinformation->street}},
                    {{$employeeinformation->city}} ,{{$employeeinformation->province}}" .</p>
            </div>
            <div></div>





        </div>
    </div>

    {{-- Department and Position --}}
    <div class="section">
        <div class="top_section">
            <h5 class="section_title">Department and Position</h5>
            <button type="button" class="btn btn-brand" data-toggle="modal" data-target="#EditDepartment_Position">
                Edit
            </button>
        </div>

        {{-- edit section --}}
        <div class="modal fade" id="EditDepartment_Position" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/Admin/Employee/{{$employee->employee_id}}" enctype="multipart/form-data"
                            method="POST" class="form-group">
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

        <div class="section_content">
            <div>
                <p class="title_information">Department: </p>
                <p class="information">{{$department->department_name}}</p>
            </div>
            <div>
                <p class="title_information">Position: </p>
                <p class="information">{{$position->position_name}}</p>
            </div>
        </div>
    </div>

    {{-- Emergency Contant --}}
    <div class="section">
        <div class="top_section">
            <h5 class="section_title">Emergency Contact Information</h5>
        </div>
        <div class="section_content">
            @if($employeenotify)
            <div>
                <p class="title_information">Full Name: </p>
                <p class="information">{{$employeenotify->name}}</p>
            </div>
            <div>
                <p class="title_information">Relationship: </p>
                <p class="information">{{$employeenotify->relationship}}</p>
            </div>
            <div>
                <p class="title_information">Mobile No: </p>
                <p class="information">{{$employeenotify->mobile_no}}</p>
            </div>
            <div>
                <p class="title_information">Address: </p>
                <p class="information">{{$employeenotify->address}}</p>
            </div>

            @else
            <p>No emergency contact information available.</p>
            @endif
        </div>
    </div>

    {{-- Contributions --}}
    <div class="section">
        <div class="top_section">
            <h5 class="section_title">Contributions</h5>
        </div>
        <div class="section_content">
            @if($employeedoc)
            <div>
                <p class="title_information">SSS: </p>
                <p class="information">{{ $employeedoc ? $employeedoc->sss : '' }}</p>
            </div>
            <div>
                <p>TIN: </p>
                <p class="information">{{ $employeedoc ? $employeedoc->tin : '' }}</p>
            </div>
            <div>
                <p>PhilHealth: </p>
                <p class="information">{{ $employeedoc ? $employeedoc->philhealth : '' }}</p>
            </div>
            <div>
                <p>HDMF: </p>
                <p class="information">{{ $employeedoc ? $employeedoc->hdmf : '' }}</p>
            </div>
            @else
            <p>No Contributions information available.</p>
            @endif
        </div>
    </div>
</body>

</html>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>