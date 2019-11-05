<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perfil;
use App\Models\Personas;
class HojaVidaController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
        $this->_modelPerfil = new Perfil();
        $this->_modelPersona = new Personas();
    }

    public function index()
    {
    	$id = auth()->user()->id;
    	$idPersona = $this->_modelPersona->getIdPersona($id);
    	$dataPerfil = $this->_modelPerfil->getDataPerfil($idPersona);

    	return view('personas/hojaVida', compact('dataPerfil'));
    }
}