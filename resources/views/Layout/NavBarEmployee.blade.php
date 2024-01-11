<link rel="stylesheet" href="/css/navbar.css">

<div class="sidenav" data-aos="slide-right" data-aos-duration="500">
    <div class="logo">
        <img src="/img/HRconnect_Name.png" />
    </div>
    <div class="navbar">
        <!-- DASHBOARD -->
        <a href="/Dashboard"><i class="fa-solid fa-table-cells-large"></i> <span class="hide">DASHBOARD</span></a>
        <a href="/Attendance"><i class="fa-solid fa-id-card-clip"></i><span class="hide"> ATTENDANCE</span></a>
        <a href="/Leave"><i class="fa-solid fa-right-from-bracket"></i><span class="hide"> LEAVE</span></a>
        <a href="/Schedule"><i class="fa-solid fa-right-from-bracket"></i><span class="hide"> SCHEDULE</span></a>
        <a href="/trial"><i class="fa-solid fa-credit-card"></i><span class="hide"> PAYROLL</span></a>
        <div class="dropdown">
            <img class="profile_picture" src="/img/user_profiles/{{$employee_picture->picture}}" alt="{{$employee_picture->first_name}} pictures" onclick="toggleDropdown()">
            <div class="dropdown-content" id="myDropdown">
                <a href="/trial">Profile</a>
                <a href="/trial">Setting</a>
                <a href="/logout">Log out</a>
            </div>
        </div>
    </div>
</div>

<div class="messege">
    @include('Layout.Messege')
</div>



<script>
    function toggleDropdown() {
        var dropdown = document.getElementById("myDropdown");
        dropdown.style.display = (dropdown.style.display === "block") ? "none" : "block";
    }

    window.onclick = function(event) {
        if (!event.target.matches('.profile_picture')) {
            var dropdown = document.getElementById("myDropdown");
            if (dropdown.style.display === "block") {
                dropdown.style.display = "none";
            }
        }
    }
</script>