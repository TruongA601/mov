<!DOCTYPE html>
<html lang="en">
@include('public.header')
<link rel="stylesheet" href="{{ asset('assets/css/sweetalert2.min.css') }}">
@php
use Carbon\Carbon;
$currentdate = Carbon::now()->toDateString();
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
                    {{-- <div class="search-bar" onclick="toggleSearchForm()">
                        <div class="search1">
                            <span class="fas fa-search" style="margin: 5px;"></span>
                            <span class="input-text" style="margin-left:10px ">search for movies</span>
                        </div>
                    </div> --}}
                </div>
                <style>
                </style>
                <div class="right-topbar-home">
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
    @foreach ($movies as $item)
        <section class="section-movie-detail">
            <div class="background-movie-detail"
                style="background-image:linear-gradient(90deg, #1A1A1A 24.97%, #1A1A1A 38.3%, rgba(26, 26, 26, 0.0409746) 97.47%, #1A1A1A 100%),
           url(' {{ URL::to('uploads/movies/' . $item->background) }}');">
                <div class="movie-detail">
                    <div class="postermovie-detail">
                        <section class="poster-qewe">
                            <div type="vertical" class="poster-sadad">
                                <div class="poster-sadaf">
                                    <img style="border-radius: 8px 8px 0 0;width:100%; height:300px"
                                        src="{{ URL::to('uploads/movies/' . $item->poster) }}" alt="">
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="detail-name">
                        <h1 class="name-movie-detail">{{ $item->name }}</h1>
                        <div class="bfgdfg">
                            <div class="sadasf">
                                <span class="dot-span"> • </span>
                                @if (isset($genre[$item->id]))
                                    @foreach ($genre[$item->id] as $genres)
                                        {{ $genres->genre_name }}@if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                @else
                                    No genre found.
                                @endif
                                <span class="dot-span"> • </span>
                            </div>
                            <div class="sadasf">
                                <div class="item-boxx">
                                    <div><i class="far fa-clock"></i> Duration </div>
                                    {{ $item->duration }} min
                                </div>
                                <div class="item-boxx">
                                    <div><i class="fas fa-calendar-alt"></i> Release </div>
                                    {{ $item->daterelease }}
                                </div>
                                <div class="item-boxx">
                                    <div><i class="fas fa-user"></i> Director</div>
                                    {{ $item->director }}
                                </div>
                            </div>
                        </div>
                        <div class="poihj">
                            <div class="sdjaaff">

                                <a href="{{ route('getbooking', ['id' => $item->id, 'date' => $currentdate]) }}"
                                    class="btn-bookticket">
                                    <div class="dsadd">
                                        <span
                                            style="font-weight: 500;
                                            font-size: 16px;
                                            color: rgb(255, 255, 255);">
                                            Book Tickets
                                        </span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container">
            <div class="tab_box">
                <button class="tab_btn active">About Movie</button>
                <button class="tab_btn">Trailer</button>
            </div>
            <div class="content_box ">
                <div class="content active">
                    <h2>About</h2>
                    <p>
                        {{ $item->description }}
                    </p>
                    <hr>
                    <h2>Actor</h2>
                    <style>
                        .actor-box {
                            display: inline-block;
                            border: 1px solid #ccc;
                            padding: 5px;
                            margin: 5px;
                            border-radius: 5px;
                            color: black;
                        }
                    </style>

                    @if (isset($actor[$item->id]))
                        @foreach ($actor[$item->id] as $actors)
                            <div class="actor-box">
                                {{ $actors->actor_name }}
                            </div>
                        @endforeach
                    @else
                        <div class="actor-box">
                            No actor found.
                        </div>
                    @endif
                    <hr>
                </div>
                <style>
                    #youtubeVideo.container-link-trailer {
                        width: 912px;
                        height: 513px;
                    }

                    @media (max-width:912px) {
                        #youtubeVideo.container-link-trailer {
                            width: 704px;
                            height: 396px;
                        }
                    }

                    @media (max-width: 580px) {
                        #youtubeVideo.container-link-trailer {
                            width: 352px;
                            height: 198px;
                        }
                    }
                </style>
                <div class="content">
                    <h2>Trailer</h2>
                    <div id="youtubeVideo" class="container-link-trailer">
                    </div>
                    <hr>
                </div>
            </div>
        </div>
        <div class="container">
            <h2 style="color: black">You might also like</h2>
            <div class="card">
                <div class="card-body-re">
                    @foreach ($recomendmovies as $item2)
                        <div class="abc">
                            <a href="{{ url('moviedetail/' . $item2->id) }}">
                                <div>
                                    <div></div>
                                    <div></div>
                                    <div class="abcde">
                                        <img src="{{ URL::to('uploads/movies/' . $item2->poster) }}" alt=""
                                            style="border-radius: 8px 8px 0 0;width: 100%; height: 300px;">
                                    </div>
                                </div>
                                <div class="text-name-movies">
                                    <div class="movie-name-1">
                                        <div class="name-movie">{{ $item2->name }}</div>
                                    </div>
                                    <div class="movie-name-2">
                                        <div class="date-movie">{{ $item2->daterelease }}</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    @endforeach
    <div class="container">
        <button id="back-to-top" onclick="topFunction()"><i class="fas fa-arrow-up"></i></button>
    </div>
    @include('home.foot')
    @include('public.footer')
    @include('public.alert')
    <script src="{{ asset('assets/js/sweetalert2.all.min.js') }} "></script>
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
    <script>
        function getSrcYoutube(url) {
            const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/;
            const match = url.match(regExp);
            const ID = (match && match[2].length === 11) ? match[2] : null;
            return 'https://www.youtube.com/embed/' + ID;
        }
        const videoURL = "<?php echo $item->trailer; ?>";
        const embedURL = getSrcYoutube(videoURL);
        const iframe = document.createElement('iframe');
        iframe.width = '100%';
        iframe.height = '100%';
        iframe.src = embedURL;
        iframe.frameborder = '0';
        iframe.allow =
            'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share';
        iframe.allowfullscreen = true;
        document.getElementById('youtubeVideo').appendChild(iframe);
    </script>


</body>

</html>
