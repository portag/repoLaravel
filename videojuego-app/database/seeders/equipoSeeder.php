<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class equipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('equipos')->insert([
            'id' => rand(1,100),
            'nombre' => Str::random(10),
            'imagen' => Str::random(20),
            'modalidad' => rand(1,5),
            'estado' => Str::random(20),
        ]);
    }
}
