@extends('mitra.templatemitra')

@section('title', 'Kelola Produk')

@section('content')

<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Produk</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Produk</li>
        </ol>
    </div>

    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Produk</h6>
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
                    <button type="button" class="btn btn-success btn-icon-split btn-sm" data-toggle="modal"
                        data-target="#exampleModal" id="#myBtn">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Produk</span>
                    </button>

                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST" action="{{url('addProduk')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="nama_produk">Nama Produk</label>
                                            <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                                                placeholder="Masukan Nama Produk">
                                        </div>

                                        <div class="form-group">
                                            <label for="harga">Harga</label>
                                            <input type="text" class="form-control" id="harga" name="harga"
                                                placeholder="Masukan Harga">
                                        </div>

                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi</label>
                                            <textarea input type="text" class="form-control" id="deskripsi"
                                                name="deskripsi" placeholder="Masukan Deskripsi"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="qty">Qty</label>
                                            <textarea input type="text" class="form-control" id="qty" name="qty"
                                                placeholder="Masukan qty"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="satuan">Satuan</label>
                                            <textarea input type="text" class="form-control" id="satuan" name="satuan"
                                                placeholder="Masukan satuan"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="berat">Berat</label>
                                            <textarea input type="text" class="form-control" id="berat" name="berat"
                                                placeholder="Masukan berat"></textarea>
                                        </div>


                                        <div class="form-group">
                                            <label for="foto">Foto</label>
                                            <input type="file" class="form-control" id="foto" name="foto"
                                                placeholder="Masukan foto">
                                        </div>
                                        @foreach($kategori as $kat)
                                        <div class="form-group">
                                            <label for="kategori">Kategori</label>
                                            <select name="id_kategori" id="kategori" class="form-control">
                                                <option>Pilih Kategori</option>
                                                <option value="{{$kat->id_kategori}}">{{$kat->nama_kategori}}</option>
                                            </select>
                                        </div>
                                        @endforeach
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
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Deskripsi</th>
                                <th>Qty</th>
                                <th>Satuan</th>
                                <th>Berat</th>
                                <th>Kategori</th>
                                <th>Foto</th>

                                <th>Aksi</th>
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
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#edit-data-{{$data->id_produk}}">
                                        <i class="fas fa-user-edit"></i>
                                    </button>
                                    <form action="{{url('deleteProduk', $data->id_produk)}}" method="POST"
                                        class="d-inline">
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
        <div class="modal fade" id="edit-data-{{$data->id_produk}}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Produk {{$data->nama_produk}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{url('editProduk', $data->id_produk)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama_produk">Nama Produk</label>
                                <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                                    value="{{$data->nama_produk}}">
                            </div>

                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="text" class="form-control" id="harga" name="harga"
                                    value="{{$data->harga}}">
                            </div>

                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                                    value="{{$data->deskripsi}}">
                            </div>

                            <div class="form-group">
                                <label for="qty">Qty</label>
                                <input type="text" class="form-control" id="qty" name="qty"
                                    value=" {{$data->qty}} ">
                            </div>

                            <div class="form-group">
                                <label for="satuan">Satuan</label>
                                <input type="text" class="form-control" id="satuan" name="satuan"
                                    value="{{$data->satuan}}">
                            </div>

                            <div class="form-group">
                                <label for="berat">Berat</label>
                                <input type="text" class="form-control" id="berat" name="berat"
                                    value=" {{$data->berat}}">
                            </div>

                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <input type="file" class="form-control" id="foto" name="foto" value=" {{$data->foto}}">
                            </div>

                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select name="id_kategori" id="kategori" class="form-control">
                                    <option>Pilih Kategori</option>
                                    <option value="{{$data->id_kategori}}">{{$data->nama_kategori}}</option>
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
