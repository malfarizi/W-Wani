@extends('admin.templateadmin')

@section('title', 'Calon Mitra')
    
@section('content')

<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Calon Mitra</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Calon Mitra</li>
        </ol>
    </div>

    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Calon Mitra</h6>
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

                {{-- Modal Tambah --}}
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <!-- <button type="button" class="btn btn-success btn-icon-split btn-sm" data-toggle="modal"
                        data-target="#exampleModal" id="#myBtn">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Data Calon Mitra</span>
                    </button> -->

                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Calon Mitra</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST" action="{{url('#')}}">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="nama_mitra">Nama Mitra</label>
                                            <input type="text" class="form-control" id="nama_mitra" name="nama_mitra"
                                                placeholder="Masukan Nama Kategori">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" id="email" name="email"
                                                placeholder="Masukan email">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="Masukan password">
                                        </div>
                                        <label>Jenis Kelamin</label>
                                        <br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jk" id="jk1"
                                                value="laki-laki">
                                            <label class="form-check-label" for="jk1">Laki - Laki</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jk" id="jk2"
                                                value="perempuan">
                                            <label class="form-check-label" for="jk2">Perempuan</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="no_telp">Nomor Telephone</label>
                                            <input type="text" class="form-control" id="no_telp" name="no_telp"
                                                placeholder="Masukan nomor telepohone">
                                        </div>
                                        <div class="form-group">
                                            <label for="foto">Foto</label>
                                            <input type="file" class="form-control" id="foto" name="foto"
                                                placeholder="Masukan Foto">
                                        </div>
                                         <div class="form-group">
                                            <label for="status">Status</label>
                                            <input type="text" class="form-control" id="status" name="status"
                                                placeholder="Masukan status">
                                        </div>
                                        <div class="form-group">
                                            <label for="level">Level</label>
                                            <input type="text" class="form-control" id="level" name="level"
                                                placeholder="Masukan nomor telepohone">
                                        </div>
                                        <div class="form-group">
                                            <label for="no_rek">Nomor Rekening</label>
                                            <input type="text" class="form-control" id="no_rek" name="no_rek"
                                                placeholder="Masukan nomor rekening">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_rekening">Nama Rekening</label>
                                            <input type="text" class="form-control" id="nama_rekening" name="nama_rekening"
                                                placeholder="Masukan nama rekening">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_bank">Nama Bank</label>
                                            <input type="text" class="form-control" id="nama_bank" name="nama_bank"
                                                placeholder="Masukan nama bank">
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" class="form-control" id="alamat" name="alamat"
                                                placeholder="Masukan nomor telepohone">
                                        </div>


                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-danger"
                                            data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
                {{-- Akhir Modal Tambah --}}


                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>No.</th>
                                <th>Nama Mitra</th>
                                <th>Email</th>
                                <th>Jenis Kelamin</th>
                                <th>Nomor Telephone</th>
                                <th>Detail</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
    
                            <tr>
                                <td>1.</td>
                                <td>Adni</td>
                                <td>adni@gmail.com</td>
                                <td>Perempuan</td>
                                <td>04224242</td>
                                <td>!Detail</td>
                                
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#edit-data">
                                        <i class="fas fa-user-edit"></i>
                                    </button>
                                    <form action="" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"><i
                                                class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        
        {{-- Modal edit --}}
        <div class="modal fade" id="edit-data" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Kategori</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="post">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama_mitra">Nama Mitra</label>
                                <input type="text" class="form-control" id="nama_mitra" name="nama_mitra"
                                    value="  " readonly>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <input type="text" class="form-control" id="status" name="status"
                                    value="  " readonly>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="Level">Level</label>
                                <input type="text" class="form-control" id="Level" name="Level"
                                    value="  " readonly>
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
@endsection
    

