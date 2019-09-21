<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Servicios;
use App\Models\Profesiones;


class IndexController extends Controller
{
    public function bienvenido()
    {
        $profesionModel = new Profesiones();
 		$servicios = Servicios::all();
        $contador = Servicios::paginate();
        $resultado = "";
        $resultado2 = "";

        foreach ($servicios as $servicio) {

            echo "<div class='col-xs-4'>";

        	$id = $servicio->id_servicio;
            $resultado .= "<h1>";
        	$resultado.= $servicio->nombre_servicio;
            $resultado.= "</h1>";


        	$profesiones = DB::table('profesion')
        	->select(
        	 'profesion.id_profesion',
        	 'profesion.nombre_profesion',
        	 'servicios.nombre_servicio'
        	)->join('servicios', 'servicios.id_servicio', '=', 'profesion.servicio_id')
        	->where('servicio_id', $id)
        	->get();

        	foreach ($profesiones as $profesion) {
        		$resultado2 .= "<br>".$profesion->nombre_profesion."<br>";
        	}
            echo "</div>";
        }

        //echo $prueba;
        $prueba = $resultado.$resultado2;

		$data = ['resultado' => $resultado, 'servicios' => $servicios, 'profesionModel' => $profesionModel];

        return view('welcome')->with('data', $data);

    }

}
