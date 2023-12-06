<!DOCTYPE html>
<html lang="en">
@include('public.header')

<link rel="stylesheet" href="{{ asset('assets/css/sweetalert2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/drag-drop-file.css') }}" />
<link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
<style>
    .file-drop-area {
        width: 250px;
        height: 250px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        border: 2px dashed #ccc;
        border-radius: 50%;
        overflow: hidden;
        position: relative;
    }

    #previewIMG {
        width: 100%;
        height: 100%;
        max-width: 250px;
        max-height: 250px;
        object-fit: cover;
        position: absolute;
    }

    .breadcrumb_nobackground {
        display: block;
        width: 100%;
        overflow: hidden;
        margin-bottom: 20px !important;
    }

    .breadcrumb_nobackground .bread-crumb {
        display: block;
        width: 100%;
        background: #fff;
    }

    .breadcrumb_nobackground .bread-crumb .breadcrumb {
        margin: 0;
        font-size: 14px;
        padding: 15px 0;
        border-radius: 0;
        text-align: left;
    }

    .breadcrumb li {
        display: inline;
    }

    .breadcrumb_nobackground .bread-crumb .breadcrumb li .mr_lr {
        color: #000;
    }

    .breadcrumb li .mr_lr {
        padding: 0px 3px;
        color: #fff;
    }

    .breadcrumb li a:hover,
    .breadcrumb li.active,
    .breadcrumb li strong {
        color: #ff9897;
        font-weight: 400;
        text-decoration: none;
    }


    .col-left-ac .block-account .title-account {
        font-size: 19px;
        font-weight: 400;
        color: #212B25;
        margin-top: 0;
        margin-bottom: 15px;
        text-transform: uppercase;
    }

    .col-left-ac .block-account p {
        font-weight: 700;
        font-size: 14px;
        line-height: 16px;
        margin-bottom: 28px;
        color: #212B25;
        position: relative;
    }

    .col-left-ac .block-account ul {
        padding: 0;
        margin: 0;
    }

    .col-left-ac .block-account ul .title-info.active {
        color: #ff9897;
    }

    .col-left-ac .block-account ul .title-info {
        font-weight: 400;
        font-size: 14px;
        color: #212B25;
        margin-bottom: 22px;
        display: block;
    }

    a,
    .text-link {
        color: #000;
        text-decoration: none;
        background: transparent;
    }

    .col-left-ac .block-account ul .title-info {
        font-weight: 400;
        font-size: 14px;
        color: #212B25;
        margin-bottom: 22px;
        display: block;
    }

    .content_box-account {
        padding-top: 32px;
        padding-right: auto;
    }

    .tab_box-account {
        width: 100%;
        display: flex;
        /* justify-content: space-around; */
        align-items: center;
        border-bottom: 1px solid #95aac9;
        font-size: 18px;
        font-weight: 600;
    }

    .font-weight-bold {
        color: black;
    }
</style>
@php
    use App\Models\User;
    $user = User::where('id', Auth::user()->id)->first();
