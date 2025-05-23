<nav id="sidebar" class="d-flex flex-column">
    <div class="sidebar-header">
        <h4>Helpdesk</h4>
    </div>

    <div class="sidebar-content flex-grow-1">
        <ul class="list-unstyled components mx-3 rounded-4">
            <li class="{{ request()->routeIs('dashboard') ? 'active rounded-4' : '' }}">
                <a href="{{ route('dashboard') }}"><i class="fas fa-th-large mr-2"></i>Dashboard</a>
            </li>

            <li class="{{ request()->routeIs('info-center') ? 'active rounded-4' : '' }}">
                <a href="{{ route('info-center') }}"><i class="fas fa-info-circle mr-2"></i>Info Center</a>
            </li>

            <li class="{{ request()->routeIs('reporting') ? 'active rounded-4' : '' }}">
                <a href="{{ route('reporting') }}"><i class="fas fa-chart-bar mr-2"></i>Reporting</a>
            </li>
            <li class="{{ request()->routeIs('client') ? 'active rounded-4' : '' }}">
                <a href="{{ route('client') }}"><i class="fas fa-user-tie mr-2"></i>Client</a>
            </li>
            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i
                        class="fas fa-cog mr-2"></i>Setting</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="#">About System</a>
                    </li>
                    <li>
                        <a href="{{ route('category') }}">Categories</a>
                    </li>
                    <li>
                        <a href="{{ route('service') }}">Service</a>
                    </li>
                    <li>
                        <a href="{{ route('level') }}">Level</a>
                    </li>

                    <li>
                        <a href="{{ route('users') }}">Users</a>
                    </li>
                    <li>
                        <a href="{{ route('group') }}">Department</a>
                    </li>
                </ul>
            </li>
        </ul>
</nav>