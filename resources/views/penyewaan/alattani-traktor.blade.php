@extends('landing_page.templatelandingpage')
@section('title', 'Warung Tani')

@section('content')
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-end align-items-center">

            <ol>
                <li><a href="/">Home</a></li>
                <li>List Alat Tani</li>
            </ol>
        </div>

    </div>
</section>

</div>
</section><!-- End Breadcrumbs -->
<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container mt-5">
        <!-- <h5>Bergabung bersama Warung Tani untuk menjadi penyuplai produk pada platform kami.
        Silakan Pilih sesuai kriteria Anda.</h5> -->
</div>
        
</section>
<!--=======Pricing Section=======-->

<section id="pricing" class="pricing">
    <div class="container">
<h4>Alat Tani Traktor</h4>
        <div class="row">
            @foreach($datas as $data)
            <div class="col-lg-6">
                <div class="member d-flex align-items-start">
                    <div class="pic"><img src="{{ url('images/foto_alat/'.$data->foto) }}"
                            style="width: 220px; height: 200px;" class="img-fluid" alt=""></div>
                    <div class="member-info col-md-5  ml-1">
                        <h4>{{$data->nama_alat}}</h4>
                        <span>@currency($data->harga) /bahu</span>
                        <p>{{$data->desc}}</p>
                        <p>{{$data->nama_mitra}}</p>
                        @if(session('status') == 'Diterima')
                        @if(session('level') == 'Petani')
                        <div class="btn">
                            <a href="{{url('FormulirSewaAlat', $data->id_alat)}}" class="btn-buy">Pesan</a>
                        </div>
                        @endif
                        @else
                        <p></p>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</section>


@endsection
