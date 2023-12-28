<!DOCTYPE html>
<html lang="en">

<head>
    @include("Layout.Head")
    <title>System Admin</title>
    <link rel="stylesheet" href="{{ asset('css/AdminLocation.css') }}">
</head>

<body>
    @include("Layout.NavBarAdmin")
    <div class="greetings">
        <h1 class="Title_navbar" data-aos="zoom-in">LOCATION</h1>
    </div>


    <div class="button">
        <a class="btn btn-brand" href="/Admin/Attendance">Back</a>
    </div>
    <div class="row justify-content-center " style="  margin-right: 10px;" data-aos="zoom-in">
        <div>
            <div class="card">
                <div class="card-body">
                    <h2 class="section-title">Create Location</h2>
                    <form action="/Admin/Attendance/Location" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="Location">Location: </label>
                            <input type="text" id="Location" name="Location" required>
                        </div>
                        <input class="btn btn-green" type="submit" value="Create Location">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="list" data-aos="zoom-in">
        <div class="list_one">
            <table>
                <thead>
                    <th style="background-color: rgba(206, 212, 218, 1); border-top-left-radius: 10px;">ID</th>
                    <th style="background-color: rgba(206, 212, 218, 1); border-top-right-radius: 10px;">location List</th>
                </thead>
                <tbody>
                    @foreach ($location as $location)
                    <tr>
                        <td>{{$location->location_id}}</td>
                        <td>{{$location->location}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>