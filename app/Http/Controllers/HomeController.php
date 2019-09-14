<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicios;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function bienvenido()
    {
        $servicios = Servicios::selectRaw('nombre_servicio')->get();
        $contador = Servicios::paginate();

        $data = ['servicios' => $servicios, 'contador' => $contador];

        return view('welcome')->with('data', $data);

    }
}
