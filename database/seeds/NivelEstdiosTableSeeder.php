<?php

use Illuminate\Database\Seeder;
use App\Models\NivelEstudios;

class NivelEstdiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        NivelEstudios::create([
            'descripcion' => 'Básica Primaria'
        ]);

		NivelEstudios::create([
            'descripcion' => 'Báchillerato'
        ]);

		NivelEstudios::create([
            'descripcion' => 'Carrera Técnica'
        ]);

		NivelEstudios::create([
            'descripcion' => 'Carrera Tecnológica'
        ]);

		NivelEstudios::create([
            'descripcion' => 'Carrera profesional'
        ]);


    }
}
