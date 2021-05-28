@extends('landing_page.templatelandingpage')

@section('title', 'Kelola Pemesanan Alat Tani')

@section('content')

<div class="container-fluid" id="container-wrapper">
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
      
          <div class="d-flex justify-content-end align-items-center">
          
            <ol>
              <li><a href="/">Home</a></li>
              <li>Pemesanan Alat Tani</li>
            </ol>
          </div>
      
        </div>
      </section>

    <div class="row mt-3">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="contact mb-4">
                

                @if (session('success'))
                <div class="card-header">
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h6><i class="fas fa-check"></i><b> Berhasil!</b></h6>
                        {{ session('success') }}
                    </div>
                </div>
                @endif
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
                                <th>Tanggal Pemesanan</th>
                                <th>Luas Tanah</th>
                                <th>Alamat</th>
                                <th>Pembayaran</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datas as $data)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$data->nama_alat}}</td>
                                <td>{{$data->nama_mitra}}</td>
                                <td>{{$data->tanggal}}</td>
                                <td>{{$data->luas_tanah}}</td>
                                <td>{{$data->total_harga}}</td>
                                <td>{{$data->alamat_lengkap}}</td>
                                <td>
                                </td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>




    </div>
    @endsection
