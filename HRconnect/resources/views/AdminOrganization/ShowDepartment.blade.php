<!DOCTYPE html>
<html lang="en">

<head>
    @include("Layout.Head")
    <title>System Admin</title>
    @include('Layout.Button')
</head>

<body>
    @include("Layout.NavBarAdmin")
    <h1 class="Title_navbar" data-aos="zoom-in">{{$department->department_name}}</h1>
    <div data-aos="zoom-in">
        <a class="btn btn-brand" href="/Admin/Organization">BACK</a>
        <a class="btn btn-brand" href="/Admin/Organization/Department/{{$department->department_id}}/edit" class="btn btn-primary">EDIT</a></td>
        <a class="btn btn-red" data-bs-toggle='modal' data-bs-target='#delete_{{$department->department_id}}'>DELETE</a></td>
    </div>
    <div class="modal fade" id="delete_{{$department->department_id}}" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm deletion of Department {{$department->department_name}}</h5>
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
    <div>
        <table class="table" data-aos="zoom-in">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Position</th>
            </thead>
            <tbody>
                @foreach ($employee as $emp)
                <tr>
                    <th>{{$emp->position_id}}</th>
                    <th>{{$emp->first_name}} {{$emp->last_name}}</th>
                    @foreach ($position as $pos)
                    <th>{{$pos->position_name}}</th>
                    @endforeach
                </tr>
                @endforeach
            </tbody>

        </table>
        <table class="table" data-aos="zoom-in">
            <thead>
                <th>ID</th>
                <th>Position</th>
            </thead>
            <tbody>
                @foreach ($position as $pos)
                <tr>
                    <th>{{$pos->position_id}}</th>
                    <th>{{$pos->position_name}}</th>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</body>


</html>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>