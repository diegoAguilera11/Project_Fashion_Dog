<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminTest extends TestCase
{
    /**
     * @test
     */
    public function admin()
    {
        $credentials = [
            "rut" => "225010161",
            "password" => "12345678910",
        ];
        $response = $this->post('/login', $credentials);
        $response->assertRedirect('/home');
        $this->assertCredentials($credentials);


        $response = $this->get('/administrador/create');
        $response->assertStatus(200);
    }
}
