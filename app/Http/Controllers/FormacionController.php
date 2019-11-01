<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NivelEstudios;
use App\Models\Personas;
use App\Models\formacion;


class FormacionController extends Controller
{


	private $_model;
    private $_modelPersona;

    public function __construct()
    {
        $this->middleware('auth');
        $this->_model = new NivelEstudios();
        $this->_modelPersona = new Personas();
    }


    public function index()
    {

    	$nivelEstudio = $this->_model::select('id_estudio','descripcion')->get();
    	$data = array('nivelEstudio' =>  $nivelEstudio);
    	return view('personas/formacion', compact('data', $data));
    }

    public function store(Request $request)
    {
        $id = auth()->user()->id;
        $idPersona = $this->_modelPersona->getIdPersona($id);

        $request->validate([
            'nivelFormacion' =>'required',
            'institucion' =>'required'
        ]);

        $save = new formacion([
            'estudio_id' => $request->get('nivelFormacion'),
            'id_persona' => $idPersona[0]['id'],
            'institucion' => $request->get('institucion')
        ]);

        $save->save();
        return redirect('registro')->with('success', 'Perfil Academico gurdado!');
    }

}
