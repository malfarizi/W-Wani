<?php

namespace App\Http\Controllers;

use App\Mitra;
use App\Produk;
use App\Alamat;
use App\Kategori;
use Illuminate\Http\Request;

class DummyController extends Controller
{
    public function test(){
        $data_alamat = ['id_kota' => 149, 'alamat_lengkap' => 'jatibarang'];
        $alamat = Alamat::create($data_alamat);

        $data_mitra = [
            'nama_mitra' => 'Farhan',
            'email' => 'farhan@gmail.com',
            'password' => bcrypt('farhan'), 
            'jk' => 'laki-laki',
            'no_telp' => '089',
            'foto' => '',
            'status' => 'ok',
            'level' => 'mitra',
            'no_rek' => '0333',
            'nama_rekening' => 'Farhan',
            'nama_bank' => 'BNI',
            'id_alamat' => $alamat->id_alamat
        ];
        $mitra = Mitra::create($data_mitra);
        $kategori = Kategori::create(['nama_kategori' => 'buah']);
        $data_produk = [
            'nama_produk' => 'jeruk',
            'deskripsi' => 'segar dan manis',
            'id_kategori' => $kategori->id_kategori, 
            'satuan' => 'gram',
            'harga' => '1000',
            'qty' => '30',
            'berat' => '6',
            'foto' => 'jeruk.jpg',
            'id_mitra' => $mitra->id_mitra
        ];
        Produk::create($data_produk);
    }
}
