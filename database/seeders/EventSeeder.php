<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use DateTime;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            'name'=> 'Boda Andrea y Alejandro',
            'price' => 150000.00,
            'reason' => 'Se requiere paquete boda civil para 200 personas(ajustar al presupuesto)',
            'starts_at' => '2022-06-15 00:00:00',
            'ends_at' => '2023-06-16 00:00:00',
            'confirmed_by'=> 4,
            'user_id' => 4,
            'pack_id' => 1,   
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),

        ]);

        DB::table('events')->insert([
            'name'=> 'Graduación ITTG',
            'price' => 50000.00,
            'reason' => 'Se requiere paquete de graduación para 100 personas(ajustar al presupuesto)',
            'starts_at' => '2022-12-15 00:00:00',
            'ends_at' => '2023-03-15 00:00:00',
            'confirmed_by'=> 6,
            'user_id' => 6,
            'pack_id' => 2,   
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),

        ]);

        DB::table('events')->insert([
            'name'=> 'Graduación UNACH',
            'price' => 150000.00,
            'reason' => 'Se requiere paquete de graduación para 250 personas',
            'starts_at' => '2022-10-15 00:00:00',
            'ends_at' => '2023-01-15 00:00:00',
            'confirmed_by'=> 8,
            'user_id' => 8,
            'pack_id' => 2,   
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),

        ]);

        DB::table('events')->insert([
            'name'=> 'Boda Sr. y Sra. Martínez',
            'price' => 50000.00,
            'reason' => 'Se requiere un paquete chef para 300 personas',
            'starts_at' => '2022-12-15 00:00:00',
            'ends_at' => '2023-12-15 00:00:00',
            'confirmed_by'=> 5,
            'user_id' => 5,
            'pack_id' => 3,   
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),

        ]);

        DB::table('events')->insert([
            'name'=> 'Boda Maria y Saúl',
            'price' => 150000.00,
            'reason' => 'Se requiere paquete boda civil para 200 personas(ajustar al presupuesto)',
            'starts_at' => '2022-08-15 00:00:00',
            'ends_at' => '2023-01-16 00:00:00',
            'confirmed_by'=> 2,
            'user_id' => 2,
            'pack_id' => 1,   
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),

        ]);
        
    }
}
