@extends('mitra.templatemitra')

@section('title', 'Dashboard Mitra')

@section('content')

<!-- Container Fluid-->
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
                                <img src="{{ url('images/foto_mitra/'.$data->foto) }}" alt="" class="rounded-circle"
                                    width="150">
                                <div class="mt-3">
                                    <h4>{{$data->nama_mitra}}</h4>
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
                                    {{$data->nama_rekening}}
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
                                        data-target="#edit-data-{{$data->id_mitra}}">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal edit --}}
    <div class="modal fade" id="edit-data-{{$data->id_mitra}}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{$data->nama_mitra}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{url('editProfilmitra', $data->id_mitra)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_mitra">Nama Mitra</label>
                            <input type="text" class="form-control" id="nama_mitra" name="nama_mitra"
                                value=" {{$data->nama_mitra}} ">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value=" {{$data->email}} ">
                        </div>
                        {{-- <div class="form-group">
                            <label for="password">Passsword</label>
                            <input type="password" class="form-control" id="passsword" name="passsword" value=" {{$data->passsword}} ">
                        </div> --}}
                        <div class="form-group">
                            <label for="no_telp">No Telp</label>
                            <input type="text" class="form-control" id="no_telp" name="no_telp"
                                value=" {{$data->no_telp}} ">
                        </div>
                        <div class="form-group">
                            <label for="no_rek">No Rek</label>
                            <input type="text" class="form-control" id="no_rek" name="no_rek"
                                value=" {{$data->no_rek}} ">
                        </div>
                        <div class="form-group">
                            <label for="nama_rekening">Nama Rekening</label>
                            <input type="text" class="form-control" id="nama_rekening" name="nama_rekening"
                                value=" {{$data->nama_rekening}} ">
                        </div>

                        <div class=" form-group">
                            <label for="nama_bank">Nama Bank</label>
                            <select class="select2-single-placeholder form-control" value="{{$data->nama_bank}}" name="nama_bank" id="nama_bank"
                                style="width: 100%">
                                <option value="">{{$data->nama_bank}}</option>
                                <option value="Bank BCA">Bank BCA </option>
                                <option value="Bank Mandiri"> Bank Mandiri </option>
                                <option value="Bank BNI"> Bank BNI </option>
                                <option value="Bank BNI Syariah">Bank BNI Syariah </option>
                                <option value="Bank BRI">Bank BRI </option>
                                <option value="Bank Syariah Mandiri">Bank Syariah Mandiri </option>
                                <option value="Bank CIMB Niaga">Bank CIMB Niaga </option>
                                <option value="Bank CIMB Niaga Syariah">Bank CIMB Niaga Syariah </option>
                                <option value="Bank Tabungan Pensiunan Nasional (BTPN)">Bank Tabungan Pensiunan Nasional
                                    (BTPN)
                                </option>
                                <option value="JENIUS">JENIUS </option>
                                <option value="Bank BRI Syariah">Bank BRI Syariah </option>
                                <option value="Bank Tabungan Negara (BTN)"> Bank Tabungan Negara (BTN) </option>
                                <option value="Permata Bank"> Permata Bank </option>
                                <option value="Bank Danamon">Bank Danamon </option>
                                <option value="Bank BII Maybank">Bank BII Maybank </option>
                                <option value="Bank Mega"> Bank Mega </option>
                                <option value="Bank Sinarmas">Bank Sinarmas </option>
                                <option value="Bank Commonwealth"> Bank Commonwealth </option>
                                <option value="Bank OCBC NISP">Bank OCBC NISP </option>
                                <option value="Bank Bukopin">Bank Bukopin </option>
                                <option value="Bank BCA Syariah">Bank BCA Syariah </option>
                                <option value="Bank Lippo">Bank Lippo </option>
                                <option value="Citibank">Citibank </option>
                                <option value="Indosat Dompetku">Indosat Dompetku</option>
                                <option value="Telkomsel Tcash">Telkomsel Tcash </option>
                                <option value="Bank Jabar dan Banten (BJB)">Bank Jabar dan Banten (BJB) </option>
                                <option value="Bank DKI">Bank DKI </option>
                                <option value="BPD DIY"> BPD DIY </option>
                                <option value="Bank Jateng"> Bank Jateng </option>
                                <option value="Bank Jatim"> Bank Jatim </option>
                                <option value="BPD Jambi"> BPD Jambi </option>
                                <option value="BPD Aceh, BPD Aceh Syariah">BPD Aceh, BPD Aceh Syariah </option>
                                <option value="Bank Sumut">Bank Sumut </option>
                                <option value="Bank Nagari">Bank Nagari </option>
                                <option value="Bank Riau">Bank Riau </option>
                                <option value="Bank Lampung">Bank Lampung </option>
                                <option value="Bank Kalsel">Bank Kalsel </option>
                                <option value="Bank Kalimantan Barat">Bank Kalimantan Barat </option>
                                <option value="Bank Kalimantan Timur dan Utara">Bank Kalimantan Timur dan Utara
                                </option>
                                <option value="Bank Kalteng">Bank Kalteng </option>
                                <option value="Bank Sulsel dan Barat">Bank Sulsel dan Barat </option>
                                <option value="Bank Sulut Gorontalo">Bank Sulut Gorontalo </option>
                                <option value="Bank NTB, NTB Syariah">Bank NTB, NTB Syariah </option>
                                <option value="BPD Bali">BPD Bali </option>
                                <option value="Bank NTT">Bank NTT </option>
                                <option value="Bank Maluku Malut">Bank Maluku Malut </option>
                                <option value="Bank Papua">Bank Papua </option>
                                <option value="Bank Bengkulu">Bank Bengkulu </option>
                                <option value="Bank Sulawesi Tengah">Bank Sulawesi Tengah </option>
                                <option value="Bank Sultra">Bank Sultra </option>
                                <option value="Bank Ekspor Indonesia">Bank Ekspor Indonesia </option>
                                <option value="Bank Panin"> Bank Panin </option>
                                <option value="Bank Arta Niaga Kencana">Bank Arta Niaga Kencana </option>
                                <option value="Bank UOB Indonesia">Bank UOB Indonesia </option>
                                <option value="American Express Bank LTD">American Express Bank LTD </option>
                                <option value="Citibank N.A">Citibank N.A </option>
                                <option value="JP. Morgan Chase Bank, N.A">JP. Morgan Chase Bank, N.A </option>
                                <option value="Bank of America, N.A">Bank of America, N.A </option>
                                <option value="ING Indonesia Bank">ING Indonesia Bank </option>
                                <option value="Bank Artha Graha Internasional">Bank Artha Graha Internasional </option>
                                <option value="Bank Credit Agricole Indosuez">Bank Credit Agricole Indosuez </option>
                                <option value="The Bangkok Bank Comp. LTD">The Bangkok Bank Comp. LTD </option>
                                <option value="The Hongkong & Shanghai B.C. (Bank HSBC)">The Hongkong & Shanghai B.C.
                                    (Bank HSBC)
                                </option>
                                <option value="The Bank of Tokyo Mitsubishi UFJ LTD">The Bank of Tokyo Mitsubishi UFJ
                                    LTD </option>
                                <option value="Bank Sumitomo Mitsui Indonesia">Bank Sumitomo Mitsui Indonesia </option>
                                <option value="Bank DBS Indonesia">Bank DBS Indonesia </option>
                                <option value="Bank Resona Perdania">Bank Resona Perdania </option>
                                <option value="Bank Mizuho Indonesia">Bank Mizuho Indonesia </option>
                                <option value="Standard Chartered Bank">Standard Chartered Bank </option>
                                <option value="Bank Keppel Tatlee Buana">Bank Keppel Tatlee Buana </option>
                                <option value="Bank Capital Indonesia"> Bank Capital Indonesia </option>
                                <option value="Bank BNP Paribas Indonesia">Bank BNP Paribas Indonesia </option>
                                <option value="Bank UOB Indonesia">Bank UOB Indonesia </option>
                                <option value="Korea Exchange Bank Danamon"> Korea Exchange Bank Danamon </option>
                                <option value="Bank BJB Syariah">Bank BJB Syariah </option>
                                <option value="Bank ANZ Indonesia">Bank ANZ Indonesia </option>
                                <option value="Deutsche Bank AG.">Deutsche Bank AG. </option>
                                <option value="Bank Woori Indonesia">Bank Woori Indonesia </option>
                                <option value="Bank OF China ">Bank OF China </option>
                                <option value="Bank Bumi Arta">Bank Bumi Arta </option>
                                <option value="Bank Ekonomi">Bank Ekonomi </option>
                                <option value="Bank Antardaerah">Bank Antardaerah </option>
                                <option value="Bank Haga">Bank Haga </option>
                                <option value="Bank IFI">Bank IFI </option>
                                <option value="Bank JTRUST">Bank JTRUST </option>
                                <option value="Bank Mayapada">Bank Mayapada </option>
                                <option value="Bank Nusantara Parahyangan">Bank Nusantara Parahyangan </option>
                                <option value="Bank of India Indonesia">Bank of India Indonesia </option>
                                <option value="Bank Mestika Dharma">Bank Mestika Dharma </option>
                                <option value="Bank Metro Express (Bank Shinhan Indonesia)">Bank Metro Express (Bank
                                    Shinhan
                                    Indonesia) </option>
                                <option value="Bank Maspion Indonesia"> Bank Maspion Indonesia </option>
                                <option value="Bank JTRUST">Bank JTRUST </option>
                                <option value="Bank Hagakita">Bank Hagakita </option>
                                <option value="Bank Ganesha">Bank Ganesha </option>
                                <option value="Bank Windu Kentjana">Bank Windu Kentjana </option>
                                <option value="Halim Indonesia Bank (Bank ICBC Indonesia)">Halim Indonesia Bank (Bank
                                    ICBC
                                    Indonesia) </option>
                                <option value="Bank Harmoni International"> Bank Harmoni International </option>
                                <option value="Bank QNB Kesawan (Bank QNB Indonesia)">Bank QNB Kesawan (Bank QNB
                                    Indonesia)
                                </option>
                                <option value="Bank Himpunan Saudara 1906">Bank Himpunan Saudara 1906 </option>
                                <option value="Bank Swaguna">Bank Swaguna </option>
                                <option value="Bank Jasa Jakarta">Bank Jasa Jakarta</option>
                                <option value="Bank Bisnis Internasional">Bank Bisnis Internasional</option>
                                <option value="Bank Sri Partha">Bank Sri Partha</option>
                                <option value="Bank Jasa Jakarta">Bank Jasa Jakarta</option>
                                <option value="Bank Bintang Manunggal">Bank Bintang Manunggal</option>
                                <option value="Bank MNC / Bank Bumiputera">Bank MNC / Bank Bumiputera</option>
                                <option value="Bank Yudha Bhakti">Bank Yudha Bhakti</option>
                                <option value="Bank BRI Agro">Bank BRI Agro</option>
                                <option value="Bank Indomonex (Bank SBI Indonesia)">Bank Indomonex (Bank SBI Indonesia)
                                </option>
                                <option value="Bank Royal Indonesia">Bank Royal Indonesia</option>
                                <option value="Bank Alfindo (Bank National Nobu)">Bank Alfindo (Bank National Nobu)
                                </option>
                                <option value="Bank Syariah Mega">Bank Syariah Mega</option>
                                <option value="Bank Ina Perdana">Bank Ina Perdana</option>
                                <option value="Bank Harfa"> Bank Harfa</option>
                                <option value="Prima Master Bank"> Prima Master Bank</option>
                                <option value="Bank Persyarikatan Indonesia">Bank Persyarikatan Indonesia</option>
                                <option value="Bank Akita">Bank Akita</option>
                                <option value="Liman International Bank">Liman International Bank</option>
                                <option value="Anglomas Internasional Bank">Anglomas Internasional Bank</option>
                                <option value="Bank Dipo International (Bank Sahabat Sampoerna)"> Bank Dipo
                                    International (Bank
                                    Sahabat Sampoerna)</option>
                                <option value="Bank Kesejahteraan Ekonomi">Bank Kesejahteraan Ekonomi</option>
                                <option value="Bank Artos IND">Bank Artos IND</option>
                                <option value="Bank Purba Danarta">Bank Purba Danarta</option>
                                <option value="Bank Multi Arta Sentosa">Bank Multi Arta Sentosa</option>
                                <option value="Bank Mayora Indonesia">Bank Mayora Indonesia</option>
                                <option value="Bank Index Selindo">Bank Index Selindo</option>
                                <option value="Centratama Nasional Bank">Centratama Nasional Bank</option>
                                <option value="Bank Victoria International">Bank Victoria International</option>
                                <option value="Bank Fama Internasional"> Bank Fama Internasional</option>
                                <option value="Bank Mandiri Taspen Pos">Bank Mandiri Taspen Pos</option>
                                <option value="Bank Harda">Bank Harda</option>
                                <option value="BPR KS">BPR KS</option>
                                <option value="Bank Agris">Bank Agris</option>
                                <option value="Bank Merincorp">Bank Merincorp</option>
                                <option value="Bank Maybank Indocorp">Bank Maybank Indocorp</option>
                                <option value="Bank OCBC – Indonesia">Bank OCBC – Indonesia</option>
                                <option value="Bank CTBC (China Trust) Indonesia">Bank CTBC (China Trust) Indonesia
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control" id="foto" name="foto" value=" {{$data->foto}} ">
                        </div>

                        {{-- <div class=" form-group">
                            <label for="id_kota">Kota</label>
                            <select class="select2-single-placeholder form-control"  name="id_kota" id="id_kota"
                                style="width: 100%">
                                <option value="">{{$data->kota}}</option>
                                @foreach ($kota as $item)
                                <option value="{{$item->id_kota}}">{{$item->tipe}} {{$item->nama_kota}} -
                                    {{$item->kodepos}}
                                </option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat"  {{$data->alamat_lengkap}}rows="5"
                                "></textarea>

                        </div> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
            </div>
        </div>
    </div>

    </form>






    @endsection
