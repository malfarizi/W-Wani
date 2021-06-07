<!DOCTYPE html>
<html>

<head>
    <title>Laporan Pembayaran Alat Tani</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style type="text/css">
        table {
            border-left: 0.01em solid #ccc;
            border-right: 0;
            border-top: 0.01em solid #ccc;
            border-bottom: 0;
            border-collapse: collapse;
        }

    </style>
    <style type="text/css">
        table td,
        table th {
            border-left: 0;
            border-right: 0.01em solid #ccc;
            border-top: 0;
            border-bottom: 0.01em solid #ccc;
        }

    </style>

</head>

<body>

    <center>
        <u>
            <h3>Laporan Pembayaran Alat Tani
        </u>
        
    </center>
    <p> <strong>Vendor</strong> : {{session('nama_mitra')}}</h3></p>
    <table class='table table-border '>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nomor Pemesanan</th>
                <th>Nama Alat</th>
                <th>Mitra Pemesan</th>
                <th>Tanggal Sewa / Sampai</th>
                <th>Luas Tanah(bahu)</th>
                <th>Total Harga</th>
                <th>Alamat</th>
                <th>Tanggal Bukti</th>
                <th>Status</th>



            </tr>
        </thead>

        @foreach($datas as $data)
        <tr align="center">

            <td>{{$loop->iteration}}.</td>
            <td>{{$data->id_pemesanan_alat}}</td>
            <td>{{$data->nama_alat}}</td>
            <td>{{$data->nama_mitra}}</td>
            <td>{{$data->tanggal_sewa}} / {{$data->tanggal_kembali}}</td>
            <td>{{$data->luas_tanah}}</td>
            <td>@currency($data->total_harga)</td>
            <td>{{$data->alamat_lengkap}}</td>
            <td>{{$data->tanggal_bukti}}</td>
            <td>{{$data->status_pembayaran}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>

</body>

</html>
