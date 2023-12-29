<!DOCTYPE html>
<html lang="en">

<head>
    @include("Layout.Head")
    <title>System Admin</title>
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
    <h1 class="Title_navbar" data-aos="zoom-in">LEAVE</h1>
    <div data-aos="zoom-in">
        <a class="btn btn-brand" href="/Admin/Leave/Create" data-aos="zoom-in">Leave Types</a>
    </div>
    <div class="list">
        <div class="list_one " data-aos="zoom-in">
            <table class="table ">
                <thead>
                    <th style="background-color: rgba(206, 212, 218, 1); border-top-left-radius: 10px;">Employee ID</th>
                    <th style="background-color: rgba(206, 212, 218, 1);">Employee Name</th>
                    <th style="background-color: rgba(206, 212, 218, 1);">Start Date</th>
                    <th style="background-color: rgba(206, 212, 218, 1);">End Date</th>
                    <th style="background-color: rgba(206, 212, 218, 1); border-top-right-radius: 10px;">Approval</th>
                </thead>
                <tbody>
                    @foreach ($leave as $l)
                    <tr>
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
    </div>

</body>

</html>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>