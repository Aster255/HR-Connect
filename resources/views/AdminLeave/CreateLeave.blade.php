<!DOCTYPE html>
<html lang="en">

<head>
    @include("Layout.Head")
    <title>System Admin</title>
    <link rel="stylesheet" href="{{ asset('css/AdminCreateLeave.css') }}">
</head>

<body>
    @include("Layout.NavBarAdmin")
    <div class="greetings">
        <h1 class="Title_navbar" data-aos="zoom-in">CREATE LEAVE TYPE</h1>
    </div>


    <div class="button">
        <a class="btn btn-brand" href="/Admin/Leave">BACK</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="/Admin/Leave/Create" method="POST">
                @csrf
                <div class="form-group">
                    <label for="leave_type_name">Leave Type: </label>
                    <input type="text" name="leave_type_name" id="leave_type_name">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-green" value="Create Leave Type">
                </div>

            </form>
        </div>
    </div>
    <div class="list">
        <table class="Position_List">
            <thead class="table_section">
                <th>leave ID</th>
                <th>Leave Type</th>
            </thead>
            <tbody>
                @foreach ($leave as $l)
                <tr class="table_section
                    ">
                    <td>{{$l->leavetype_id}}</td>
                    <td>{{$l->leave_type_name}}</td>
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