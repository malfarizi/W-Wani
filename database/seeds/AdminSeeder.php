<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert([
        	'id' => 1,
        	'email' => "admin123@gmail.com",
            'nama_admin' => "Admin",
            'password' => bcrypt('admin123'),
            'jk' => 'laki-laki',
            'no_telp' => '0898765678342',
            'foto' => 'foto_admin',
            'nama_bank' => 'Bank BRI'
            'nama_rek' => 'Admin Rekening'
            'no_rek' => '087314334'
        ]);
    }
}
