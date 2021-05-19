@extends('mitra.templatemitra')

@section('title', 'Kelola Pembayaran Alat Tani')
    
@section('content')

<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Pembayaran Alat Tani</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Kelola Pembayaran Alat Tani</li>
        </ol>
    </div>

    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Kelola Pemesanan Alat Tani</h6>
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
                                <th>Tanggal Pemesanan</th>
                                <th>Luas Tanah</th>
                                <th>Total Harga</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
    
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
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
                                <input type="text" class="form-control" id="id_alat" name="id_alat"
                                    value="  " >
                            </div>
                            <div class="form-group">
                                <label for="id_mitra">Mitra Pemesan</label>
                                <input type="text" class="form-control" id="id_mitra" name="id_mitra"
                                    value="  " >
                            </div>
                            <div class="form-group">
                                <label for="tanggal">Tanggal Pemesanan</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal"
                                    value="  " > 
                            </div>
                            <div class="form-group">
                                <label for="foto">Luas Tanah</label>
                                <input type="file" class="form-control" id="foto" name="foto"
                                    value="  " >
                            </div>
                            <div class="form-group">
                                <label for="status">Total Harga</label>
                                <input type="text" class="form-control" id="status" name="status"
                                    value="  " >
                            </div>
                             <div class="form-group">
                                <label for="alamat_lengkap">Alamat Lengkap</label>
                                <textarea input type="text" class="form-control" id="alamat_lengkap" name="alamat_lengkap"
                                    value="  " ></textarea>
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
    

