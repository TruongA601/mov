<!DOCTYPE html>
<html lang="en">
@include('public.header')

<head>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap5/css/flickity.min.css') }}">
    <script src="{{ asset('assets/bootstrap5/js/flickity.pkgd.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/sweetalert2.min.css') }}">
</head>
<style>
    .carousel-cell {
        width: 60%;
        height: 300px;
        margin-right: 10px;
        border-radius: 5px;
        counter-increment: gallery-cell;
    }

    .carousel-cell:before {
        display: block;
        text-align: center;
        line-height: 200px;
        font-size: 80px;

    }

    .carousel-cell img {
        width: 100%;
        height: 100%;
    }

    .lmm3 {
        display: flex;
        -webkit-box-align: center;
        align-items: center;
        -webkit-box-pack: center;
        justify-content: center;
        position: absolute;
        cursor: pointer;
        width: 40px;
        height: 40px;
        background-color: rgb(153, 153, 153);
        top: calc(156.46px);
        border-radius: 20px;

    }
</style>

<body class="">
    @include('home.topbar')
    <div class="">
        <div class="carousel" data-flickity='{ "autoPlay": true , "wrapAround": true }'>
            @foreach ($banner as $banners)
                <div class="carousel-cell"> <img src="{{ URL::to('uploads/banners/' . $banners->image) }}"
                        alt="...">
                </div>
            @endforeach
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-9 mx-0">
                <br>
                <div class="title-recomended">
                    <h6 class="text-head-home">Recommended Movies </h6>
                    <a href="{{ route('allmovie') }}" class="title-seeall" style="color:red;">See all ></a>
                </div>
                <div class="card">
                    <div class="card-body-re ">
                        @foreach ($recomendmovies as $item1)
                            <div class="abc ">
                                <a href="{{ url('moviedetail/' . $item1->id) }}">
                                    <div>
                                        <div class="abcde">
                                            <img src="{{ URL::to('uploads/movies/' . $item1->poster) }}" alt=""
                                                style="border-radius: 8px 8px 0 0;width: 100%; height: 300px;">
                                        </div>
                                    </div>
                                    <div class="text-name-movies">
                                        <div class="movie-name-1">
                                            <div class="name-movie">{{ $item1->name }}</div>
                                        </div>
                                        <div class="movie-name-2">
                                            <div class="date-movie">{{ date('d/m/Y', strtotime($item1->daterelease)) }}
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-9-mx-0">
                <br>
                <div class="title-recomended">
                    <h6 class="text-head-home">Now Showing</h6>
                    <a href="{{ route('allmovie') }}" class="title-seeall" style="color:red;">See all ></a>
                </div>
                <div class="card">
                    <div class="card-body ">
                        @foreach ($movies as $item)
                            <div class="abc">
                                <a href="{{ url('moviedetail/' . $item->id) }}">
                                    <div>
                                        <div class="abcde">
                                            <img src="{{ URL::to('uploads/movies/' . $item->poster) }}" alt=""
                                                style="border-radius: 8px 8px 0 0;width: 100%; height: 300px;">
                                        </div>
                                    </div>
                                    <div class="text-name-movies">
                                        <div class="movie-name-1">
                                            <div class="name-movie">{{ $item->name }}</div>
                                        </div>
                                        <div class="movie-name-2">
                                            <div class="date-movie">{{ date('d/m/Y', strtotime($item->daterelease)) }}
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-9-mx-0">
                <br>
                <div class="title-recomended">
                    <h6 class="text-head-home">Coming Soon </h6>
                    <a href="{{ route('comingmovie') }}" class="title-seeall" style="color:red;">See all ></a>
                </div>
                <div class="card">
                    <div class="card-body ">
                        @foreach ($coming as $comings)
                            <div class="abc">
                                <a href="{{ url('moviedetail/' . $comings->id) }}">
                                    <div>

                                        <div class="abcde">
                                            <img src="{{ URL::to('uploads/movies/' . $comings->poster) }}"
                                                alt=""
                                                style="border-radius: 8px 8px 0 0;width: 100%; height: 300px;">
                                        </div>
                                    </div>
                                    <div class="text-name-movies">
                                        <div class="movie-name-1">
                                            <div class="name-movie">{{ $comings->name }}</div>
                                        </div>
                                        <div class="movie-name-2">
                                            <div class="date-movie">
                                                {{ date('d/m/Y', strtotime($comings->daterelease)) }}
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <button id="back-to-top" onclick="topFunction()">
            <i class="fas fa-arrow-up"></i>
        </button>
    </div>

    @include('home.foot')
    <script src="{{ asset('assets/js/sweetalert2.all.min.js') }} "></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @include('public.footer')
    @include('public.alert')
    <script>
        $(document).ready(function() {
            $('.main-gallery').flickity({
                cellAlign: 'left',
                contain: true
            });
        });
    </script>




</body>

</html>
