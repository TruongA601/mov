<!DOCTYPE html>
<html lang="en">

@include('public.header')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{ asset('assets/css/sweetalert2.min.css') }}">

<style>
    .card-body-sp {
        flex: 1 1 auto;
        padding: 1.5rem;
    }

    .BlackCat-zalo-qr {
        max-width: 60px;
    }

    .alert-light {
        background-color: #edf2f9;
        border-color: #edf2f9;
        color: #283e59;
    }
</style>

<body class="">
    @include('home.topbar')
    <div class="container">
    </div>
    <div class="main-content">

        <div class="container">

            <h1 class="mt-4 mb-4 text-center">
                Support center
            </h1>

            <div class="alert alert-light">
                <strong>Blackcat</strong>'s customer support center will assist with <strong>purchase related issues
                    ticket
                    online and pay</strong>at website BlackCat.com.
                <br />We will not accept other issues, please see information on the website or contact us
                live
                Contact the theater for resolution.
            </div>

            <div class="row">
                <div class="col-12 col-lg-6 col-xl">

                    <!-- Card -->
                    <div class="card">
                        <div class="card-body-sp">
                            <div class="row align-items-center">
                                <div class="col col-9 pr-0">
                                    <!-- Title -->
                                    <h6 class="card-title text-uppercase text-muted mb-2">
                                        ZALO
                                    </h6>

                                    <!-- Heading -->
                                    <a href="#" target="_blank" class="h2 mb-2 text-dark d-block">
                                        zalo.me/pxt
                                    </a>

                                    <span class="text-muted small">
                                        <i class="fe fe-clock"></i> 09:00 - 23:00
                                    </span>
                                </div>
                                <div class="col col-3 p-0 text-right">
                                    <img src="{{ asset('assets/images/gallery/pxt-qr.jpg') }}" class="BlackCat-zalo-qr"
                                        alt="BlackCat-zalo-qr">
                                </div>
                            </div>
                            <!-- / .row -->
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl">

                    <!-- Card -->
                    <div class="card">
                        <div class="card-body-sp">
                            <div class="row align-items-center">
                                <div class="col">

                                    <!-- Title -->
                                    <h6 class="card-title text-uppercase text-muted mb-2">
                                        Hotline
                                    </h6>

                                    <!-- Heading -->
                                    <a href="tel://02473088890" class="h2 mb-2 text-dark d-block">
                                        0918205423
                                    </a>

                                    <span class="text-muted small">
                                        <i class="fe fe-clock"></i> 09:00 - 23:00 - All day
                                    </span>
                                </div>
                            </div>
                            <!-- / .row -->

                        </div>
                    </div>

                </div>
                <div class="col-12 col-lg-6 col-xl">

                    <!-- Card -->
                    <div class="card">
                        <div class="card-body-sp">
                            <div class="row align-items-center">
                                <div class="col">

                                    <!-- Title -->
                                    <h6 class="card-title text-uppercase text-muted mb-2">
                                        Email
                                    </h6>

                                    <!-- Heading -->
                                    <a href="mailto://hotro@BlackCat.vn" class="h2 mb-2 text-dark d-block">
                                        pxt3735@gmail.com
                                    </a>

                                    <span class="text-muted small">
                                        Respond as quickly as possible
                                    </span>
                                </div>
                            </div>
                            <!-- / .row -->

                        </div>
                    </div>

                </div>

                <div class="col-12 col-lg-6 col-xl">

                    <!-- Card -->
                    <div class="card">
                        <div class="card-body-sp">
                            <div class="row align-items-center">
                                <div class="col">

                                    <!-- Title -->
                                    <h6 class="card-title text-uppercase text-muted mb-2">
                                        User manual
                                    </h6>

                                    <!-- Heading -->
                                    <a href="#" class="h2 mb-2 text-dark d-block">
                                        kb.BlackCat.com
                                    </a>

                                    <span class="text-muted small">
                                        <a href="#">How to buy tickets</a>,
                                        <a href="#">payment</a>...
                                    </span>
                                </div>
                            </div>
                            <!-- / .row -->
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-sm-9">
                    <h2 class="mb-4 text-center">
                        Frequently asked questions
                    </h2>

                    <div class="card">
                        <div class="card-body-sp">
                            <p class="font-weight-bold">Where is BlackCat Theater located?</p>
                            <p>BlackCat is not a movie theater. BlackCat is a movie information website that provides
                                information
                                such as: Showtimes - Movie ticket booking, Movie news, Movie reviews / Reviews, movie
                                data
                                image...
                            </p>
                            <p>Since November 2018, BlackCat has launched online ticket sales for theaters nationwide.
                            </p>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body-sp">
                            <p class="font-weight-bold">Which theaters can I buy tickets at BlackCat?</p>
                            <p>Currently you can buy tickets for the following theater systems:
                            <p>
                            <ul>
                                <li><a href="#">Beta Cineplex</a></li>
                                <li><a href="#">Mega GS Cinemas</a></li>                               
                                <li><a href="#">CineStar</a></li>
                                <li><a href="#">Dcine</a></li>
                                <li><a href="#">Cinemax</a></li>
                                <li><a href="#">Starlight</a></li>
                                <li><a href="#">Rio Cinemas</a></li>
                                <li><a href="#">Touch Cinema</a></li>
                            </ul>
                            <p>BlackCat will connect to other systems in the near future.</p>

                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body-sp">
                            <p class="font-weight-bold">Can I book tickets in advance?</p>
                            <p>BlackCat does not support ticket booking, you need to pay to receive tickets.</p>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body-sp">

                            <p class="font-weight-bold">What happens after payment?</p>
                            <p>After successful payment, you will receive the ticket code via email and selected text
                                message. Friend
                                carry
                                ticket code to the counter to exchange for paper tickets. If you do not receive the
                                email/text, please contact
                                BlackCat
                                for immediate support.</p>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body-sp">
                            <p class="font-weight-bold">I bought the wrong ticket, can I exchange/refund it?</p>
                            <p>Purchased tickets cannot be exchanged or refunded.</p>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body-sp">
                            <p class="font-weight-bold">My money was deducted but I didn't receive the ticket code?</p>
                            <p>If you buy tickets at BlackCat theaters that support online purchasing, please contact us immediately
                                number
                                hotline, we will process it in maximum 15 minutes.</p>
                            <p>For other theaters, please go to the theater's website or call the theater's hotline for support
                                support.</p>

                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <h2 class="mb-4 text-center">
                        Instruct
                    </h2>

                    <div class="card">
                        <div class="card-body-sp">

                            <a href="">Instructions on buying steps
                                ticket</a>

                            <!-- Divider -->
                            <hr>

                            <a href="#">Bar
                                maths
                                by Card / domestic bank account</a>
                            <!-- Divider -->
                            <hr>

                            <a href="#">Pay
                                equal
                                International credit / debit card</a>

                            <!-- Divider -->
                            <hr>

                            <a href="#">Pay at the Door
                                close row
                                house</a>

                            <!-- Divider -->
                            <hr>

                            <a href="#">Pay with Wallet
                                electronic
                                MoMo</a>

                            <!-- Divider -->
                            <hr>

                            <a href="#">Pay with Wallet
                                electronic
                                Foxpay</a>

                            <hr>

                            <a href="#">Payment by
                                electric wallet
                                from ShopeePay</a>
                            <hr>

                            <a href="#" class="btn btn-outline-primary btn-block">See more</a>

                        </div>
                        <!-- / .card-body-sp -->
                    </div>

                </div>
            </div>

        </div>
    </div>
    <div class="container" style="margin-bottom:0px">
        <button id="back-to-top" onclick="topFunction()"><i class="fas fa-arrow-up"></i></button>
    </div>
    @include('home.foot')
    @include('public.footer')
    <script src="{{ asset('assets/js/sweetalert2.all.min.js') }} "></script>

    @include('public.alert')
</body>

</html>
