<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;

class ProdukTest extends TestCase
{
    /**
     * test api list ketentuan undian
     *
     * @return void
     */

    public function testListProduk()
    {
        $response = $this->getJson('/produk', [
        ]);
        $response->dump();
        $response->assertStatus(200);
    }

    public function testCreateProduk()
    {
        $response = $this->postJson('/produk', [
            'nama' => 'Anggur',
            'harga' => 100000,
            'satuan' => 2,
            'ppn'   => 10,
            'diskon' => 0,
        ]);
        $response->dump();
        $response->assertStatus(201);
    }

    public function testUpdateProduk()
    {
        $response = $this->putJson('/produk/1', [
            'nama' => 'Anggur',
            'harga' => 100000,
            'satuan' => 2,
            'ppn'   => 10,
            'diskon' => 0,
        ]);
        $response->dump();
        $response->assertStatus(200);
    }
}