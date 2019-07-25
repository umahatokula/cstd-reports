<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Menu</span>
            <br>
            <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
            </a>
        </h6>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span><b>{{Auth::user()->name}}</b></span>
        </h6>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>{{Auth::user()->role->display_name}}</span>
        </h6>
        <hr>
        <ul class="nav flex-column">
            @if(Auth::user()->role->level >= 2)
            <li class="nav-item">
                <a class="nav-link {{ isset($dashboardMenu) ? 'active' : '' }}" href="{{ url('/') }}">
                    <span data-feather="home"></span>
                    Dashboard <span class="sr-only">(current)</span>
                </a>
            </li>
            @endif
            <li class="nav-item">
                <a class="nav-link {{ isset($aperFormMenu) ? 'active' : '' }}" href="{{ url('aper-forms') }}">
                    <span data-feather="bar-chart-2"></span>
                    APER Form
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ isset($reportsMenu) ? 'active' : '' }}" href="{{ route('reports.index') }}">
                    <span data-feather="bar-chart-2"></span>
                    Monthly Reports
                </a>
            </li>
            @if(Auth::user()->role->level >= 2)
            <li class="nav-item">
                <a class="nav-link {{ isset($unitsMenu) ? 'active' : '' }}" href="{{ route('units.index') }}">
                    <span data-feather="file"></span>
                    Units
                </a>
            </li>
            <li class="nav-item {{ isset($divisionsMenu) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('divisions.index') }}">
                    <span data-feather="file"></span>
                    Divisions
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ isset($departmentsMenu) ? 'active' : '' }}"
                    href="{{ route('departments.index') }}">
                    <span data-feather="file"></span>
                    Departments
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ isset($gradeLevelsMenu) ? 'active' : '' }}"
                    href="{{ route('gradeLevels.index') }}">
                    <span data-feather="layers"></span>
                    Grade Levels
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ isset($staffMenu) ? 'active' : '' }}" href="{{ route('staff.index') }}">
                    <span data-feather="users"></span>
                    Staff
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ isset($settingsMenu) ? 'active' : '' }}" href="{{ route('settings.index') }}">
                    <span data-feather="users"></span>
                    Settings
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ isset($usersMenu) ? 'active' : '' }}" href="{{ route('users.index') }}">
                    <span data-feather="users"></span>
                    Users
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ isset($rolesMenu) ? 'active' : '' }}" href="{{ route('roles') }}">
                    <span data-feather="users"></span>
                    System Roles
                </a>
            </li>
            @endif
        </ul>
    </div>
</nav>
