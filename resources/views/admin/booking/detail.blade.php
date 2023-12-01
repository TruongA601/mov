




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
                        <div class="breadcrumb-title pe-3">Booking</div>
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
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Detail</li>
                                </ol>
                            </nav>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-xl-9 mx-auto">
                            <h6 class="mb-0 text-uppercase">Booking detail</h6>
                            <hr>
                            <div class="card ">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <span class="data-label" style="font-size:18px">Movie Name:</span>
                                            <span class="data-value"
                                                style="font-size:20px">{{ $data->movie_name }}</span>
                                        </div>
                                      
                                        <div class="col-md-6">
                                            <span class="data-label">Cinema:</span>
                                        </div>
                                        <div class="col-md-6">
                                            <span class="data-value">{{ $data->cinema_name }}</span>
                                        </div>
                                        <div class="col-md-6">
                                            <span class="data-label">Theater:</span>

                                        </div>
                                        <div class="col-md-6">
                                            <span class="data-value">{{ $data->theater_name }}</span>
                                        </div>
                                        <div class="col-md-6">
                                            <span class="data-label">Date Show:</span>

                                        </div>
                                        <div class="col-md-6">
                                            <span class="data-value">{{ date('d-m-Y', strtotime($data->date_show)) }}</span>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <span class="data-label">Show Time:</span>

                                        </div>
                                        <div class="col-md-6">
                                            <span class="data-value">{{ $data->start_time }}</span>
                                        </div>
                                        <div class="col-md-6">
                                            <span class="data-label">Seat:</span>
                                        </div>
                                        <div class="col-md-6">
                                            @foreach ($seat as $item)
                                                <span
                                                    class="data-value">{{ $item->seat_row }}-{{ $item->seat_column }},</span>
                                            @endforeach
                                        </div>
                                        <hr>
                                        <div class="col-md-6">
                                            <span class="data-label">Total Price:</span>
                                        </div>
                                        <div class="col-md-6">
                                            <span class="data-value">{{ $data->total_price }} đ</span>
                                        </div>
                                    </div>
                                    <div class="col-12" style="display: flex; justify-content: end;">
                                      
                                        <button type="reset" class="btn btn-outline-secondary"><a href="{{route('show-booking')}}">Back</a></button>
                                    </div>
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
    @include('public.alert')
</body>

</html>
