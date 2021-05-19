@extends('landing_page.templatelandingpage')
@section('title', 'Warung Tani')
    
@section('content')

 <!-- Produk -->
      <div id="produk" class="section  product">
         <div class="container">
            <div class="row">
               <div class="col-md-12 ">
                  <div class="titlepage">
                     <h2><strong class="black"> </strong>Produk</h2>
                     <span></span>
                  </div>
               </div>
            </div>
         </div>
      </div>
         <div class="clothes_main section ">
          <div class="container">
            <div class="row">
              @foreach($produk as $prd)
               <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                  <div class="sport_product">
                     <figure><img src="{{ url('images/foto_produk/'.$prd->foto)  }}" style="width: 200px; height: 150px;"></figure>
                    <h3> Rp. {{$prd->harga}}</h3>
                     <h4>{{$prd->nama_produk}}</h4>
                  </div>
               </div>
              @endforeach
             </div>
            </div>
           </div>
      </div>


      <!-- Alat Tani -->
      <div id="plant" class="section  product">
         <div class="container">
            <div class="row">
               <div class="col-md-12 ">
                  <div class="titlepage">
                     <h2><strong class="black"> </strong>Alat Tani</h2>
                     <span></span>
                  </div>
               </div>
            </div>
         </div>
      </div>
     
         <div class="clothes_main section ">
          <div class="container">
            <div class="row">
               @foreach($datas as $data)
               <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                  <div class="sport_product">
                     <figure><img src="{{ url('images/foto_alat/'.$data->foto)  }}" style="width: 200px; height: 150px;"></figure>
                    <h3> Rp. {{$data->harga}}</h3>
                     <h4>{{$data->nama_alat}}</h4>
                     @if(session('level') == 'Petani'))
                     <a href="FormulirSewaAlat{{$data->id_alat}}" ><Strong>Sewa Alat </strong></a>
                      @endif
                  </div>
               </div>
              @endforeach
             </div>
            </div>
           </div>
          
      </div>
      @endsection