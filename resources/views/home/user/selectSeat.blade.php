<!DOCTYPE html>
<html lang="en">
@include('public.header')
<link rel="stylesheet" href="{{ asset('assets/bootstrap5/css/seat.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/sweetalert2.min.css') }}">
<style>
    .ticketing-step {
        margin-top: 5px;

        color: #95aac9;
        padding: 10px 0 5px;
        text-align: center;
    }

    .seat.unselectable {
        cursor: not-allowed;
        pointer-events: none;
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

        <div class="ticketing-steps bg-white border-bottom">
            <div class="container">
                <div class="row">
                    <div class="col ticketing-step">
                        <div class="">
                            <i class="fas fa-th-large"></i><br>
                            <span>Select Seat</span>
                        </div>
                    </div>

                    <div class="col ticketing-step">
                        <div class="text-danger">
                            <i class="far fa-credit-card"></i><br>
                            <span>Payment</span>
                        </div>
                    </div>
                    <div class="col ticketing-step">
                        <div class="">
                            <i class="fas fa-inbox"></i><br>
                            <span>Ticket Detail</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row"
                style="display: flex;
        flex-wrap: wrap;
        margin-left: -12px;
        margin-right: -12px;">
                <div class="content_box col-8">
                    <div class="content active ">
                        <div class="seatbd ">
                            <ul class="showcase">
                                <li>
                                    <div class="seat" style="background-color:#444451; width:40px;height:40px"></div>
                                    <small>Available</small>
                                </li>
                                <li>
                                    <div class="seat" style="background-color: #6feaf6; width:40px;height:40px"></div>
                                    <small>Selected</small>
                                </li>
                                <li>
                                    <div class="seat " style="background-color: #b2b2b2; width:40px;height:40px"></div>
                                    <small>Booked</small>
                                </li>
                                <li>
                                    <div class="seat " style="background-color: #710000; width:40px;height:40px"></div>
                                    <small>Disabled</small>
                                </li>
                            </ul>
                            <input type="hidden" id="newStatusInput" name="newStatus" value="available">
                            <div class="container">
                                <div class="screen">Screen</div>
                                <div class="row">
                                    @php
                                        $columnsPerRow = 15;
                                        $totalSeats = count($showseat);
                                    @endphp
                                    @for ($i = 0; $i < $totalSeats; $i++)
                                        @if ($i % $columnsPerRow == 0)
                                            @if ($i != 0)
                                </div>
                                @endif
                                <div class="row">
                                    @endif
                                    @php

                                        $isBooked = $showseat[$i]->status === 'booked';
                                    @endphp
                                    <div class="seat {{ $showseat[$i]->status }} {{ $isBooked ? 'unselectable' : '' }}"
                                        data-seat-id="{{ $showseat[$i]->id }}"
                                        style="color: rgb(255, 255, 255); display: flex; text-align: center; align-items: center;justify-content: center;"
                                        title="{{ $showseat[$i]->seatRow }}-{{ $showseat[$i]->seatColumn }}">
                                        {{ $showseat[$i]->seatColumn }}
                                        <input type="hidden" class="seat-info"
                                            data-seat-row="{{ $showseat[$i]->seatRow }}"
                                            data-seat-column="{{ $showseat[$i]->seatColumn }}">
                                    </div>
                                    @endfor
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <style>
                .card-body-order {
                    width: 100%;
                    -webkit-box-flex: 1;
                    -ms-flex: 1 1 auto;
                    flex: 1 1 auto;
                    padding: 1rem 1rem;

                }

                .text-truncate {
                    font-style: inherit;
                    font-size: 20px;

                }
            </style>
            <div class="order-sm-last col-4">
                @foreach ($movies as $movie)
                    @foreach ($cinemas as $cinema)
                        @foreach ($show as $shows)
                            @foreach ($theaters as $theater)
                                <form action="{{ route('payment') }}" method="POST" id="selectseatForm">
                                    @csrf
                                    <div class="card">
                                        <div class="card-body-order">
                                            <div class="row-md-4">
                                                <div class="col">
                                                    <p class="text-truncate mb-0"
                                                        style="font-weight:600;font-size:25px"> {{ $movie->name }}</p>

                                                    <p class="text-truncate mb-0">Cinema: {{ $cinema->name }}</p>
                                                    <p class="text-truncate mb-0">Session: {{ $shows->start_time }} -
                                                        {{ date('d/m/Y', strtotime($shows->date_show)) }}</p>
                                                    <p class="text-truncate mb-0">Show price: {{ $shows->price }} vnđ
                                                    </p>
                                                    <p class="text-truncate mb-0">Theater: {{ $theater->name }} </p>
                                                    <p class="text-truncate mb-0">Seat:<span id="selectedSeatsDisplay">
                                                    </p>
                                                    <input type="hidden" name="selectedSeats" id="selectedSeatsInput">
                                                    <input type="hidden" name="cinema_name"
                                                        value="{{ $cinema->name }}">
                                                    <input type="hidden" name="movie_name"
                                                        value="{{ $movie->name }}">
                                                    <input type="hidden" name="start_time"
                                                        value="{{ $shows->start_time }}">
                                                    <input type="hidden" name="show_date"
                                                        value="{{ $shows->date_show }}">
                                                    <input type="hidden" name="show_price"
                                                        value="{{ $shows->price }}">
                                                    <input type="hidden" name="theater_name"
                                                        value="{{ $theater->name }}">
                                                    <input type="hidden" name="show_id" value="{{ $shows->id }}">
                                                    <input type="hidden" name="theater_id" value="{{ $theater->id }}">
                                                    <input type="hidden" name="cinema_id" value="{{ $cinema->id }}">
                                                    <input type="hidden" name="movie_id" value="{{ $movie->id }}">
                                                    <input type="hidden" name="total_price" id="total_price_input"
                                                        value="">


                                                    <input type="hidden" name="selected_seats"
                                                        id="selected_seats_input">


                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body-order">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <h6 class="card-title  text-muted mb-2">Total Price </h6>
                                                    <p class="text-truncate mb-0">
                                                        <span id="total_price" name=total_price>0</span> vnđ
                                                    </p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body-order">
                                            <div class="row">
                                                <div class="col">
                                                    <button class="btn btn-outline-secondary"
                                                        onclick="goBack(event)"><i
                                                            class="fa-solid fa-arrow-left"></i></button>

                                                    <button class="btn btn-primary" type="submit"
                                                        onclick="continueBooking()"
                                                        style="width: 70%">continue</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach
                        @endforeach
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>

    <div class="container" style="margin-bottom:0px">
        <button id="back-to-top" onclick="topFunction()"><i class="fas fa-arrow-up"></i></button>
    </div>
    @include('home.foot')
    @include('public.footer')
    <script src="{{ asset('assets/bootstrap5/js/seat.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert2.all.min.js') }} "></script>
    @include('public.alert')

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const selectedSeats = [];
            let totalPrice = 0;
            const seats = document.querySelectorAll(".seat");

            seats.forEach(function(seat) {
                seat.addEventListener("click", function() {
                    if (!selectedSeats.includes(seat)) {
                        selectedSeats.push(seat);
                        updateSelectedSeatsDisplay();
                    } else {
                        const index = selectedSeats.indexOf(seat);
                        if (index > -1) {
                            selectedSeats.splice(index, 1);
                        }
                        updateSelectedSeatsDisplay();
                    }
                });
            });

            function calculateTotalPrice() {
                const pricePerShow = {{ $shows->price }};
                totalPrice = selectedSeats.length * pricePerShow;
                const total_price = document.getElementById("total_price");
                total_price.textContent = totalPrice;
            }

            function updateSelectedSeatsDisplay() {
                const selectedSeatsInfo = selectedSeats.map(function(seat) {
                    const seatRow = seat.querySelector(".seat-info").getAttribute("data-seat-row");
                    const seatColumn = seat.querySelector(".seat-info").getAttribute("data-seat-column");
                    return seatRow + "-" + seatColumn;
                });
                const selectedSeatsDisplay = document.getElementById("selectedSeatsDisplay");
                selectedSeatsDisplay.textContent = selectedSeatsInfo.join(",");
                calculateTotalPrice();
            }

            window.continueBooking = function() {
                if (selectedSeats.length === 0) {
                    Swal.fire({
                        title: 'No seat selected',
                        text: "You have not selected any seat",
                        icon: 'warning',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    });
                    event.preventDefault();
                } else {

                    document.getElementById("total_price_input").value = totalPrice;
                    document.getElementById("selected_seats_input").value = getSelectedSeatsInfo();
                    document.getElementById("selectseatForm").submit();
                }
            };

            function getSelectedSeatsInfo() {
                return selectedSeats.map(function(seat) {
                    const seatRow = seat.querySelector(".seat-info").getAttribute("data-seat-row");
                    const seatColumn = seat.querySelector(".seat-info").getAttribute("data-seat-column");
                    return seatRow + "-" + seatColumn;
                }).join(",");
            }
        });
    </script>

    <script>
        function goBack(event) {
            event.preventDefault(); // Prevent the default behavior of the button click
            window.history.back();
        }
    </script>
</body>

</html>
