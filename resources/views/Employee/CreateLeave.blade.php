<!DOCTYPE html>
<html lang="en">

<head>
    @include("Layout.Head")

    <link rel="stylesheet" href="{{ asset('css/CreateLeave.css') }}">
</head>

<body>
    @include("Layout.NavBarEmployee")
    <div class="greetings">
        <h1 class="Title_navbar" data-aos="zoom-in">Request Leave</h1>

        <div class="button">
            <a class="btn btn-brand" href="/Leave">BACK</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="/Leave" method="POST">
                @csrf
                <div class="form-group">
                    <label for="start_date">start</label>
                    <input type="date" name="start_date" id="start_date">
                    <label for="end_date">end</label>
                    <input type="date" name="end_date" id="end_date">
                    <input type="text" hidden value="Pending" name="status" id="status">
                </div>
                <div class="form-group">
                    <label for="leavetype_id">Leave Type</label>
                    <select name="leavetype_id" id="leavetype_id" required>
                        <option value=""></option>
                        @foreach ($leavelist as $leave)
                        <option value="{{ $leave->leavetype_id }}">{{ $leave->leave_type_name }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="submit" class="btn btn-green" value="Request Leave">
            </form>
        </div>

    </div>
</body>

</html>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();

</script>
