<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use DateTime;

class PackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('packs')->insert([
            'name'=> 'Paquete Boda Civil',
            'description' => '5 Mesas redondas con sillas de jardín.
            Banquete a dos tiempos.
            Cristaleria.
            Platos, Vasos, Cubiertos.
            Servilletas de tela.
            Barra libre de sodas y hielo.
            Manteleria fina.
            Personal de meseros.
            5 Centros de mesa (flores naturales)
            Decoración de toldo para la ceremonia con telas.
            Sonido básico.
            Costos por persona:
            Minimo 50 personas.
            $550.00            
            Los precios pueden variar sin previo aviso.',
            'price' => 550.00 ,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('packs')->insert([
            'name'=> 'Paquete Graduación',
            'description' => 'Renta de Salon por 6hr.
            Aire acondicionado y parking exclusivo.
            Personal de seguridad y limpieza.
            Banquete a 2 tiempos.
            Cristaleria.
            Platos, vasos, cubiertos.
            Servilletas de tela.
            Barra libre (hielo, sodas y licor nacional).
            Manteleria fina.
            Personal de meseros y cantineros.
            Centros de mesa (flores naturales)
            Decoración del salon.
            Sonido profesional con pantalla gigante.
            Video de recuerdo.
            Show carnaval.
            Costos por persona:
            Minimo 100 personas.
            $460.00            
            Los precios pueden variar sin previo aviso.',
            'price' => 460.00 ,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('packs')->insert([
            'name'=> 'Paquete Chef',
            'description' => 'Banquete a dos tiempos.
            Cristaleria.
            Platos.
            Vasos.
            Cubiertos.
            Copas de vino tinto.
            Bajo platos.
            Servilletas de tela.
            Plato para pastel.
            Costos por persona:
            $165.00            
            Los precios pueden variar sin previo aviso.',
            'price' => 165.00 ,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('packs')->insert([
            'name'=> 'Salón Alexandre',
            'description' => 'Renta de Salón por 6hr.
            Aire acondicionado.
            Mesas y Sillas.
            Banquete a 2 tiempos.
            Cristaleria (Copas, Bajo Platos).
            Manteleria Fina.
            Barra libre (hielo, sodas y licor nacional).
            Personal de meseros y cantinero.
            Fotografia y Video profesional.
            Sonido con pantallas y luces.
            Decoracion en mesa de honor.
            Encortinado con iluminación.
            Maestro de ceremonia.
            Show Carnaval.
            Coordinación del evento.
            Centros de mesa (diferentes diseños).
            Costos por persona:
            
            Viernes:
            100 – 149: $620.00
            150 – 300: $500.00
            
            Sábado:
            100 – 149: $650.00
            150 – 300: $590.00
            
            Los precios pueden variar sin previo aviso.',
            'price' => 500.00 ,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('packs')->insert([
            'name'=> 'Salón Votorin',
            'description' => 'Renta de Salon por 6hr.
            Mesas y Sillas tiffany.
            Personal de seguridad y limpieza.
            Area lounge, billar y futbolito.
            Banquete a 2 tiempos.
            Loza y cristaleria.
            Copas y bajo platos.
            Manteleria Fina.
            Barra libre (hielo, sodas y licor nacional).
            Personal de meseros y cantinero.
            Decoración del jardín.
            Fotografia y Video profesional.
            Sonido con pantallas y luces.
            Show Carnaval.
            Coordinación del evento.
            Arreglos florales (diferentes diseños).
            Costos por persona:
            Minimo 100 personas.
            
            Viernes:
            $570.00
            
            Sábado:
            $640.00
            
            Los precios pueden variar sin previo aviso.',
            'price' => 570.00 ,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}