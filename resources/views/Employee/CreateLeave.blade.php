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

        .form-group input[type="text"],
        .form-group input[type="date"] {
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

        .list {
            margin-right: 20px;
        }

        .list_one {
            background-color: var(--Nuetrals100);
            border-radius: 5px;

        }

        .list_two {
            background-color: var(--Nuetrals100);
            border-radius: 10px;
        }

        table {
            margin-block: 20px;
            width: 100%;
            text-align: center;
            border-radius: 10px;
        }

        th {
            padding-block: 10px;
        }

        td {
            padding-block: 10px;
        }
    </style>
</head>

<body>
    @include("Layout.NavBarEmployee")
    <h1 class="Title_navbar" data-aos="zoom-in">Request Leave</h1>
    <div data-aos="zoom-in">
        <a class="btn btn-brand" href="/Leave">BACK</a>
    </div>
    <div class="justify-content-center" data-aos="zoom-in">
        <div style="margin-right: 20px;">
            <div class="card">
                <div class="card-body">
                    <form action="/Leave" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="start_date">start</label>
                            <input type="date" name="start_date" id="start_date">
                            <label for="end_date">end</label>
                            <input type="date" name="end_date" id="end_date">
                            <input type="text" hidden value="pending" name="status" id="status">
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
        </div>
    </div>
</body>

</html>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>