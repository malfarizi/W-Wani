<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Admin;
use Illuminate\Support\Facades\Hash;
class PasswordTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_encrypt()
    {
        $password = "12345678";
        $data = new Admin();
		$data->email = "admin1@gmail.com";
		$data->nama_admin  = "Admin1";
		$data->password = $password;
		$data->jk 	= "Laki-laki";
		$data->no_telp = "5353536";
		$data->foto = "foto admin";
		$data->nama_bank ="BRI";
        $data->no_rek ="985678654";
        $data->nama_rek ="Rekening Admin";
		$data->save();

        if(Hash::check($password, $data->password)){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }
}
