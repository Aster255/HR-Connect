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
        <a href="/trial"><i class="fa-solid fa-credit-card"></i><span class="hide"> PAYROLL</span></a>
    </div>
</div>

<head>
    <div class="messege">
        @include('Layout.Messege')
    </div>
    <div class="navbarhead">
        <div class="dropdown" data-aos="slide-left" data-aos-duration="100">
            <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="900,10">
                <i class="fa-solid fa-user" style="color: #ffffff;"></i>
            </button>
            <ul class="dropdown-menu me-3">
                <li><a class="dropdown-item" href="/Profile">Profile</a></li>
                <li><a class="dropdown-item" href="/Trial">Setting</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="/logout">Log Out</a></li>
            </ul>
        </div>
    </div>
</head>