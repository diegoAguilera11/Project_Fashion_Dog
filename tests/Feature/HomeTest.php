<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeTest extends TestCase
{
    /**
     * @test
     * @return void
     */
    public function cargar_pagina_inicio():void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function acceso_sin_datos():void
    {

        $this->post(route('login'),[])->assertSessionHasErrors('rut');
    }

    /**
     * @test
     */
    public function login_sesion_exito():void
    {
        $credentials = [
            "rut" => "209083973",
            "password" => "diego12345",
        ];

        $this->post(route('login'),$credentials)
        ->assertRedirect('/home');
        $this->assertCredentials($credentials);
    }

}
