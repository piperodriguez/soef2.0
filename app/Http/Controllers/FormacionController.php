<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NivelEstudios;



class FormacionController extends Controller
{


	private $_model;


    public function __construct()
    {
        $this->middleware('auth');
        $this->_model = new NivelEstudios();
    }


    public function index()
    {

    	$nivelEstudio = $this->_model::select('id_estudio','descripcion')->get();
    	$data = array('nivelEstudio' =>  $nivelEstudio);
    	return view('personas/formacion', compact('data', $data));
    }
}
