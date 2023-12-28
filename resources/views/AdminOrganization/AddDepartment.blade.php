<!DOCTYPE html>
<html lang="en">

<head>
    @include("Layout.Head")
    <title>System Admin</title>
    <link rel="stylesheet" href="{{ asset('css/AdminAddDepartment.css')}}">

</head>

<body>
    @include("Layout.NavBarAdmin")
    <div class="greetings">
        <h1 class="Title_navbar" data-aos="zoom-in">ADD NEW DEPARTMENT</h1>
    </div>

    <div class="button">
        <a class="btn btn-brand" href="/Admin/Organization">Back</a>
    </div>
    <div class="row justify-content-center" data-aos="zoom-in">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('Department.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="department_name">Department Name: </label>
                            <input type="text" name="department_name" id="department_name" class="form-control" required>
                            <input type="hidden" name="department_status" value="added">
                        </div>

                        <input type="submit" class="btn btn-green" value="New Department" />
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