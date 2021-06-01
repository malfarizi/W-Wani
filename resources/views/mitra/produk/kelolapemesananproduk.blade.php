@extends('mitra.templatemitra')

@section('title', 'Kelola Pemesanan Produk')

@section('content')

<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Pembayaran Produk</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Kelola Pembayaran Produk</li>
        </ol>
    </div>

    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Pembayaran Produk</h6>
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
                                <th>Nama Pembeli</th>
                                <th>Produk</th>
                                <th>Qty</th>
                                <th>Tanggal Pesan</th>
                                <th>Kurir</th>
                                <th>Alamat</th>
                                <th>Detail Pembayaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datas as $data)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$data->nama_pembeli}}</td>
                                <td>{{$data->nama_produk}}</td>
                                <td>{{$data->qty}}</td>
                                <td>{{$data->tanggal}}</td>
                                <td>{{$data->kurir}}</td>
                                <td>{{$data->alamat_lengkap}}</td>

                                <td><button type="button" class="btn btn-primary btn-icon-split btn-sm"
                                        data-toggle="modal" data-target="#modal-detail-{{$data->id_pembayaran}}">
                                        <span class="icon text-white-50"><i class="fas fa-info-circle"></i>
                                        </span>
                                        <span class="text">Detail</span>
                                    </button>
                                </td>
                                <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#edit-data-{{$data->id_pembayaran}}">
                                    <i class="fas fa-user-edit"></i>
                                </button>
                                <form action="{{url('deletePembayaran', $data->id_pembayaran)}}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @foreach($datas as $data)
        {{-- Modal edit --}}
        <div class="modal fade" id="edit-data-{{$data->id_pembayaran}}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pembayaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{url('editPembayaran', $data->id_pembayaran)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="id_alat">No Resi</label>
                                <input type="text" class="form-control" id="no_resi" name="no_resi" value="  ">
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" name="status" id="status"
                                    style="width: 100%">
                                    <option value="">Pilih Status</option>
                                    <option value="Dikirim">Dikirim</option>
                                    <option value="Ditolak">Ditolak</option>
                                </select>
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
        @endforeach

        @foreach($datas as $data)
        <div class="modal fade" id="modal-detail-{{$data->id_pembayaran}}" tabindex="-1" role="dialog"
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
                            <li class="list-group-item"><img src="{{ url('images/foto_bukti/'.$data->foto) }}"
                                    style="width: 200px; height: 150px;"> </li>
                            <li class="list-group-item">Nama Produk : {{$data->nama_produk}}</li>
                            <li class="list-group-item">Subtotal : @currency($data->total_harga)</li>
                            <li class="list-group-item">Status : {{$data->status}} </li>

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
