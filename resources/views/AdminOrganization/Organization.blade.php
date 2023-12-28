<!DOCTYPE html>
<html lang="en">

<head>
    @include("Layout.Head")
    <title>System Admin</title>
    <link rel="stylesheet" href="{{ asset('css/Organization.css') }}">
</head>

<body>
    @include("Layout.NavBarAdmin")
    <div class="greetings">
        <h1 class="Title_navbar" data-aos="zoom-in">ORAGANIZATION</h1>
    </div>


    <div class="button" data-aos="zoom-in">
        <a class="btn btn-brand" href="/Admin/Organization/Position/create">ADD POSITION</a>
        <a class="btn btn-brand" href="/Admin/Organization/Department/create">ADD DEPARTMENT</a>
    </div>

    <div class="list">
        <div>
            <table class="Position_List">
                <thead>
                    <tr>
                        <th class="table_title" colspan="3">Position List</th>
                    </tr>
                    <tr class="table_section">
                        <th>ID</th>
                        <th>Name</th>
                        <th></th>
                    </tr>


                </thead>
                @if (count($positionlist) > 0)
                <tbody>
                    @foreach ($positionlist as $position)
                    <tr class="table_section">
                        <td>{{ $position->position_id }}</td>
                        <td>{{$position->position_name}}</td>

                        <td><a class="btn btn-brand ps-5 pe-5" href="/Admin/Organization/Position/{{$position->position_id}}">Information</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$positionlist->links('pagination::bootstrap-5')}}

            @else
            <p>No Data</p>
            @endif
        </div>
        <div>
            <table class="Department_List">
                <thead>
                    <tr>
                        <th colspan="3" class="table_title">Department List</th>
                    </tr>
                    <tr class="table_section">
                        <th>ID</th>
                        <th>Name</th>
                        <th></th>
                    </tr>

                </thead>
                @if (count($departmentlist) > 0)
                <tbody>
                    @foreach ($departmentlist as $dl)
                    <tr class="table_section">
                        <td>{{$dl->department_id}}</td>
                        <td>{{$dl->department_name}}</td>
                        <td><a class="btn btn-brand ps-5 pe-5" href="/Admin/Organization/Department/{{$dl->department_id}}">Information</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$departmentlist -> links('pagination::bootstrap-5')}}
            @else
            <p>No Data</p>
            @endif
        </div>
    </div>

</body>

</html>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>