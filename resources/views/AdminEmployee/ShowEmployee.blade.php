<!DOCTYPE html>
<html lang="en">

<head>
    @include("Layout.Head")

    <link rel="stylesheet" href="{{ asset('css/AdminShowEmployee.css') }}">
</head>

<body>
    @include("Layout.NavBarAdmin")
    <div class="greetings">
        <h1 class="Title_navbar" data-aos="zoom-in">{{$employee->first_name}} {{$employee->last_name}}</h1>

        <div class="button">
            <a class="btn btn-brand" href="{{ route('Employee.index') }}">BACK</a>
            <button type="button" class="btn btn-red" data-bs-toggle='modal' data-bs-target='#delete_{{$employee->employee_id}}'>
                DELETE
            </button>
        </div>
    </div>
    <div class="modal fade" id="delete_{{$employee->employee_id}}" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm deletion of Employee</h5>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this {{$employee->first_name}} {{$employee->last_name}}?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-grey" data-dismiss="modal">Close</button>
                    <form action="/Admin/Employee/{{$employee->employee_id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-red" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>



    {{-- picture --}}
    <div class="picture">
        <img src="{{$employee->picture}}" alt="{{$employee->first_name}} pictures" width="100px">
    </div>

    <div class="picturebtn">
        <form action="/Admin/Employee/{{$employee->employee_id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input type="file" name="picture" id="picture" accept="image/*" hidden>
            <button type="button" class="btn btn-green" onclick="chooseFile()">Change Profile</button>

            <button type="submit" class="btn btn-brand">Update Picture</button>
        </form>

        <script>
            function chooseFile() {
                document.getElementById('picture').click();
            }

        </script>
    </div>





    {{-- Personal Information --}}
    <div class="section">
        <div class="top_section">
            <h4 class="section_title">Personal Information</h4>
            <button type="button" class="btn btn-brand" data-toggle="modal" data-target="#EditpersonalInformation">
                Edit
            </button>
        </div>

        {{-- edit section information --}}
        <div class="modal fade" id="EditpersonalInformation" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Edit Main Information</h5>
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
            <button type="button" class="btn btn-brand" data-toggle="modal" data-target="#EditOtherInformation">
                Edit
            </button>
        </div>

        {{-- edit section other information --}}
        <div class="modal fade" id="EditOtherInformation" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Edit Other Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/Admin/Employee/{{$employee->employee_id}}" enctype="multipart/form-data" method="POST" class="form-group">
                            @csrf
                            @method('PUT')

                            <label for="date_of_birth">Date of Birth: </label>
                            <input type="text" id="date_of_birth" value="{{$employeeinformation->date_of_birth}}">

                            <label for="place_of_birth">Place of Birth: </label>
                            <input type="text" id="place_of_birth" value="{{$employeeinformation->place_of_birth}}">

                            <label for="nationality">Nationality: </label>
                            <input type="text" id="nationality" value="{{$employeeinformation->nationality}}">

                            <label for="civil_status">Civil Status: </label>
                            <select name="civil_status" id="civil_status">
                                <option value="" {{ $employeeinformation->civil_status === "" ? 'selected' : '' }}>
                                </option>
                                <option value="single" {{ $employeeinformation->civil_status === "single" ?
                                    'selected' : '' }}>Single</option>
                                <option value="married" {{ $employeeinformation->civil_status === "married" ?
                                    'selected' : '' }}>Married</option>
                                <option value="divorced" {{ $employeeinformation->civil_status === "divorced" ?
                                    'selected' : '' }}>Divorced</option>
                                <option value="widowed" {{ $employeeinformation->civil_status === "widowed" ?
                                    'selected' : '' }}>Widowed</option>
                            </select>

                            <label for="gender">Gender: </label>
                            <input type="text" id="gender" value="{{$employeeinformation->gender}}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-grey" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- other information --}}
        <div class="other_information">
            <div>
                <p class="title_information">Date of Birth: </p>
                <p class="information">{{ $employeeinformation->date_of_birth ?
                    \Carbon\Carbon::parse($employeeinformation->date_of_birth)->format('Y-m-d') : '' }}</p>
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
                <p class="information">{{$employeeinformation->civil_status}}</p>
            </div>
            <div>
                <p class="title_information">Gender: </p>
                <p class="information">{{$employeeinformation->gender}}</p>

            </div>
        </div>

        <div class="top_section">
            <h4 class="section_title">Contact Information</h4>
            <button type="button" class="btn btn-brand" data-toggle="modal" data-target="#EditContactInformation">
                Edit
            </button>
        </div>

        {{-- edit section contact-information --}}
        <div class="modal fade" id="EditContactInformation" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Edit Main Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/Admin/Employee/{{$employee->employee_id}}" enctype="multipart/form-data" method="POST" class="form-group">
                            @csrf
                            @method('PUT')

                            <!-- Phone No. -->
                            <label for="mobile_no">Phone No. :</label>
                            <input type="text" name="mobile_no" id="mobile_no" value="{{$employeeinformation->mobile_no}}">

                            <!-- Telephone No. -->
                            <label for="phone_no">Telephone No. :</label>
                            <input type="text" name="phone_no" id="phone_no" value="{{$employeeinformation->phone_no}}">

                            <!-- Email -->
                            <label for="email_address">Email:</label>
                            <input type="email" name="email_address" id="email_address" value="{{$employeeinformation->email_address}}">

                            <!-- Address -->
                            <label for="zip">Zip Code:</label>
                            <input type="text" name="zip" id="zip" value="{{$employeeinformation->zip}}">

                            <label for="street">Street:</label>
                            <input type="text" name="street" id="street" value="{{$employeeinformation->street}}">

                            <label for="city">City:</label>
                            <input type="text" name="city" id="city" value="{{$employeeinformation->city}}">

                            <label for="province">Province:</label>
                            <input type="text" name="province" id="province" value="{{$employeeinformation->province}}">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-grey" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-green">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>
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
                    {{$employeeinformation->city}} ,{{$employeeinformation->province}}" .
                </p>
            </div>
            <div>

            </div>





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

                            <!-- position -->
                            <label for="position_id">Position:</label>
                            <select name="position_id" id="position_id">
                                <option value="">Select Position</option>
                                @foreach ($positionlist as $pos)
                                <option value="{{ $pos->position_id }}" @if($pos->position_id == $employee->position_id)
                                    selected @endif>
                                    {{ $pos->position_name }}
                                </option>
                                @endforeach
                            </select>

                            <!-- department -->
                            <label for="department_id">Department:</label>
                            <select name="department_id" id="department_id">
                                <option value="">Select Department</option>
                                @foreach ($departmentlist as $dept)
                                <option value="{{ $dept->department_id }}" @if($dept->department_id ==
                                    $employee->department_id) selected @endif>
                                    {{ $dept->department_name }}
                                </option>
                                @endforeach
                            </select>

                            <!-- Salary -->
                            <label for="salary">Salary:</label>
                            <input type="number" name="salary" id="salary" min="5000" value="{{$employee->salary}}">
                            <hr>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-grey" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-green">Save changes</button>
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
                <p class="title_information">TIN: </p>
                <p class="information">{{ $employeedoc ? $employeedoc->tin : '' }}</p>
            </div>
            <div>
                <p class="title_information">PhilHealth: </p>
                <p class="information">{{ $employeedoc ? $employeedoc->philhealth : '' }}</p>
            </div>
            <div>
                <p class="title_information">HDMF: </p>
                <p class="information">{{ $employeedoc ? $employeedoc->hdmf : '' }}</p>
            </div>
            @else
            <p>No Contributions information available.</p>
            @endif
        </div>
    </div>
</body>

</html>
