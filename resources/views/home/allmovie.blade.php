<!DOCTYPE html>
<html lang="en">
@include('public.header')

<head>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap5/css/flickity.min.css') }}">
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

    .qwer {
        display: flex;
        margin-top: 50px;

    }

    .filter-1 {
        display: block;
        width: 300px;
        margin-right: 30px;
        background-color: rgba(189, 112, 112, 0);
    }

    .filter-2 {
        display: flex;
        flex-direction: column;
    }

    .filter-3 {
        display: flex;
        -webkit-box-align: center;
        align-items: center;
        width: 100%;
        margin-bottom: 0px;
        background-color: rgba(255, 255, 255, 0);
        height: 100%;
    }

    .filter-4 {
        display: flex;
        flex-direction: column;
        height: calc(100vh - 112px);
        /* overflow-y: scroll; */
        scroll-behavior: smooth;
    }

    .filter-head-text {
        text-align: left;
        font-size: 24px;
        font-weight: 700;
        line-height: 30px;
        color: rgb(51, 51, 51);
        text-transform: capitalize;
    }

    .all-movie-1 {
        width: calc(92vw - 330px);
        max-width: calc(910px);
        padding-bottom: 0px;
        background-color: rgba(255, 255, 255, 0)
    }

    .genres {
        display: flex;
        flex-flow: column wrap;
        flex-direction: row;
    }

    .item-genre {
        display: flex;
        position: relative;
        overflow: hidden;
        -webkit-box-align: center;
        align-items: center;
        -webkit-box-pack: center;
        justify-content: center;
        cursor: pointer;
        white-space: nowrap;
        border-radius: 0px;
        padding: 0px 12px;
        height: 28px;
        background-color: rgb(255, 255, 255);
        border: 1px solid rgb(229, 229, 229);
        opacity: 1;
        margin: 2px;
    }


    .item-genre.selected {
        background-color: rgb(235, 78, 98) !important;
        color: white;
    }

    .heee {
        background-color: #cad7e5;
        width: 100%;
        height: 50px;
        margin-top: 10px;
        margin-bottom: 20px;
        border-radius: 5px;
        display: flex;
        justify-content: space-between;
        align-items: center;

    }

    .text-left {
        margin-left: 5px;
        color: black;
        font-size: 12px;
        font-weight: bold;
    }

    .text-right {
        margin-right: 5px;
        color: red;
        font-size: 10px;
    }
</style>

<body class="">
    @include('home.topbar')
    <div class="carousel" data-flickity='{ "autoPlay": true , "wrapAround": true }'>
        @foreach ($banner as $banners)
            <div class="carousel-cell"> <img src="{{ URL::to('uploads/banners/' . $banners->image) }}" alt="...">
            </div>
        @endforeach
    </div>
    <div class="container">
        <div class="qwer">
            <div class="filter-1">
                <div class="filter-2">
                    <div class="filter-3">
                        <div class="filter-head-text">
                            Filter
                        </div>

                    </div>
                </div>
                <hr>
                <div class="filter-4">
                    <h6>Genres</h6>
                    <form id="filterForm" method="GET" action="{{ route('allmovie.filter') }}">
                        <div class="genres">
                            @foreach ($genres as $genre)
                                <div class="item-genre" data-genre-id="{{ $genre->id }}">
                                    <label>{{ $genre->genre_name }}</label>
                                </div>
                            @endforeach
                        </div>
                        <button type="button" id="filterButton" class="btn btn-primary"
                            style="width:100%">Execute</button>
                        <input type="hidden" name="genre" id="selectedGenres" value="">
                    </form>

                </div>
            </div>
            <div class="all-movie-1">
                <div class="filter-head-text">
                    Movies
                </div>

                <div class="row">
                    <div class="col-xl-12">
                        <a href="{{ route('comingmovie') }}">
                            <div class="heee">
                                <div class="text-left">
                                    Coming Soon
                                </div>
                                <div class="text-right">
                                    Explore Upcoming Movies >
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-12">
                        <div class="movies">
                            <div class="row">
                                @foreach ($movies as $movie)
                                    <div class="col-md-3 mb-4">
                                        <div class="movie">
                                            <a href="{{ url('moviedetail/' . $movie->id) }}">
                                                <div class="abcde">
                                                    <img src="{{ URL::to('uploads/movies/' . $movie->poster) }}"
                                                        alt=""
                                                        style="border-radius: 8px; width: 100%; height: 300px;">
                                                </div>
                                                <div class="text-name-movies">
                                                    <div class="movie-name-1">
                                                        <div class="name-movie">{{ $movie->name }}</div>
                                                    </div>
                                                    <div class="movie-name-2">
                                                        <div class="date-movie">
                                                            {{ date('d/m/Y', strtotime($movie->daterelease)) }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
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
    <script src="{{ asset('assets/bootstrap5/js/flickity.pkgd.min.js') }}"></script>
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
    <script>
        $(document).ready(function() {
            $('.item-genre').on('click', function() {
                $(this).toggleClass('selected');
                updateSelectedGenres();
            });
            $('#filterButton').on('click', function() {

                $('#filterForm').submit();
            });
            function updateSelectedGenres() {
                var selectedGenres = $('.item-genre.selected').map(function() {
                    return $(this).data('genre-id');
                }).get();
                $('#selectedGenres').val(selectedGenres.join(','));
            }
            var urlParams = new URLSearchParams(window.location.search);
            var selectedGenresFromUrl = urlParams.get('genre');
            if (selectedGenresFromUrl) {
                var selectedGenresArray = selectedGenresFromUrl.split(',');
                selectedGenresArray.forEach(function(genreId) {
                    $('.item-genre[data-genre-id="' + genreId + '"]').addClass('selected');
                });
                updateSelectedGenres();
            }
        });
    </script>
</body>

</html>
