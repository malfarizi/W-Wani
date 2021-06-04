@extends('admin.templateadmin')

@section('title', 'Admin')
    
@section('content')

<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profil</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Profil</li>

        </ol>
    </div>



    <div class="container">
        <div class="main-body">

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="{{ url('images/foto_admin/'.$data->foto) }}" alt="" class="rounded-circle"
                                    width="150">
                                <div class="mt-3">
                                    <h4>{{$data->nama_admin}}</h4>
                                    <p class="text-secondary mb-1">{{$data->email}}</p>
                                    <p class="text-muted font-size-sm">{{$data->no_telp}}</p>
                                    {{-- <button class="btn btn-primary">Follow</button>
                                    <button class="btn btn-outline-primary">Message</button> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Nama Bank</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$data->nama_bank}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Nama Rekening</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$data->nama_rek}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Nomor Rekening</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$data->no_rek}}
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-sm-12">
                                    <a class="btn btn-info " data-toggle="modal"
                                        data-target="#edit-data-{{$data->id}}">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


        
        {{-- Modal edit --}}
       
        <div class="modal fade" id="edit-data-{{$data->id}}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Admin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{url('editAdmin', $data->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    value="{{$data->email}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nama_admin">Nama Admin</label>
                                <input type="text" class="form-control" id="nama_admin" name="nama_admin" value="{{$data->nama_admin}}">
                             <label>Jenis Kelamin</label>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jk" id="jk1" value="laki-laki"
                                    {{ ($data->jk=="laki-laki")? "checked" : "" }}>
                                <label class="form-check-label" for="jk1">Laki - Laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jk" id="jk2" value="perempuan"
                                    {{ ($data->jk=="perempuan")? "checked" : "" }}>
                                <label class="form-check-label" for="jk2">Perempuan</label>
                            </div>
                            <div class="form-group">
                                <label for="no_telp">Nomor Telephone</label>
                                <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{$data->no_telp}}">
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
    </div>
</div>
    </div>
   
   
    
@endsection


