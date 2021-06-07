@extends('mitra.templatemitra')

@section('title', 'Saldo')

@section('content')

<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Saldo</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Saldo</li>
        </ol>
    </div>

    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

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

                    @if(session('error'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session('error') }}
                    </div>
                    @endif
                </div>

                <div class="card mr-3 ml-3 shadow-lg p-3 mb-3 bg-white rounded">
                    <div class="card-body">
                        <h5 class="card-title">Total Saldo</h5>
                        <p class="card-text">@currency($total_saldo)</p>

                    </div>
                </div>
                {{-- Modal Tambah --}}

                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

                    {{-- @foreach ($datas as $item)
        @if ($item->status_pencairan == 'Menunggu Validasi')
        <button type="button" class="btn btn-success btn-icon-split btn-sm" data-toggle="modal"
        data-target="#exampleModal" id="#myBtn">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Pencairan</span>
        </button>

        @elseif ($total_saldo <= 0)
        <button type="button" class="btn btn-success btn-icon-split btn-sm" data-toggle="modal"
    data-target="#exampleModal" id="#myBtn">
    <span class="icon text-white-50">
        <i class="fas fa-plus"></i>
    </span>
    <span class="text">Pencairan</span>
    </button>
        @endif
    @endforeach --}}
                    <button type="button" class="btn btn-success btn-icon-split btn-sm" data-toggle="modal"
                        data-target="#exampleModal" id="#myBtn">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Pencairan</span>
                    </button>


                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Pencairan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST" action="{{url('Aksipencairan')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="pencairan">Jumlah Pencairan</label>
                                            <input type="text" class="form-control" id="jumlah" name="jumlah"
                                                placeholder="Jumlah Pencairan">
                                        </div>
                                        <small class="form-text text-muted">Setiap Pencairan Saldo Terdapat pemotongan
                                            sebesar 1 %</small>
                                        <input type="hidden" value="{{session('id_mitra')}}">

                                        <div class="form-group">
                                            <!-- <label for="status">id mitra</label> -->
                                            <input type="hidden" hidden class="form-control" id="id_mitra"
                                                name="id_mitra" value="{{session('id_mitra')}}">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-danger"
                                            data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-success">Cairkan</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>

                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>No.</th>
                                <th>Tanggal Pencairan</th>
                                <th>Jumlah Pencairan Saldo</th>
                                <th>Potongan 1%</th>
                                <th>Status</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach($datas as $data)
                            <tr>

                                <td>{{$loop->iteration}}</td>
                                <td>{{date('d-m-Y', strtotime($data->created_at))}}</td>
                                <td>@currency($data->jumlah)</td>
                                <td>@currency($data->profit)</td>

                                <td>@if ($data->status_pencairan == 'Menunggu Validasi')
                                    <span class="badge badge-warning">Menunggu Validasi</span>
                                    @elseif ($data->status_pencairan == 'Ditolak')
                                    <span class="badge badge-danger">Ditolak</span>
                                    @elseif ($data->status_pencairan == 'Diterima')
                                    <span class="badge badge-success">Diterima</span>
                                    @endif</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



    </div>



    @endsection
