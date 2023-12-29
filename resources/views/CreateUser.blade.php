<!DOCTYPE html>
<html lang="en">

<head>
    <title>System Admin</title>
    @include('Layout.Head')
    <link rel="stylesheet" href="{{ asset('css/AdminCreateUser.css') }}">
</head>

<body>
    @include("Layout.Messege")
    <div class="greetings">
        <h1 class="Title_navbar" data-aos="zoom-in">CREATE NEW USER</h1>
    </div>
    <div class="button">
        <a class="btn btn-brand ms-2" href="Dashboard" data-aos="zoom-in">BACK</a>
    </div>


    <div class="section">
        <form action="/Admin/CreateUser" method="POST">
            @csrf
            <div class="section_content">
                <label for="employee_id">Employee_id</label>
                <select name="employee_id" id="employee_id">
                    <option value="">Select Employee</option>
                    @foreach ($employee as $e)
                    <option value="{{$e->employee_id}}">{{$e->last_name}}, {{$e->first_name}}</option>
                    @endforeach
                </select>
                <label for="role">Select Role:</label>
                <select name="role" id="role">
                    <option value="">Select Role</option>
                    @foreach ($role as $r)
                    <option value="{{$r->role_id}}">{{$r->role_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="divider"></div>
            <div class="section_content">
                <label for="username">User Name </label>
                <input type="text" name="username" id="username">
                <label for="password">Password: </label>
                <input type="password" name="password" id="password">
            </div>
            <input type="submit" class="btn btn-green" value="Create User">
        </form>
    </div>
</body>


<script>
    document.querySelector('')
</script>

</html>