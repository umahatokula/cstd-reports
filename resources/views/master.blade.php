<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>CSTD Reports Portal.</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="msapplication-tap-highlight" content="no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{asset('main.css')}}" rel="stylesheet">

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script> -->
    
    <script type="text/javascript" src="{{asset('scripts/main.js')}}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/html2canvas.js') }}"></script>
    <script src="{{ asset('js/jspdf.min.js') }}"></script>
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="">
                    @foreach(auth()->user()->roles as $role)
                    {{$role->name}} <br>
                    @endforeach
                </div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                            data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button"
                        class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>
        </div>

        <div class="app-main">
            <div class="app-sidebar sidebar-shadow">
                <div class="app-header__logo">
                    <div class="logo-src"></div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                                data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="app-header__menu">
                    <span>
                        <button type="button"
                            class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
                </div>

                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                        <ul class="vertical-nav-menu">
                            <li class="app-sidebar__heading">MENU</li>

                            <li>
                                <a href="{{ url('/') }}" class="{{ isset($dashboardMenu) ? 'mm-active' : '' }}">
                                    <i class="metismenu-icon pe-7s-angle-right-circle"></i>
                                    Dashboard
                                </a>
                            </li>

                            <li>
                                <a href="{{url('aper-forms')}}" class="{{ isset($aperFormMenu) ? 'mm-active' : '' }}">
                                    <i class="metismenu-icon pe-7s-angle-right-circle"></i>
                                    APER
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('reports.index') }}"
                                    class="{{ isset($reportsMenu) ? 'mm-active' : '' }}">
                                    <i class="metismenu-icon pe-7s-angle-right-circle"></i>
                                    Monthly Reports
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('staff.index') }}" class="{{ isset($staffMenu) ? 'mm-active' : '' }}">
                                    <i class="metismenu-icon pe-7s-angle-right-circle"></i>
                                    Staff
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('users.index') }}" class="{{ isset($usersMenu) ? 'mm-active' : '' }}">
                                    <i class="metismenu-icon pe-7s-angle-right-circle"></i>
                                    User
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-angle-right-circle"></i>
                                    Settings
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul>

                                    <li>
                                        <a href="{{ route('units.index') }}"
                                            class="{{ isset($unitsMenu) ? 'mm-active' : '' }}">
                                            <i class="metismenu-icon pe-7s-angle-right-circle"></i>
                                            Units
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('divisions.index') }}"
                                            class="{{ isset($divisionsMenu) ? 'mm-active' : '' }}">
                                            <i class="metismenu-icon pe-7s-angle-right-circle"></i>
                                            Divisions
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('departments.index') }}"
                                            class="{{ isset($departmentsMenu) ? 'mm-active' : '' }}">
                                            <i class="metismenu-icon pe-7s-angle-right-circle"></i>
                                            Departments
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('gradeLevels.index') }}"
                                            class="{{ isset($gradeLevels) ? 'mm-active' : '' }}">
                                            <i class="metismenu-icon pe-7s-angle-right-circle"></i>
                                            Grade Levels
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('settings.index') }}"
                                            class="{{ isset($settingsMenu) ? 'mm-active' : '' }}">
                                            <i class="metismenu-icon pe-7s-angle-right-circle"></i>
                                            Set Dates
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link {{ isset($rolesMenu) ? 'active' : '' }}"
                                            href="{{ route('roles') }}">
                                            <span data-feather="users"></span>
                                            Roles & Permissions
                                        </a>
                                    </li>

                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="app-main__outer">
                <div class="app-main__inner">
                    @yield('content')

                </div>
                <div class="app-wrapper-footer">
                    <div class="app-footer">
                        <div class="app-footer__inner">
                            &nbsp
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
