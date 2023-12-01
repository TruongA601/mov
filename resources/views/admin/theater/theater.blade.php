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
                        <div class="breadcrumb-title pe-3">theater</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"><i
                                                class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">theater</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h4 class="mb-0 inline-blk" style="float:left;display:inline-block">theaters</h4>

                                <div class="" style="float: right;display:inline-block">
                                    <a href="{{ route('theatercreate') }}" title="Create a theater"
                                        class="btn btn-sm btn-success px-4"><i class='bx bx-plus me-1'></i></a>
                                </div>
                            </div><br>
                            <hr />
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>cinema</th>
                                            <th>Total Seats</th>
                                            <th>tool</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($theater as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td> @php
                                                    $cinema = \App\Models\Cinema::find($item->cinema_id);
                                                    if ($cinema) {
                                                        echo $cinema->name;
                                                    } else {
                                                        echo 'Rạp không tồn tại';
                                                    }
                                                    @endphp</td>
                                                <td>{{ $item->totalSeats }}</td>
                                                <td><button class="btn btn-sm btn-default"><a
                                                            href={{url('theateredit/'.$item->id)}}><i
                                                                class="fa fa-edit"></i></a></button>
                                                    <button class="btn btn-sm btn-default"><a
                                                            href="{{ url('theater/' . $item->id) }}"
                                                            onclick="functionDelete(event)"><i
                                                                class="fa fa-trash"></i></a></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                      
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>cinema</th>
                                            <th>Total Seats</th>
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
    {{-- dependent dropdown --}}

    {{-- <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            var provinceDropdown = document.getElementById('province');
            var cinemaDropdown = document.getElementById('cinema');
            var theaterTable = $('#example').DataTable();

            provinceDropdown.addEventListener('change', function() {
                var provinceId = this.value;
                cinemaDropdown.innerHTML = '<option value="">Select cinema</option>';
                var cinemaRequest = new XMLHttpRequest();
                cinemaRequest.open('get', '/getcinema/' + provinceId, true);
                cinemaRequest.onreadystatechange = function() {
                    if (cinemaRequest.readyState === 4 && cinemaRequest.status === 200) {
                        var cinemas = JSON.parse(cinemaRequest.responseText);
                        cinemas.forEach(function(cinema) {
                            var option = document.createElement('option');
                            option.value = cinema.id;
                            option.textContent = cinema.location;
                            cinemaDropdown.appendChild(option);
                        });
                    }
                };
                cinemaRequest.send();
            });
            cinemaDropdown.addEventListener('change', function() {
                var cinemaId = this.value;
                theaterTable.clear().draw();
                var theaterRequest = new XMLHttpRequest();
                theaterRequest.open('get', '/gettheater/' + cinemaId, true);
                theaterRequest.onreadystatechange = function() {
                    if (theaterRequest.readyState === 4 && theaterRequest.status === 200) {
                        var theaters = JSON.parse(theaterRequest.responseText);
                        theaters.forEach(function(theater) {
                            // Thêm dữ liệu vào DataTable
                            theaterTable.row.add([
                                theater.id,
                                theater.name,
                                theater.cinema_id,
                                theater.totalSeats,
                                '<button class="btn btn-sm btn-default"><a href="/theateredit/' +
                                theater.id +
                                '"><i class="fa fa-edit"></i></a></button>' +
                                '<button class="btn btn-sm btn-default"><a href="/theater/' +
                                theater.id +
                                '" onclick="functionDelete(event)"><i class="fa fa-trash"></i></a></button>'
                            ]).draw();
                        });
                    }
                };
                theaterRequest.send();
            });
        });
    </script> --}}


</body>

</html>
