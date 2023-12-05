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
    <title>System</title>
    @include('Layout.Button')
</head>


<body>
    @include("Layout.NavBarEmployee")
    <h1 class="Title_navbar" data-aos="zoom-in">DASHBOARD</h1>
    <div>
        <p>{{ $greeting }}! {{$employee->first_name}} {{$employee->last_name}}. Here's our agenda for today.</p>
    </div>

    <div class=" panel" data-aos="zoom-in">
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
</body>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>

</html>