<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

    </ul>

    <ul class="navbar-nav ml-auto">
                           <!-- Authentication Links -->
                           @guest
                               <li class="nav-item">
                                   <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                               </li>
                               @if (Route::has('register'))
                                   <li class="nav-item">
                                       <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                   </li>
                               @endif
                           @else
                               <li class="nav-item dropdown">
                                   <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                       {{Auth::user()->name}} <span class="caret"></span>
                                   </a>

                                    <ul class="dropdown-menu" role="menu">

                                                   <li><a class="dropdown-item" href="{{ url('edit/user') }}" >
                                                           <i class="fas fa-edit"></i>  {{ __('Edit Profile') }} </a></li>

                                                    <li><a class="dropdown-item" href="{{ url('edit/password/user') }}" >
                                                           <i class="fas fa-edit"></i>  {{ __('Change Password') }} </a></li>

                                                   <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                                                   document.getElementById('logout-form').submit();">
                                                           <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                                                       </a>

                                                       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                           @csrf
                                                       </form>
                                                   </li>
                                               </ul>
                               </li>
                           @endguest
                       </ul>


</nav>
<!-- /.navbar -->
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-info elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset("dist/img/logo.png") }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"> {{  Auth::user()->name}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
{{--        <div class="user-panel mt-3 pb-3 mb-3 d-flex">--}}
{{--            <div class="image">--}}
{{--                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">--}}
{{--            </div>--}}
{{--            <div class="info">--}}
{{--                <a href="#" class="d-block">{{ Auth::user()->name }}</a>--}}
{{--            </div>--}}
{{--        </div>--}}




        <!-- Sidebar Menu -->
        <nav class="mt-2 ">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="fas fa-home nav-icon"></i>
                        <p>Home</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('cars') }}" class="nav-link">
                        <i class="fas fa-car nav-icon"></i>
                        <p>Cars</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('configurations') }}" class="nav-link">
                        <i class="fas fa-tools nav-icon"></i>
                        <p>Configurations</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('drivers') }}" class="nav-link">
                        <i class="fas fa-user nav-icon"></i>
                        <p>Drivers</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('tracks') }}" class="nav-link">
                        <i class="fas fa-road nav-icon"></i>
                        <p>Tracks</p>
                    </a>
                </li>

                <li class="nav-item">
                     <a href="{{ route('tracklayouts') }}" class="nav-link">
                         <i class="fas fa-road nav-icon"></i>
                             <p>Track Layout</p>
                     </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('laps') }}" class="nav-link">
                        <i class="fas fa-road nav-icon"></i>
                        <p>Laps</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('help') }}" class="nav-link">
                        <i class="fas fa-question-circle nav-icon"></i>
                        <p>Help</p>
                    </a>
                </li>
            </ul>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
