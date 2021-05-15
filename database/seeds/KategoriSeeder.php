<?php

use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori')->insert([
        	'id_kategori' => 1,
        	'nama_kategori' => 'Sayur',
        ]);
    }
}
