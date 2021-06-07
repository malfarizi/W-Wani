<?php

use Illuminate\Database\Seeder;

class AlamatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Alamat::create([
            'id_alamat' => 1, 
            'id_kota' => 3, 
            'alamat_lengkap' => 'aceh',
        ]);

        \App\Alamat::create([
            'id_alamat' => 2, 
            'id_kota' => 3, 
            'alamat_lengkap' => 'Pamayahan, RT/RW 015/004\r\nLohbener',
        ]);

        \App\Alamat::create([
            'id_alamat' => 3, 
            'id_kota' => 2, 
            'alamat_lengkap' => 'aceh',
        ]);

        \App\Alamat::create([
            'id_alamat' => 4, 
            'id_kota' => 4, 
            'alamat_lengkap' => 'Pamayahan, RT/RW 015/004\r\nLohbener',
        ]);
    }
}
