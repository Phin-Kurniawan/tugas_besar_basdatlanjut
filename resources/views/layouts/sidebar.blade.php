<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
        <img src="{{asset('img/pet-central-logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Pet Central</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        @auth
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('img/user-photo-default.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
                <p style="color: white">Role: {{Auth::user()->role}}</p>
            </div>
        </div>
        @endauth

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link">
                        <i class="nav-icon fa fa-home"></i>
                        <p>Home</p>
                    </a>
                </li>
                @if (Auth::user()->role == 'admin')
                {{-- Menus for admin role --}}
                    <li class="nav-item">
                        <a href="{{route('articles')}}" class="nav-link">
                            <i class="nav-icon fa fa-newspaper-o"></i>
                            <p>Articles / Tutorials</p>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->role == 'doctor')
                {{-- Menus for doctor role --}}
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-users"></i>
                            <p>Appointments</p>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->role == 'owner')
                {{-- Menus for owner role --}}
                    <li class="nav-item">
                        <a href="{{route('appointment')}}" class="nav-link">
                            <i class="nav-icon fa fa-users"></i>
                            <p>Appointments</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('find_vets')}}" class="nav-link">
                            <i class="nav-icon fa fa-map-marker"></i>
                            <p>Find Vets</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('articles')}}" class="nav-link">
                            <i class="nav-icon fa fa-newspaper-o"></i>
                            <p>Articles / Tutorials</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-shopping-cart"></i>
                            <p>Pet Shop</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('event')}}" class="nav-link">
                            <i class="nav-icon fa fa-calendar"></i>
                            <p>Events</p>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <form id="logout-form" action="{{route('logout')}}" method="post">
                        @csrf
                    </form>
                    <a href="javascript:void(0)" class="nav-link" onclick="$('#logout-form').submit();">
                        <i class="nav-icon fa fa-sign-out"></i>
                        <p>Logout</p>
                    </a>
                </li>
                {{-- <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fa fa-dashboard"></i>
                        <p>
                            Dashboard
                            <i class="right fa fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Active Page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Inactive Page</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-th"></i>
                        <p>
                            Simple Link
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li> --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>