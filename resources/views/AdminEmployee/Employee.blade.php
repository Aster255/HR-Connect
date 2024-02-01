<head>
    @include("Layout.Head")

    <link rel="stylesheet" href="{{ asset('css/AdminEmployee.css') }}">

</head>

<body>
    @include("Layout.NavBarAdmin")
    <div class="greetings">
        <h1 class="Title_navbar" data-aos="zoom-in-right" data-aos-duration="100">EMPLOYEE</h1>

        <div class="button" data-aos="zoom-in-left" data-aos-duration="100">
            <a class="btn btn-brand" href="/Admin/Employee/create">ADD EMPLOYEE</a>
        </div>
    </div>

    <div data-aos="zoom-in" data-aos-duration="600">
        <form class="Search_Bar" action="">
            <input class="Search_Input" type="text" name="search" value="{{ request('search') }}">
            <div class="Search_Button">
                <button class="btn-brand" type="submit">Search</button>
                <a href="{{ url('/Admin/Employee') }}" class="btn-grey ">Clear</a>
            </div>
        </form>
    </div>

    <div class="List" data-aos="zoom-in-up" data-aos-duration="600">
        <div class="One_List">
            <table>
                <thead class="thead_section">
                    <tr>
                        <th>Picture</th>
                        <th>Employee ID</th>
                        <th>Employee Name</th>
                        <th>Hire Date</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody class="body_section">
                    @foreach ($employees as $e)
                    <tr>
                        <td><img src="{{$e->picture}}" alt="{{$e->first_name}} pictures" width="100px"></td>
                        <td>{{$e->employee_id}}</td>
                        <td>{{$e->first_name}} {{$e->last_name}}</td>
                        <td>{{ $e->hire_date->format('m-d-Y') }}</td>
                        <td>
                            <a class="btn btn-brand btn-large" href="/Admin/Employee/{{$e->employee_id}}">info</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $employees->links() }}
        </div>
    </div>


</body>

</html>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();

</script>