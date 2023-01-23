<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: darkslateblue">
    <div class="container">
        <a class="navbar-brand" href="/">TodoApp Bakri</a>
        <a class="navbar-brand text-xs" href="{{ url('/') }}">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        @auth
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="navbar-nav ms-auto">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Halo, {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="/todos" class="dropdown-item"><i
                                            class="bi bi-layout-text-sidebar-reverse"></i> My TodoApp</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>

                                    <form action="/logout" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item"> <i class="bi bi-box-arrow-right"></i>
                                            Logout</button>
                                    </form>

                                    {{-- <a class="dropdown-item" href="{{ url('logout') }}">
                                        <i class="bi bi-box-arrow-right"></i> Logout</a> --}}
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        @else
            <a class="navbar-brand text-xs ms-auto" href="{{ url('login') }}"><i class="bi bi-box-arrow-in-right"></i>
                Login</a>
        @endauth

    </div>
</nav>



<!-- As a link -->
{{-- <nav class="navbar bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
    </div>
</nav> --}}

<!-- As a heading -->
{{-- <nav class="navbar navbar-dark" style="background-color: darkslateblue">
    <div class="container">
        <span class="navbar-brand mb-0 h1">TodoApp Bakri</span>
    </div>
</nav> --}}
