<nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
    <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand" href="#">
            <img src="{{ asset('imges/logo/Stori8dark.png') }}" width="40px" alt="Logo" id="nvalogo"
                class="d-inline-block align-text-top" data-dark-logo="{{ asset('imges/logo/Stori8light.png') }}"
                data-light-logo="{{ asset('imges/logo/Stori8dark.png') }}">
            Stori8
        </a>
        <!-- Custom Hamburger Icon -->
        <button class="menu-toggle" id="menuToggle" aria-label="Toggle navigation">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </button>

        <!-- Desktop Links (Hidden on mobile) -->
        <div class="collapse navbar-collapse justify-content-end d-none d-lg-block" id="desktopNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('index') }}" id="workLink">Work</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about_us') }}" id="aboutLink">About Us</a>
                </li>
                <li class="nav-item">
                    <!-- Dark Mode Toggle Switch -->
                    <div class="d-flex align-items-center gap-2 mt-2 ms-3">
                        <span id="desktopThemeIcon">☀️</span>
                        <div class="form-check form-switch m-0">
                            <input class="form-check-input" type="checkbox" id="darkModeSwitch" />
                            <label class="form-check-label" for="darkModeSwitch" id="darkModeLabel"></label>
                        </div>
                        <span id="desktopThemeIconMoon" style="display:none;">🌙</span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Full Screen Mobile Overlay Menu -->
<div class="mobile-menu-overlay" id="mobileMenuOverlay">
    <div class="mobile-menu-content">
        <a href="{{ route('index') }}" class="mobile-nav-link">Work</a>
        <a href="{{ route('about_us') }}" class="mobile-nav-link">About Us</a>

        <!-- Mobile Dark Mode Toggle -->
        <div class="mobile-nav-link d-flex align-items-center gap-2">
            <span id="mobileThemeIcon">☀️</span>
            <div class="form-check form-switch m-0">
                <input class="form-check-input" type="checkbox" id="darkModeSwitchMobile"
                    style="width: 3em; height: 1.5em;" />
            </div>
            <span id="mobileThemeIconMoon" style="display:none;">🌙</span>
        </div>
    </div>
</div>