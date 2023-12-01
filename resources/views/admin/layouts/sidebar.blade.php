<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div class="">
            <img src="{{ URL::to('assets/images/logo-icon.png') }}" class="logo-icon-2" alt="" />
        </div>
        <div>
            <h4 class="logo-text">BlackCat</h4>
        </div>
        <a href="javascript:;" class="toggle-btn ms-auto"> <i class="bx bx-menu"></i>
        </a>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ URL::to('dashboard') }}">
                <div class="parent-icon icon-color-1"><i class="bx bx-home-alt"></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
            {{-- <ul>
                <li> <a href="index.html"><i class="bx bx-right-arrow-alt"></i>Analytics</a>
                </li>
                <li> <a href="index2.html"><i class="bx bx-right-arrow-alt"></i>Sales</a>
                </li>
            </ul> --}}
        </li>
        <li class="menu-label">Manager</li>
        <li>
            <a href="{{ URL::to('account') }}">
                <div class="parent-icon icon-color-4"><i class="bx bx-user-circle"></i>
                </div>
                <div class="menu-title">Account</div>
            </a>
        </li>
        <li>
            <a href="{{ URL::to('movies') }}">
                <div class="parent-icon icon-color-5"><i class="fas fa-film"></i>
                </div>
                <div class="menu-title">Movies</div>
            </a>
        </li>
        <li>
            <a href="{{ URL::to('genres') }}">
                <div class="parent-icon icon-color-2"><i class="fadeIn animated bx bx-cube-alt"></i>
                </div>
                <div class="menu-title">Genre</div>
            </a>
        </li>
        <li>
            <a href="{{ URL::to('actors') }}">
                <div class="parent-icon icon-color-9"><i class="fadeIn animated bx bx-user"></i>
                </div>
                <div class="menu-title">Actor</div>
            </a>
        </li>
        <li>
            <a href="{{ URL::to('cinemas') }}">
                <div class="parent-icon icon-color-7"> <i class="fas fa-city"></i>
                </div>
                <div class="menu-title">Cinemas</div>
            </a>
        </li>
        <li>
            <a href="{{ URL::to('theater') }}">
                <div class="parent-icon icon-color-3"><i class="lni lni-display-alt"></i>
                </div>
                <div class="menu-title">Theater</div>
            </a>
        </li>
        <li>
            <a href="{{ URL::to('show-banner') }}">
                <div class="parent-icon icon-color-5"><i class="fadeIn animated bx bx-camera-movie"></i>
                </div>
                <div class="menu-title">Banners</div>
            </a>
        </li>
        <li>
            <a href="{{ URL::to('show-booking') }}">
                <div class="parent-icon icon-color-8"><i class="fa fa-ticket-alt"></i>
                </div>
                <div class="menu-title">Booking</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>
