<!DOCTYPE html>
<html lang="en">

<head>
    @include("Layout.Head")
    <title>System Admin</title>
    @include('Layout.Button')
    <style>
        .list {
            margin-right: 20px;
        }

        .list_one {
            background-color: var(--Nuetrals100);
            border-radius: 5px;

        }

        .list_two {
            background-color: var(--Nuetrals100);
            border-radius: 10px;
        }

        table {
            margin-block: 20px;
            width: 100%;
            text-align: center;
            border-radius: 10px;
        }

        th {
            padding-block: 10px;
        }

        td {
            padding-block: 10px;
        }
    </style>
</head>

<body>
    @include("Layout.NavBarAdmin")
    <h1 class="Title_navbar" data-aos="zoom-in">ATTENDANCE</h1>


    <div data-aos="zoom-in">
        <a href="/Admin/Attendance/Log" class="btn btn-brand">Log List</a>
        <a href="/Admin/Attendance/Calendar" class="btn btn-brand">Calendar</a>
        <a href="/Admin/Attendance/Schedule" class="btn btn-brand">Schedule</a>
        <a href="/Admin/Attendance/Location" class="btn btn-brand">Location</a>
    </div>

    <!-- <div data-aos="zoom-in">
        <p>{{$totalemployee}} / {{$totalEmployeesLoggedInToday}}</p>
        <p>Total Employee Present</p>
    </div> -->

    <div class="list">
        <div class="list_one" data-aos="zoom-in">
            <table>
                <thead>
                    <tr>
                        <th colspan="3" style="background-color: rgba(206, 212, 218, 1); border-top-right-radius: 10px; border-top-left-radius: 10px;">Log In List</th>
                    </tr>
                    <tr>
                        <th style="background-color: rgba(206, 212, 218, 1); width: 30%;">Employee ID</th>
                        <th style="background-color: rgba(206, 212, 218, 1); width: 40%;">Employee Name</th>
                        <th style="background-color: rgba(206, 212, 218, 1);  width: 30%;">Log In Time</th>
                    </tr>

                </thead>
                <tbody>
                <tbody>
                    @foreach ($attendance as $a)

                    <tr>
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

        <div class="list_two" data-aos="zoom-in">
            <table>
                <thead>
                    <tr>
                        <th colspan="3" style="background-color: rgba(206, 212, 218, 1); border-top-right-radius: 10px; border-top-left-radius: 10px;">Log Out List</th>
                    </tr>
                    <tr>
                        <th style="background-color: rgba(206, 212, 218, 1); width: 30%;">Employee ID</th>
                        <th style="background-color: rgba(206, 212, 218, 1); width: 40%;">Employee Name</th>
                        <th style="background-color: rgba(206, 212, 218, 1); width: 30%;">Log Out Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($attendance as $a)

                    <tr>
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