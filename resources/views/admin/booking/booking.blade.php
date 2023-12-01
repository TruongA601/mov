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
                        <div class="breadcrumb-title pe-3">Bookings</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"><i
                                                class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Booking List</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>user</th>
                                            <th>movie</th>
                                            <th>shows</th>
                                            <th>booked at</th>
                                            <th>tool</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($booking as $bookings)
                                            <tr>
                                                <td>{{ $bookings->booking_id }}</td>
                                                <td>{{ $bookings->user_name }} </td>
                                                <td>{{ $bookings->movie_name }}</td>
                                                <td>{{ $bookings->show_time }}</td>
                                                <td>{{ date('d/m/Y H:i:s', strtotime($bookings->booking_time)) }}
                                                <td>
                                                    <button class="btn btn-sm btn-default" title="booking detail">
                                                        <a
                                                            href="{{ url('show-booking-detail/' . $bookings->booking_id) }}"><i
                                                                class="far fa-eye"></i></a>
                                                    </button>
                                                </td>
                                            </tr>
                                            @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>user</th>
                                            <th>movie</th>
                                            <th>shows</th>
                                            <th>booked at</th>
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

</body>

</html>
