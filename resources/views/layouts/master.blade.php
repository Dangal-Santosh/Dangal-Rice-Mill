<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Dangal Rice Mill</title>
    <link rel="stylesheet" href="{{ url('css/style4.css') }}">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    {{-- materials icons CDN link --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
           <i class='bx bxs-home-smile'></i> 
            <span class="logo_name">Dangal Rice Mill</span> 
        </div>
        <ul class="nav-links">
            <li class="{{ 'Adashboard' ==request()->path() ? 'active' : '' }}">
                <a href="{{ url('/Adashboard') }}">
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
            <li class="{{ 'categories' ==request()->path() ? 'active' : '' }}">
                <a href="{{ ('/categories') }}">
                <i class='bx bx-box'></i>
                <span class="links_name">Categories</span></a>
            </li>
            <li class="dropdown">
                <a class=" dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class='bx bx-book-alt'></i>
                    <span class="links_name">Stocks</span></a>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item text-danger" href="{{ url('/instock') }}">InStock</a></li>
                  <li><a class="dropdown-item text-danger" href="{{ ('/piechart') }}">Instock Details</a></li>
                  <li><a class="dropdown-item text-danger" href="{{ ('/stock') }}">Total Stock</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a class=" dropdown-toggle" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class='bx bx-receipt'></i>
                    <span class="links_name">Sales</span></a>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                  <li><a class="dropdown-item text-danger" href="{{ ('/paymentdetails') }}">Sales Details</a></li>
                  <li><a class="dropdown-item text-danger" href="{{ ('/bargraph') }}">Sales Graph</a></li>
                </ul>
            </li>
            <li class="log_out">
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
    </div>
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class='bx bx-menu sidebarBtn'></i>
                <span class="dashboard">Dashboard</span>
            </div>
        </nav>
        <div class="home-content">
        @yield('sidebar')
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
</body>

</html>