<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "kervis  vasquez",
            "email"  => 'kervisvasquez24@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('123456789'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            
        ]);

        DB::table('users')->insert([
            'name' => "kervis2",
            "email"  => 'kervisvasquez22@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('123456789'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            
        ]);
    }
}