@endphp

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
        <div class="row">
            <form class="row g-3 needs-validation" action="{{ URL::to('user-update/' . $user->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="col-xs-12 col-sm-12 col-lg-3 col-left-ac">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-2">
                        <div class="file-drop-area rounded-circle mt-5">
                            <input type="file" id="avatar" name="avatar" src="#"
                                onchange="previewPoster(this);" class="file-drop-input image-preview" accept="image/*">

                            <img class="rounded-circle" id="previewIMG"
                                src="{{ URL::to('uploads/avatars/' . $user->avatar) }}">
                        </div>
                        <br>
                        <span class="font-weight-bold">{{ $user->username }}</span>
                        <span class="font-weight-bold"> {{ $user->email }} </span>
                        <span></span>
                    </div>

                </div>
                <div class="col-xs-12 col-sm-12 col-lg-9 col-right-ac">
                    <div class="p-3 py-2">
                        <div class="tab_box"
                            style="    width: 100%;height:30px; margin-top:35px;
                        display: flex;
                        justify-content: flex-start;
                        align-items: center;
                       border-bottom: none;
                        font-weight: 600;">
                            <a type="button" class="tab_btn active">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right">Your Profile</h4>
                                </div>
                            </a>
                            <a type="button" class="tab_btn">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right">Your Order</h4>
                                </div>
                            </a>
                        </div>
                        <div class="content_box" style="padding-top: 0;
                        padding-right: 0;">
                            <div class="content active">
                                <div class="row mt-3" >
                                    <div class="col-md-12"><label class="labels">Username</label><input type="text"
                                            class="form-control" id="username" name="username"
                                            value="{{ $user->username }}">
                                    </div>
                                    <div class="col-md-12"><label class="labels">Email</label><input type="text"
                                            class="form-control" id="email" name="email"
                                            value="{{ $user->email }}" disabled>
                                    </div>
                                    <div class="col-md-12"><label class="labels">Password</label>
                                        <div class="input-group" id="show_hide_password">
                                            <input type="password" class="form-control border-end-0" id="password"
                                                name="password" value="{{ $user->password }}">

                                            <a href="javascript:;" class="input-group-text bg-transparent"><i
                                                    class="bx bx-hide"></i></a>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control border-end-0" id="old_password"
                                        name="old_password" value="{{ $user->password }}" hidden>
                                    <div class="col-md-12"><label class="labels">Phone
                                            number</label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                            value="{{ $user->phone }}">
                                    </div>

                                </div>
                                <div class="row mt-3" style="margin-bottom: 70px;">
                                    <div class="col">
                                        <button class="btn btn-primary" type="submit">Update</button>
                                        <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                                    </div>
                                </div>
                            </div>

                            <div class="content">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Showtime</th>
                                                <th>Movie</th>
                                                <th>Booking Time</th>
                                                <th>Total Price</th>
                                                <th>tool</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($booking as $bookings)
                                                <tr>
                                                    <td>{{ $bookings->booking_id }}</td>
                                                    <td>{{ $bookings->show_time }}</td>
                                                    <td>{{ $bookings->movie_name }}</td>
                                                    <td>{{ date('d/m/Y H:i:s', strtotime($bookings->booking_time)) }}
                                                    </td>
                                                    <td>{{ $bookings->total_price }}</td>
                                                    <td>
                                                        <p class="btn btn-sm btn-default"><a
                                                                href="{{ url('bookingdetail/' . $bookings->booking_id) }}">
                                                                <i class="fa fa-edit"></i> </a></p>
                                                        <p class="btn btn-sm btn-default">
                                                            <a href="{{ url('booking-delete/' . $bookings->booking_id) }}"
                                                                onclick="functionDelete(event)"><i
                                                                    class="fa fa-trash"></i>
                                                            </a>
                                                        </p>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Showtime</th>
                                                <th>Movie</th>
                                                <th>Booking Time</th>
                                                <th>Total Price</th>
                                                <th>tool</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="container" style="margin-bottom:0px">
        <button id="back-to-top" onclick="topFunction()"><i class="fas fa-arrow-up"></i></button>
    </div>
    @include('home.foot')
    <script src="{{ asset('assets/js/sweetalert2.all.min.js') }} "></script>
    @include('public.footer')
    @include('public.alert')
    <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            //Default data table
            $('#example').DataTable();
            var table = $('#example2').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
            });
            table.buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
        });
    </script>
    <script>
        function previewPoster(input) {
            var file = $(".image-preview").get(0).files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function() {
                    $("#previewIMG").attr("src", reader.result);
                    $("#file-drop-message").hide();
                    $("#file-drop-icon").hide();
                }
                reader.readAsDataURL(file);
            }
        }
    </script>

    <script>
        function previewBackground(input) {
            var file = $(".image-preview1").get(0).files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function() {
                    $("#previewBackgroundIMG").attr("src", reader.result);
                    $("#file-drop-message1").hide();
                    $("#file-drop-icon1").hide();
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bx-hide");
                    $('#show_hide_password i').removeClass("bx-show");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bx-hide");
                    $('#show_hide_password i').addClass("bx-show");
                }
            });
        });
    </script>
    <script>
        const tabs = document.querySelectorAll('.tab_btn');
        const all_content = document.querySelectorAll('.content');

        tabs.forEach((tab, index) => {
            tab.addEventListener('click', (e) => {
                tabs.forEach(tab => {
                    tab.classList.remove('active')
                });
                tab.classList.add('active');
                all_content.forEach(content => {
                    content.classList.remove('active')
                });
                all_content[index].classList.add('active');
            })
        })
    </script>
</body>

</html>
