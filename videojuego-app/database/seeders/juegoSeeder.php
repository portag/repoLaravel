<?php

namespace Database\Seeders;

use Faker\Core\Number;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Ramsey\Uuid\Type\Integer;


class juegoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('juegos')->insert([
            'id' => rand(1,100),
            'nombre' => Str::random(10),
            'plataforma' => Str::random(10),
            'imagen' => Str::random(20),
            'descripcion' => Str::random(50),
        ]);
    
    }
}
