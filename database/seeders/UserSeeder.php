<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use DateTime;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=> 'Carlos González',
            'email' => 'carlosgon@gmail.com',
            'password' =>'$2y$10$ckTfMHhdggCHTxRabl0zjeLsw8kYFmnGPZTxHVWR7xsDdWJoB01XG',   
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('users')->insert([
            'name'=> 'Andrea López',
            'email' => 'andreitalop@gmail.com',
            'password' =>'$2y$10$ckTfMHhdggCHTxRabl0zjeLsw8kYFmnGPZTxHVWR7xsDdWJoB01XG',   
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('users')->insert([
            'name'=> 'Karina Sánchez',
            'email' => 'karisan12@gmail.com',
            'password' =>'$2y$10$ckTfMHhdggCHTxRabl0zjeLsw8kYFmnGPZTxHVWR7xsDdWJoB01XG',   
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('users')->insert([
            'name'=> 'David López',
            'email' => 'davidchat@gmail.com',
            'password' =>'$2y$10$ckTfMHhdggCHTxRabl0zjeLsw8kYFmnGPZTxHVWR7xsDdWJoB01XG', 
            'role' => 'employee',  
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('users')->insert([
            'name'=> 'Uriel Ortega',
            'email' => 'uriel_or@gmail.com',
            'password' =>'$2y$10$ckTfMHhdggCHTxRabl0zjeLsw8kYFmnGPZTxHVWR7xsDdWJoB01XG',   
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('users')->insert([
            'name'=> 'Oscar Grajales',
            'email' => 'oscargg@gmail.com',
            'password' =>'$2y$10$ckTfMHhdggCHTxRabl0zjeLsw8kYFmnGPZTxHVWR7xsDdWJoB01XG',
            'role' => 'manager',   
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}