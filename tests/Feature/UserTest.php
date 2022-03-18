<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Pelanggan;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get()
    {
        $data = Pelanggan::where('user_id', 2)->first();
        $cek = false;
        if ($data) {
            $cek = true;
        } else {
            $cek = false;
        }
        $cek->assertTrue(true);
        // $response->assertOk();
    }
}
