<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.header')
    <style>
        .movie-list {
            display: flex;
            background-color: rgb(231, 231, 231);
            margin-bottom: 10px;
            border-radius: 5px;
            color: black;
            padding: 10px;
        }

        .movie-list img {
            width: 100px;
        }

        .movie-list h2 {
            font-size: 20px;
        }

        .detail-group-theater {
            width: 100%;
            height: 100%;
            margin-bottom: 10px;
        }

        .Title-Theater {
            position: relative;
            box-sizing: border-box;
            height: 40px;
            width: 200px;
            padding: 7px 20px;
            background-color: #ca475d;
            color: #ffffff;
        }

        .item-theater {
            padding: 35px 20px 25px 20px;
            border: 1px solid #a0a3a7;
            clear: both;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        @include('admin.layouts.sidebar')
        @include('admin.layouts.navbar')
        <div class="page-wrapper">
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">Movie</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"><i
                                                class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Movie list</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Showtimes</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h4 class="mb-0 inline-blk" style="display:inline-block">Showtimes</h4>
                                <div class="" style="float: right;display:inline-block">
                                </div>
                            </div>
                            <hr />
                            <form action="{{ route('create-show') }}"method="POST" enctype="multipart/form-data">
                                @csrf
                                @foreach ($movies as $item)
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="movie-list" data-movie-id="{{ $item->id }}">
                                                <div class="row">
                                                    <img style="width: 145px"
                                                        src="{{ URL::to('uploads/movies/' . $item->poster) }}"
                                                        alt="">
                                                    <div class="col">
                                                        <h2>{{ $item->name }}</h2>
                                                        <br>
                                                        <span>Release: {{ $item->daterelease }}</span>
                                                    </div>

                                                    <input type="text" name="movie_id" id="movie_id" hidden
                                                        value="{{ $item->id }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label"style="color: black">Show Date</label>
                                            <input type="date" name="date_show" id="date_show" class="form-control "
                                                required />
                                            <label class="form-label">Show Time</label>
                                            <input type="time" name="start_time" id="start_time" class="form-control"
                                                required />
                                            <label class="form-label">Price</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="price" id="price"
                                                    class="form-control row-md-2" placeholder="100000" required />
                                                <span class="input-group-text">VND</span>
                                            </div>

                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" style="color: black">Choose Cinema</label>
                                            <select name="cinema" id="cinema" class="form-select">
                                                <option value="">Select Cinema</option>
                                                @foreach ($cinemas as $cinema)
                                                    <option value="{{ $cinema->id }}">{{ $cinema->name }}</option>
                                                @endforeach
                                            </select>
                                            <label class="form-label" style="color: black">Choose Theater</label>
                                            <select name="theater_id" id="theater_id" class="form-select" required>
                                                <option value="">Select Theater</option>
                                            </select>
                                            <div class="button-create"
                                                style="display:flex; justify-content:end; margin-top: 1rem">
                                                <button class="btn btn-primary" type="submit" title="create showtime">
                                                    Create</button>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                            </form>
                            <br>
                            <hr>
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Movie ID</th>
                                            <th>Show time</th>
                                            <th>Date</th>
                                            <th>Theater</th>
                                            <th>Cinema</th>
                                            <th>tool</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($shows as $show)
                                            @php
                                            $currentDate = date('Y-m-d'); @endphp
                                            <tr>
                                                <td>{{ $show->id }}</td>
                                                <td>{{ $show->movie_id }}</td>
                                                <td
                                                    class="@if ($show->date_show < $currentDate) text-danger @elseif ($show->date_show >= $currentDate) text-success @endif">
                                                    {{ $show->start_time }}</td>
                                                <td
                                                    class="@if ($show->date_show < $currentDate) text-danger @elseif ($show->date_show >= $currentDate) text-success @endif">
                                                    {{ $show->date_show }}</td>
                                                <td>
                                                    @foreach ($data[$show->id] as $datas)
                                                        {{ $datas->theater_name }}
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($data[$show->id] as $datas)
                                                        {{ $datas->cinema_name }}
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm btn-default">
                                                        <a href="#" title="edit a showtime" data-bs-toggle="modal"
                                                            data-bs-target="#ModalEdit{{ $show->id }}">
                                                            <i class="fa fa-edit"></i> </a>
                                                    </button>
                                                    <button class="btn btn-sm btn-default">
                                                        <a href="{{ url('showtimes-delete/' . $show->id) }}"
                                                            onclick="functionDelete(event)"><i class="fa fa-trash"></i>
                                                        </a>
                                                    </button>
                                                </td>
                                            </tr>
                                            @include('admin.shows.update')
                                            <div class="show-modal"></div>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Movie ID</th>
                                            <th>Show time</th>
                                            <th>Date</th>
                                            <th>Theater</th>
                                            <th>Cinema</th>
                                            <th>tool</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="overlay toggle-btn-mobile"></div>
    <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <div class="footer" id="footer">
        <p class="mb-0">BlackCat @2023 | Developed By : <a href="https://www.facebook.com/pxt.manwithoutlove"
                target="_blank">PXT</a>
        </p>
    </div>
    </div>
    @include('admin.layouts.footer')
    @include('public.alert')

    <script>
        document.addEventListener("touchstart", function() {}, true);
    </script>

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            var cinemaDropdown = document.getElementById('cinema');
            var theaterDropdown = document.getElementById('theater_id');

            cinemaDropdown.addEventListener('change', function() {
                var cinemaId = this.value;
                theaterDropdown.innerHTML = '<option value="">Select Theater</option>';

                var theaterRequest = new XMLHttpRequest();
                theaterRequest.open('get', '/get-theater/' + cinemaId, true);
                theaterRequest.onreadystatechange = function() {
                    if (theaterRequest.readyState === 4 && theaterRequest.status === 200) {
                        var theaters = JSON.parse(theaterRequest.responseText);
                        theaters.forEach(function(theater) {
                            var option = document.createElement('option');
                            option.value = theater.id;
                            option.textContent = theater.name;
                            theaterDropdown.appendChild(option);
                        });
                    }
                };
                theaterRequest.send();
            });
        });
    </script>

</body>

</html>
