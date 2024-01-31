<!DOCTYPE html>
<html lang="en">

<head>
    @include("Layout.Head")

    <link rel="stylesheet" href="{{ asset('css/AdminSchedule.css') }}">
</head>

<body>
    @include("Layout.NavBarAdmin")
    <div class="greetings">
        <h1 class="Title_navbar" data-aos="zoom-in">SCHEDULE</h1>

        <div cclass="button" style="margin-left: 10px;">
            <a class="btn btn-brand" href="/Admin/Attendance">BACK</a>
        </div>
    </div>

    <div class="List" data-aos="zoom-in">
        <div class="One_List">
            <div class="Form_Section">
                <div class="Form_Body" style="margin-">
                    <div class="Form_Title_Section">
                        <h2 class=" Form_Title">Create Schedule</h2>
                    </div>
                    <form action="/Admin/Attendance/Schedule" method="POST">
                        @csrf
                        <div class="Form_Input_Section">
                            <label class="Form_Label" for="start_time">Start Time:</label>
                            <input class="Form_Input" type="time" id="start_time" name="start_time" required>
                        </div>

                        <div class="Form_Input_Section">
                            <label class="Form_Label" for="end_time">End Time:</label>
                            <input class="Form_Input" type="time" id="end_time" name="end_time" required>
                            <br>
                        </div>

                        <div class="section">
                            <input class="btn btn-green" type="submit" value="Create Schedule">
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="Two_List">
            <table>
                <thead class="thead_section">
                    <tr>
                        <th>Schedule ID</th>
                        <th>Schedule List</th>
                    </tr>
                </thead>
                <tbody class="body_section">
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
