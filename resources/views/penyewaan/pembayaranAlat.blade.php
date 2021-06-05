@extends('landing_page.templatelandingpage')

@section('title', 'Pembayaran Pemesanan Alat Tani')

@section('content')

<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pembayaran Pemesanan Alat Tani</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pembayaran Pemesanan Alat Tani</li>
        </ol>
    </div>

    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">


            <div class="card-header">
                @if (session('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h6><i class="fas fa-check"></i><b> Berhasil!</b></h6>
                    {{ session('success') }}
                </div>
                @endif
            </div>
            @if($errors->any())
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="row mb-3 mr-1 ml-1">
                <div class="col-xl-8 col-lg-7 mb-4">
                    <div class="card">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Detail Pemesanan</h6>

                        </div>

                        <div class="row m-0">
                            <div class="col-lg-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Nomor Pemesanan : {{$datas->id_pemesanan_alat}}</li>
                                    <li class="list-group-item">Nama Pemesan : {{$datas->Mitra->nama_mitra}}</li>
                                    <li class="list-group-item">Nama Alat : {{$datas->alat->nama_alat}}</li>
                                    <li class="list-group-item">Harga : @currency($datas->alat->harga)/bahu</li>
                                    <li class="list-group-item">Tanggal Sewa : {{$datas->tanggal_sewa}}</li>
                                    <li class="list-group-item">Sampai Tanggal : {{$datas->tanggal_kembali}}</li>

                                </ul>
                            </div>
                            <div class="col-lg-6">

                                <div class="align-items-center">
                                    <div class=" font-weight-bold text-truncate message-title">Luas Tanah</div>
                                    <div class="medium text-black message-time font-weight-normal">
                                        {{$datas->luas_tanah}} bahu</div>
                                </div>
                                <hr>
                                <div class="align-items-center">
                                    <div class=" font-weight-bold text-truncate message-title">Total Biaya</div>
                                    <div class="medium text-black message-time font-weight-normal">
                                    @currency($datas->total_harga)</div>
                                </div>
                                <hr>
                                <div class="align-items-center">
                                    <div class=" font-weight-bold text-truncate message-title">Alamat</div>
                                    <div class="medium text-black message-time font-weight-normal">
                                        {{$datas->alamat_lengkap}}</div>
                                </div>
                                <hr>
                                <div class="align-items-center">
                                    <div class=" font-weight-bold  text-warning text-truncate message-title">
                                        Batas Pembayaran Sampai : <br>{{$besok}} WIB</div>
                                        
                                        

                                </div>
                                <hr>
                            </div>

                        </div>


                    </div>
                </div>
                <!-- Message From Customer-->
                <div class="col-xl-4 col-lg-5 ">
                    <div class="card">
                        <div
                            class="card-header py-2 bg-primary d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-light">Data Rekening</h6>
                        </div>
                        <div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Nama Rekening :<strong>{{$datas->alat->mitra->nama_rekening}}</strong>
                                </li>
                                <li class="list-group-item">No Rekening : <strong> {{$datas->alat->mitra->no_rek}} </strong></li>
                                <li class="list-group-item">Nama Bank : <strong> {{$datas->alat->mitra->nama_bank}}</strong></li>
                                <li class="list-group-item">A.N : <strong> {{$datas->alat->mitra->nama_rekening}}</strong></li>

                            </ul>

                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div
                            class="card-header py-2 bg-primary d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-light">Bukti Transfer Pembayaran</h6>
                        </div>
                        <div>
                            <form action="{{url('aksibayaralat')}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group mt-2 ml-3">
                                    <input type="text" class="form-control-file" name="id_pemesanan_alat"
                                        value="{{$datas->id_pemesanan_alat}}" id="exampleFormControlFile1" hidden>
                                </div>
                                <div class="form-group mt-2 ml-3">
                                    <input type="text" class="form-control-file" name="status_pembayaran"
                                        value="Menunggu Pembayaran Diterima" id="exampleFormControlFile1" hidden>
                                </div>
                                <div class="form-group mt-2 ml-3">
                                    <input type="file" class="form-control-file" name="foto_bukti" id="exampleFormControlFile1">
                                </div>
                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-success btn-icon-split">
                                        <span class="text">Bayar</span>
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-right"></i>
                                        </span>
                                    </button>
                                </div>
                            </form>
                        </div>


                    </div>
                </div>
                <!--Row-->



            </div>



            {{-- Modal edit --}}
            <div class="modal fade" id="edit-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Data Alat Tani</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="" method="post">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="id_alat">Nama Alat</label>
                                    <input type="text" class="form-control" id="id_alat" name="id_alat" value="  ">
                                </div>
                                <div class="form-group">
                                    <label for="id_mitra">Mitra Pemesan</label>
                                    <input type="text" class="form-control" id="id_mitra" name="id_mitra" value="  ">
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Tanggal Pemesanan</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="  ">
                                </div>
                                <div class="form-group">
                                    <label for="foto">Luas Tanah</label>
                                    <input type="file" class="form-control" id="foto" name="foto" value="  ">
                                </div>
                                <div class="form-group">
                                    <label for="status">Total Harga</label>
                                    <input type="text" class="form-control" id="status" name="status" value="  ">
                                </div>
                                <div class="form-group">
                                    <label for="alamat_lengkap">Alamat Lengkap</label>
                                    <textarea input type="text" class="form-control" id="alamat_lengkap"
                                        name="alamat_lengkap" value="  "></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                    </div>
                </div>
            </div>

            </form>
            {{-- Akhir Modal Edit --}}
        </div>
    </div>
    @endsection
