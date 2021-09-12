<nav class="navbar navbar-inverse navbar-expand-lg mb-5">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="active navbar-brand" href="#">
                    {{ env('APP_NAME') }}
                </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                @if (auth()->user())
                    <li class="px-5">
                        <a class="nav-link" href={{ route('event.create') }}> Create an Event</a>
                    </li>

                    <li class="px-5">
                        <a class="nav-link  " href="#">Welcome {{ auth()->user()->name }}</a>
                    </li>
                    <li class="px-5">
                        <a class="nav-link " href={{ route('logout') }}>Logout</a>
                    </li>
                @else
                    <li class="px-5">
                        <a class="nav-link" href={{ route('login') }}>Login</a>
                    </li>
                    <li class="px-5">
                        <a class="nav-link" href={{ route('register') }}>Register</a>
                    </li>
                @endif
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>

{{-- <nav class="navbar navbar-inverse navbar-expand-md container-fluid">
    <div class="container row">

        <div class=" collapse navbar-collapse" id="navbarNav">

        </div>
    </div>
</nav> --}}
