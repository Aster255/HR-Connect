<!DOCTYPE html>
<html lang="en">

<head>
    @include("Layout.Head")

    <title>System Admin</title>
    @include('Layout.Button')
    <style>
        .list {
            margin-right: 20px;
        }

        .Position_List {
            background-color: var(--Nuetrals100);
            border-radius: 5px;

        }

        .Department_List {
            background-color: var(--Nuetrals100);
            border-radius: 10px;
        }

        table {
            margin-block: 20px;
            width: 100%;
            text-align: center;
            border-radius: 10px;
        }

        th {
            padding-block: 10px;
        }
    </style>
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

    <div class="list">
        <div class="Position_List" data-aos="zoom-in">
            <table>
                <thead>
                    <th style="background-color: rgba(206, 212, 218, 1); border-top-left-radius: 10px;">ID</th>
                    <th style="background-color: rgba(206, 212, 218, 1);">Name</th>
                    <th style="background-color: rgba(206, 212, 218, 1); border-top-right-radius: 10px;">Department</th>
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
    </div>
</body>


</html>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>