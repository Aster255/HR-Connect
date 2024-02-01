<!DOCTYPE html>
<html lang="en">

<head>
    @include("Layout.Head")

    @include('Layout.Button')
</head>

<body>
    @include("Layout.NavBarAdmin")
    <h1 class="Title_navbar" data-aos="zoom-in">LEAVE</h1>
    <div class="List">
        <div class="One_List " data-aos="zoom-in">
            <table>
                <thead class="thead_section">
                    <tr>
                        <th>Leave ID</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody class="body_section">
                    @foreach ($leave as $l)
                    <tr>
                        <td>{{$l->leave_id}}</td>
                        <td>{{$l->start_date}}</td>
                        <td>{{$l->end_date}}</td>
                        <td>{{$l->status}}</td>
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
