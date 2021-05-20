@extends('landing_page.templatelandingpage')
@section('title', 'Warung Tani')

@section('content')

<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <!-- <div class="d-flex justify-content-end align-items-center">
    
      <ol>
        <li><a href="/">Home</a></li>
        <li><a href="/daftar">Daftar</a></li>
        <li>Registrasi Petani</li>
      </ol>
    </div> -->

    </div>
</section><!-- End Breadcrumbs -->
<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container">

        <div class="top1">
            <img style="width: 100%; " src="frontend/img/sayuran.jpg" alt="">
        </div>
        <div class="daftar">
            <br>
            <h4>Pemesanan Alat</h4>
        </div>
        <div class="row mt-5">

            <div class="col-lg-4">


            </div>

        </div>

        <div class="col-lg-8 mt-5 mt-lg-0">
            <img src="{{ url('images/foto_alat/'.$datas->foto) }}" style="width: 200px; height: 150px;">
            <form action="{{url('')}}" method="post" role="form" class="form-horizontal" enctype="multipart/form-data">
                @csrf

                <div class="form-group">

                    <input type="text" class="form-control" name="id_alat" id="id-alat" value="{{$datas->id_alat}}"
                        hidden />
                </div>
                <div class="form-group">

                    <input type="text" class="form-control" name="id_mitra" id="id_mitra" value="{{$mitra->id_mitra}}}"
                        hidden />
                </div>

                <div class="form-group row">
                    <label for="static" class="col-sm-2 col-form-label">Nama Alat :</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="static"
                            value=" {{$datas->nama_alat}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="static" class="col-sm-2 col-form-label">Harga :</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" name="harga" id="static"
                            value="{{$datas->harga}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="static" class="col-sm-2 col-form-label">Nama Mitra </label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="static"
                            value=" {{$mitra->nama_mitra}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="static" class="col-sm-2 col-form-label">Alamat Lengkap </label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" name="alamat_lengkap" id="static"
                            value="{{$mitra->alamat_lengkap}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tanggal" class="col-sm-2  col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="date" name="tanggal">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="luas_tanah" class="col-sm-2  col-form-label">Luas Tanah</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="text" name="luas_tanah">
                    </div>
                </div>

                




                <div class=" text-center"><button type="submit">Pesan</button></div>
            </form>

        </div>

    </div>

    </div>
</section>

    @endsection
