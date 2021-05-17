@extends('landing_page.templatelandingpage')
@section('title', 'Warung Tani | Register')

@section('content')

<div id="register" class="section  product" align="center">
    <form class="well form-horizontal" action=" " method="post" id="contact_form" enctype="multipart/form-data">
    @csrf
        <fieldset>

            <!-- Form Name -->
            <legend>
                <left>
                    <h2><b>Register Mitra</b></h2>
                </left>
            </legend><br>

            <!-- Text input-->

            <div class="form-group">
                <label class="col-md-4 control-label">Nama Mitra</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input name="nama_mitra" placeholder="Masukan nama" class="form-control" type="text">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">E-Mail</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input name="email" placeholder="Masukan Email" class="form-control" type="text">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Password</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input name="password" placeholder="Masukan password" class="form-control" type="password">
                    </div>
                </div>
            </div>


            <label>Jenis Kelamin</label>
            <br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jk" id="jk1" value="Laki-laki">
                <label class="form-check-label" for="jk1">Laki - Laki</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jk" id="jk2" value="Perempuan">
                <label class="form-check-label" for="jk2">Perempuan</label>
            </div>



            <div class="form-group">
                <label class="col-md-4 control-label">Nomor Telephone</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input name="no_telp" placeholder="Masukan nomor telephone" class="form-control" type="text">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Foto</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input name="foto" placeholder="Masukan foto" class="form-control" type="file">
                    </div>
                </div>
            </div>


            <input hidden="" name="status" value="Calon Mitra" type="text">


            <!-- Text input-->

            <div class="form-group">
                <label class="col-md-4 control-label">Nomor Rekening</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input name="no_rek" placeholder="Masukan nomor rekening" class="form-control" type="text">
                    </div>
                </div>
            </div>

            <!-- Text input-->

            <div class="form-group">
                <label class="col-md-4 control-label">Nama Bank</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input name="nama_bank" placeholder="Masukan nama bank" class="form-control" type="text">
                    </div>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label">Alamat</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <textarea input name="alamat" placeholder="Masukan alamat" class="form-control"
                            type="text"></textarea>
                    </div>
                </div>
            </div>


            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4"><br>
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="submit"
                        class="btn btn-warning">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspDaftar <span
                            class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
                </div>
            </div>

        </fieldset>
    </form>
</div>
</div>
@endsection
<!-- <script src="{{url('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{url('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
</body>

</html> -->
