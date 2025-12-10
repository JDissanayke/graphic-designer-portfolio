<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title', '') | Stori8 </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


    <link rel="stylesheet" href="{{ asset('fornt-style/focss/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fornt-style/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('fornt-style/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fornt-style/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fornt-style/css/magnific-popup.css') }}">


    <link rel="stylesheet" href="{{ asset('fornt-style/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('fornt-style/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('fornt-style/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('fornt-style/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('fornt-style/css/slider.css') }}">
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    @include('front-view.section.front-navbar')
    <div class="content">

        @yield('content')
    </div>

    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>
    @include('front-view.section.footer')

    <script src="{{ asset('fornt-style/js/jquery.min.js') }}"></script>
    <script src="{{ asset('fornt-style/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('fornt-style/js/popper.min.js') }}"></script>
    <script src="{{ asset('fornt-style/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('fornt-style/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('fornt-style/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('fornt-style/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('fornt-style/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('fornt-style/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('fornt-style/js/aos.js') }}"></script>
    <script src="{{ asset('fornt-style/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('fornt-style/js/scrollax.min.js') }}"></script>
    <script src="{{ asset('fornt-style/js/scrollax.contact.js') }}"></script>

    <script src="{{ asset('fornt-style/js/main.js') }}"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script> --}}

<script>
var swiper = new Swiper(".swiper-con", {
  slidesPerView: 3,
  spaceBetween: 10,
  autoplay: {
    delay: 50,
    disableOnInteraction: false,
  },
  loop: true,
  speed: 8000,
  effect: "slide",
  breakpoints: {
    1200: {
      slidesPerView: 3,
      spaceBetween: 10,
    },
    1024: {
      slidesPerView: 2,
      spaceBetween: 10,
    },
    768: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    480: {
      slidesPerView: 1,
      spaceBetween: 10,
    },

    150: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
  },
});

var swiperContainer = document.querySelector(".swiper-con");

swiperContainer.addEventListener("mouseenter", function() {
  swiper.autoplay.stop(); // Stop autoplay
});

swiperContainer.addEventListener("mouseleave", function() {
  swiper.autoplay.start(); // Resume autoplay
});

 document.getElementById("sDate").innerHTML = new Date();

</script>


</body>

</html>
