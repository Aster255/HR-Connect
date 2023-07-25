<!DOCTYPE html>
<html lang="en">

<head>
    @include("Layout.Head")
    <title>System Admin</title>
    @include("layout.Button")
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
    <h1 class="Title_navbar" data-aos="zoom-in">EMPLOYEE</h1>
    <div data-aos="zoom-in">
        <a class="btn btn-brand" href="/Admin/Employee/create">ADD EMPLOYEE</a>
    </div>
    <div class="list">
        <div class="list_one" data-aos="zoom-in">
            <table>
                <thead>
                    <th style="background-color: rgba(206, 212, 218, 1); border-top-left-radius: 10px;">Employee ID</th>
                    <th style="background-color: rgba(206, 212, 218, 1);">Employee Name</th>
                    <th style="background-color: rgba(206, 212, 218, 1);">Status</th>
                    <th style="background-color: rgba(206, 212, 218, 1); border-top-right-radius: 10px;">Date</th>
                </thead>
                <tbody>
                    @foreach ($employees as $e)
                    <tr>
                        <td style="width: 20%">{{$e->employee_id}}</td>
                        <td style="width: 20%">{{$e->first_name}} {{$e->last_name}}</td>
                        <td style="width: 20%">{{$e->employee_status}}</td>
                        <td style="width: 20%">{{$e->employee_timestamp}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <div class="list_two" data-aos="zoom-in">
            <table>
                <thead>
                    <tr>
                        <th colspan="4" style="background-color: rgba(206, 212, 218, 1); border-top-right-radius: 10px; border-top-left-radius: 10px;" colspan="3">Employee List</th>
                    </tr>
                    <tr>
                        <th style="width: 20%">Picture</th>
                        <th style="width: 10%">Employee ID</th>
                        <th style="width: 40%">Employee Name</th>
                        <th style="width: 30%"></th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        @foreach ($employees as $e)
                    <tr>
                        <td><img src="/img/user_profiles/{{$e->picture}}" alt="{{$e->first_name}} pictures" width="100px"></td>
                        <td>{{$e->employee_id}}</td>
                        <td>{{$e->first_name}} {{$e->last_name}}</td>
                        <td>
                            <a class="btn btn-brand ps-5 pe-5" href="/Admin/Employee/{{$e->employee_id}}">info</a>
                        </td>
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