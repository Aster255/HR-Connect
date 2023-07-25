<!DOCTYPE html>
<html lang="en">

<head>
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
    <h1 class="Title_navbar" data-aos="zoom-in">ADD NEW EMPLOYEE</h1>
    <a class="btn btn-brand ms-2" href="{{ route('Employee.index') }}" data-aos="zoom-in">BACK</a>

    <div class="row justify-content-center" data-aos="zoom-in">
        <div class="col-sm-8 col-lg-10">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('Employee.store') }}" method="POST" enctype="multipart/form-data" class="form-group">
                        @csrf
                        <div class="profile-picture">
                            <input type="file" name="picture" id="picture">
                        </div>
                        <div class="section">
                            <h4 class="section-title">PRIMARY INFORMATION</h4>
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <select name="title" id="title">
                                    <option value=""></option>
                                    <option value="Mr">Mr.</option>
                                    <option value="Mrs">Mrs.</option>
                                    <option value="Ms">Ms.</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="first_name">First Name:</label>
                                <input type="text" name="first_name" id="first_name" pattern="[A-Z][a-z]*" required>
                            </div>
                            <div class="form-group">
                                <label for="middle_name">Last Name:</label>
                                <input type="text" name="middle_name" id="middle_name" pattern="[A-Z][a-z]*" required>
                            </div>
                            <div class="form-group">
                                <label for="last_name">Middle Name:</label>
                                <input type="text" name="last_name" id="last_name" pattern="[A-Z][a-z]*" required>
                            </div>
                            <div class="form-group">
                                <label for="maiden_name">Maiden Name:</label>
                                <input type="text" name="maiden_name" id="maiden_name" pattern="[A-Z][a-z]*">
                            </div>
                            <div class="form-group">
                                <label for="nick_name">Nick Name:</label>
                                <input type="text" name="nick_name" id="nick_name" pattern="[A-Z][a-z]*">
                            </div>
                        </div>
                        <hr>
                        <div class="section">
                            <h4 class="section-title">PERSONAL INFORMATION</h4>
                            <!-- Date of Birth -->
                            <div class="form-group">
                                <label for="date_of_birth">Date of Birth: </label>
                                <input type="date" name="date_of_birth" id="date_of_birth">
                            </div>
                            <!-- Place of Birth -->
                            <div class="form-group">
                                <label for="place_of_birth">Place of Birth: </label>
                                <textarea rows="5" cols="40" name="place_of_birth" id="place_of_birth"></textarea>
                            </div>
                            <!-- Nationality -->
                            <div class="form-group">
                                <label for="nationality">Nationality: </label>
                                <input type="text" name="nationality" id="nationality">
                            </div>
                            <!-- Civil Status -->
                            <div class="form-group">
                                <label for="civil_status">Status: </label>
                                <select name="civil_status" id="civil_status" required>
                                    <option value=""></option>
                                    <option value="single">Single</option>
                                    <option value="married">Married</option>
                                    <option value="divorced">Divorced</option>
                                    <option value="widowed">Widowed</option>
                                </select>
                            </div>
                            <!-- Gender -->
                            <div class="form-group">
                                <label for="gender">Gender: </label>
                                <select name="gender" id="gender" required>
                                    <option value=""></option>
                                    <option value="female">Female</option>
                                    <option value="male">Male</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="section">
                            <h4 class="section-title">CONTACT INFORMATION</h4>
                            <!-- mobile Number -->
                            <div class="form-group">
                                <label for="mobile_no">Mobile No.:</label>
                                <input type="number" name="mobile_no" pattern="^(09\d{9})$" id="mobile_no" required>
                            </div>
                            <!-- email -->
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" id="email" required>
                            </div>
                            <!-- Address -->
                            <div class="form-group">
                                <label>Address</label>
                                <input type="number" name="zip" id="zip" placeholder="Zip">
                                <input type="text" name="street" id="street" placeholder="Street">
                                <input type="text" name="city" id="city" placeholder="City">
                                <input type="text" name="province" id="province" placeholder="Province">
                            </div>
                            <!-- Phone number -->
                            <div class="form-group">
                                <label for="phone_no">Phone Number:</label>
                                <input type="number" name="phone_no" id="phone_no" required>
                            </div>
                        </div>
                        <hr>
                        <div class="section">
                            <h4 class="section-title">PERSON TO NOTIFY INCASE OF EMERGENCY</h4>
                            <!-- Name Contact -->
                            <div class="form-group">
                                <label for="name">Name: </label>
                                <input type="text" name="name" id="name">
                            </div>
                            <!-- Relationship -->
                            <div class="form-group">
                                <label for="relationship">Relationship: </label>
                                <input type="text" name="relationship" id="relationship">
                            </div>
                            <!-- Mobile number Contact -->
                            <div class="form-group">
                                <label for="mobile_no_contact">Mobile No.: </label>
                                <input type="number" name="mobile_no_contact" id="mobile_no_contact">
                            </div>
                            <!-- Address contact -->
                            <div class="form-group">
                                <label for="address_contact">Address: </label>
                                <input type="text" name="address_contact" id="address_contact">
                            </div>
                        </div>
                        <hr>
                        <div class="section">
                            <h4 class="section-title">CONTRIBUTIONS</h4>
                            <!-- sss -->
                            <div class="form-group">
                                <label for="sss">SSS: </label>
                                <input type="number" name="sss" id="sss">
                            </div>
                            <!-- tin -->
                            <div class="form-group">
                                <label for="tin">TIN: </label>
                                <input type="number" name="tin" id="tin">
                            </div>
                            <!-- philhealth -->
                            <div class="form-group">
                                <label for="philhealth">PhilHealth: </label>
                                <input type="number" name="philhealth" id="philhealth">
                            </div>
                            <!-- hdmf -->
                            <div class="form-group">
                                <label for="hdmf">HDMF: </label>
                                <input type="number" name="hdmf" id="hdmf">
                            </div>
                        </div>
                        <hr>
                        <div class="section">
                            <!-- position -->
                            <div class="form-group">
                                <label for="position_id">Position:</label>
                                <select name="position_id" id="position_id" required>
                                    <option value="">Select Position</option>
                                    @foreach ($position as $pos)
                                    <option value="{{ $pos->position_id }}">{{ $pos->position_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- department -->
                            <div class="form-group">
                                <label for="department_id">Department:</label>
                                <select name="department_id" id="department_id" required>
                                    <option value="">Select Department</option>
                                    @foreach ($department as $dept)
                                    <option value="{{ $dept->department_id }}">{{ $dept->department_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Hire Date -->
                            <div class="form-group">
                                <label for="hire_date">Hire Date:</label>
                                <input type="date" name="hire_date" id="hire_date" required>
                            </div>
                            <!-- schedule -->
                            <div class="form-group">
                                <label for="schedule_id">Schedule:</label>
                                <select name="schedule_id" id="schedule_id" required>
                                    <option value="">Select Schedule</option>
                                    @foreach ($schedule as $sched)
                                    <option value="{{ $sched->schedule_id }}">{{ $sched->start_time->format('H:i:s') }} - {{ $sched->end_time->format('H:i:s') }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Salary -->
                            <div class="form-group">
                                <label for="salary">Salary:</label>
                                <input type="number" name="salary" id="salary" min="5000" required>
                            </div>
                        </div>
                        <hr>
                        <div class="section">
                            <input type="submit" class="btn btn-green" value="New Employee" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Employee</div>
                <div class="card-body">
                    <form action="{{ route('Employee.store') }}" method="POST" enctype="multipart/form-data" class="form-group">
                        @csrf
                        <div>
                            <label for="picture">Picture:</label>
                            <input type="file" name="picture" id="picture">
                        </div>
                        <h4>PRIMARY INFORMATION</h4>
                        
                        <label for="title">Title</label>
                        <select name="title" id="title">
                            <option value=""></option>
                            <option value="Mr">Mr.</option>
                            <option value="Mrs">Mrs.</option>
                            <option value="Ms">Ms.</option>
                        </select>
                        <br>
         
                        <label for="first_name">First Name:</label>
                        <input type="text" name="first_name" id="first_name" pattern="[A-Z][a-z]*" required>
                        <br>
                 
                        <label for="middle_name">Last Name:</label>
                        <input type="text" name="middle_name" id="middle_name" pattern="[A-Z][a-z]*" required>
                        <br>
                  
                        <label for="last_name">Middle Name:</label>
                        <input type="text" name="last_name" id="last_name" pattern="[A-Z][a-z]*" required>
                        <br>
                        
                        <label for="maiden_name">Maiden Name:</label>
                        <input type="text" name="maiden_name" id="maiden_name" pattern="[A-Z][a-z]*">
                        <br>
                        
                        <label for="nick_name">Nick Name:</label>
                        <input type="text" name="nick_name" id="nick_name" pattern="[A-Z][a-z]*">
                        <hr>
                        



               
                        <h4>PERSONAL INFORMATION</h4>
             
                        <label for="date_of_birth">Date of Birth: </label>
                        <input type="date" name="date_of_birth" id="date_of_birth">
                        <br>
                     
                        <label for="place_of_birth">Place of Birth: </label>
                        <textarea rows="5" cols="40" name="place_of_birth" id="place_of_birth"></textarea>
                        <br>
                        
                        <label for="nationality">Nationality: </label>
                        <input type="text" name="nationality" id="nationality">
                        <br>
                      
                        <label for="civil_status">Status: </label>
                        <select name="civil_status" id="civil_status" required>
                            <option value=""></option>
                            <option value="single">Single</option>
                            <option value="married">Married</option>
                            <option value="divorced">Divorced</option>
                            <option value="widowed">Widowed</option>
                        </select>
                        <br>
                        
                        <label for="gender">Gender: </label>
                        <select name="gender" id="gender" required>
                            <option value=""></option>
                            <option value="female">Female</option>
                            <option value="male">Male</option>
                            <option value="other">Other</option>
                        </select>
                        <br>
                        





           
                        <h4>CONTACT INFORMATION</h4>
                 
                        <label for="mobile_no">Mobile No.:</label>
                        <input type="number" name="mobile_no" pattern="^(09\d{9})$" id="mobile_no" required>
                        <br>
                        
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" required>
                        <br>
                        
                        <label>Address</label>
                        <input type="number" name="zip" id="zip" placeholder="Zip">
                        <input type="text" name="street" id="street" placeholder="Street">
                        <input type="text" name="city" id="city" placeholder="City">
                        <input type="text" name="province" id="province" placeholder="Province">
                        <br>
                   
                        <label for="phone_no">Phone Number:</label>
                        <input type="number" name="phone_no" id="phone_no" required>
                        <hr>
                        





                     
                        <h4>PERSON TO NOTIFY INCASE OF EMERGENCY</h4>
                     
                        <label for="name">Name: </label>
                        <input type="text" name="name" id="name">
                        <br>
                        
                        <label for="relationship">Relationship: </label>
                        <input type="text" name="relationship" id="relationship">
                        <br>
                         
                        <label for="mobile_no_contact">Mobile No.: </label>
                        <input type="number" name="mobile_no_contact" id="mobile_no_contact">
                        <br>
                         
                        <label for="address_contact">Address: </label>
                        <input type="text" name="address_contact" id="address_contact">
                        <hr>
                        




                         
                        <h4>CONTRIBUTIONS</h4>
                        
                        <label for="sss">SSS: </label>
                        <input type="number" name="sss" id="sss">
                        <br>
                        
                        <label for="tin">TIN: </label>
                        <input type="number" name="tin" id="tin">
                        <br>
                        
                        <label for="philhealth">PhilHealth: </label>
                        <input type="number" name="philhealth" id="philhealth">
                        <br>
                        
                        <label for="hdmf">HDMF: </label>
                        <input type="text" name="hdmf" id="hdmf">
                        <hr>
                        







                         
                        
                        <label for="position_id">Position:</label>
                        <select name="position_id" id="position_id" required>
                            <option value="">Select Position</option>
                            @foreach ($position as $pos)
                            <option value="{{ $pos->position_id }}">{{ $pos->position_name }}</option>
                            @endforeach
                        </select>
                        <br>
                        
                        <label for="department_id">Department:</label>
                        <select name="department_id" id="department_id" required>
                            <option value="">Select Department</option>
                            @foreach ($department as $dept)
                            <option value="{{ $dept->department_id }}">{{ $dept->department_name }}</option>
                            @endforeach
                        </select>
                        <br>
                         
                        <label for="hire_date">Hire Date:</label>
                        <input type="date" name="hire_date" id="hire_date" required>
                        <br>
                        
                        <select name="schedule_id" id="schedule_id" required>
                            <option value="">Select Schedule</option>
                            @foreach ($schedule as $schedule)
                            <option value="{{ $schedule->schedule_id }}">{{ $schedule->start_time->format('H:i:s') }} - {{ $schedule->end_time->format('H:i:s') }}
                            </option>
                            @endforeach
                        </select>
                        <br>
                        
                        <label for="salary">Salary:</label>
                        <input type="number" name="salary" id="salary" min="5000" required>
                        <hr>

                        <input type="submit" class="btn btn-primary" value="New Employee" />
                    </form>
                </div>
            </div>
        </div>
    </div> -->

</body>
</body>

</html>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>