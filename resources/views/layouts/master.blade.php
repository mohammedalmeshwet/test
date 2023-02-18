<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>FinDash - Responsive Bootstrap 4 Admin Dashboard Template</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="images/favicon.ico" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- Typography CSS -->
      <link rel="stylesheet" href="css/typography.css">
      <!-- Style CSS -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- Full calendar -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
      <link href="{{URL::asset('fullcalendar/core/main.css')}}" rel='stylesheet' />
      <link href="{{URL::asset('fullcalendar/daygrid/main.css')}}" rel='stylesheet' />
      <link href="{{URL::asset('fullcalendar/timegrid/main.css')}}" rel='stylesheet' />
      <link href="{{URL::asset('fullcalendar/list/main.css')}}" rel='stylesheet' />

      <link rel="stylesheet" href="{{URL::asset('css/flatpickr.min.css')}}">

   </head>
   <body>
      <!-- loader Start -->
      <div id="loading">
         <div id="loading-center">
         </div>
      </div>
      <!-- loader END -->


         <!-- Sidebar  -->
         @include('includes.slider')
         <!-- TOP Nav Bar -->
        @include('includes.navbar')
         <!-- TOP Nav Bar END -->
         <div id="content-page" class="content-page">
            <div class="container-fluid">
                @yield('content')
            </div>
         </div>



      <!-- Footer -->
      @include('includes.footer')
      <!-- Footer END -->

      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="{{URL::asset('js/jquery.min.js')}}"></script>
      <script src="{{URL::asset('js/popper.min.js')}}"></script>
      <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
      <!-- Appear JavaScript -->
      <script src="{{URL::asset('js/jquery.appear.js')}}"></script>
      <!-- Countdown JavaScript -->
      <script src="{{URL::asset('js/countdown.min.js')}}"></script>
      <!-- Counterup JavaScript -->
      <script src="{{URL::asset('js/waypoints.min.js')}}"></script>
      <script src="{{URL::asset('js/jquery.counterup.min.js')}}"></script>
      <!-- Wow JavaScript -->
      <script src="{{URL::asset('js/wow.min.js')}}"></script>
      <!-- Apexcharts JavaScript -->
      <script src="{{URL::asset('js/apexcharts.js')}}"></script>
      <!-- Slick JavaScript -->
      <script src="{{URL::asset('js/slick.min.js')}}"></script>
      <!-- Select2 JavaScript -->
      <script src="{{URL::asset('js/select2.min.js')}}"></script>
      <!-- Owl Carousel JavaScript -->
      <script src="{{URL::asset('js/owl.carousel.min.js')}}"></script>
      <!-- Magnific Popup JavaScript -->
      <script src="{{URL::asset('js/jquery.magnific-popup.min.js')}}"></script>
      <!-- Smooth Scrollbar JavaScript -->
      <script src="{{URL::asset('js/smooth-scrollbar.js')}}"></script>
      <!-- lottie JavaScript -->
      <script src="{{URL::asset('js/lottie.js')}}"></script>
      <!-- am core JavaScript -->
      <script src="{{URL::asset('js/core.js')}}"></script>
      <!-- am charts JavaScript -->
      <script src="{{URL::asset('js/charts.js')}}"></script>
      <!-- am animated JavaScript -->
      <script src="{{URL::asset('js/animated.js')}}"></script>
      <!-- am kelly JavaScript -->
      <script src="{{URL::asset('js/kelly.js')}}"></script>
      <!-- am maps JavaScript -->
      <script src="{{URL::asset('js/maps.js')}}"></script>
      <!-- am worldLow JavaScript -->
      <script src="{{URL::asset('js/worldLow.js')}}"></script>
      <!-- Raphael-min JavaScript -->
      <script src="{{URL::asset('js/raphael-min.js')}}"></script>
      <!-- Morris JavaScript -->
      <script src="{{URL::asset('js/morris.js')}}"></script>
      <!-- Morris min JavaScript -->
      <script src="{{URL::asset('js/morris.min.js')}}"></script>
      <!-- Flatpicker Js -->
      <script src="{{URL::asset('js/flatpickr.js')}}"></script>
      <!-- Style Customizer -->
      <script src="{{URL::asset('js/style-customizer.js')}}"></script>
      <!-- Chart Custom JavaScript -->
      <script src="{{URL::asset('js/chart-custom.js')}}"></script>
      <!-- Custom JavaScript -->
      <script src="{{URL::asset('js/custom.js')}}"></script>
   </body>
</html>
