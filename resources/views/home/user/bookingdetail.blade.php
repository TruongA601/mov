<!DOCTYPE html>
<html lang="en">

@include('public.header')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{ asset('assets/css/sweetalert2.min.css') }}">
<style>
    .card-re {
        border: 1px solid #ccc;
        border-radius: 6px;
        margin-bottom: 10px;
        background-color: #1a1a1a;
    }

    .card-body-re {
        display: flex;

        padding: 1.5rem;
    }

    .order-data {
        margin-bottom: 20px;
    }

    .data-label {
        font-weight: bold;
        margin-right: 10px;
        color: #ffffff
    }

    .data-value {
        color: #ffffff;
        /* or any color of your choice */
    }

    .logo-container {
        text-align: center;
    }

    .logo {
        max-width: 100px;

    }

    .ticketing-step {
        margin-top: 5px;
        color: #95aac9;
        padding: 10px 0 5px;
        text-align: center;
    }

    .clearfix.flow-actions.sticky-button-bars {
        display: flex;
        justify-content: space-between;
        align-datas: center;
    }

    .col-md-6 {
        margin-top: 15px;
    }
</style>

<body class="">
    <div class="header-home" style="background-color: #2a2e4b" id="topbar">
        <div class="container">
            <div class="topbar">
                <div class="left-topbar-home">
                    <div class="logo">
                        <a href="{{ route('index') }}">
                            <img src="{{ asset('assets/images/logo-1.png') }}" alt="">
                        </a>
                    </div>
                </div>
                <style>
    
                </style>
                <div class="right-topbar-home">
                    {{-- <div class="search-bar" onclick="toggleSearchForm()">
                        <div class="search1">
                            <span class="fas fa-search"></span>
                            <span class="input-text">search for movies</span>
                        </div>
                    </div> --}}
    
                    <div class="user-profile">
                        <a class="" data-bs-toggle="dropdown">
                            <div class="d-flex user-box align-items-center">
                                <div class="user-info"style="margin-right:5px;">
                                    <p class="user-name mb-0" style="font-size: 15px; color: white">
                                        <?php if (Auth::check()): ?>
                                        <?php echo Auth::user()->username; ?>
                                        <?php else:  ?>
                                        <style>
                                            .user-profile {
                                                border: none;
                                            }
                                        </style>
                                        <?php endif; ?>
                                    </p>
                                </div>
                                <?php if (Auth::check()): ?>
                                <img src="{{ URL::to('uploads/avatars/' . Auth::user()->avatar) }}" class="user-img"
                                    alt="user avatar">
                                <?php else:?>
                                <img src="{{ asset('assets/images/avatars/avatar.jpg') }}" class="user-img"
                                    alt="user avatar">
                                <?php endif;?>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <?php if (Auth::check()): ?>
    
                            <a class="dropdown-item" href="{{ route('user-account') }}">
                                <i class="bx bx-user" style="margin-right: 5px"></i><span>Profile</span>
                            </a>
                            {{-- <a class="dropdown-item" href="#">
                                <i class="bx bx-cart" style="margin-right: 5px"></i><span>Your Order</span>
                            </a> --}}
                            <div class="dropdown-divider mb-0"></div>
                            <form action="{{ route('logout') }}" method="POST">@csrf
                                <button class="dropdown-item" href="javascript:;">
                                    <span type="button;submit"><i class="bx bx-power-off"></i>Logout</span>
                                </button>
                            </form>
                            <?php else: ?>
    
                            <a class="dropdown-item" href="{{ route('signin') }}">
                                <i class="bx bx-log-in" style="margin-right: 5px"></i><span>Sign in</span>
                            </a>
                            <a class="dropdown-item" href="{{ route('signup') }}">
                                <i class="bx bx-user-plus" style="margin-right: 5px"></i><span>Sign up</span>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="container">
                <div class="header-bottom-item ">
                    <a href="{{ route('index') }}"class="header-item">Home</a>
                    <a href="{{ route('allmovie') }}"class="header-item">Movies</a>
                    <a href="{{ route('support') }}"class="header-item">Suport</a>
                    <a href="{{ route('aboutus') }}"class="header-item">About us</a>
                </div>
            </div>
    
        </div>
    
    </div>
    {{-- <script>
        $(function() {
            $('#search-menu').removeClass('toggled');
    
            $('#search-icon').click(function(e) {
                e.stopPropagation();
                $('#search-menu').toggleClass('toggled');
                $("#popup-search").focus();
            });
    
            $('#search-menu input').click(function(e) {
                e.stopPropagation();
            });
    
            $('#search-menu, body').click(function() {
                $('#search-menu').removeClass('toggled');
            });
        });
    </script> --}}
    <div class="container">
    </div>
    <div class="main-content">

        <div class="container">
            <div class="logo-container">
                <img src="{{ URL::to('assets/images/logo-icon.png') }}" alt="" class="logo">
            </div>
            <div class="row">
                <div class="col-xl-8 mx-auto">
                    <h6 class="mb-0 text-uppercase" style="color: black">Booking Detail</h6>
                    <div class="card-re">
                        <div class="card-body-re">
                            <div class="row">
                                <div class="col-md-">
                                    <span class="data-label">Movie Name:</span>
                                    <span class="data-value" style="font-size:20px">{{ $data->movie_name }}</span>
                                </div>
                                <div class="col-md-6">
                                    <span class="data-label">Cinema:</span>
                                </div>
                                <div class="col-md-6">
                                    <span class="data-value">{{ $data->cinema_name }}</span>
                                </div>
                                <div class="col-md-6">
                                    <span class="data-label">Theater:</span>

                                </div>
                                <div class="col-md-6">
                                    <span class="data-value">{{ $data->theater_name }}</span>
                                </div>
                                <div class="col-md-6">
                                    <span class="data-label">Date Show:</span>

                                </div>
                                <div class="col-md-6">
                                    <span class="data-value">{{ date('d-m-Y', strtotime($data->date_show)) }}</span>
                                </div>
                                <div class="col-md-6">
                                    <span class="data-label">Show Time:</span>

                                </div>
                                <div class="col-md-6">
                                    <span class="data-value">{{ $data->start_time }}</span>
                                </div>
                                <div class="col-md-6">
                                    <span class="data-label">Seat:</span>
                                </div>
                                <div class="col-md-6">
                                    @foreach ($seat as $item)
                                        <span class="data-value">{{ $item->seat_row }}-{{ $item->seat_column }}</span>
                                    @endforeach
                                </div>
                                <hr>
                                <div class="col-md-6">
                                    <span class="data-label">Total Price:</span>
                                </div>
                                <div class="col-md-6">
                                    <span class="data-value">{{ $data->total_price }} đ</span>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <button class="btn btn-outline-primary" onclick="goBack(event)"><i
                            class="fa-solid fa-arrow-left"></i></button>
                </div>
            </div>

        </div>
    </div>
    </div>
    <div class="container" style="margin-bottom:0px">
        <button id="back-to-top" onclick="topFunction()"><i class="fas fa-arrow-up"></i></button>
    </div>
    @include('home.foot')
    @include('public.footer')
    <script src="{{ asset('assets/js/sweetalert2.all.min.js') }} "></script>
    @include('public.alert')
    <script>
        function goBack(event) {
            event.preventDefault();
            window.history.back();
        }
    </script>
</body>

</html>
