<!DOCTYPE html>
<html lang="en">
@include('public.header')
<link rel="stylesheet" href="{{ asset('assets/css/sweetalert2.min.css') }}">
<style>
    .md\:px-8 {
        padding-left: 2rem;
        padding-right: 2rem;
    }

    .ease-in-out {
        transition-timing-function: cubic-bezier(.4, 0, .2, 1);
    }

    .duration-500 {
        transition-duration: .5s;
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
                                @if (isset($data[$item->id]))
                                    @foreach ($data[$item->id] as $genre)
                                        {{ $genre->genre_name }}@if (!$loop->last)
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
                                <button class="btn-bookticket"
                                    style="  background-color:#12263f;border: 1px solid rgb(202, 71, 93);">
                                    <div class="dsadd">
                                        <span
                                            style="font-weight: 500;
                                    font-size: 16px;
                                    color: rgb(255, 255, 255);">
                                            Booking...</span>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container">
            <div class="content" style="margin-top:20px ">
                <h2 style="color:  black;font-weight:bold">Book the tickets</h2>
                <div class="row" style="background-color: #ffffff; border-radius:6px">
                    {{-- <div class="col-md-4">
                        <label class="form-label" style="color: black">Choose city</label>
                        <div class="form-control">
                            <select name="province" id="province" class="form-select">
                                <option selected value="">Select Province</option>
                                @foreach ($province as $item1)
                                    <option value="{{ $item1->id }}">{{ $item1->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}

                    <div class="col-md-4">
                        <label class="form-label" style="color: black">Pick a Date</label>
                        <input type="date" class="form-control datepicker" id="dateInput" name="date" />
                        <input type="hidden" id="movieID" value="{{ $item->id }}">

                    </div>
                    <div class="mb-4">
                        @foreach ($cinema as $cinemas)
                            @if ($cinemas->theaters->flatMap->shows->where('movie_id', $item->id)->isNotEmpty())
                                <div class="detail-booking-wrap">
                                    <div class="detail-group-cinema" id="cinemaList">
                                        @foreach ($province as $provinces)
                                        @if ($provinces->id == $cinemas->province)
                                            <div class="Title-Cinema">
                                                <h5>{{ $cinemas->name }} - {{ $provinces->name }}</h5>
                                            </div>
                                        @endif
                                    @endforeach
                                        <div class="item-cinema" id="itemList">
                                            2D-SUB:
                                            @foreach ($cinemas->theaters as $theater)
                                                @php
                                                    $filteredShows = $theater->shows->where('movie_id', $item->id);
                                                @endphp
                                                @if ($filteredShows->isNotEmpty())
                                                    @foreach ($filteredShows as $show)
                                                        @php
                                                            $startTime = substr($show->start_time, 0, 5);
                                                        @endphp
                                                        @if (empty(Auth::user()->id))
                                                            <button onclick="myFunction()"
                                                                class="py-2 md:px-8 px-6 border rounded text-sm font-normal text-black-10 hover:bg-blue-10 active:bg-blue-10 transition-all duration-500 ease-in-out hover:text-white">
                                                                {{ $startTime }}
                                                            </button>
                                                        @else
                                                            <a
                                                                href="{{ route('selectSeat', ['movieId' => $show->movie_id, 'cinemaId' => $cinemas->id, 'theaterId' => $show->theater_id, 'showId' => $show->id]) }}">
                                                                <button
                                                                    class="py-2 md:px-8 px-6 border rounded text-sm font-normal text-black-10 hover:bg-blue-10 active:bg-blue-10 transition-all duration-500 ease-in-out hover:text-white">
                                                                    {{ $startTime }}
                                                                </button>
                                                            </a>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <hr>
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
                                            style="border-radius: 8px 8px 0 0;width:100%;height: 300px;">
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
    <script src="{{ asset('assets/js/sweetalert2.all.min.js') }} "></script>
    @include('public.alert')
    <script>
        var currentUrl = window.location.href;
        var dateParam = currentUrl.split('/').pop();
        document.getElementById('dateInput').value = dateParam;
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
    <script>
        function myFunction() {
            Swal.fire({
                title: "Warning",
                text: "You need Signin to continue",
                icon: 'warning',
                confirmButtonColor: '#3085d6',
                confirmButtonText: "OK"
            });
        }
    </script>
    <script>
        document.getElementById('dateInput').addEventListener('change', function() {
            var selectedDate = document.getElementById('dateInput').value;
            var movieID = document.getElementById('movieID').value;
            var newUrl = "{{ route('getbooking', ['id' => ':movieID', 'date' => ':selectedDate']) }}";
            newUrl = newUrl.replace(':selectedDate', selectedDate);
            newUrl = newUrl.replace(':movieID', movieID);
            console.log('Generated URL:', newUrl);
            window.location.href = newUrl;
        });
    </script>


    {{-- <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            var provinceDropdown = document.getElementById('province');
            var cinemaList = document.getElementById('cinemaList');
            displayAllCinemas();
            provinceDropdown.addEventListener('change', function() {
                var provinceId = this.value;

                cinemaList.innerHTML = '';

                if (provinceId === '') {
                    displayAllCinemas();
                } else {
                    fetchCinemasByProvince(provinceId);
                }
            });

            function displayAllCinemas() {
                cinemaList.innerHTML = '';
                var xhr = new XMLHttpRequest();
                xhr.open('GET', '/getCinema', true);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4) {
                        if (xhr.status === 200) {
                            var cinemas = JSON.parse(xhr.responseText);

                            cinemas.forEach(function(cinema) {
                                var cinemaDiv = createCinemaDiv(cinema.name);
                                cinemaList.appendChild(cinemaDiv);
                            });
                        } else {
                            console.error('Error fetching cinemas');
                        }
                    }
                };
                xhr.send();
            }

            function fetchCinemasByProvince(provinceId) {
                var cinemaRequest = new XMLHttpRequest();
                cinemaRequest.open('get', '/getCinema/' + provinceId, true);
                cinemaRequest.onreadystatechange = function() {
                    if (cinemaRequest.readyState === 4) {
                        if (cinemaRequest.status === 200) {
                            var cinemas = JSON.parse(cinemaRequest.responseText);
                            cinemas.forEach(function(cinema) {
                                var cinemaDiv = createCinemaDiv(cinema.name);
                                cinemaList.appendChild(cinemaDiv);
                            });
                        } else {
                            console.error('Error fetching cinemas');
                        }
                    }
                };
                cinemaRequest.send();
            }

            function createCinemaDiv(cinemaName) {
                var cinemaDiv = document.createElement('div');
                cinemaDiv.classList.add('detail-group-cinema');
                var titleCinemaDiv = document.createElement('div');
                titleCinemaDiv.classList.add('Title-Cinema');
                var title = document.createElement('h5');
                title.textContent = cinemaName;
                titleCinemaDiv.appendChild(title);
                var itemCinemaDiv = document.createElement('div');
                itemCinemaDiv.classList.add('item-cinema');
                itemCinemaDiv.textContent = '2-D Phụ đề';
                cinemaDiv.appendChild(titleCinemaDiv);
                cinemaDiv.appendChild(itemCinemaDiv);
                return cinemaDiv;
            }
        });
    </script> --}}

</body>

</html>
