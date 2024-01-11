<!DOCTYPE html>
<html lang="en">

<head>
    @include("Layout.Head")
    <title>System Admin</title>
    <link rel="stylesheet" href="{{ asset('css/AdminAttendanceLoglist.css') }}">


</head>

<body>
    @include("Layout.NavBarAdmin")
    <div class="greetings">
        <h1 class="Title_navbar" data-aos="zoom-in">LOG LIST</h1>
    </div>


    <div class="button">
        <a class="btn btn-brand" href="/Admin/Attendance">BACK</a>
        <a class="btn btn-green" href="/Admin/Attendance/Log/create">Log In</a>
    </div>


    <div>
        <div class="list">
            <table class="Position_List">
                <thead class="table_section">
                    <th>Attendance ID</th>
                    <th>Employee ID</th>
                    <th>Time Log In</th>
                    <th>Time Log Out</th>
                    <th>Date</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($attendance as $a)
                    <tr class='table_section'>
                        <td>{{$a->attendance_id}}</td>
                        <td>{{$a->employee_id}}</td>
                        <td>{{$a->in_time}}</td>
                        <td>{{$a->out_time}}</td>
                        <td>{{$a->attendance_date}}</td>
                        <td>
                            @if (empty($a->out_time) && empty($a->out_status))
                            <button type="button" class="btn btn-red" data-bs-toggle='modal' data-bs-target='#logout_{{$a->attendance_id}}'>
                                LOG OUT
                            </button>
                            @endif

                            <div class="modal fade" id="logout_{{$a->attendance_id}}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                             
                                        <div class="modal-header">
                                            <h4 class="modal-title">Do you want to Log Out?</h4>
                                          
                                        </div>

                                    
                                        <div class="modal-body">
                                            <div>
                                                <p id="realtime-date">{{ date('h:i:s') }}</p>
                                            </div>
                                        </div>
                                   
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-grey" data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            <form action="{{ route('Log.update', $a->attendance_id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="submit" class="btn btn-red" style="width: 100%" value="LOG OUT">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>

<script>
    document.addEventListener('DOMContentLoaded', function() {
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
    });
</script>