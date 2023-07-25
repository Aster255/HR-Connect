<!DOCTYPE html>
<html lang="en">

<head>
    @include("Layout.Head")
    <title>System Admin</title>
    @include('Layout.Button')
    <style>
        #realtime-date {
            margin-top: 20px;
            text-align: center;
            padding-block: 50px;
            background-color: rgba(146, 53, 232, 1);
            border-radius: 10px;
            font-size: 40px;
            color: white;
        }
    </style>
</head>

<body>
    @include("Layout.NavBarAdmin")
    <h1 class="Title_navbar" data-aos="zoom-in">LOG OUT</h1>

    <div class="row justify-content-center" data-aos="zoom-in">
        <div class="col-md-11">
            <p id="realtime-date">{{ date('h:i:s') }}</p>
        </div>
    </div>
    <div class="row justify-content-center" data-aos="zoom-in">
        <div class="col-md-11">
            <form action="{{ route('Log.update', $attendance->attendance_id) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="submit" class="btn btn-red" style="width: 100%" value="LOG OUT">
            </form>
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