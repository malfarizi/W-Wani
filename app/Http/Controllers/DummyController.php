<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class DummyController extends Controller
{
    public function test(){

        DB::table('alamat')->insert([
            'id_alamat' => 1, 
            'id_kota' => 17, 
            'alamat_lengkap' => 'Sukajadi',
        ]);

        DB::table('alamat')->insert([
            'id_alamat' => 2, 
            'id_kota' => 17, 
            'alamat_lengkap' => 'Lembang',
        ]);

        DB::table('kategori')->insert([
        	'id_kategori' => 1,
        	'nama_kategori' => 'Beras',
        ]);

        DB::table('mitra')->insert([
            'id_mitra' => 1,
            'nama_mitra' => 'Petani',
            'email' => 'petani123@gmail.com',
            'password' => 'petani123', 
            'jk' => 'laki-laki',
            'no_telp' => '0823648221',
            'foto' => '',
            'status' => 'Diterima',
            'level' => 'Petani',
            'no_rek' => '325235324',
            'nama_rekening' => 'Petani',
            'nama_bank' => 'BRI',
            'id_alamat' => 1
        ]);

        DB::table('mitra')->insert([
            'id_mitra' => 2,
            'nama_mitra' => 'Vendor',
            'email' => 'vendor123@gmail.com',
            'password' => 'petani', 
            'jk' => 'laki-laki',
            'no_telp' => '0823648221',
            'foto' => '',
            'status' => 'Diterima',
            'level' => 'Vendor',
            'no_rek' => '325235324',
            'nama_rekening' => 'Vendor',
            'nama_bank' => 'BRI',
            'id_alamat' => 2
        ]);

        DB::table('alat')->insert([
            'id_alat' => 1,
            'status' => 'Tersedia',
            'desc' => 'Perontok Padi',
            'foto' => '1622657644_perontok padi.jpg', 
            'harga' => 15000,
            'nama_alat' => 'Traktor',
            'kategori', => 'Traktor',
            'id_mitra' => 2
        ]);

        DB::table('produk')->insert([
        	'id_produk' => 1,
        	'nama_produk' => 'Beras',
        	'deskripsi' => 'Beras putih murah dan berkualitas',
        	'qty' => 10,
            'harga' => 10000,
            'satuan' => 'kg',
            'berat' => 500,
            'foto' => '',
            'id_mitra' => 1,
            'id_kategori' => 1,
        ]);
    }
}
