<!DOCTYPE html>
<html lang="en">

@include("Layout.Head")
<title>System Admin</title>
@include('Layout.Button')
<style>
    .profile-picture {
        display: flex;
        justify-content: center;
        margin-bottom: 30px;
    }

    .section {
        margin-bottom: 20px;
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
</style>
</head>

<body>
    @include("Layout.NavBarAdmin")
    <h1 class="Title_navbar" data-aos="zoom-in">{{$employee->first_name}} {{$employee->last_name}}</h1>

    <a class="btn btn-brand" href="/Admin/Employee/{{$employee->employee_id}}" data-aos="zoom-in">BACK</a>
    <div class="row justify-content-center" data-aos="zoom-in">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="/Admin/Employee/{{$employee->employee_id}}" enctype="multipart/form-data" method="POST" class="form-group">
                        @csrf
                        @method('PUT')
                        <div>
                            <input type="file" name="picture" id="picture">
                        </div>
                        <hr>
                        <div>

                            <h4 class="section-title">PRIMARY INFORMATION</h4>
                            <!-- title -->
                            <label for="title">Title</label>
                            <select name="title" id="title">
                                <option value=""></option>
                                <option value="Mr">Mr.</option>
                                <option value="Mrs">Mrs.</option>
                                <option value="Ms">Ms.</option>
                            </select>
                            <br>
                            <!-- first name -->
                            <label for="first_name">First Name:</label>
                            <input type="text" name="first_name" id="first_name" pattern="[A-Z][a-z]*">
                            <br>
                            <!-- middle name -->
                            <label for="last_name">Last Name:</label>
                            <input type="text" name="last_name" id="last_name" pattern="[A-Z][a-z]*">
                            <br>
                            <!-- last name -->
                            <label for="middle_name">Middle Name:</label>
                            <input type="text" name="middle_name" id="middle_name" pattern="[A-Z][a-z]*">
                            <br>
                            <!-- maiden -->
                            <label for="maiden_name">Maiden Name:</label>
                            <input type="text" name="maiden_name" id="maiden_name" pattern="[A-Z][a-z]*">
                            <br>
                            <!-- nickname -->
                            <label for="nick_name">Nick Name:</label>
                            <input type="text" name="nick_name" id="nick_name" pattern="[A-Z][a-z]*">
                            <hr>
                        </div>
                        <hr>
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

                        <!-- 




                         -->
                        <div>
                            <h4 class="section-title">PERSONAL INFORMATION</h4>
                            <!-- Date of Birth -->
                            <label for="date_of_birth">Date of Birth: </label>
                            <input type="date" name="date_of_birth" id="date_of_birth">
                            <br>
                            <!-- Place of Birth -->
                            <label for="place_of_birth">Place of Birth: </label>
                            <textarea rows="5" cols="40" name="place_of_birth" id="place_of_birth"></textarea>
                            <br>
                            <!-- Nationality -->
                            <label for="nationality">Nationality: </label>
                            <input type="text" name="nationality" id="nationality">
                            <br>
                            <!-- Civil Status -->
                            <label for="civil_status">Status: </label>
                            <select name="civil_status" id="civil_status">
                                <option value=""></option>
                                <option value="single">Single</option>
                                <option value="married">Married</option>
                                <option value="divorced">Divorced</option>
                                <option value="widowed">Widowed</option>
                            </select>
                            <br>
                            <!-- Gender -->
                            <label for="gender">Gender: </label>
                            <select name="gender" id="gender">
                                <option value=""></option>
                                <option value="female">Female</option>
                                <option value="male">Male</option>
                                <option value="other">Other</option>
                            </select>
                            <br>
                        </div>
                        <!-- 






                         -->
                        <div>
                            <h4 class="section-title">CONTACT INFORMATION</h4>
                            <!-- mobile Number -->
                            <label for="mobile_no">Mobile No.:</label>
                            <input type="number" name="mobile_no" pattern="^(09\d{9})$" id="mobile_no">
                            <br>
                            <!-- email -->
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email">
                            <br>
                            <!-- Address -->
                            <label>Address</label>
                            <input type="number" name="zip" id="zip" placeholder="Zip">
                            <input type="text" name="street" id="street" placeholder="Street">
                            <input type="text" name="city" id="city" placeholder="City">
                            <input type="text" name="province" id="province" placeholder="Province">
                            <br>
                            <!-- Phone number -->
                            <label for="phone_no">Phone Number:</label>
                            <input type="number" name="phone_no" id="phone_no">
                            <hr>
                        </div>
                        <!-- 






                         -->
                        <div>
                            <h4 class="section-title">PERSON TO NOTIFY INCASE OF EMERGENCY</h4>
                            <!-- Name Contact -->
                            <label for="name">Name: </label>
                            <input type="text" name="name" id="name">
                            <br>
                            <!-- Relationship -->
                            <label for="relationship">Relationship: </label>
                            <input type="text" name="relationship" id="relationship">
                            <br>
                            <!-- Mobile number Contact -->
                            <label for="mobile_no_contact">Mobile No.: </label>
                            <input type="number" name="mobile_no_contact" id="mobile_no_contact">
                            <br>
                            <!-- Address contact -->
                            <label for="address_contact">Address: </label>
                            <input type="text" name="address_contact" id="address_contact">
                            <hr>
                        </div>
                        <!-- 





                         -->
                        <div>
                            <h4 class="section-title">CONTRIBUTIONS</h4>
                            <!-- sss -->
                            <label for="sss">SSS: </label>
                            <input type="number" name="sss" id="sss">
                            <br>
                            <!-- tin -->
                            <label for="tin">TIN: </label>
                            <input type="number" name="tin" id="tin">
                            <br>
                            <!-- philhealth -->
                            <label for="philhealth">PhilHealth: </label>
                            <input type="number" name="philhealth" id="philhealth">
                            <br>
                            <!-- hdmf -->
                            <label for="hdmf">HDMF: </label>
                            <input type="text" name="hdmf" id="hdmf">
                            <hr>
                        </div>
                        <!-- 








                         -->


                        <input type="submit" class="btn btn-green" value="Edit Employee" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>