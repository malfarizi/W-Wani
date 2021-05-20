<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>@yield('title')</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <link href="{{url('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('css/ruang-admin.min.css')}}" rel="stylesheet">
    <link href="{{url('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{url('vendor/select2/dist/css/select2.min.css')}}" rel="stylesheet" type="text/css">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style-landingpage.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
       <link href="{{url('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
      <!-- fevicon -->
      <link rel="icon" href="images/wani.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- owl stylesheets --> 
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesheet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <!-- <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div> -->
      <!-- end loader -->
      <!-- header -->
      <header class="section">
         <!-- header inner -->
         <div class="header">
            <div class="container">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo"> <a href="index.html"><img src="images/wani.png" alt="#"></a> </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <div class="menu-area">
                        <div class="limit-box">
                           <nav class="main-menu">
                              <ul class="menu-area-main">
                                 <li> <a href="{{url('/')}}">Home</a> </li>
                                 
                                 @if(session('level') == 'Petani')
                                 <li><a href="{{url('profil-mitra')}}">Profil</a></li>
                                 <li><a href="{{url('pemesananmitra')}}">Penyewaan</a></li>
                                 <li><a href="{{url('dashboardmitra')}}">Dashboard</a></li>
                                 <li><a href="{{url('logoutmitra')}}">Logout</a></li>
                            
                                 @else
                                 <li><a href="testmonial.html">Gabung Mitra</a></li>
                                 <li><a href="{{url('loginmitra')}}">Login</a></li>
                                 @endif
                                
                                 
                              </ul>
                           </nav>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- end header inner -->
      </header>
      <!-- end header -->
      <section >
         <div id="main_slider" class="section carousel slide banner-main" data-ride="carousel">
            <ol class="carousel-indicators">
               <li data-target="#main_slider" data-slide-to="0" class="active"></li>
               <li data-target="#main_slider" data-slide-to="1"></li>
               <li data-target="#main_slider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container">
                     <div class="row marginii">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                           <div class="carousel-caption ">
                              <h1>Selamat Datang Di <strong class="color">Warung Tani</strong></h1>
                              <p></p>
                              <!-- <a class="btn btn-lg btn-primary" href="#" role="button">Buy Now</a>
                              <a class="btn btn-lg btn-primary" href="about.html" role="button">About </a> -->
                           </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                           <div class="img-box">
                              <figure></figure>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="container">
                     <div class="row marginii">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                           <div class="carousel-caption ">
                              <h1>Berbagai Jenis Produk Ada Di <strong class="color">Warung Tani</strong></h1>
                              <p></p>
                             <!--  <a class="btn btn-lg btn-primary" href="#" role="button">Buy Now</a>
                              <a class="btn btn-lg btn-primary" href="about.html" role="button">About</a> -->
                           </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                           <div class="img-box ">
                              <figure><img src="images/sayuran.jpg" alt="img"/></figure>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="container">
                     <div class="row marginii">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                           <div class="carousel-caption ">
                              <h1>Penyewaan Alat Tani Tersedia Juga Di <strong class="color">Warung Tani</strong></h1>
                              <p></p>
                              <!-- <a class="btn btn-lg btn-primary" href="#" role="button">Buy Now</a>
                              <a class="btn btn-lg btn-primary" href="about.html" role="button">About</a> -->
                           </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                           <div class="img-box">
                              <figure><img src="images/alattani.png" alt="img"/></figure>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
            <i class='fa fa-angle-left'></i></a>
            <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
            <i class='fa fa-angle-right'></i>
            </a>
         </div>
      </section>

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