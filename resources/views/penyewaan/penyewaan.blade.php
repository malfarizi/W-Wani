@extends('landing_page.templatelandingpage')

@section('title', 'Pemesanan Alat Tani')

@section('content')

<div class="container-fluid" id="container-wrapper">
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-end align-items-center">

                <ol>
                    <li><a href="/">Home</a></li>
                    <li>Pemesanan Alat Tani</li>
                </ol>
            </div>

        </div>
    </section>

    <div class="row mt-3">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"> Pemesanan Alat Tani</h6>
                </div>
                <div class="col-md-6">
                    <form action="{{url('cari')}}" method="GET">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control col-md-5" placeholder="Nomor Pemesanan">
                            <span class="input-group-btn">
                                <button class="btn btn-warning" type="submit"><i
                                        class="lnr lnr-magnifier"></i>Cari</button>
                            </span>
                        </div>
                    </form>
                </div>

                @if (session('success'))
                <div class="card-header">
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h6><i class="fas fa-check"></i><b></b></h6>
                        {{ session('success') }}
                    </div>
                </div>
                @endif
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
                                <th>Tanggal Pemesanan</th>
                                <th>Luas Tanah</th>
                                <th>Total harga</th>
                                <th>Alamat</th>
                                <th>Detail Pembayaran</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datas as $data)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$data->nama_alat}}</td>
                                <td>{{$data->tanggal}}</td>
                                <td>{{$data->luas_tanah}}</td>
                                <td>@currency($data->total_harga)</td>
                                <td>{{$data->alamat_lengkap}}</td>

                                <td><button type="button" class="btn btn-primary btn-icon-split btn-sm"
                                        data-toggle="modal" data-target="#modal-detail-{{$data->id_pembayaran_alat}}">
                                        <span class="icon text-white-50"><i class="fas fa-info-circle"></i>
                                        </span>
                                        <span class="text">Detail</span>
                                    </button>
                                    <!-- <form action="{{url('deletePemesananAlat', $data->id_pembayaran_alat)}}"
                                        method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm" ><i
                                                class="fas fa-trash"></i><span class="text">Batal</span></button>
                                    </form> -->
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
                            <li class="list-group-item">Foto : <img
                                    src="{{ url('images/foto_bukti/'.$data->foto_bukti) }}"
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
