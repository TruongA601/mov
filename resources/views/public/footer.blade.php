<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/bootstrap5/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/bootstrap5/js/tiny-slider.js') }}"></script>
<script src="{{ asset('assets/bootstrap5/js/flatpickr.min.js') }}"></script>
<script src="{{ asset('assets/bootstrap5/js/aos.js') }}"></script>
<script src="{{ asset('assets/bootstrap5/js/glightbox.min.js') }}"></script>
{{-- <script src="{{ asset('assets/bootstrap5/js/navbar.js') }}"></script> --}}
<script src="{{ asset('assets/bootstrap5/js/counter.js') }}"></script>
{{-- <script src="{{ asset('assets/bootstrap5/js/custom.js') }}"></script> --}}
<script src="{{ asset('assets/bootstrap5/js/all.js') }}"></script>
<script src="{{ asset('assets/bootstrap5/js/all.min.js') }}"></script>
<script src="{{ asset('assets/bootstrap5/js/fontawesome.js') }}"></script>
<script src="{{ asset('assets/bootstrap5/js/fontawesome.min.js') }}"></script>
{{-- <script src="{{ asset('assets/js/app.js') }}"></script> --}}
<script src="{{ asset('assets/plugins/notifications/js/lobibox.min.js') }}"></script>
<script src="{{ asset('assets/plugins/notifications/js/notifications.min.js') }}"></script>
<script src="{{ asset('assets/plugins/notifications/js/notification-custom-script.js') }}"></script>
<script>
    var prevScrollpos = window.pageYOffset;
    window.onscroll = function() {
        var currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
            document.getElementById("topbar").style.top = "0";
        } else {
            document.getElementById("topbar").style.top = "-64px";
        }
        prevScrollpos = currentScrollPos;
    }
</script>
<script>
    let mybutton = document.getElementById("back-to-top");
    window.onscroll = function() {scrollFunction()};
    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
      } else {
        mybutton.style.display = "none";
      }
    }
    function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }
    </script>