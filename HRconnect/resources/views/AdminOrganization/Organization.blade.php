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

        .Position_List {
            background-color: var(--Nuetrals100);
            border-radius: 5px;

        }

        .Department_List {
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
    </style>

</head>

<body>
    @include("Layout.NavBarAdmin")
    <h1 class="Title_navbar" data-aos="zoom-in">ORAGANIZATION</h1>

    <div class="button" data-aos="zoom-in">
        <a class="btn btn-brand" href="/Admin/Organization/Position/create">ADD POSITION</a>
        <a class="btn btn-brand" href="/Admin/Organization/Department/create">ADD DEPARTMENT</a>
    </div>

    <div class="list">
        <div class="Position_List" data-aos="zoom-in">
            <table>
                <thead>
                    <tr>
                        <th style="background-color: rgba(206, 212, 218, 1); border-top-right-radius: 10px; border-top-left-radius: 10px;" colspan="3">Position List</th>
                    </tr>
                    <tr>
                        <th style="width: 10%">ID</th>
                        <th style="width: 60%">Name</th>
                        <th style="width: 30%"></th>
                    </tr>


                </thead>
                @if (count($positionlist) > 0)
                <tbody>
                    @foreach ($positionlist as $position)
                    <tr>
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
        <div class="Department_List" data-aos="zoom-in">
            <table class="">
                <thead>
                    <tr>
                        <th colspan="3" style="background-color: rgba(206, 212, 218, 1); border-top-right-radius: 10px; border-top-left-radius: 10px;">Department List</th>
                    </tr>
                    <tr>
                        <th style="width: 10%">ID</th>
                        <th style="width: 60%">Name</th>
                        <th style="width: 30%"></th>
                    </tr>

                </thead>
                @if (count($departmentlist) > 0)
                <tbody>
                    @foreach ($departmentlist as $dl)
                    <tr>
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