<!DOCTYPE html>
<html lang="en">

<head>
    @include("Layout.Head")
    <title>System Admin</title>
    <link rel="stylesheet" href="{{ asset('css/AdminSchedule.css') }}">
</head>

<body>
    @include("Layout.NavBarAdmin")
    <div class="greetings">
        <h1 class="Title_navbar" data-aos="zoom-in">SCHEDULE</h1>
    </div>


    <div cclass="button" style="margin-left: 10px;">
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