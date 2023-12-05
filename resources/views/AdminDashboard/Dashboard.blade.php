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
        .notice_info {
            margin: 20px;
            background-color: white;
            border-radius: 5px;
            padding: 5px;
        }

        .agenda {
            background-color: var(--Brand200);
            padding: 20px;
            border-radius: 5px;
            margin-right: 10px;
            margin-top: 15px;
            letter-spacing: 0.1em;
            font-size: 20px;
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
            font-size: 30px;
        }

        .notification {
            display: flex;
            gap: 20px;
            height: 620px;
        }

        .notification>* {
            flex: 1;
            flex-wrap: wrap;
            flex-grow: 1;
            flex-shrink: 1;
            margin-top: 20px;
            background-color: var(--Nuetrals100);
            border-radius: 5px;
            margin-right: 10px;
        }

        .event {
            background-color: rgba(227, 174, 252, 1);
        }

        .event_info {
            margin: 20px;
            background-color: rgba(243, 214, 253, 1);
            border-radius: 5px;
            padding: 5px;
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
    <p class="agenda">{{ $greeting }}! {{$employee->first_name}} {{$employee->last_name}}. here's our Agenda Today.</p>
    <div class="panel">
        <div class="pending_leave">
            <h1 style="padding-block: 15px">{{ $totalemployee}}</h1>
            <p style="color:rgba(146, 53, 232, 1); ">TOTAL EMPLOYEE</p>
        </div>
        <div class="approved_leave">
            <h1 style="padding-block: 15px">{{$totalEmployeesLoggedInToday}} / {{$totalemployee}}</h1>
            <p style="color:rgba(146, 53, 232, 1); ">EMPLOYEE TODAY</p>
        </div>
        <div class="pending_overtime">
            <h1 style="padding-block: 15px">{{$pendingLeaveCount}}</h1>
            <p style="color:rgba(146, 53, 232, 1); ">PENDING LEAVE</p>
        </div>
        <div class="approved_overtime">
            <h1 style="padding-block: 15px">1</h1>
            <p style="color:rgba(146, 53, 232, 1); ">PENDING OVERTIME</p>
        </div>
    </div>

    <div class="notification">
        <div class="notice">
            <h3 style="margin-top: 10px; margin-left: 10px; font-size: 30px; color: rgba(146, 53, 232, 1);">Notice</h3>
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
            <h3 style="margin-top: 10px; margin-left: 10px; font-size: 30px; color: rgba(146, 53, 232, 1);">Events</h3>
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

</body>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>

</html>