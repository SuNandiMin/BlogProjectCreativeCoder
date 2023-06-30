<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Creative Coder</a>
        <div class="d-flex">

            <a href="/#blogs" class="nav-link">Blogs</a>
            @auth
                @can('admin')
                    <a href="/admin/blogs" class="nav-link">Dashboard</a>
                @endcan
                <div class="dropdown d-flex">
                    <img src="{{ auth()->user()->avatar }}" class=" rounded" style="width: 50px; height: 50px;"
                        alt="">
                    <a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu text-center bg-light" aria-labelledby="dropdownMenuButton1">
                        <li>
                            <form action="/logout" method="POST">
                                @csrf
                                <button class="dropdown-item text-danger" href="#">Logout <i
                                        class="fa-solid fa-power-off fa-lg fw-bolder ps-2"></i></button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <a href="/register" class="nav-link">Register</a>
                <a href="/login" class="nav-link">Login</a>
            @endauth
            <a href="#subscribe" class="nav-link">Subscribe</a>
        </div>
    </div>
</nav>
