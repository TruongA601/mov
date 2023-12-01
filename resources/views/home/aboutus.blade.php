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

        <div class="container" style="margin-top:50px ">
            <h1 class="mt-4 mb-4 text-center">
                General introduction about BlackCat
            </h1>

            <p>BlackCat.com is an information site that provides articles introducing and reviewing movies shown in
                theaters nationwide. In addition, BlackCat also redistributes products and services of partners
                (cinemas) on the BlackCat.com website system.</p>

            <ul>
                <li>Allow users to register accounts on the website</li>
                <li>Users can purchase services</li>
            </ul>

            <p>Services are understood to include: movie tickets at cooperative theaters; corn - drinks or other types
                of food provided by cooperative theaters; and items related to movie promotion activities provided by
                cooperating theaters.</p>

            <ul>
                <li><strong>Movie tickets</strong>: are movie tickets at cinema complexes that BlackCat cooperates with.
                    Customers can only buy tickets online for theaters where BlackCat has announced an Online Ticketing
                    partnership.</li>
                <li><strong>Corn - Drink</strong>: is corn and drink sold at cinema complexes where BlackCat is
                    compatible. Customers can only buy corn - drinks online for theaters that have allowed online sales
                    of corn - drinks.</li>
            </ul>

            <h2 class="text-center">Information of website owner BlackCat.com</h2>

            <p>
                <strong>PHAM XUAN TRUONG</strong>
                <br />hotline: 0918205423
                <br />email: pxt3735@gmail.com
                <br />Place of issue: Ha Noi, Trieu Khuc, Thanh Xuan
                <br />Address: Trieu khuc, Thanh Xuan, Ha Noi
            </p>
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
