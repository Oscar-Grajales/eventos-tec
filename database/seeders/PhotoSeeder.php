<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use DateTime;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('photos')->insert([
            'path'=> 'img/decoración3.jpg',
            'user_id' => 4,
            'event_id' => 1,   
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('photos')->insert([
            'path'=> 'img/platillo2.jpg',
            'user_id' => 6,
            'event_id' => 2,   
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('photos')->insert([
            'path'=> 'img/platillo3.jpg',
            'user_id' => 8,
            'event_id' => 3,   
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('photos')->insert([
            'path'=> 'img/pastel.jpg',
            'user_id' => 5,
            'event_id' => 4,   
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('photos')->insert([
            'path'=> 'img/decoración1.jpg',
            'user_id' => 2,
            'event_id' => 5,   
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}