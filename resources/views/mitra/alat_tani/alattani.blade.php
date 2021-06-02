@extends('mitra.templatemitra')

@section('title', 'Alat Tani')

@section('content')

<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Alat Tani</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Alat Tani</li>
        </ol>
    </div>

    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Alat Tani</h6>
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
                    @if(session('status') == 'Diterima')
                    <button type="button" class="btn btn-success btn-icon-split btn-sm" data-toggle="modal"
                        data-target="#exampleModal" id="#myBtn">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Data Alat Tani</span>
                    </button>

                    @endif
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Alat Tani</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form method="POST" action="{{url('addAlattani')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="nama_alat">Nama Alat</label>
                                            <input type="text" class="form-control" id="nama_alat" name="nama_alat"
                                                placeholder="Masukan Nama Alat">
                                        </div>

                                        <div class="form-group">
                                            <label for="harga">Harga</label>
                                            <input type="text" class="form-control" id="harga" name="harga"
                                                placeholder="Masukan Harga">
                                        </div>

                                        <div class="form-group">
                                            <label for="desc">Deskripsi</label>
                                            <textarea input type="text" class="form-control" id="desc" name="desc"
                                                placeholder="Masukan Deskripsi"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="foto">Foto</label>
                                            <input type="file" class="form-control" id="foto" name="foto"
                                                placeholder="Masukan foto">
                                        </div>

                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select name="status" id="status" class="form-control">
                                                <option>Pilih Status</option>
                                                <option value="Tersedia">Tersedia</option>
                                                <option value="Tidak Tersedia">Tidak Tersedia</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>kategori</label>
                                            <select class="form-control" name="kategori">
                                                <option>Pilih Kategori</option>
                                                <option value="Perontok Padi"> Perontok Padi </option>
                                                <option value="Traktor"> Traktor</option>
                                            </select>
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
                {{-- Akhir Modal Tambah --}}


                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>No.</th>
                                <th>Nama Alat</th>
                                <th>Harga</th>
                                <th>Deskripsi</th>
                                <th>Foto</th>
                                <th>Status</th>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datas as $data)
                            <tr>
                                <td>{{$loop->iteration}}.</td>
                                <td>{{$data->nama_alat}}</td>
                                <td>@currency($data->harga)</td>
                                <td>{{$data->desc}}</td>
                                <td><img src="{{ url('images/foto_alat/'.$data->foto) }}"
                                        style="width: 200px; height: 150px;"></td>
                                <td>{{$data->status}}</td>
                                <td>{{$data->kategori}}</td>

                                <td>
                                    <button type="button" class="btn btn-primary"  data-toggle="modal"
                                        data-target="#edit-data-{{$data->id_alat}}">
                                        <i class="fas fa-user-edit"></i>
                                    </button>
                                    <form action="{{url('deleteAlattani', $data->id_alat)}}" method="POST"
                                        class="inline">
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
        {{-- Modal edit --}}
        <div class="modal fade" id="edit-data-{{$data->id_alat}}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Alat Tani</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{url('editAlattani', $data->id_alat)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama_alat">Nama Alat</label>
                                <input type="text" class="form-control" id="nama_alat" name="nama_alat"
                                    value=" {{$data->nama_alat}} ">
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="text" class="form-control" id="harga" name="harga"
                                    value=" {{$data->harga}} ">
                            </div>
                            <div class="form-group">
                                <label for="desc">Deskripsi</label>
                                <input type="text" class="form-control" id="desc" name="desc" value=" {{$data->desc}} ">
                            </div>
                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <input type="file" class="form-control" id="foto" name="foto" value=" {{$data->foto}} ">
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option> {{$data->status}}</option>
                                    <option value="Tersedia"> Tersedia </option>
                                    <option value="Tidak Tersedia"> Tidak Tersedia</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>kategori</label>
                                <select class="form-control" name="kategori">
                                    <option>Pilih Kategori</option>
                                    <option value="Perontok Padi"> Perontok Padi </option>
                                    <option value="Traktor"> Traktor</option>
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
        {{-- Akhir Modal Edit --}}
    </div>
    @endsection
