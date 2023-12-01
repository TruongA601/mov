<header class="top-header">
    <nav class="navbar navbar-expand">
        <div class="left-topbar d-flex align-items-center">
            <a href="javascript:;" class="toggle-btn"> <i class="bx bx-menu"></i>
            </a>
        </div>
        <div class="flex-grow-1 search-bar">
            <div class="input-group" hidden>
                <button class="btn btn-search-back search-arrow-back" type="button"><i
                        class="bx bx-arrow-back"></i></button>
                <input type="text" class="form-control" placeholder="search" />
                <button class="btn btn-search" type="button"><i class="lni lni-search-alt"></i></button>
            </div>
        </div>
        <div class="right-topbar ms-auto">
            <ul class="navbar-nav">
                <li class="nav-item search-btn-mobile">
                    <a class="nav-link position-relative" href="javascript:;"> <i
                            class="bx bx-search vertical-align-middle"></i>
                    </a>
                </li>
                <li class="nav-item dropdown dropdown-user-profile">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"
                        data-bs-toggle="dropdown">
                        <?php if (Auth::check()): ?> <div class="d-flex user-box align-items-center">
                            <div class="user-info">
                                <p class="user-name mb-0" style="font-size: 20px">
                                    <?php echo Auth::user()->username; ?>
                                </p>
                                <p class="designattion mb-0" style="color: rgb(33, 217, 125)">Available</p>
                            </div>
                            <img src="{{ URL::to('uploads/avatars/' . Auth::user()->avatar) }}" class="user-img"
                                alt="user avatar">
                        </div> <?php endif; ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="{{ url('update/'. Auth::user()->id ) }}"><i class="bx bx-user"></i><span>Profile</span></a>
                        <div class="dropdown-divider mb-0"></div>
                        <form action="{{ route('logout') }}" method="POST">@csrf
                            <button class="dropdown-item" href="javascript:;">
                                <span type="button;submit"><i class="bx bx-power-off"></i>Logout</span>
                            </button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
