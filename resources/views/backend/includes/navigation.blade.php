<nav class="main-header navbar navbar-expand navbar-white navbar-white-za">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link text-light" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Profile -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle za-text-light" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                <img class="img-profile rounded-circle" src="{{ asset('uploads/images/profile/myProfile.jpg') }}"
                    style="width: 30px;">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Settings
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();" data-toggle="modal"
                    data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>

    </ul>
</nav>
