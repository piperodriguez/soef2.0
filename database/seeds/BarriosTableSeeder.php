<?php

use Illuminate\Database\Seeder;
use App\Models\Barrios;
class BarriosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Barrios::create([
            'nombre_barrio' => 'Portal de Hunzahua',
            'ciudad_id' => 1
        ]);
        Barrios::create([
            'nombre_barrio' => 'Maldonado',
            'ciudad_id' => 1
        ]);
        Barrios::create([
            'nombre_barrio' => 'Nieves',
            'ciudad_id' => 1
        ]);
        Barrios::create([
            'nombre_barrio' => 'Maldonado',
            'ciudad_id' => 1
        ]);
    }
}
