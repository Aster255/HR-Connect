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

        <div class="button">
            <a class="btn btn-brand" data-aos="zoom-in" href="/Admin/Organization/Department/{{$department->department_id}}">Back</a>
        </div>
    </div>

    <div class="Form_Section">
        <div class="Form_Body">
            <form action="/Admin/Organization/Department/{{$department->department_id}}" method="POST">
                @csrf
                @method('PUT')
                <div class="Form_Title_Section">
                    <label for="department_name" class="Form_Title">Current Name: <span class="Form_Title_Content">{{ $department-> department_name }}</span></label>
                </div>

                <div class="Form_Input_Section">
                    <label class="Form_Label" for="new_department_name">New Department Name: </label>
                    <input type="text" class="Form_Input" name="new_department_name" id="new_department_name" required>
                    <input type="hidden" name="department_status" id="department_status" value="Update">
                </div>
                <input class="btn btn-green" type="submit" value="Confirm">
            </form>
        </div>
    </div>

</html>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();

</script>
