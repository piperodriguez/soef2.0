<?php

use Illuminate\Database\Seeder;
use App\Models\Profesiones;
class ProfesionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profesiones::create([
            'nombre_profesion' => 'Carpinteria',
            'servicio_id' => '1'
        ]);
        Profesiones::create([
            'nombre_profesion' => 'Mantenimiento Aparatos electronicos',
            'servicio_id' => '1'
        ]);
        Profesiones::create([
            'nombre_profesion' => 'Diseñador Grafíco',
            'servicio_id' => '2'
        ]);

    }
}
