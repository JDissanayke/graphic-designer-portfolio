<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="{{ route('admin') }}" class="navbar-brand mx-4 mb-3">
            <img src="{{ asset('imges/logo/Stori8dark.png') }}" width="40px" alt="Logo"> Stori8
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <span class="d-none d-lg-inline-flex">
                        {{ Auth::user()->name ?? 'Guest' }}
                    </span>
                </a>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{ route('admin') }}"
               class="nav-item nav-link {{ request()->routeIs('admin') ? 'active' : '' }}">
               <i class="fa fa-tachometer-alt me-2"></i>Dashboard
            </a>

            <a href="{{ route('post') }}"
               class="nav-item nav-link {{ request()->routeIs('post') ? 'active' : '' }}">
               <i class="fa fa-th me-2"></i>Create Post
            </a>

            <a href="{{ route('adddetails') }}"
               class="nav-item nav-link {{ request()->routeIs('adddetails') ? 'active' : '' }}">
               <i class="fa fa-keyboard me-2"></i>Add Details
            </a>

            <a href="{{ route('users') }}"
               class="nav-item nav-link {{ request()->routeIs('users') ? 'active' : '' }}">
               <i class="fa fa-table me-2"></i>User
            </a>
        </div>
    </nav>
</div>
