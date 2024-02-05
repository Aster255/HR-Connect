<!DOCTYPE html>
<html lang="en">

<head>
    @include('Layout.Head')
    <link rel="stylesheet" href="{{ asset('css/AdminCreateUser.css') }}">
</head>

<body>
    @include("Layout.Messege")
    @include("Layout.NavBarAdmin")
    <div class="greetings">
        <h1 class="Title_navbar" data-aos="zoom-in-right" data-aos-duration="100">CREATE NEW USER</h1>
    </div>



    <div class="Form_Section" data-aos="zoom-in" data-aos-duration="600">
        <div class="Form_Body">
            <form action="/Admin/CreateUser" method="POST">
                @csrf
                <div class="Form_Input_Section_Column">
                    <label class="Form_Label" for="employee_id">Employee_id</label>
                    <select class="Form_Input" name="employee_id" id="employee_id" required>
                        <option value="">Select Employee</option>
                        @foreach ($employee as $e)
                        <option value="{{$e->employee_id}}">{{$e->last_name}}, {{$e->first_name}}</option>
                        @endforeach
                    </select>
                    <label class="Form_Label" for="role">Select Role:</label>
                    <select class="Form_Input" name="role" id="role" required>
                        <option value="">Select Role</option>
                        @foreach ($role as $r)
                        <option value="{{$r->role_id}}">{{$r->role_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="Form_Input_Section_Column">
                    <label class="Form_Label" for="username">User Name </label>
                    <input class="Form_Input" type="text" name="username" id="username" required>
                    <label class="Form_Label" for="password">Password: </label>
                    <input class="Form_Input" type="password" name="password" id="password" required>
                </div>
                <div class="mt-5">
                    <input type="submit" class="btn btn-green" value="Create User">
                </div>
            </form>
        </div>
    </div>
</body>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();

</script>

</html>