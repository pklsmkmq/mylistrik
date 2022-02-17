<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    // test halaman apakah bisa di akses --------------------------
    public function test_halaman()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    // test mengirim input kosong
    public function test_input_kosong()
    {
        $response = $this->post('/register',[
            'name' => '',
            'email' => '',
            'password' => '',
            'password_confirmation' => ''
        ]);

        $response->assertStatus(400);
    }

    // test mengirim input tidak sesuai format penulisan
    public function test_format_penulisan()
    {
        $response = $this->post('/register',[
            'name' => 111, //harus string
            'email' => 'emailasaltanpaadd', //harus ada @
            'password' => '12345', //min 6
            'password_confirmation' => '12345' //min 6
        ]);

        $response->assertStatus(400);
    }

    // password & confirmation tidak sama
    public function test_password_confirmed()
    {
        $response = $this->post('/register',[
            'name' => "fullan",
            'email' => 'fullan@gmail.com',
            'password' => '12345678', 
            'password_confirmation' => '123456789' //berbeda dengan password
        ]);

        $response->assertStatus(400);
    }

    //test register dengan data yang benar
    public function test_register()
    {
        $response = $this->post('/register',[
            'name' => "fullan",
            'email' => 'fullan@gmail.com',
            'password' => '12345678',
            'password_confirmation' => '12345678'
        ]);

        $response->assertStatus(302);
    }

    //tes register lagi menggunakan data yang sama
    public function test_register_same()
    {
        $response = $this->post('/register',[
            'name' => "fullan",
            'email' => 'fullan@gmail.com',
            'password' => '12345678',
            'password_confirmation' => '12345678'
        ]);

        $response->assertStatus(400);
    }
}
