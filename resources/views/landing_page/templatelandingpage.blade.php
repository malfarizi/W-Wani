<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{url('frontend/img/favicon.png')}}" rel="icon">
  <link href="{{url('frontend/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{url('frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{url('frontend/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
  <link href="{{url('frontend/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{url('frontend/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{url('frontend/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{url('frontend/vendor/venobox/venobox.css')}}" rel="stylesheet">
  <link href="{{url('frontend/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{url('frontend/css/style.css')}}" rel="stylesheet">
  
  <!-- Dropdown Search CDN -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <!-- =======================================================
  * Template Name: Sailor - v2.3.1
  * Template URL: https://bootstrapmade.com/sailor-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo"><a href="index.html">Wani</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">

        <ul>
          <li><a href="{{url('/')}}">Home</a></li>
          
          <li><a href="{{url('/alattani-list')}}">Alat Tani</a></li>
          @if(session('level') == 'Petani')
          <li><a href="{{url('pemesananmitra')}}">Penyewaan</a></li>
          @else
          <li><a href="{{url('/daftar')}}">Gabung Mitra</a></li>
         @endif

        </ul>

      </nav><!-- .nav-menu -->
      @if(session('level') == 'Petani')
      <a href="{{url('/logoutmitra')}}" class="get-started-btn ml-auto">Logout</a>
      @else
      <a href="{{url('/loginmitra')}}" class="get-started-btn ml-auto">Login</a>
      @endif
    </div>
  </header><!-- End Header -->

 @yield('content')

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>Kontak Kami</h3>
              <p>
                Bukit Algortima <br>
                Jl. Cisuba, Taman Sari, Cikidang, Sukabumi Regency, Jawa Barat 43367, Indonesia<br><br>
                <strong>Telp:</strong> +1 222 333 444 555<br>
                <strong>Email:</strong> info.wani@example.com<br>
              </p>
              
            </div>
          </div>

         
          <!-- <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div> -->

          

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Sailor</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/sailor-free-bootstrap-theme/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="frontend/vendor/jquery/jquery.min.js"></script>
  <script src="frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="frontend/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="frontend/vendor/php-email-form/validate.js"></script>
  <script src="frontend/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="frontend/vendor/venobox/venobox.min.js"></script>
  <script src="frontend/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="frontend/vendor/owl.carousel/owl.carousel.min.js"></script>

  <!-- Template Main JS File -->
  <script src="frontend/js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
 @yield('js')
</body>

</html>