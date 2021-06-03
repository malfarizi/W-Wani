<!DOCTYPE html>
<html>

<head>
    <title>Laporan Pembayaran Produk</title>
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
            <h3>Laporan Pembayaran Produk
        </u>

    </center>
    <p> <strong>Mitra</strong> : {{session('nama_mitra')}}</h3>
    </p>
    <table class='table table-border  table-dark'>
        <thead class="thead-dark">
            <tr>
                <th>No.</th>
                <th>Nama Pembeli</th>
                <th>Produk</th>
                <th>Qty</th>
                <th>Tanggal Pesan</th>
                <th>Kurir</th>
                <th>Alamat</th>
                <th>Status</th>



            </tr>
        </thead>

        @foreach($datas as $data)
        <tr align="center">

            <td>{{$loop->iteration}}.</td>
            <td>{{$data->nama_pembeli}}</td>
            <td>{{$data->nama_produk}}</td>
            <td>{{$data->qty}}</td>
            <td>{{$data->tanggal}}</td>
            <td>{{$data->kurir}}</td>
            <td>{{$data->alamat_lengkap}}</td>
            <td>{{$data->status}}</td>
            
        </tr>
        @endforeach
        </tbody>
    </table>

</body>

</html>
