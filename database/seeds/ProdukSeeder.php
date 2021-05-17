<?php

use Illuminate\Database\Seeder;
use App\Produk;
class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produk')->insert([
        	'id_produk' => 1,
        	'nama_produk' => 'Wortel',
        	'deskripsi' => 'deskripsi wortel',
        	'qty' => 10,
            'harga' => 10000,
            'satuan' => 'kg',
            'berat' => 500,
            'foto' => 'foto_wortel',
            'id_mitra' => 1,
            'id_kategori' => 1,
        ]);
    }
}
