<!DOCTYPE html>
<html lang="en">

<head>
    @include("Layout.Head")
    <title>System Admin</title>
    <link rel="stylesheet" href="{{ asset('css/AdminEmployee.css') }}">

</head>

<body>
    @include("Layout.NavBarAdmin")
    <div class="greetings">
        <h1 class="Title_navbar" data-aos="zoom-in">EMPLOYEE</h1>
    </div>

    <div class="button">
        <a class="btn btn-brand" href="/Admin/Employee/create">ADD EMPLOYEE</a>
    </div>
    <div class="list">
        <div class="list_one" data-aos="zoom-in">
            <table>
                <thead class="table_section">
                    <th>Employee ID</th>
                    <th>Employee Name</th>
                    <th>Status</th>
                    <th>Date</th>
                </thead>
                <tbody>
                    @php
                    $hasUpdatesForToday = false;
                    @endphp

                    @foreach ($employees as $e)
                    @php
                    $formattedDate = date('Y-m-d', strtotime($e->employee_timestamp));
                    @endphp

                    @if ($formattedDate == now()->toDateString())
                    @php
                    $hasUpdatesForToday = true;
                    @endphp

                    <tr class="table_section">
                        <td>{{$e->employee_id}}</td>
                        <td>{{$e->first_name}} {{$e->last_name}}</td>
                        <td>{{$e->employee_status}}</td>
                        <td>{{$e->employee_timestamp}}</td>
                    </tr>
                    @endif
                    @endforeach

                    @if (!$hasUpdatesForToday)
                    <tr>
                        <td colspan="4" style='text-align: center;'>No available updates for today.</td>
                    </tr>
                    @endif

                </tbody>
            </table>

        </div>
        <div class="list_two" data-aos="zoom-in">
            <table>
                <thead>
                    <tr class="table_title">
                        <th colspan="4">Employee List</th>
                    </tr>
                    <tr class="table_section">
                        <th>Picture</th>
                        <th>Employee ID</th>
                        <th>Employee Name</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($employees as $e)
                    <tr class="table_section">
                        <td><img src="/img/user_profiles/{{$e->picture}}" alt="{{$e->first_name}} pictures"
                                width="100px"></td>
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