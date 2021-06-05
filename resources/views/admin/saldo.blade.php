@extends('admin.templateadmin')

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
                <div class="card mr-3 ml-3 shadow-lg p-3 mb-3 bg-white rounded">
                    <div class="card-body">
                        
                        <h5 class="card-title">Total Saldo</h5>
                        <p class="card-text">@currency($total_saldo)</p>

                    </div>
                </div>

                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>No.</th>
                                <th>Nama Mitra</th>
                                <th>Jumlah Pencairan Saldo</th>
                                <th>Profit</th>
                                <th>Status</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datas as $data)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$data->nama_mitra}}</td>
                                <td>@currency($data->jumlah)</td>
                                <td>@currency($data->profit)</td>
                                
                               <td>@if ($data->status_pencairan == 'Menunggu Validasi')
                                <span class="badge badge-warning">Menunggu Validasi</span>
                              @elseif ($data->status_pencairan == 'Ditolak')
                              <span class="badge badge-danger">Ditolak</span>
                              @elseif ($data->status_pencairan == 'Diterima')
                              <span class="badge badge-success">Diterima</span>
                              @endif</td>
                                <td><button type="button" class="btn btn-primary"  data-toggle="modal"
                                    data-target="#edit-data-{{$data->id_pencairan}}">
                                    <i class="fas fa-user-edit"></i>
                                </button></td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @foreach($datas as $data)
        {{-- Modal edit --}}
        <div class="modal fade" id="edit-data-{{$data->id_pencairan}}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Alat Tani</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{url('editpencairan', $data->id_pencairan)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            
                            <div class="form-group">
                                <label for="status_pencairan">Status</label>
                                <select class="form-control" name="status_pencairan" id="status_pencairan">
                                    <option aria-readonly="true"> {{$data->status_pencairan}}</option>
                                    <option value="Diterima"> Diterima </option>
                                    <option value="Ditolak"> Ditolak</option>
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
        @endforeach


    </div>



    @endsection
