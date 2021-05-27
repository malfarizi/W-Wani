@extends('landing_page.templatelandingpage')
@section('title', 'Warung Tani')

@section('content')
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <!-- <div class="d-flex justify-content-end align-items-center">
     
      <ol>
        <li><a href="{{url('/')}}">Home</a></li>
        <li>Daftar</li>
      </ol>
    </div> -->

    </div>
</section><!-- End Breadcrumbs -->
<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container mt-5">

        <h1>Alat Tani</h1>
        <!-- <h5>Bergabung bersama Warung Tani untuk menjadi penyuplai produk pada platform kami.
        Silakan Pilih sesuai kriteria Anda.</h5> -->
        <div>

        </div>
</section>
<!--=======Pricing Section=======-->

<section id="pricing" class="pricing">
    <div class="container">

        <div class="row">

            <div class="col-lg-6">
            @foreach($datas as $data)
                <div class="box">
                    <div class="pic"><img src="{{ url('images/foto_alat/'.$data->foto) }}"
                            style="width: 200px; height: 150px;" class="img-fluid" alt="">
                    </div>
                    <br>
                    <h1>{{$data->nama_alat}}</h1>
                    <h4>@currency($data->harga)</h4>
                    <p>{{$data->desc}}</p>
                    @if(session('status') == 'Diterima')
                    @if(session('level') == 'Petani')
                    <div class="btn-wrap">
                        <a href="{{url('FormulirSewaAlat', $data->id_alat)}}" class="btn-buy">Pesan</a>
                    </div>
                    @endif
                    @else
                    <p></p>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
    </div>
    
</section>


@endsection
