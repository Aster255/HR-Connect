<!DOCTYPE html>
<html lang="en">

<head>
    <title>System Admin</title>
</head>

<body>
    @include("Layout.Messege")
    <div>
        <p>BUTTONS</p>
    </div>
    <form action="/Admin/CreateUser" method="POST">
        @csrf
        <label for="employee_id">Employee_id</label>
        <select name="employee_id" id="employee_id">
            <option value="">Select Employee</option>
            @foreach ($employee as $e)
            <option value="{{$e->employee_id}}">{{$e->last_name}}, {{$e->first_name}}</option>
            @endforeach
        </select>
        <label for="role">Select Role:</label>
        <select name="role" id="role">
            <option value="admin">Admin</option>
            <option value="employee">Employee</option>
        </select>
        <hr>
        <label for="username">User Name </label>
        <input type="text" name="username" id="username">
        <br>
        <label for="password">Password: </label>
        <input type="password" name="password" id="password">

        <input type="submit" class="btn btn-success" value="Create User">
    </form>

</body>

</html>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>