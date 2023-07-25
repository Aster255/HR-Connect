<?php
$currentTime = date('H:i'); // Get the current time in 24-hour format (e.g., 13:30)
$greeting = '';
if ($currentTime >= '05:00' && $currentTime < '12:00') {
    $greeting = 'Good Morning';
} elseif ($currentTime >= '12:00' && $currentTime < '17:00') {
    $greeting = 'Good Afternoon';
} else {
    $greeting = 'Good Evening';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    @include("Layout.Head")
    <title>System Admin</title>
    @include('Layout.Button')
    <style>
        .agenda {
            background-color: var(--Brand300);
            padding: 20px;
            border-radius: 5px;
            margin-right: 10px;
            margin-top: 15px;
        }

        .panel {
            margin-right: 10px;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .panel>* {
            border-radius: 5px;
            padding: 10px;
            flex: 1;
            background-color: var(--Nuetrals100);
            min-width: 200px;
            text-align: center;
        }

        .notification {
            display: flex;
            gap: 20px;
        }

        .notification>* {
            flex: 1;
            flex-wrap: wrap;
            flex-grow: 1;
            flex-shrink: 1;
            margin-top: 20px;
            background-color: var(--Nuetrals100);
        }

        .today {
            display: flex;
            gap: 20px;
        }

        .today>* {
            flex: 1;
            flex-wrap: wrap;
            flex-grow: 1;
            flex-shrink: 1;
            margin-top: 20px;
            background-color: var(--Nuetrals100);
        }
    </style>
</head>

<body>
    @include("Layout.NavBarAdmin")
    <h1 class="Title_navbar">DASHBOARD</h1>
    <p class="agenda">{{ $greeting }}! {{$employee->first_name}} {{$employee->last_name}}. here our Agenda Today.</p>
    <div class="panel">
        <div class="pending_leave">
            <p>2</p>
            <br>
            <p>Pending Leave</p>
        </div>
        <div class="approved_leave">
            <p>2</p>
            <br>
            <p>Approved Leave by HOD</p>
        </div>
        <div class="pending_overtime">
            <p>2</p>
            <br>
            <p>Overtime Pending</p>
        </div>
        <div class="approved_overtime">
            <p>2</p>
            <br>
            <p>Approved OT by HOD</p>
        </div>
    </div>

    <div class="notification">
        <div class="notice">
            <h3>Notice</h3>
            <div class="notice_info">
                <p>Hod approved OT of BIBI Garcia</p>
                <p>thurs 7:00pm</p>
            </div>
            <div class="notice_info">
                <p>Hod approved OT of BIBI Garcia</p>
                <p>thurs 7:00pm</p>
            </div>
            <div class="notice_info">
                <p>Hod approved OT of BIBI Garcia</p>
                <p>thurs 7:00pm</p>
            </div>
        </div>
        <div class="event">
            <h3>Events</h3>
            <div class="event_info">
                <p>SEMINAR: Healt and Remedy</p>
                <p>Thurs 10:00AM- 11:30PM</p>
            </div>
            <div class="event_info">
                <p>SEMINAR: Healt and Remedy</p>
                <p>Thurs 10:00AM- 11:30PM</p>
            </div>
            <div class="event_info">
                <p>SEMINAR: Healt and Remedy</p>
                <p>Thurs 10:00AM- 11:30PM</p>
            </div>
        </div>
    </div>
    <div class="today">
        <div class="absent">
            <h1>Today Absent</h1>
            <div class="absent_list">
                <img src="img/HRconnect.png" />
                <h4>Martin Lewis</h4>
                <div class="absent_info">
                    <p>date</p>
                    <p>status</p>
                </div>
            </div>

            <div class="absent_list">
                <img src="img/HRconnect.png" />
                <h4>Martin Lewis</h4>
                <div class="absent_info">
                    <p>date</p>
                    <p>status</p>
                </div>
            </div>
            <div class="absent_list">
                <img src="img/HRconnect.png" />
                <h4>Martin Lewis</h4>
                <div class="absent_info">
                    <p>date</p>
                    <p>status</p>
                </div>
            </div>
            <div class="more">
                <button>See more...</button>
            </div>
        </div>
        <div class="onLeave">
            <h1>Today On Leave</h1>
            <div class="absent_list">
                <img src="img/HRconnect.png" />
                <h4>Martin Lewis</h4>
                <div class="absent_info">
                    <p>date</p>
                    <p>status</p>
                </div>
            </div>

            <div class="absent_list">
                <img src="img/HRconnect.png" />
                <h4>Martin Lewis</h4>
                <div class="absent_info">
                    <p>date</p>
                    <p>status</p>
                </div>
            </div>
            <div class="absent_list">
                <img src="img/HRconnect.png" />
                <h4>Martin Lewis</h4>
                <div class="absent_info">
                    <p>date</p>
                    <p>status</p>
                </div>
            </div>
            <div class="more">
                <button>See more...</button>
            </div>
        </div>
    </div>
</body>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>

</html>