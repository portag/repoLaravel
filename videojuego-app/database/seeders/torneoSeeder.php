<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\carbon;

class torneoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('torneos')->insert([
            'id' => rand(1,100),
            'nombre' => Str::random(10),
            'fecha' => Carbon::now(),
            'max_equipos' => rand(1,100),
            'modalidad' =>   rand(1,5),
            'estado' => Str::random(10),
            'nivel' => ("principiante"),
            'juego_id' => (1),
        ]);
    }
}
