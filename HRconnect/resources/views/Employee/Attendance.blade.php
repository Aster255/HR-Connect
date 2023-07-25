<!DOCTYPE html>
<html lang="en">

<head>
    @include("Layout.Head")
    <title>System Admin</title>
    @include('Layout.Button')
    <style>
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

        .form-group input[type="text"] {
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
    @include("Layout.NavBarEmployee")
    <h1 class="Title_navbar" data-aos="zoom-in">LOG IN</h1>

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
                            <input hidden type="text" value="{{ $schedule->schedule_id}}">
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