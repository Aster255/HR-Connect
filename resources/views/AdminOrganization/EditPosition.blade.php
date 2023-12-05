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
    </style>
</head>

<body>
    @include("Layout.NavBarAdmin")
    <h1 class="Title_navbar" data-aos="zoom-in">{{$position->position_name}}</h1>
    <div>
        <a class="btn btn-brand" data-aos="zoom-in" href="/Admin/Organization">Back</a>
    </div>

    <div class="row justify-content-center" data-aos="zoom-in">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="/Admin/Organization/Position/{{$position->position_id}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="position_name">Current Name :{{$position->position_name}}</label>
                            <input type="text" name="position_name" id="position_name">
                            <input type="hidden" name="position_status" id="position_status" value="Update">
                        </div>
                        <div class="form-group">
                            <select name="department_id" id="department_id" required>
                                <label for="department_id">Department: </label>
                                <option value="">Select Department</option>
                                @foreach($departments as $department)
                                <option value="{{ $department->department_id }}">{{ $department->department_name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <input class="btn btn-green" type="submit" value="Confirm">
                    </form>
                </div>
            </div>
        </div>
    </div>

</html>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>