<!DOCTYPE html>
<html lang="en">

<head>
    @include("Layout.Head")
    <title>System Admin</title>
    <link rel="stylesheet" href="{{ asset('css/Leave.css') }}">
</head>

<body>
    @include("Layout.NavBarEmployee")
    <div class="greetings">
        <h1 class="Title_navbar" data-aos="zoom-in">LEAVE</h1>
    </div>


    <div class="button">
        <a class="btn btn-brand" href="/Leave/create">REQUEST LEAVE</a>
    </div>

    <div class="list">
        <table class="Position_List">
            <thead class="table_section">
                <th>leave ID</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>status</th>
            </thead>
            <tbody class="table_section">
                @foreach ($leave as $l)
                <tr>
                    <td>{{$l->leave_id}}</td>
                    <td>{{$l->start_date}}</td>
                    <td>{{$l->end_date}}</td>
                    <td>{{$l->status}}</td>
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