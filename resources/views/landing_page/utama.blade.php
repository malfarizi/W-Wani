@extends('landing_page.templatelandingpage')
@section('title', 'Warung Tani')
    
@section('content')

  <!-- ======= Hero Section ======= -->
  <section id="hero">
   <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

     <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

     <div class="carousel-inner" role="listbox">

       <!-- Slide 1 -->
       <div class="carousel-item active" style="background-image: url(/frontend/img/slide/nyangkul.jpeg)">
         <div class="carousel-container">
           <div class="container">
             <h2 class="animate__animated animate__fadeInDown">Warung Tani </h2>
             <!-- <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p> -->
            
           </div>
         </div>
       </div>

       <!-- Slide 2 -->
       <div class="carousel-item" style="background-image: url(/frontend/img/slide/sayuran.png)">
         <div class="carousel-container">
           <div class="container">
             <h2 class="animate__animated animate__fadeInDown">Warung Tani</h2>
             <!-- <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p> -->
             
           </div>
         </div>
      </div>
     
        

     </div>

     <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
       <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
       <span class="sr-only">Previous</span>
     </a>

     <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
       <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
       <span class="sr-only">Next</span>
     </a>

   </div>
 </section><!-- End Hero -->

 <main id="main">

   <!-- ======= About Section ======= -->
   <section id="about" class="about">
     <div class="container">

       <div class="row content">
         <div class="col-lg-6">
           <h2>Selamat Datang Di Warung Tani</h2>
           <h3></h3>
         </div>
         <div class="col-lg-6 pt-4 pt-lg-0">
           <p>
            
           </p>
           <ul>
             <!-- <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequa</li>
             <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate velit</li>
             <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in</li>
           </ul> -->
           <p class="font-italic">
            
           </p>
         </div>
       </div>

     </div>
   </section><!-- End About Section -->

   

   <!-- ======= Services Section ======= -->
   <section id="services" class="services">
     <div class="container">

       <div class="section-title">
         <h2>Highlight</h2>
         <p>HAL-HAL YANG ADA DI WARUNG TANI</p>
       </div>

       <div class="row">
         <div class="col-md-6">
           <div class="icon-box">
             <i class="icofont-tools"></i>
             <h4><a href="#">Penyewaan Alat Tani</a></h4>
             <p>Diperuntukan bagi Petani yang ingin menyewa alat tani</p>
           </div>
         </div>
         
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="icofont-user"></i>
              <h4><a href="#">Mitra Petani Dan Vendor</a></h4>
              <p>Petani dapat menjual hasil tani dan Vendor dapat menyewakan alat tani bagi Petani</p>
            </div>
          </div>
         <div class="col-md-6 mt-4 mt-md-0">
           <div class="icon-box">
             <i class="icofont-fruits"></i>
             <h4><a href="#">Penjualan Hasil Tani</a></h4>
             <p>Di Warung Tani, para Petani dapat menjual produknya di Warung Tani, dan para Pembeli dapat membeli produk yang dijual oleh Petani</p>
           </div>
         </div>

     </div>
   </section><!-- End Services Section -->

  
      @endsection