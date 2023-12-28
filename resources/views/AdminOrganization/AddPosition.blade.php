<!DOCTYPE html>
<html lang="en">

<head>
    @include("Layout.Head")
    <title>System Admin</title>
    <link rel="stylesheet" href="{{ asset('css/AdminAddPosition.css') }}">
</head>

<body>
    @include("Layout.NavBarAdmin")
    <div class="greetings">
        <h1 class="Title_navbar" data-aos="zoom-in">ADD NEW POSITION</h1>
    </div>

    <div class="button">
        <a class="btn btn-brand" href="/Admin/Organization" data-aos="zoom-in">Back</a>
    </div>

    <div class="row justify-content-center" data-aos="zoom-in">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('Position.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="position_name">Position Name</label>
                            <input type="text" name="position_name" id="position_name" class="form-control" required>
                            <input type="hidden" name="position_status" value="added">
                        </div>
                        <div class="form-group">
                            <label for="department_id">Department</label>
                            <select name="department_id" id="department_id" class="form-control" required>
                                <option value="0">Select Department</option>
                                @foreach ($department as $d)
                                <option value="{{ $d->department_id }}">{{ $d->department_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="submit" class="btn btn-green" value="New Position" />
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