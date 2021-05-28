<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Alat;
class AlatTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCreate()
    {
        $alat = Alat::create([
            'nama_alat' => 'Traktor2',
            'harga' => 10000,
            'desc' => 'Deskripsi Traktor',
            'foto' => 'foto alat',
            'status' => 'Tersedia',
            'id_mitra' => 2
        ]);
        
        $this->assertDatabaseHas('alat', [
            'nama_alat' => 'Traktor2',
            'harga' => 10000,
            'desc' => 'Deskripsi Traktor',
            'foto' => 'foto alat',
            'status' => 'Tersedia',
            'id_mitra' => 2
    ]);	
    }
}
