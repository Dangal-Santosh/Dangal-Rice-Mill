<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device=width, initial-scale=1.0" />
    <title>Dangal Inventory System</title>
    <link rel="stylesheet" href="{{ url('css/style.css') }}" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    {{-- Style for to the top --}}
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="main-container">
            <div class="main-navbar">
                <div class="logo">
                    <img src="{{ url('images\logo.png') }}" alt="logo" width="70px" />
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="#">Home</a></li>
                        <li><a href="#featured">Products</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#contact">Contact</a></li>
                        <li><a href="#suggest">Suggestions</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
                                <li>
                                    <a href="{{route('orderindex')}}" class="dropdown-item">Buy Products</a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">Payment History</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); 
                                            document.getElementById('logout-form-a').submit();">Logout</a>
                                </li>
                                <form id="logout-form-a" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                </form>
                            </ul>
                    </ul>
                </nav>
                <img src="{{ url('images/menu.gif') }}" class="menu-icon" onclick="menutoggle()" />
            </div>
        </div>