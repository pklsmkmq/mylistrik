<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PelangganTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    //test tanpa membawa data
    public function test_example()
    {
        $response = $this->post('/profilPelanggan');

        $response->assertStatus(400);
    }

    //test input kosong
    public function test_kosong()
    {
        $response = $this->post('/profilPelanggan',[
            "alamat" => "",
            "nomor_meteran" => "",
            "tarif_id" => "",
            "id" => "",
            "type" => ""
        ]);

        $response->assertStatus(400);
    }

    //isian benar simpan data pelanggan
    public function test_true()
    {
        $response = $this->post('/profilPelanggan',[
            "alamat" => "Bekasi",
            "nomor_meteran" => "1111111",
            "tarif_id" => "1",
            "id" => "3",
            "type" => "simpan"
        ]);

        $response->assertStatus(201);
    }

    //isian benar update data pelanggan
    public function test_true_update()
    {
        $response = $this->post('/profilPelanggan',[
            "alamat" => "Jatiwaringin",
            "nomor_meteran" => "1111111",
            "tarif_id" => "1",
            "id" => "3",
            "type" => "update"
        ]);

        $response->assertStatus(201);
    }
}
