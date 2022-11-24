<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Blog</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Category
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Category 1</a></li>
                        <li><a class="dropdown-item" href="#">Category 2</a></li>
                        <li><a class="dropdown-item" href="#">Category 3</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">About</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="collapse navbar-collapse " id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
            @auth
                @if (Auth::user()->isAdmin())
                    <a class="nav-link" href="">Users List</a>
                    <a class="nav-link" href="">Category List</a>
                @endif
                <p class="username">Hello {{ ucwords(Auth::user()->name) }}</p>
                <a class="nav-link" href="{{ route('logout') }}">Logout</a>
            @endauth
            @guest
                <a class="nav-link" href="{{ route('login') }}">Login</a>
            @endguest
        </div>
    </div>
</nav>
