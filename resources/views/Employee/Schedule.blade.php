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
        <h1 class="Title_navbar" data-aos="zoom-in">Schedule</h1>
    </div>


    <div class="button"> 
        <button type="button" class="btn btn-brand" data-bs-toggle='modal' data-bs-target='#request_schedule'>
            REQUEST NEW SCHEDULE
        </button>

        <div class="modal fade" id="request_schedule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">REQUEST YOUR PREFER SCHEDULE</h5>
                    </div>
                    <form action="/Schedule/{{ $employee->employee_id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div>
                                <label for="requestschedule">SELECT PREFER SCHEDULE</label>
                                <select name="requestschedule" id="requestschedule">
                                    <option value=""></option>
                                    @foreach ($workschedule as $ws)
                                    <option value="{{ $ws->schedule_id }}">{{ $ws->start_time }} - {{ $ws->end_time }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="reason_for_change_schedule">Reason for change schedule: </label>
                                <textarea name="reason_for_change_schedule" id="chanage_schedule"
                                    style='resize: none;'></textarea>
                            </div>
                        </div>
                        <button type="button" class="btn btn-grey" data-bs-dismiss="modal">Close</button>
    <button class="btn btn-green" type="submit">Save</button>
</div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="list">
        @if ($employee->schedule_id === null)
        <p>YOU DONT HAVE HAVENT SELECT YOUR SCHEDULE</p>
        <button type="button" class="btn btn-brand" data-bs-toggle='modal' data-bs-target='#select_schedule'>
            SELECT SCHEDULE
        </button>

        <div class="modal fade" id="select_schedule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                    </div>
                    <form action="/Schedule/{{ $employee->employee_id }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div>
                                <label for="selectschedule">SELECT YOUR SCHEDULE</label>
                                <select name="selectschedule" id="selectschedule">
                                    <option value=""></option>
                                    @foreach ($workschedule as $ws)
                                    <option value="{{ $ws->schedule_id }}"> {{ $ws -> start_time }} - {{$ws -> end_time
                                        }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button class="btn btn-success" type="submit">Save</button>
</div>
                    </form>
                </div>
            </div>
        </div>
        @else
        <p>YOUR CURRENT SCHEDULE IS {{ $schedule->start_time->format('h:i A') }} - {{ $schedule->end_time->format('h:i
            A') }}</p>
        @endif
    </div>



</body>

</html>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>