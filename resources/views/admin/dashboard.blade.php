<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.header')
    <link rel="stylesheet" href="{{ asset('assets/plugins/apexcharts-bundle/css/apexcharts.css') }}">
    <link rel='stylesheet' href="{{ asset('assets/plugins/yearpicker/yearpicker.css') }}"rel="stylesheet" />

</head>

<body>
    <div class="wrapper">
        @include('admin.layouts.sidebar')
        @include('admin.layouts.navbar')
        <div class="page-wrapper">
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="row">
                        <div class="col-12 col-lg-3">
                            <div class="card radius-15 bg-voilet">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h2 class="mb-0 text-white"> {{ count($movie) }} </h2>
                                        </div>
                                        <div class="ms-auto font-35 text-white"><i class="fas fa-film"></i>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-white">Movies</p>
                                        </div>
                                        {{-- <div class="ms-auto font-14 text-white">+23.4%</div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="card radius-15 bg-primary-blue">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h2 class="mb-0 text-white">{{ count($booking) }}
                                                {{-- <i class='bx bxs-down-arrow-alt font-14 text-white'></i>  --}}
                                            </h2>
                                        </div>
                                        <div class="ms-auto font-35 text-white"><i class="fa fa-ticket-alt"></i>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-white">Booking</p>
                                        </div>
                                        {{-- <div class="ms-auto font-14 text-white">+14.7%</div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="card radius-15 bg-rose">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h2 class="mb-0 text-white">{{ count($cinema) }}
                                                {{-- <i class='bx bxs-up-arrow-alt font-14 text-white'></i>  --}}
                                            </h2>
                                        </div>
                                        <div class="ms-auto font-35 text-white"><i class="lni lni-display-alt"></i>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-white">Cinemas</p>
                                        </div>
                                        {{-- <div class="ms-auto font-14 text-white">-12.9%</div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="card radius-15 bg-sunset">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h2 class="mb-0 text-white">{{ count($user) }}
                                                {{-- <i class='bx bxs-up-arrow-alt font-14 text-white'></i>  --}}
                                            </h2>
                                        </div>
                                        <div class="ms-auto font-35 text-white"><i class="bx bx-user"></i>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-white">Users</p>
                                        </div>
                                        {{-- <div class="ms-auto font-14 text-white">+13.6%</div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <div class="card radius-15">
                                <div class="card-body">
                                    <div id="topMoviesChart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card-body">
                            <div class="col-12 col-lg-12">
                                <div class="card radius-15">
                                    <div class="card-body">
                                        <div id="monthlyRevenueChart"></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <div class="card radius-15">
                                <div class="card-body">
                                    <div id="yearlyRevenueChart"></div>
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
    <script src="{{ asset('assets/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/npm/axios.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/yearpicker/yearpicker.js') }}"></script>

    <script>
        $(function() {
            "use strict";
            const currentDate = new Date();
            const currentYear = currentDate.getFullYear();
            const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August",
                "September", "October", "November", "December"
            ];
            axios.get(`monthly-revenue-chart-data/${currentYear}`)
                .then(response => {
                    const data = response.data;
                    data.sort((a, b) => a.month - b.month);

                    if (Array.isArray(data)) {
                        var options = {
                            chart: {
                                type: 'area',
                                stacked: false,
                                width: "100%",
                                height: 400
                            },
                            title: {
                                text: `Monthly Revenue Movies (${currentYear})`
                            },
                            xaxis: {
                                categories: data.map(item => `${monthNames[item.month - 1]} `)
                            },
                            yaxis: {
                                title: {
                                    text: "Revenue (vnđ)"
                                }
                            },
                            series: [{
                                name: "Monthly Revenue",
                                data: data.map(item => item.total_price)
                            }]
                        };


                        var chart = new ApexCharts(document.querySelector("#monthlyRevenueChart"), options);
                        chart.render();
                    } else {
                        console.error('Invalid data format:', data);
                    }
                })
                .catch(error => {
                    console.error('Error fetching monthly revenue data:', error);
                });
        });
    </script>

    <!-- biểu đồ thống kê doanh thu theo năm -->
    <script>
        $(function() {
            "use strict";
            axios.get(`yearly-revenue-chart-data`)
                .then(response => {
                    const data = response.data;
                    data.sort((a, b) => a.year - b.year);

                    if (Array.isArray(data)) {
                        var options = {
                            chart: {
                                type: "bar",
                                width: "100%",
                                height: 400
                            },
                            title: {
                                text: "Yearly Revenue Movies"
                            },
                            xaxis: {
                                categories: data.map(item => item.year)
                            },
                            yaxis: {
                                title: {
                                    text: "Revenue (vnđ)"
                                }
                            },
                            series: [{
                                name: "Yearly Revenue",
                                data: data.map(item => item.total_price)
                            }]
                        };
                        var chart = new ApexCharts(document.querySelector("#yearlyRevenueChart"), options);
                        chart.render();
                    } else {
                        console.error('Invalid data format:', data);
                    }
                })
                .catch(error => {
                    console.error('Error fetching yearly revenue data:', error);
                });
        });
    </script>
    {{-- phim có doanh thu cao nhất --}}
    <script>
        $(function() {
            "use strict";
            axios.get(`top-movies-chart-data`)
                .then(response => {
                    const data = response.data;
                    // console.log(data);
                    if (Array.isArray(data.movies)) {
                        var options = {
                            series: [{
                                name: "revenue",
                                data: data.movies.map(movie => movie.revenue)
                            }],
                            chart: {
                               
                                type: 'bar',
                                height: 350
                            },
                            title: {
                            text: "Top Grossing Movies"
                        },
                            colors: ["#007bff"],
                            plotOptions: {
                                bar: {
                                    horizontal: true,
                                }
                            },
                            dataLabels: {
                                enabled: false
                            },
                            xaxis: {
                                categories: data.movies.map(movie => movie.name),
                            }
                        };

                        var chart = new ApexCharts(document.querySelector("#topMoviesChart"), options);
                        chart.render();
                    } else {
                        console.error('Invalid data format:', data);
                    }
                })
                .catch(error => {
                    console.error('Error fetching top movies data:', error);
                });
        });
    </script>

</body>

</html>
