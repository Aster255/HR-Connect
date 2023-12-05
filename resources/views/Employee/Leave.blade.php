<!DOCTYPE html>
<html lang="en">

<head>
    @include("Layout.Head")
    <title>System Admin</title>
    @include('Layout.Button')
    <style>
        .section {
            margin-bottom: 20px;
        }

        .section-title {
            font-weight: bold;
            color: rgba(146, 53, 232, 1);
            margin-bottom: 10px;
        }

        .section-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .card-body {
            background-color: rgba(241, 243, 245, 1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            color: rgba(59, 16, 134, 1);
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group input[type="date"] {
            width: 100%;
            padding: 10px;
            border: 1px solid rgba(41, 10, 111, 1);
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid rgba(41, 10, 111, 1);
            border-radius: 5px;
            background-color: white;
        }

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
    @include("Layout.NavBarEmployee")
    <h1 class="Title_navbar" data-aos="zoom-in">LEAVE</h1>

    <div data-aos="zoom-in">
        <a class="btn btn-brand" href="/Leave/create">REQUEST LEAVE</a>
    </div>

    <div class="list">
        <div class="list_one" data-aos="zoom-in">
            <table>
                <thead>
                    <th style="background-color: rgba(206, 212, 218, 1); border-top-left-radius: 10px;">leave ID</th>
                    <th style="background-color: rgba(206, 212, 218, 1);">Start Date</th>
                    <th style="background-color: rgba(206, 212, 218, 1);">End Date</th>
                    <th style="background-color: rgba(206, 212, 218, 1); border-top-right-radius: 10px;">status</th>
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