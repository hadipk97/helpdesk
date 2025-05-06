<nav class="navbar navbar-expand-sm bg-dark navbar-dark">

    <a class="navbar-brand" href="{{ route('dashboard') }}">
        Helpdesk
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/index.php/Ticketing">Ticketing</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/index.php/kbase">Info Centre</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/index.php/Report">Reporting</a>
            </li>
            <!-- Dropdown -->


            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Settings
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/index.php/services/about">About System</a>
                    <a class="dropdown-item" href="{{ route('category') }}">Categories</a>
                    <a class="dropdown-item" href="{{ route('service') }}">Services</a>
                    <a class="dropdown-item" href="{{ route('level') }}">Levels</a>
                    <a class="dropdown-item" href="{{ route('users') }}">Users</a>
                    <a class="dropdown-item" href="{{ route('group') }}">Department</a>
                </div>
            </li>

        </ul>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="{{ route('profile') }}" class="nav-link" href="#">Hi,
                    @if (Auth::check())
                        {{ Auth::user()->n_penuh }}
                    @endif
                </a>
            </li>
            <li class="nav-item">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <a class="nav-link"><button class="btn btn-danger btn-sm" type="submit">Logout</button></a>
                </form>
            </li>
        </ul>
    </div>
</nav>
