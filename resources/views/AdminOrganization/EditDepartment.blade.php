<!DOCTYPE html>
<html lang="en">

<head>
    @include("Layout.Head")
    <title>Admin</title>
    <link rel="stylesheet" href="{{ asset('css/AdminEditDepartment.css') }}">
</head>

<body>
    @include("Layout.NavBarAdmin")
    <div class="greetings">
        <h1 class="Title_navbar" data-aos="zoom-in">EDIT: {{$department->department_name}}</h1>
    </div>

    <div class="button">
        <a class="btn btn-brand" data-aos="zoom-in" href="/Admin/Organization">Back</a>
    </div>

    <div class="row justify-content-center" data-aos="zoom-in">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="/Admin/Organization/Department/{{$department->department_id}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="department_name">Current Name: {{ $department-> department_name }}</label>
                        </div>

                        <div>
                            <label for="new_department_name">New Department Name: </label>
                            <input type="text" name="new_department_name" id="new_department_name">
                            <input type="hidden" name="department_status" id="department_status" value="Update">
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