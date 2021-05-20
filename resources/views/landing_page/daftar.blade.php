@extends('landing_page.templatelandingpage')
@section('title', 'Warung Tani')
    
@section('content')
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-end align-items-center">
     
      <ol>
        <li><a href="{{url('/')}}">Home</a></li>
        <li>Daftar</li>
      </ol>
    </div>

  </div>
</section><!-- End Breadcrumbs -->
<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container mt-5">

      <h1>Bergabung menjadi Mitra</h1>
      <h5>Bergabung bersama Warung Tani untuk menjadi penyuplai produk pada platform kami.
        Silakan Pilih sesuai kriteria Anda.</h5>
      <div>

    </div>
  </section><
<!-- ======= Pricing Section ======= -->
<section id="pricing" class="pricing">
    <div class="container">

      <div class="row">     

        <div class="col-lg-6">
          <div class="box">
              <div class="pic"><img src="frontend/img/petani.png" class="img-fluid" alt=""></div>
              <br>
              <h4>Petani</h4>
           <p>Anda adalah Seorang petani atau Produsen hasil tani yang siap berjualan di WarungTani</p>
            <div class="btn-wrap">
              <a href="{{url('registerMitra')}}" class="btn-buy">Daftar Sekarang</a>
            </div>
          </div>
        </div>
       
        <div class="col-lg-6">
          <div class="box">
                <div class="pic"><img src="frontend/img/alat.png" class="img-fluid" alt=""></div>
                <br>
                
                <h4>Vendor</h4>
           <p>Anda adalah Seorang Vendor yang menyediakan penyewaan alat dan siap menyewakan alat di WarungTani</p>
            <div class="btn-wrap">
                <a href="{{url('registerVendor')}}" class="btn-buy">Daftar Sekarang</a>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section>

  
      @endsection