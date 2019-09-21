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

		$data = ['servicios' => $servicios, 'profesionModel' => $profesionModel];

        return view('welcome')->with('data', $data);

    }

}
