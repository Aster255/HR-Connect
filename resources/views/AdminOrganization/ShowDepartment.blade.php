<!DOCTYPE html>
<html lang="en">

<head>
    @include("Layout.Head")
    <title>Admin</title>
    <link rel="stylesheet" href="{{ asset('css/AdminShowDepartment.css') }}">
</head>

<body>
    @include("Layout.NavBarAdmin")
    <div class="greetings">
        <h1 class="Title_navbar" data-aos="zoom-in">{{$department->department_name}}</h1>
    </div>

    <div class="button">
        <a class="btn btn-brand" href="/Admin/Organization">BACK</a>
        <a class="btn btn-brand" href="/Admin/Organization/Department/{{$department->department_id}}/edit" class="btn btn-primary">EDIT</a></td>
        <a class="btn btn-red" data-bs-toggle='modal' data-bs-target='#delete_{{$department->department_id}}'>DELETE</a>
        </td>
    </div>
    <div class="modal fade" id="delete_{{$department->department_id}}" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm deletion of Department
                        {{$department->department_name}}
                    </h5>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this Department?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <form action="/Admin/Organization/Department/{{$department->department_id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="list">
        <div>
            <table class="Position_List">
                <thead class="table_section">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Position</th>
                </thead>
                <tbody>
                    @foreach ($employee as $emp)
                    <tr class="table_section">
                        <td>{{$emp->position_id}}</td>
                        <td>{{$emp->first_name}} {{$emp->last_name}}</td>
                        <td>{{$emp->position_name}}</td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
        <div>
            <table class="Department_List">
                <thead class="table_section">
                    <th>ID</th>
                    <th>Position</th>
                </thead>
                <tbody>
                    @foreach ($position as $pos)
                    <tr class="table_section">
                        <td>{{$pos->position_id}}</td>
                        <td>{{$pos->position_name}}</td>
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