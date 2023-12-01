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
                        <div class="breadcrumb-title pe-3">theaters</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"><i
                                                class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">theater List</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 mx-auto">
                            <h6 class="mb-0 text-uppercase">Theater Edit</h6>
                            <hr>
                            <div class="card ">
                                <div class="card-body ">
                                    @foreach ($theater as $item0)
                                        <form class="row g-3" method="post"
                                            action="{{ URL::to('theateredit/' . $item0->id) }}"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <div class="col-md-6">
                                                <label for="name" class="form-label">theater Name</label>
                                                <input id="name" name="name" type="text" class="form-control"
                                                    value="{{ $item0->name }}">
                                            </div>

                                            <div class="col-md-6">
                                                <label for="name" class="form-label">Total seats</label>
                                                <input id="totalseat" name="totalseat" type="number" maxlength="200"
                                                    class="form-control" value="{{ $item0->totalSeats }}">
                                            </div>
                                            <div class="col-12" style="display: flex; justify-content: end;">
                                                <button type="submit" class="btn btn-primary"
                                                    style="margin-right:5px">Update</button>
                                                {{-- <a href="{{ route('theater') }}"
                                                class="btn btn-outline-secondary">Cancel</a> --}}
                                                <a href="{{ route('theater') }}"
                                                class="btn btn-outline-secondary">Back</a>
                                            </div>
                                        </form>
                                </div>
                            </div>
                            </form>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 mx-auto">
                            <div class="card ">
                                <div class="card-body seatbd">
                                    {{-- <form id="form-seat" class="row g-3" method="POST"
                                        action="{{ route('update.seats') }}" enctype="multipart/form-data">
                                        @csrf --}}
                                        <div>
                                            {{-- <ul class="showcase">
                                                <li>
                                                    <div class="seat" style="background-color:#444451"></div>
                                                    <small>Available</small>
                                                </li>
                                                <li>
                                                    <div class="seat" style="background-color: #6feaf6"></div>
                                                    <small>Selected</small>
                                                </li>
                                                <li>
                                                    <div class="seat " style="background-color: #b2b2b2"></div>
                                                    <small>Sold</small>
                                                </li>
                                                <li>
                                                    <div class="seat " style="background-color: #710000"></div>
                                                    <small>Disabled</small>
                                                </li>
                                            </ul> --}}
                                            {{-- <div style="display:flex;align-items: center">
                                                <div style="display:flex;align-items: center">
                                                    <button class="btn btn-primary" type="button" id="statusAvailable"
                                                        data-status="available"
                                                        style="color: aliceblue; font-size: 20px;">Available</button>
                                                </div>
                                                <div style="display:flex;align-items: center;margin-left:10px">
                                                    <button class="btn btn-primary" type="button" id="statusDisabled"
                                                        data-status="disabled"
                                                        style="color: aliceblue; font-size: 20px;">Disabled</button>
                                                </div>
                                            </div> --}}
                                            <input type="hidden" id="selectedSeatsInput" name="selectedSeats"
                                                value="">
                                            <input type="hidden" id="newStatusInput" name="newStatus"
                                                value="available">
                                            <div class="container">
                                                <div class="screen">Screen</div>
                                                <div class="row">
                                                    @php
                                                        $columnsPerRow = 15;
                                                        $totalSeats = count($seat);
                                                    @endphp

                                                    @for ($i = 0; $i < $totalSeats; $i++)
                                                        @if ($i % $columnsPerRow == 0)
                                                            @if ($i != 0)
                                                </div>
                                                @endif
                                                <div class="row">
                                                    @endif
                                                    <div class="seat {{ $seat[$i]->status }}"
                                                        data-seat-id="{{ $seat[$i]->id }}"
                                                        style="color: rgb(255, 255, 255); display: flex; text-align: center; align-items: center;justify-content: center; width: 55px; font-size: 12px">
                                                        {{ $seat[$i]->seatRow }}-{{ $seat[$i]->seatColumn }}
                                                    </div>
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                {{-- <div class="col-12">
                                    <button type="button" class="btn btn-primary" id="saveButton">Save</button>
                                    <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                                </div>
                                </form> --}}

                            </div>
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
    {{-- seat --}}
    <script src="{{ asset('assets/bootstrap5/js/seat.js') }}"></script>
    {{-- dependent dropdown --}}
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            var provinceDropdown = document.getElementById('province');
            var cinemaDropdown = document.getElementById('cinema');

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
        });
    </script>
    @include('public.alert')
</body>

</html>
