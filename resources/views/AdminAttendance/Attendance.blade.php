<!DOCTYPE html>
<html lang="en">

<head>
    @include("Layout.Head")
    <title>System Admin</title>
    <link rel="stylesheet" href="{{ asset('css/AdminAttendance.css') }}">
</head>

<body>
    @include("Layout.NavBarAdmin")
    <div class="greetings">
        <h1 class="Title_navbar" data-aos="zoom-in">ATTENDANCE</h1>
    </div>



    <div class="button">
        <a href="/Admin/Attendance/Log" class="btn btn-brand">Log List</a>
        <a href="/Admin/Attendance/Calendar" class="btn btn-brand">Calendar</a>
        <a href="/Admin/Attendance/Schedule" class="btn btn-brand">Schedule</a>
        <a href="/Admin/Attendance/Location" class="btn btn-brand">Location</a>
    </div>

    <div class="list">
        <div>
            <table class="Position_List">
                <thead>
                    <tr class="table_title">
                        <th colspan="3">Log In List</th>
                    </tr>
                    <tr class="table_section">
                        <th>Employee ID</th>
                        <th>Employee Name</th>
                        <th>Log In Time</th>
                    </tr>

                </thead>
                <tbody>
                <tbody>
                    @foreach ($attendance as $a)

                    <tr class="table_section">
                        <td>{{$a->employee_id}}</td>
                        @foreach($employee as $e)
                        @if ($e->employee_id === $a->employee_id)
                        <td>{{$e->first_name}} {{$e->last_name}}</td>
                        @endif
                        @endforeach
                        <td>{{$a->in_time}}</td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>

        <div>
            <table class="Position_List">
                <thead>
                    <tr class="table_title">
                        <th colspan="3">Log Out List</th>
                    </tr>
                    <tr class="table_section">
                        <th>Employee ID</th>
                        <th>Employee Name</th>
                        <th>Log Out Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($attendance as $a)

                    <tr class='table_section'>
                        <td>{{$a->employee_id}}</td>
                        @foreach($employee as $e)
                        @if ($e->employee_id === $a->employee_id)
                        <td>{{$e->first_name}} {{$e->last_name}}</td>
                        @endif
                        @endforeach
                        <td>{{$a->out_time}}</td>
                    </tr>

                    @endforeach
                </tbody>

            </table>
        </div>
    </div>


</body>

</html>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>