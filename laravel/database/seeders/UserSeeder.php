<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for ($i=0; $i < 10; $i++) { 
            # code...
            DB::table('users')->insert([
                'name' => Str::random(10),
                'email' => Str::random(5)."@satff.ubaya.ac.id",
                'password' => Str::random(8)
            ]);
        }
        
    }
}
