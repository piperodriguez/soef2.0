<?php

use Illuminate\Database\Seeder;
use App\Models\Servicios;

class ServiciosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Servicios::create([
        	'nombre_servicio' => 'Hogar',
        ]);
        Servicios::create([
            'nombre_servicio' => 'Eventos',
        ]);
        Servicios::create([
            'nombre_servicio' => 'Otros',
        ]);
    }
}
