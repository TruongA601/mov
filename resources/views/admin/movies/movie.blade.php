<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.header')
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
                                    <li class="breadcrumb-item active" aria-current="page">Movie List</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h4 class="mb-0 inline-blk" style="display:inline-block">Movies</h4>
                                <div class="" style="float: right;display:inline-block">
                                    <a href="{{ route('mviewadd') }}" title="Create a Movie"
                                        class="btn btn-sm btn-success px-4"><i class='bx bx-plus me-1'></i></a>
                                </div>
                            </div>
                            <hr />
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>available</th>
                                            <th>Poster</th>
                                            <th>Name</th>
                                            <th>Date release</th>
                                            <th>genre</th>
                                            <th>Showtimes</th>
                                            <th>tool</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($movies as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>
                                                    <input type="checkbox" class="statusCheckbox"
                                                        data-movie-id="{{ $item->id }}"
                                                        {{ $item->status ? 'checked' : '' }}>
                                                       
                                                </td>
                                                <td>
                                                    <img src=" {{ URL::to('uploads/movies/' . $item->poster) }}"
                                                        alt="image" width="70">
                                                </td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ date('d-m-Y', strtotime ($item->daterelease) ) }}</td>
                                                <td>
                                                    @if (isset($data[$item->id]))
                                                        @foreach ($data[$item->id] as $genre)
                                                            {{ $genre->genre_name }}@if (!$loop->last)
                                                                ,
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        No genre found.
                                                    @endif
                                                </td>
                                               
                                                <td>
                                                    <a href="{{ url('showtimes/' . $item->id) }}"><button type="button"
                                                            class="btn btn-outline-info">Showtimes </button></a>
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm btn-default">
                                                        <a href="{{ url('mupdate/' . $item->id) }}"><i
                                                                class="fa fa-edit"></i></a>
                                                    </button>

                                                    <button class="btn btn-sm btn-default">
                                                        <a href="{{ url('movies/' . $item->id) }}"
                                                            onclick="functionDelete(event)"><i class="fa fa-trash"></i>
                                                        </a>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>available</th>
                                            <th>Poster</th>
                                            <th>Name</th>
                                            <th>Date release</th>
                                            <th>genre</th>
                                            <th>Showtimes</th>
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
        document.addEventListener("DOMContentLoaded", function() {
            var checkboxes = document.querySelectorAll('.statusCheckbox');
    
            checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    var movieId = this.getAttribute('data-movie-id');
                    var status = this.checked ? 1 : 0;
    
                    var url = "{{ route('updateStatus') }}"; 
    
                    axios.post(url, {
                            movieId: movieId,
                            status: status
                        })
                        .then(response => {
                            console.log(response.data);
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                });
            });
        });
    </script>
    
</body>

</html>
