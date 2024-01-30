<!DOCTYPE html>
<html lang="en">

<head>
    @include("Layout.Head")

    <link rel="stylesheet" href="{{ asset('css/AdminAddDepartment.css')}}">

</head>

<body>
    @include("Layout.NavBarAdmin")
    <div class="greetings">
        <h1 class="Title_navbar">ADD NEW DEPARTMENT</h1>

        <div class="button">
            <a class="btn btn-brand" href="/Admin/Organization">Back</a>
        </div>
    </div>


    <div class="Form_Section mx-5">
        <div class="Form_Body">
            <form action="{{ route('Department.store') }}" method="POST">
                @csrf
                <div class="Form_Input_Section">
                    <label class="Form_Label" for="department_name">Department Name: </label>
                    <input class="Form_Input" type="text" name="department_name" id="department_name" class="form-control" required>
                    <input type="hidden" name="department_status" value="Active">
                </div>
                <input type="submit" class="btn btn-green" value="New Department" />
            </form>
        </div>
    </div>

</body>

</html>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();

</script>
