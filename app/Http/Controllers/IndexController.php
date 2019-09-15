<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicios;


class IndexController extends Controller
{
    public function bienvenido()
    {
 		$servicios = Servicios::selectRaw('nombre_servicio')->get();
        $contador = Servicios::paginate();

        $data = ['servicios' => $servicios, 'contador' => $contador];

        return view('welcome')->with('data', $data);

    }

}
