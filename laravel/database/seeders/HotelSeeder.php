<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Str;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for ($i=0; $i < 5; $i++) { 
            # code...
            DB::table('hotels')->insert([
                'nama_hotel' => Str::random(10),
                'type_id' => random_int(1,3),
            ]);
        }
    }
}
