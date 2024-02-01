<link rel="stylesheet" href="/css/navbar.css">

<div class="sidenav">
    <div class="logo">
        <img src="/img/HRconnect_Name.png" />
    </div>

    <div class="navbar">
        <!-- DASHBOARD -->
        <a href="/Admin/Dashboard">DASHBOARD</a>
        <a href="/Admin/Organization">ORGANIZATION</a>
        <a href="/Admin/Employee">EMPLOYEES</a>
        <a href="/Admin/Attendance">ATTENDANCE</a>
        <a href="/Admin/Leave"> LEAVE</a>
        <a href="/trial"> PAYROLL</a>
        <a href="/Admin/CreateUser" class="CreateUser">Create User</a>
        <div class="dropdown">
            <img class="profile_picture" src="{{$employee_picture->picture}}" alt="{{$employee_picture->first_name}} pictures" onclick="toggleDropdown()">
            <div class="dropdown-content" id="myDropdown">
                <a href="/trial">Profile</a>
                <a href="/trial">Setting</a>
                <a href="/logout">Log out</a>
            </div>
        </div>
    </div>

    <div class="small_navbar">

        <i class="fa-solid fa-bars" onclick="toggleMenu()"></i>
        <i class="fa-solid fa-x" onclick="toggleMenu()"></i>
        <div class="dropdown">
            <img class="profile_picture" src="{{$employee_picture->picture}}" alt="{{$employee_picture->first_name}} pictures" onclick="toggleDropdown()">
            <div class="dropdown-content" id="myDropdown2">
                <a href="/trial">Profile</a>
                <a href="/trial">Setting</a>
                <a href="/logout">Log out</a>
            </div>
        </div>
        <div class="small_navbar_content">
            <a href="/Admin/Dashboard">DASHBOARD</a>
            <a href="/Admin/Organization">ORGANIZATION</a>
            <a href="/Admin/Employee">EMPLOYEES</a>
            <a href="/Admin/Attendance">ATTENDANCE</a>
            <a href="/Admin/Leave"> LEAVE</a>
            <a href="/trial"> PAYROLL</a>
            <a href="/Admin/CreateUser">CREATE USER</a>
        </div>
    </div>
</div>
</div>

<div class="messege">
    @include('Layout.Messege')
</div>


<script>
    function toggleDropdown() {
        var dropdown = document.getElementById("myDropdown2");
        dropdown.style.display = (dropdown.style.display === "block") ? "none" : "block";

        var dropdown = document.getElementById("myDropdown");
        dropdown.style.display = (dropdown.style.display === "block") ? "none" : "block";
    }

    function toggleMenu() {
        let navbar = document.querySelector('.small_navbar_content');
        let close = document.querySelector('.fa-x');

        if (navbar.style.display === "none" || navbar.style.display === "") {
            navbar.style.display = "flex";
            navbar.style.animation = 'slideIn 0.5s ease-in-out';
        } else {
            navbar.style.animation = 'slideOut 0.5s ease-in-out';
            setTimeout(() => {
                navbar.style.display = "none";
            }, 400);
        }

        // navbar.style.display = (navbar.style.display === "flex") ? "none" : "flex";
        close.style.display = (close.style.display === "block") ? "none" : "block";
    }

    window.onclick = function(event) {
        if (!event.target.matches('.profile_picture')) {
            var dropdown = document.getElementById("myDropdown");
            if (dropdown.style.display === "block") {
                dropdown.style.display = "none";
            }
        }
        if (!event.target.matches('.profile_picture')) {
            var dropdown = document.getElementById("myDropdown2");
            if (dropdown.style.display === "block") {
                dropdown.style.display = "none";
            }
        }
    }
    document.addEventListener('click', function(event) {
        let navbar = document.querySelector('.small_navbar_content');
        let close = document.querySelector('.fa-x');
        if (!event.target.closest('.small_navbar') && !event.target.closest('.small_navbar_content')) {
            if (navbar.style.display === "flex" && close.style.display === 'block') {
                navbar.style.animation = 'slideOut 0.5s ease-in-out';
                setTimeout(() => {
                    navbar.style.display = "none";
                }, 400);
            }

            close.style.display = 'none';
        }
    });

</script>
