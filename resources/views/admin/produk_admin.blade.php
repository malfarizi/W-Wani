@extends('admin.templateadmin')

@section('title', 'Produk')
    
@section('content')

<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Produk</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Daftar Produk</li>
        </ol>
    </div>

    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Produk</h6>
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
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Deskripsi</th>
                                <th>Qty</th>
                                <th>Satuan</th>
                                <th>Berat</th>
                                <th>Kategori</th>
                                <th>Foto</th>
                                <th>Nama Mitra</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($datas as $data)
                            <tr>
                               <td>{{$loop->iteration}}.</td>
                                <td>{{$data->nama_produk}}</td>
                                <td>{{$data->harga}}</td>
                                <td>{{$data->deskripsi}}</td>
                                <td>{{$data->qty}}</td>
                                <td>{{$data->satuan}}</td>
                                <td>{{$data->berat}}</td>
                                <td>{{$data->nama_kategori}}</td>
                                <td><img src="{{ url('images/foto_produk/'.$data->foto) }}"
                                        style="width: 200px; height: 150px;"></td>
                                <td>{{$data->nama_mitra}}</td>
                                
                               
                               </div>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        

    </div>
   
   
    
@endsection


