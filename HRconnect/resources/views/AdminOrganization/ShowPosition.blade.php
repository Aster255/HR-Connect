<!DOCTYPE html>
<html lang="en">

<head>
    @include("Layout.Head")

    <title>System Admin</title>
    @include('Layout.Button')
</head>

<body>
    @include("Layout.NavBarAdmin")
    <h1 class="Title_navbar" data-aos="zoom-in">{{$position->position_name}}</h1>
    <div data-aos="zoom-in">
        <a class="btn btn-brand" href="/Admin/Organization">BACK</a>
        <a href="/Admin/Organization/Position/{{$position->position_id}}/edit" class="btn btn-primary">EDIT</a>
        <a class="btn btn-red" data-bs-toggle='modal' data-bs-target='#delete_{{$position -> position_id}}'>DELETE</a>
    </div>
    <div class=" modal fade" id="delete_{{$position -> position_id}}" tabindex="-1" data-aos="zoom-in">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampositioneModalLabel">Confirm deletion of Position {{$position-> position_name}}</h5>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this Position?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-grey" data-bs-dismiss="modal">
                        Close
                    </button>
                    <form action="/Admin/Organization/Position/{{$position->position_id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-red" style="margin-top: 3px;" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div>
        <table class="table" data-aos="zoom-in">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Department</th>
            </thead>
            <tbody>
                @foreach ($employee as $emp)
                <tr>
                    <th>{{$emp->position_id}}</th>
                    <th>{{$emp->first_name}} {{$emp->last_name}}</th>
                    @foreach ($department as $dept)
                    <th>{{$dept->department_name}}</th>
                    @endforeach
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