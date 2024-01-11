<!DOCTYPE html>
<html lang="en">

<head>
    @include("Layout.Head")
    <title>System Admin</title>
    <link rel="stylesheet" href="{{ asset('css/Attendance.css') }}">
</head>

<body>
    @include("Layout.NavBarEmployee")
    <div class="greetings">
        <h1 class="Title_navbar" data-aos="zoom-in">LOG IN</h1>
    </div>


    <div class="row justify-content-center" data-aos="zoom-in">
        <div class="col-md-11">
            <p id="realtime-date">{{ date('h:i:s') }}</p>
        </div>
    </div>
    <div class="row justify-content-center" data-aos="zoom-in">
        <div class="col-md-11">
            <div class="card">
                <div class="card-body">
                    <form action="/Attendance" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Employee ID:</label>
                            <input disabled type="text" value="{{ $employee->employee_id }}"></input>
                            <labe>Employee Name:</labe>
                            <input disabled type="text" value="{{ $employee-> last_name }}, {{ $employee-> first_name }}">
                            <input hidden type="text" value="{{ $schedule->schedule_id ?? ''}}">
                        </div>
                        <div class="form-group">
                            <select name="location_id" id="location_id" required>
                                <option value="">select one</option>
                                @foreach ($locations as $location)
                                <option value="{{ $location->location_id }}">{{ $location->location }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="section">
                            <input type="submit" style="width: 100%" class="btn btn-green" value="LOG IN">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center" data-aos="zoom-in">
        <div class="col-md-11">
            <form action="/Attendance" method="POST">
                @csrf
                @method('PUT')
                <input type="submit" class="btn btn-red" style="width: 100%" value="LOG OUT">
            </form>
        </div>
    </div>



    <div>
        <div class="list">
            <table class="Position_List">
                <thead class="table_section">
                    <th>Attendance ID</th>
                    <th>Time Log In</th>
                    <th>Time Log Out</th>
                    <th>Date</th>
                </thead>
                <tbody>
                    @forelse ($attendance as $a)
                    <tr class='table_section'>
                        <td>{{$a->attendance_id}}</td>
                        <td>{{$a->in_time}}</td>
                        <td>{{$a->out_time}}</td>
                        <td>{{$a->attendance_date->format('Y-m-d')}}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">No attendance records found.</td>
                    </tr>
                    @endforelse
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

<script>
    function updateRealtimeDate() {
        var dateElement = document.getElementById('realtime-date');
        var currentDate = new Date();
        var formattedDate = currentDate.toLocaleString('en-GB', {
            hour12: false
        });
        dateElement.textContent = formattedDate;
    }
    updateRealtimeDate();
    setInterval(updateRealtimeDate, 1000);
</script>