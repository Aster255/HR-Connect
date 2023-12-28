<!DOCTYPE html>
<html lang="en">

<head>
    @include("Layout.Head")
    <title>Admin</title>
    <link rel="stylesheet" href="{{ asset('css/AdminEditPosition.css') }}">
</head>

<body>
    @include("Layout.NavBarAdmin")
    <div class="greetings">
        <h1 class="Title_navbar" data-aos="zoom-in">{{$position->position_name}}</h1>
    </div>

    <div class="button">
        <a class="btn btn-brand" data-aos="zoom-in" href="/Admin/Organization/Position/{{$position->position_id}}">Back</a>
    </div>

    <div class="section_edit">
        <form action="/Admin/Organization/Position/{{$position->position_id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="edit-seciton">
                <label for="position_name" class="current_name">Current Name: {{$position->position_name}}</label>
                <div class="form-section">
                    <label for="new_position_name">New Name: </label>
                    <input type="text" name="new_position_name" id="new_position_name">
                    <input type="hidden" name="position_status" id="position_status" value="Update">
                </div>
                <div class="form-section">
                    <label for="department_id">Department (Do not change if not needed): </label>
                    <select name="department_id" id="department_id" required>

                        <option value="">Select Department</option>
                        @foreach($departments as $department)
                        <option value="{{ $department->department_id }}" @if($department->department_id == $position->department_id) selected @endif>
                            {{ $department->department_name }}
                        </option>
                        @endforeach
                    </select>

                </div>
                <input class="btn btn-green" type="submit" value="Confirm">
            </div>
        </form>
    </div>


</html>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>