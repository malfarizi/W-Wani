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
<div class="card w-50 ml-3 shadow-lg p-3 mb-3 bg-white rounded">
  <div class="card-body">
    <h5 class="card-title">Total Saldo</h5>
    <p class="card-text">Rp.6.000.000</p>
    
  </div>
</div>
{{-- Modal Tambah --}}
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
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
                <form method="POST" action="{{url('')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="pencairan">Jumlah Pencairan</label>
                            <input type="text" class="form-control" id="pencairan" name="pencairan"
                                placeholder="Masukan Nama Produk">
                        </div>

                        <div class="form-group">
                            <!-- <label for="status">id mitra</label> -->
                            <input type="text" hidden class="form-control" id="" name="id_mitra"
                                value="{{session('id_mitra')}}">
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

                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>No.</th>
                                <th>Tanggal Pencairan</th>
                                <th>Jumlah Pencairan Saldo</th>
                                <th>Status</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                           
                            <tr>
                             
                               
                                
                               
                               </div>
                            </tr>
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        

    </div>
   
   
    
@endsection


