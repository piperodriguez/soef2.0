<?php

use Illuminate\Database\Seeder;
use App\Models\Ciudades;
class CiudadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ciudades::create([
            'nombre_ciudad' => 'Tunja'
        ]);
        Ciudades::create([
            'nombre_ciudad' => 'Medellín'
        ]);
		Ciudades::create([
            'nombre_ciudad' => 'Sogamoso'
        ]);
        Ciudades::create([
            'nombre_ciudad' => 'Duitama'
        ]);
        Ciudades::create([
            'nombre_ciudad' => 'Paipa'
        ]);
    }
}
