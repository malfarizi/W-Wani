@extends('mitra.templatemitra')

@section('title', 'Pemesanan Alat Tani')

@section('content')

<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pemesanan Alat
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pemesanan Alat Tani </li>
            </ol>
    </div>

    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"> Pemesanan Alat Tani </h6>
                </div>

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




                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>No.</th>
                                <th>Nama Alat</th>
                                <th>Mitra Pemesan</th>
                                <th>Tanggal Sewa / Sampai</th>
                                <th>Luas Tanah</th>
                                <th>Total Harga</th>
                                <th>Alamat</th>
                                <th>Detail Pembayaran</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datas as $data)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$data->nama_alat}}</td>
                                <td>{{$data->nama_mitra}}</td>
                                <td>{{$data->tanggal_sewa}} / {{$data->tanggal_kembali}}</td>
                                <td>{{$data->luas_tanah}} bahu</td>
                                <td>@currency($data->total_harga)</td>
                                <td>{{$data->alamat_lengkap}}</td>
                                <td><button type="button" class="btn btn-primary btn-icon-split btn-sm"
                                        data-toggle="modal" data-target="#modal-detail-{{$data->id_pembayaran_alat}}">
                                        <span class="icon text-white-50"><i class="fas fa-info-circle"></i>
                                        </span>
                                        <span class="text">Detail</span>
                                    </button>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        @foreach($datas as $data)

        <div class="modal fade" id="modal-detail-{{$data->id_pembayaran_alat}}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Foto : <img src="{{ url('images/foto_bukti/'.$data->foto_bukti) }}"
                                    style="width: 200px; height: 150px;"> </li>
                            <li class="list-group-item">Nama Alat : {{$data->nama_alat}}</li>
                            <li class="list-group-item">Tanggal Bukti : {{$data->tanggal_bukti}} </li>
                            <li class="list-group-item">Status : {{$data->status_pembayaran}} </li>

                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endsection
