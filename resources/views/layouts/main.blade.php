<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Library Us | {{ $title }}</title>

    <link rel="shortcut icon" type="image/jpg" href="/img/perpus-bg.png">
    {{-- <link rel="stylesheet" href="/css/bootstrap.min5.css"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <img src="/img/perpus-bg.png" alt="Logo" width="30" class="d-inline-block align-text-top me-2">
            <a class="navbar-brand" href="/">Perpustakaan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Kategori
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Buku Pelajaran</a></li>
                            <li><a class="dropdown-item" href="#">Buku Sejarah</a></li>
                            <li><a class="dropdown-item" href="#">Novel</a></li>
                            <li><a class="dropdown-item" href="#">Komik</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Feedback</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard/books">Librarian</a>
                    </li>
                    @can('librarian')
                    {{-- <li class="nav-item dropdown px-2">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dashboard
                        </a>
                        <ul class="dropdown-menu mb-3">
                            <li><a class="dropdown-item" href="/dashboard/books">Librarian</a></li>
                            <li><a class="dropdown-item" href="/dashboard/posts">Dashboard Postingan</a></li>
                        </ul>
                    </li> --}}
                    @endcan
                </ul>

                @guest
                    <li class="d-flex">
                        <a class="btn btn-outline-primary btn-sm me-2 rounded-pill px-4" href="/login">Login</a>
                    </li>
                @endguest
            </div>
        </div>
    </nav>
    
    @yield('container')
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    {{-- <script src="/js/bootstrap.min5.js"></script> --}}
</body>
</html>