<nav class="navbar navbar-dark bg-dark navbar-expand-lg">
    <div class="container-fluid row">
        <a class="navbar-brand col-4" href="#">
            {{ env('APP_NAME') }}
        </a>

        <div class="d-flex col-8" id="navbarNav">
            <div class="col-md-8"></div>
            <div class="col-md-4">
                <ul class="navbar-nav ">
                    @if (auth()->user())
                        <li class="nav-item">
                            <a class="nav-link  " href="#">Welcome {{ auth()->user()->name }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href={{ route('logout') }}>Logout</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href={{ route('login') }}>Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href={{ route('register') }}>Register</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</nav>
