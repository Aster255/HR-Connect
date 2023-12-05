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
    <h1 class="Title_navbar" data-aos="zoom-in">LOG LIST</h1>

    <div class="col-12" data-aos="zoom-in">
        <a class="btn btn-brand" href="/Admin/Attendance">BACK</a>
        <a class="btn btn-success" href="/Admin/Attendance/Log/create">Log In</a>
    </div>


    <div class="list" data-aos="zoom-in">
        <div class="list_one" data-aos="zoom-in">
            <table>
                <thead>
                    <th style="background-color: rgba(206, 212, 218, 1); border-top-left-radius: 10px;">Attendance ID</th>
                    <th style="background-color: rgba(206, 212, 218, 1);">Employee ID</th>
                    <th style="background-color: rgba(206, 212, 218, 1);">Time Log In</th>
                    <th style="background-color: rgba(206, 212, 218, 1);">Time Log Out</th>
                    <th style="background-color: rgba(206, 212, 218, 1);">Date</th>
                    <th style="background-color: rgba(206, 212, 218, 1); border-top-right-radius: 10px;">Log Out</th>
                </thead>
                <tbody>
                    @foreach ($attendance as $a)
                    <tr>
                        <td>{{$a->attendance_id}}</td>
                        <td>{{$a->employee_id}}</td>
                        <td>{{$a->in_time}}</td>
                        <td>{{$a->out_time}}</td>
                        <td>{{$a->attendance_date}}</td>
                        <td>
                            @if (empty($a->out_time) && empty($a->out_status))
                            <a class="btn btn-red" href="/Admin/Attendance/Log/{{$a->attendance_id}}/edit">Log Out</a>
                            @endif

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