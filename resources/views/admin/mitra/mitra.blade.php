@extends('admin.templateadmin')

@section('title', 'Mitra')

@section('content')

<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Mitra</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Mitra</li>
        </ol>
    </div>

    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Mitra</h6>
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
                                <th>Nama Mitra</th>
                                <th>Email</th>
                                <th>Jenis Kelamin</th>
                                <th>Nomor Telephone</th>
                                <th>Detail Mitra</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datas as $data)
                            <tr>
                                <td>{{$loop->iteration}}.</td>
                                <td>{{$data->nama_mitra}}</td>
                                <td>{{$data->email}}</td>
                                <td>{{$data->jk}}</td>
                                <td>{{$data->no_telp}}</td>

                                <td><button type="button" class="btn btn-primary btn-icon-split btn-sm"
                                        data-toggle="modal" data-target="#modal-detail-{{$data->id_mitra}}">
                                        <span class="icon text-white-50"><i class="fas fa-info-circle"></i>
                                        </span>
                                        <span class="text">Detail</span>
                                    </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#edit-data-{{$data->id_mitra}}">
                                        <i class="fas fa-user-edit"></i>
                                    </button>
                                    <form action="" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"><i
                                                class="fas fa-trash"></i></button>
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
        <!-- Modal Detail -->
        <div class="modal fade" id="modal-detail-{{$data->id_mitra}}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{$data->nama_mitra }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Foto : <img src="{{ url('images/mitra/'.$data->foto) }}"
                                    style="width: 200px; height: 150px;"> </li>
                            <li class="list-group-item">No Rekening : {{$data->no_rek}}</li>
                            <li class="list-group-item">Nama Rekening : {{$data->nama_rekening}} </li>
                            <li class="list-group-item">Nama Bank : {{$data->nama_bank}} </li>
                            <li class="list-group-item">Alamat : {{$data->alamat_lengkap}} </li>
                            <li class="list-group-item">Status : {{$data->status}} </li>
                            <li class="list-group-item">Level : {{$data->level}} </li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach



        {{-- Modal edit --}}

        @foreach ($datas as $data)
        <div class="modal fade" id="edit-data-{{$data->id_mitra}}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Status Mitra</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{url('editMitra', $data->id_mitra)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="username">Nama Mitra</label>
                                <input type="text" class="form-control" id="nama_mitra" name="nama_mitra"
                                    value=" {{ $data->nama_mitra }} " readonly="">
                            </div>
                            <div class="form-group">
                                <label for="level">Level</label>
                                <input type="text" class="form-control" id="level" name="level"
                                    value=" {{ $data->level }} " readonly="">
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="select2-single-placeholder form-control" name="status" id="status"
                                    style="width: 100%">
                                    <option value="{{$data->status}}">{{$data->status}}</option>
                                    <option value="Diterima">Diterima</option>
                                    <option value="Belum Diterima">Belum Diterima</option>
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
    </div>
    @endsection
