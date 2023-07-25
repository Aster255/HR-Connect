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

        .form-group input[type="time"] {
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
    </style>
</head>

<body>
    @include("Layout.NavBarAdmin")
    <h1 class="Title_navbar" data-aos="zoom-in">SCHEDULE</h1>

    <div class="col-12" data-aos="zoom-in">
        <a class="btn btn-brand" href="/Admin/Attendance">BACK</a>
    </div>
    <div class="row justify-content-center " style="  margin-right: 10px;" data-aos="zoom-in">
        <div>
            <div class="card">
                <div class="card-body">

                    <h2 class="section-title">Create Schedule</h2>
                    <form action="/Admin/Attendance/Schedule" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="start_time">Start Time:</label>
                            <input type="time" id="start_time" name="start_time" required>
                        </div>

                        <div class="form-group">
                            <label for="end_time">End Time:</label>
                            <input type="time" id="end_time" name="end_time" required>
                            <br>
                        </div>

                        <div class="section">
                            <input class="btn btn-green" type="submit" value="Create Schedule">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="list" data-aos="zoom-in">
        <div class="list_one">
            <table>
                <thead>
                    <th style="background-color: rgba(206, 212, 218, 1); border-top-left-radius: 10px;">ID</th>
                    <th style="background-color: rgba(206, 212, 218, 1); border-top-right-radius: 10px;">Schedule List</th>
                </thead>
                <tbody>
                    @foreach ($schedule as $schedule)
                    <tr>
                        <td>{{$schedule->schedule_id}}</td>
                        <td>{{$schedule->start_time->format('h:i A')}} - {{$schedule->end_time->format('h:i A')}}</td>
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