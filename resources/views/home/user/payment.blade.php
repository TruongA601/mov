<!DOCTYPE html>
<html lang="en">

@include('public.header')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{ asset('assets/css/sweetalert2.min.css') }}">
<style>
    .ticketing-step {
        margin-top: 5px;

        color: #95aac9;
        padding: 10px 0 5px;
        text-align: center;
    }

    .card-body-payment {
        flex: 1 1 auto;
        padding: 1.5rem;
    }

    .clearfix.flow-actions.sticky-button-bars {
        display: flex;
        justify-content: space-between;
        align-items: center;
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
            <div class="header mb-3"></div>
            <form name="orn_ticketing_order_customer" method="post" id="orderCheckoutForm"
                action="{{ route('ticketdetail') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="col-lg-8 col-12">
                        <div class="ticketing-content ticketing-checkout-page">
                            <div class="card">
                                <div class="card-header bg-light">
                                    <div class="card-header-title text-muted">
                                        Order Summary
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table card-table">
                                        <thead>
                                            <tr>
                                                <th>Describe</th>
                                                <th class="text-center">Quantity</th>
                                                <th class="text-right">Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Seat</td>
                                                <td class="text-center">
                                                    {{ count(explode(',', $data['selected_seats'])) }}</td>
                                                <td class="text-right"></td>
                                                <input type="hidden" name="selectedSeats" id="selectedSeats"
                                                    value="{{ $data['selectedSeats'] }}"> {{-- id ghe --}}

                                            </tr>
                                            <tr>
                                                <td>Show price</td>
                                                <td class="text-center"> </td>
                                                <td class="text-right">{{ $data['show_price'] }} đ</td>
                                                <input type="hidden" name="show_price"
                                                    value="{{ $data['show_price'] }}"> {{-- gia suat chieu --}}
                                            </tr>
                                            <tr>
                                                <td colspan="2">Total</td>
                                                <td class="text-right">{{ $data['total_price'] }} đ</td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header bg-light">
                                    <div class="card-header-title text-muted">
                                        Order Detail
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table card-table">
                                        <tbody>
                                            <tr>
                                                <td>Movie</td>
                                                <td class="text-center"> {{ $data['movie_name'] }}</td>
                                                <input type="hidden" name="movie_name"
                                                    value="{{ $data['movie_name'] }}">{{-- ten phim --}}
                                            </tr>
                                            <tr>
                                                <td>Cinema</td>
                                                <td class="text-center">{{ $data['cinema_name'] }} </td>
                                                <input type="hidden" name="cinema_name"
                                                    value="{{ $data['cinema_name'] }}">{{-- ten rap --}}
                                            </tr>
                                            <tr>
                                                <td>Theater</td>
                                                <td class="text-center">{{ $data['theater_name'] }} </td>
                                                <input type="hidden" name="theater_name"
                                                    value="{{ $data['theater_name'] }}">{{-- ten phong chieu --}}
                                            </tr>
                                            <tr>
                                                <td>Seat</td>
                                                <td class="text-center">{{ $data['selected_seats'] }}</td>
                                                <input type="hidden" name="selected_seats"
                                                    value="{{ $data['selected_seats'] }}">{{-- ten ghe --}}
                                            </tr>
                                            <tr>
                                                <td>Date - time</td>
                                                <td class="text-center">{{ $data['show_date'] }} -
                                                    {{ $data['start_time'] }}</td>
                                                <input type="hidden" name="show_date"
                                                    value="{{ $data['show_date'] }}">{{-- ngay chieu --}}
                                                <input type="hidden" name="start_time"
                                                    value="{{ $data['start_time'] }}">{{-- gio chieu --}}
                                                <input type="hidden" name="show_id"
                                                    value="{{ $data['show_id'] }}">{{-- suat chieu --}}
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <input type="hidden" name="theater_id" value="{{ $data['theater_id'] }}">
                            <input type="hidden" name="cinema_id" value="{{ $data['cinema_id'] }}">
                            <input type="hidden" name="movie_id" value="{{ $data['movie_id']}}">
                            <div class="card">
                                <div class="card-header bg-light">
                                    <div class="card-header-title text-muted">
                                        Personal infomation
                                    </div>
                                </div>
                                <div class="card-body-payment">
                                    <div class="form-group"><label for="username">Username</label><input type="text"
                                            id="username" name="username" class="form-control"
                                            value=" @php echo Auth::User()->username; @endphp" /> </div>
                                    {{-- ten nguoi dung --}}
                                    <input type="hidden" id="user_id" name="user_id"
                                        value="@php echo Auth::User()->id; @endphp" /> {{-- id nguoi dung --}}

                                    <div class="form-group"><label for="email" class="required">Email</label><input
                                            type="email" id="email" name="email" required="required"
                                            class="form-control" value="@php echo Auth::User()->email; @endphp" />
                                        {{-- email --}}
                                    </div>
                                    <div class="form-group"><label for="phone" class="required">Phone
                                            number</label><input type="tel" id="phone" name="phone[phone]"
                                            required="required" class="form-control"
                                            value="@php echo Auth::User()->phone; @endphp" /> {{-- phone --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12 order-sm-last">
                        <div class="card sticky-header-bars">
                            <div class="card-body-payment">
                                <div class="row align-items-center" style="    align-items: center;">
                                    <div class="col text-right">
                                        <h6 class="card-title text-muted mb-2">
                                            Tổng đơn hàng
                                        </h6>
                                        <span class=" mb-0 ticketing-total-amount">
                                            {{ $data['total_price'] }} vnđ
                                            <input type="hidden" name="total_price"
                                                value="{{ $data['total_price'] }}">{{-- tong tien --}}
                                        </span>
                                    </div>
                                    <div class="col text-right border-left ticketing-countdown-timer">
                                        <h6 class="card-title text-muted mb-2">
                                            Thời gian giữ ghế
                                        </h6>
                                        <span class=" mb-0 countdown-timer" id="holdTime">
                                            05:00
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card d-none d-lg-block">
                            <div class="card-body-payment">
                                Vé đã mua không thể đổi hoặc hoàn tiền.<br />Mã vé sẽ được gửi <strong>01</strong> lần
                                qua email của bạn. Vui lòng kiểm tra lại thông tin trước khi tiếp tục.
                            </div>
                        </div>
                        <p class="clearfix flow-actions sticky-button-bars">
                            <button class="btn btn-outline-secondary" onclick="goBack(event)"><i
                                    class="fa-solid fa-arrow-left"></i></button>
                            <button type="submit"
                                class="btn btn-lg btn-dark btn-block btn-ticketing-flow btn-do-form-submit"
                                id="ticketing-order-customer-form-submit" onclick="confirmPayment(event)">Thanh
                                toán</button>
                        </p>
                    </div>
                </div>
            </form>
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
        document.addEventListener("DOMContentLoaded", function() {
            let holdTimeInSeconds = 300; // 5 min = 300
           
            function updateHoldTime() {
                const holdTimeElement = document.getElementById("holdTime");
                const minutes = Math.floor(holdTimeInSeconds / 60);
                const seconds = holdTimeInSeconds % 60;
                const formattedTime = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
                holdTimeElement.textContent = formattedTime;
            }

            function releaseSeats() {
                const selectedSeats = document.getElementById('selectedSeats').value;
                $.ajax({
                    url: '{{ route('release-seats') }}',
                    type: 'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        selectedSeats: selectedSeats
                    },
                    success: function(response) {
                        // You can handle success if needed
                    },
                    error: function(xhr) {
                        Swal.fire(
                            'Error!',
                            'An error occurred.',
                            'error'
                        );
                    }
                });
            }

            function handleUnload(event) {
                releaseSeats();
                event.returnValue = null;
                return null;
            }

            window.addEventListener('beforeunload', handleUnload);

            const holdTimer = setInterval(function() {
                const paymentButton = document.getElementById("ticketing-order-customer-form-submit");
                if (holdTimeInSeconds > 0) {
                    holdTimeInSeconds--;
                    updateHoldTime();
                } else {
                    clearInterval(holdTimer);
                    releaseSeats();
                    Swal.fire({
                        title: 'Your hold time expired',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    });
                    paymentButton.disabled = true;
                }
            }, 1000);
        });
    </script>

    <script>
        function goBack(event) {
            event.preventDefault();
            window.history.back();
        }
    </script>
    <script>
        function confirmPayment(event) {
            event.preventDefault();

            Swal.fire({
                title: 'Xác nhận thanh toán',
                text: 'Bạn sẽ không thể hoàn tiền và vé sau khi thanh toán',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Đồng ý',
                cancelButtonText: 'Hủy bỏ'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById("orderCheckoutForm").submit();
                }
            });
        }
    </script>
      
</body>

</html>
