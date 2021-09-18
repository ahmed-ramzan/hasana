
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">


        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                {{Auth::user()->name}}
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                {{--<a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Profile
                            </h3>
                        </div>
                    </div>
                </a>--}}
                <div class="dropdown-divider"></div>
                <a href="{{route('logout')}}"
                   onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"
                    {{ __('Logout') }}
                   class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                            </h3>
                        </div>
                    </div>
                    <!-- Message End -->
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
        <!-- Notifications Dropdown Menu -->
           {{-- <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">Notifications</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>--}}
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
