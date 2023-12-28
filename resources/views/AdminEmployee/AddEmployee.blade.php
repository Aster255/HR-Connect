<!DOCTYPE html>
<html lang="en">

<head>
    @include("Layout.Head")
    <title>System Admin</title>
    <link rel="stylesheet" href="{{ asset('css/AdminAddEmployee.css') }}">
</head>

<body>
    @include("Layout.NavBarAdmin")
    <div class="greetings">
        <h1 class="Title_navbar" data-aos="zoom-in">ADD NEW EMPLOYEE</h1>
    </div>

    <div class="button">
        <a class="btn btn-brand ms-2" href="{{ route('Employee.index') }}" data-aos="zoom-in">BACK</a>
    </div>

    <div class="section">
        <form action="{{ route('Employee.store') }}" method="POST" enctype="multipart/form-data" class="form-group">
            @csrf
            <div class="profile-picture">
                <img id="image-preview" src="#" alt="Image Preview" style="display:none;">
                <input type="file" name="picture" id="picture" onchange="previewImage()">

            </div>

            <script>
                function previewImage() {
                    var input = document.getElementById('picture');
                    var preview = document.getElementById('image-preview');
            
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
            
                        reader.onload = function (e) {
                            preview.src = e.target.result;
                            preview.style.display = 'block';
                        };
            
                        reader.readAsDataURL(input.files[0]);
                    } else {
                        preview.src = '#';
                        preview.style.display = 'none';
                    }
                }
            </script>

            <div class="section">
                <h4 class="section_title">PRIMARY INFORMATION</h4>
                <div class="form_group">
                    <label for="title">Title:</label>
                    <select name="title" id="title">
                        <option value=""></option>
                        <option value="Mr">Mr.</option>
                        <option value="Mrs">Mrs.</option>
                        <option value="Ms">Ms.</option>
                    </select>
                </div>
                <div class="form_group">
                    <label for="first_name">First Name:</label>
                    <input type="text" name="first_name" id="first_name" value="">
                </div>
                <div class="form_group">
                    <label for="middle_name">Last Name:</label>
                    <input type="text" name="middle_name" id="middle_name" value="">
                </div>
                <div class="form_group">
                    <label for="last_name">Middle Name:</label>
                    <input type="text" name="last_name" id="last_name" value="">
                </div>
                <div class="form_group">
                    <label for="maiden_name">Maiden Name:</label>
                    <input type="text" name="maiden_name" id="maiden_name" value="">
                </div>
                <div class="form_group">
                    <label for="nick_name">Nick Name:</label>
                    <input type="text" name="nick_name" id="nick_name" value="">
                </div>
            </div>
            <div class="divider"></div>
            <div class="section">
                <h4 class="section_title">PERSONAL INFORMATION</h4>
                <!-- Date of Birth -->
                <div class="form_group">
                    <label for="date_of_birth">Date of Birth: </label>
                    <input type="date" name="date_of_birth" id="date_of_birth" value="">
                </div>
                <!-- Place of Birth -->
                <div class="form_group">
                    <label for="place_of_birth">Place of Birth: </label>
                    <textarea rows="5" cols="40" name="place_of_birth" style="resize: none;" id="place_of_birth"
                        value=""></textarea>
                </div>
                <!-- Nationality -->
                <div class="form_group">
                    <label for="nationality">Nationality: </label>
                    <input type="text" name="nationality" id="nationality" value="">
                </div>
                <!-- Civil Status -->
                <div class="form_group">
                    <label for="civil_status">Status: </label>
                    <select name="civil_status" id="civil_status">
                        <option value=""></option>
                        <option value="single">Single</option>
                        <option value="married">Married</option>
                        <option value="divorced">Divorced</option>
                        <option value="widowed">Widowed</option>
                    </select>
                </div>
                <!-- Gender -->
                <div class="form_group">
                    <label for="gender">Gender: </label>
                    <select name="gender" id="gender">
                        <option value=""></option>
                        <option value="female">Female</option>
                        <option value="male">Male</option>
                        <option value="other">Other</option>
                    </select>
                </div>
            </div>
            <div class="divider"></div>
            <div class="section">
                <h4 class="section_title">CONTACT INFORMATION</h4>
                <!-- mobile Number -->
                <div class="form_group">
                    <label for="mobile_no">Mobile No.:</label>
                    <input type="text" name="mobile_no" value="">
                </div>
                <!-- email -->
                <div class="form_group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" value="">
                </div>
                <!-- Address -->
                <div class="form_group">
                    <label>Address</label>
                    <input type="number" name="zip" id="zip" placeholder="Zip" value="">
                    <input type="text" name="street" id="street" placeholder="Street" value="">
                    <input type="text" name="city" id="city" placeholder="City" value="">
                    <input type="text" name="province" id="province" placeholder="Province" value="">
                </div>
                <!-- Phone number -->
                <div class="form_group">
                    <label for="phone_no">Phone Number:</label>
                    <input type="text" name="phone_no" id="phone_no" value="">
                </div>
            </div>
            <div class="divider"></div>
            <div class="section">
                <h4 class="section_title">PERSON TO NOTIFY INCASE OF EMERGENCY</h4>
                <!-- Name Contact -->
                <div class="form_group">
                    <label for="name">Name: </label>
                    <input type="text" name="name" id="name" value="">
                </div>
                <!-- Relationship -->
                <div class="form_group">
                    <label for="relationship">Relationship: </label>
                    <input type="text" name="relationship" id="relationship" value="">
                </div>
                <!-- Mobile number Contact -->
                <div class="form_group">
                    <label for="mobile_no_contact">Mobile No.: </label>
                    <input type="text" name="mobile_no_contact" id="mobile_no_contact" value="">
                </div>
                <!-- Address contact -->
                <div class="form_group">
                    <label for="address_contact">Address: </label>
                    <input type="text" name="address_contact" id="address_contact" value="">
                </div>
            </div>
            <div class="divider"></div>
            <div class="section">
                <h4 class="section_title">CONTRIBUTIONS</h4>
                <!-- sss -->
                <div class="form_group">
                    <label for="sss">SSS: </label>
                    <input type="number" name="sss" id="sss" value="">
                </div>
                <!-- tin -->
                <div class="form_group">
                    <label for="tin">TIN: </label>
                    <input type="number" name="tin" id="tin" value="">
                </div>
                <!-- philhealth -->
                <div class="form_group">
                    <label for="philhealth">PhilHealth: </label>
                    <input type="number" name="philhealth" id="philhealth" value="">
                </div>
                <!-- hdmf -->
                <div class="form_group">
                    <label for="hdmf">HDMF: </label>
                    <input type="number" name="hdmf" id="hdmf" value="">
                </div>
            </div>
            <div class="divider"></div>
            <div class="section">
                <h4 class="section_title">POSITION AND DEPARTMENT</h4>
                <!-- position -->
                <div class="form_group">
                    <label for="position_id">Position:</label>
                    <select name="position_id" id="position_id">
                        <option value="">Select Position</option>
                        @foreach ($position as $pos)
                        <option value="{{ $pos->position_id }}">{{ $pos->position_name }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- department -->
                <div class="form_group">
                    <label for="department_id">Department:</label>
                    <select name="department_id" id="department_id">
                        <option value="">Select Department</option>
                        @foreach ($department as $dept)
                        <option value="{{ $dept->department_id }}">{{ $dept->department_name }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Hire Date -->
                <div class="form_group">
                    <label for="hire_date">Hire Date:</label>
                    <input type="date" name="hire_date" id="hire_date">
                </div>
                <!-- schedule -->
                <div class="form_group">
                    <label for="schedule_id">Schedule:</label>
                    <select name="schedule_id" id="schedule_id">
                        <option value="">Select Schedule</option>
                        @foreach ($schedule as $sched)
                        <option value="{{ $sched->schedule_id }}">{{ $sched->start_time->format('H:i:s') }} - {{
                            $sched->end_time->format('H:i:s') }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <!-- Salary -->
                <div class="form_group">
                    <label for="salary">Salary:</label>
                    <input type="number" name="salary" id="salary" min="5000">
                </div>
            </div>
            <div class="divider"></div>
            <div class="section">
                <input type="submit" class="btn btn-green" style="width: 100%;" value="New Employee" />
            </div>
        </form>
    </div>
</body>

</html>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>