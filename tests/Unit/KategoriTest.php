<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Kategori;
class KategoriTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCreate()
    {
        $kategori = kategori::create([
            'nama_kategori' => 'Sayuran'
        ]);
        
        $this->assertDatabaseHas('kategori', [
            'nama_kategori' => 'Sayuran'
    ]);	
    }
}
