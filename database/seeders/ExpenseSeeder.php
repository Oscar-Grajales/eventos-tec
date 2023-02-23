<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use DateTime;

class ExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('expenses')->insert([
            'amount' => 9000.00,
            'description' => '50 Centros de mesa mas decoración del salón',
            'event_id' => 1,  
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
 
        ]);

        DB::table('expenses')->insert([
            'amount' => 24000.00,
            'description' => 'En el servicio de buffet se disponen bandejas con diferentes platillos en una barra o en una mesa para que cada invitado se sirva lo que guste.',
            'event_id' => 2,  
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
 
        ]);

        DB::table('expenses')->insert([
            'amount' => 40000.00,
            'description' => 'Banquete 2 tiempos: Mantelería, 
            cubre silla y banda, 
            loza blanca, 
            cubiertos, 
            vasos de cristal, 
            mesa honor, 
            mesa para pastel y regalos, 
            hielo y refresco por 5 horas descorche libre, 
            servicio de meseros y capitán, 
            coordinación de evento, 
            seguridad privada, 
            degustación de platillos',
            'event_id' => 3,  
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
 
        ]);

        DB::table('expenses')->insert([
            'amount' => 2900.00,
            'description' => 'Pastel para 300 personas en 7 piezas con tipo de tematica que desee como:
            Fondant
            Tradicional
            Temáticos',
            'event_id' => 4,  
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
 
        ]);

        DB::table('expenses')->insert([
            'amount' => 85800.00,
            'description' => 'Salón
            Hostess
            Iluminación y sonido:
            Material de animación, 
            iluminación led, 
            iluminación robótica, 
            máquina de humo, 
            pista iluminada de 25 mts2, 
            show de rayos láser, 
            2 pantallas gigantes, 
            DJ versátil y cabina led
            Banquete a 2 tiempos
            Meseros
            Hielo y refresco ilimitado
            Mantelería
            Cubiertos, loza y cristalería
            Pista iluminada con tecnología led pixel
            Centros de mesa',
            'event_id' => 5,  
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

    }
}