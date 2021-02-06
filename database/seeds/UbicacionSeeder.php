<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UbicacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ubicacions')->insert([
            'nombre' => "Remoto",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('ubicacions')->insert([
            'nombre' => "Venezuela",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('ubicacions')->insert([
            'nombre' => "Peru",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('ubicacions')->insert([
            'nombre' => "Colombia",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
