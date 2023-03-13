<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test Coding - Hadi Akbar Saputra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        @import url('https://fonts.cdnfonts.com/css/oswald-4');

        body{
            font-family: 'Oswald', sans-serif;
            font-family: 'Oswald Regular', sans-serif;
            font-family: 'Oswald Stencil', sans-serif;
        }
    </style>

    @stack('css')

  </head>
  <body class="d-flex flex-column h-100">
    {{-- Header --}}
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="/" class="navbar-brand">
                <img src="{{ asset('images/logo.png') }}" width="50" height="50" alt="">
                {{-- <span class="fs-3 fw-bold">Suka Bola</span> --}}
            </a>

            <ul class="ms-auto nav nav-pills">
                <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Data Klub</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Input Score
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Satu Per Satu</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Multiple</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a href="#" class="nav-link">Klasemen</a></li>
            </ul>
        </header>
    </div>

    {{-- Main Content --}}
    <div class="container">
        <main>
            @yield('content')
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('js')
  </body>
</html>