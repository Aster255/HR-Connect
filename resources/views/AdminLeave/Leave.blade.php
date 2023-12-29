<!DOCTYPE html>
<html lang="en">

<head>
    @include("Layout.Head")
    <title>System Admin</title>
    <link rel="stylesheet" href="{{ asset('css/AdminLeave.css') }}">
</head>

<body>
    @include("Layout.NavBarAdmin")
    <div class="greetings">
        <h1 class="Title_navbar" data-aos="zoom-in">LEAVE</h1>
    </div>

    <div class="button">
        <a class="btn btn-brand" href="/Admin/Leave/Create" data-aos="zoom-in">Leave Types</a>
    </div>

    <div class="list">
        <table class="table ">
            <thead class='table_section'>
                <th>Employee ID</th>
                <th>Employee Name</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Approval</th>
            </thead>
            <tbody>
                @foreach ($leave as $l)
                <tr class='table_section'>
                    <td>{{$l->employee_id}}</td>
                    @foreach($employee as $e)
                    @if ($e->employee_id === $l->employee_id)
                    <td>{{$e->first_name}} {{$l->last_name}}</td>
                    @endif
                    @endforeach
                    <td>{{$l->start_date}}</td>
                    <td>{{$l->end_date}}</td>
                    <td class="mt2- mb-2"><a class=" btn-brand" href="/trial">information</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


</body>

</html>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>