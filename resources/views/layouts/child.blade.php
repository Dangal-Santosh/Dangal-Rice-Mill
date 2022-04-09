<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title> Dangal Rice Mill</title>
    <link rel="stylesheet" href="{{ url('css/style4.css') }}">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>
<body>
    <div class="sidebar">
        <div class="logo-details">
           <i class='bx bxl-c-plus-plus'></i> 
            <span class="logo_name">Dangal Rice Mill</span> 
        </div>
        <ul class="nav-links">
            <li class="{{ 'sdashboard' ==request()->path() ? 'active' : '' }}">
                <a href="{{ url('/sdashboard') }}">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li class="{{ 'product' ==request()->path() ? 'active' : '' }}">
                <a href="{{ ('/product') }}">
                    <i class='bx bx-box'></i>
                    <span class="links_name">Products</span>
                </a>
            </li>
            <li class="{{ 'user' ==request()->path() ? 'active' : '' }}">
                <a href="{{ ('/user') }}">
                    <i class='bx bx-user'></i>
                    <span class="links_name">Users</span></a>
            </li>
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); 
                document.getElementById('logout-form-a').submit();">
                    <i class='bx bx-log-out'></i>
                    <span class="links_name">Logout</span></a>
            </li>
            </li>
            <form id="logout-form-a" method="POST" action="{{ route('logout') }}">
                @csrf
            </form>
        </ul>
    </div>
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class='bx bx-menu sidebarBtn'></i>
                <span class="dashboard">Dashboard</span>
            </div>
        </nav>
        <div class="home-content">
            @yield('staffarea')
        </div>
    </section>
    <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
        sidebar.classList.toggle("active");
        if(sidebar.classList.contains("active")){
        sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
        }else
        sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        }
    </script>
    @include('sweetalert::alert')
</body>
</html>