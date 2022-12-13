<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Library Us | {{ $title }}</title>

    <link rel="stylesheet" href="/assets/css/main/app.css">
    <link rel="shortcut icon" href="/img/perpus-bg.png" type="image/png">
</head>
<body>
    <div id="app">
        <div id="main" class="layout-horizontal">
            <header class="mb-5">
                <div class="header-top">
                    <div class="container">
                        {{-- <div class="logo">
                            <a href="#"><img src="/img/perpus-bg.png" alt="Logo"></a>
                        </div> --}}
                        <div class="avatar-md2">
                            <a href="/"><img src="/img/perpus-bg.png" class="img-fluid" width="40" alt="logo"><span class="fs-4 ms-2 fw-bold">Library Us</span></a>
                        </div>
                        <div class="header-top-right">
                            
                            <div class="dropdown">
                                @guest
                                    <li class="d-flex">
                                        <a class="btn btn-outline-primary btn-sm me-2 rounded-pill px-4" href="/login">Login</a>
                                    </li>
                                @endguest
                                @auth
                                    <a href="#" id="topbarUserDropdown" class="user-dropdown d-flex align-items-center dropend dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">
                                        <div class="avatar avatar-md2" >
                                            <img src="/assets/images/faces/1.jpg" alt="Avatar">
                                        </div>
                                        <div class="text">
                                            <h6 class="user-dropdown-name">{{ auth()->user()->name }}</h6>
                                            <p class="user-dropdown-status text-sm text-muted">{{ auth()->user()->roles }}</p>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="topbarUserDropdown">
                                        <li>
                                            <h6 class="dropdown-header">Hello, {{ auth()->user()->username }}</h6>
                                        </li>
                                        @can('librarian')
                                        <li><a class="dropdown-item" href="/dashboard/books">Librarian</a></li>
                                        @endcan
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="/logout">Logout</a></li>
                                    </ul>
                                @endauth
                            </div>
                            
                            <a href="#" class="burger-btn d-block d-xl-none">
                                <i class="bi bi-justify fs-3"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <nav class="main-navbar">
                    <div class="container">
                        <ul>
                            <li class="menu-item {{ Request::is('/') ? 'active' : '' }}">
                                <a href="/" class='menu-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Home</span>
                                </a>
                            </li>
                            <li class="menu-item {{ Request::is('/books/*') ? 'active' : '' }}">
                                <a href="/books" class='menu-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Books</span>
                                </a>
                            </li>
                            <li class="menu-item {{ Request::is('/feedback') ? 'active' : '' }}">
                                <a href="#" class='menu-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Feedback</span>
                                </a>
                            </li>
                            <li class="menu-item {{ Request::is('/about') ? 'active' : '' }}">
                                <a href="#" class='menu-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>About</span>
                                </a>
                            </li>
                            @auth
                            <li class="menu-item {{ Request::is('/start-librarian/*') ? 'active' : '' }}">
                                <a href="/start-librarian" class='menu-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Librarian</span>
                                </a>
                            </li>
                            @endauth
                        </ul>
                    </div>
                </nav>
                
            </header>
            
            <div class="content-wrapper container">
                <div class="page-content">
                    @yield('container')
                </div>
            </div>
            
            <footer>
                <div class="container">
                    <div class="footer clearfix mb-0 mt-3 text-muted">
                        <div class="text-center">
                            <p>2022 &copy; Hikuroshi</p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="/assets/js/bootstrap.js"></script>
    <script src="/assets/js/app.js"></script>
    <script src="/assets/js/pages/horizontal-layout.js"></script>
    </body>
</html>