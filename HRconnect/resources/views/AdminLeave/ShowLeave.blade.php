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
    <h1 class="Title_navbar" data-aos="zoom-in">LEAVE</h1>
    <div class="list">
        <div class="list_one " data-aos="zoom-in">
            <table class="table ">
                <thead>
                    <th style="background-color: rgba(206, 212, 218, 1); border-top-left-radius: 10px;">Leave ID</th>
                    <th style="background-color: rgba(206, 212, 218, 1);">Start Date</th>
                    <th style="background-color: rgba(206, 212, 218, 1);">End Date</th>
                    <th style="background-color: rgba(206, 212, 218, 1); border-top-right-radius: 10px;">Status</th>
                </thead>
                <tbody>
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
    </div>

</body>

</html>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>