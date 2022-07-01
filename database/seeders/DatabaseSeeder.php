<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'rut' => "12345",
            'nombre' => "Antonio",
            'apellidoPaterno' => "",
            'telefono' => "",
            'direccion' =>"",
            'email' => "",
            'password' => Hash::make("12345"),
            'rol' => "administrador",
            'estado' => "habilitado",
        ]);
    }
}
