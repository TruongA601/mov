<style>
    .foot-home {
        background-color: #2a2e4b
    }

    .mid-footer {
        background-repeat: no-repeat;
        background-size: cover;
        width: 100%;
    }


    .logo-wrapper img {
        border: 0 none;
        max-width: 100%;
        height: auto;
        vertical-align: middle;
    }

    .foot-line {
        flex: 1 1 0%;
        height: 1px;
        background: rgb(93, 93, 95);
    }

    .foot-logo-1 {
        display: flex;
        width: 100%;
        -webkit-box-align: center;
        align-items: center;
        -webkit-box-pack: center;
        justify-content: center;
        height: 125px;
    }

    .foot-item {
        text-align: center;
    }

    .foot-logo {
        display: flex;
        padding: 0px 24px 20px;
        font-size: 11px;
        -webkit-box-align: center;
        align-items: center;
        flex-direction: column;

    }

    .icon-social {
        display: inline-block;
        margin-right: 10px;
        width: 37px;
        height: 37px;
    }

    .foot-copyright {
        padding: 30px;
        font-size: 11px;
        color: rgb(102, 102, 102);
        text-align: center;
    }
</style>
<footer class="foot-home" style="position: relative;margin-left:0;border:none">
    {{-- <div class="mid-footer lazyload"data-src="{{ asset('assets/images/img-bg.jpg') }}" data-was-processed="true"
        style="background-image: url(&quot;{{ asset('assets/images/img-bg.jpg') }}&quot;);"> --}}

    <div class="container">
        <div class="foot-logo">
            <div class="foot-logo-1">
                <div class="foot-line"></div>
                <div class="logo_footer" style="margin-bottom: 12px;">
                    <a href="/" class="logo-wrapper">
                        <img src="{{ asset('assets/images/logo-img-1.png') }}" alt="logo ">
                    </a>
                </div>
                <div class="foot-line"></div>
            </div>
            <div class="foot-item">

                <a href="https://www.facebook.com/pxt.manwithoutlove" title="Theo dõi Facebook PXT"><i
                        class="fab fa-facebook-f icon-social" style="color: #fff"></i></a>


                <a href="https://twitter.com/Haru98547418" title="Theo dõi Twitter PXT"><i class="fab fa-twitter icon-social"
                        style="color: #fff"></i></a>


                <a href="#" title="Theo dõi Google PXT"><i class="fab fa-google icon-social"
                        style="color: #fff"></i></a>

                <a href="https://www.instagram.com/pxtruong15/" title="Theo dõi Instagam PXT"><i class="fab fa-instagram icon-social"
                        style="color: #fff"></i></a>

                <a href="https://www.youtube.com/channel/UCIG9eBbQGqqRCyO1HEEvsMw" title="Theo dõi Youtube PXT"><i class="fab fa-youtube icon-social"
                        style="color: #fff"></i></a>
            </div>
            <div class="foot-copyright" style="color:#fff">
                Copyright
                2023
                © PXT. All Rights Reserved.
                <br>
                Address:Toà nhà A1,54,Triều Khúc, Quận Thanh Xuân, Hà Nội
                Hotline: <a class="hai01" href="tel:0918205423" style="color:#fff">0918205423</a>
                Email: <a href="mailto:support@sapo.vn" style="color: #fff;">pxt3735@gmail.com</a>
            </div>
        </div>
    </div>
    </div>

</footer>
