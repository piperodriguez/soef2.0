<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personas;
use App\Models\Ciudades;
use App\Models\Barrios;

class PersonasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;

        $persona = Personas::where('user_id', '=', $id)->get();

        $porcentajeGeneral = 0;
        $tablaPersona = 0;
        $tablaFormacion = 0;

        if (sizeof($persona) == 0) {
            $tablaPersona = 0;
        } else {
            $tablaPersona = 100;
        }

        if ($tablaPersona > 0) {
            $porcentajeGeneral = 33;
        }

        $respuesta = [
            'porcentajeGeneral' => $porcentajeGeneral,
            'porcentajePersona' => $tablaPersona
        ];

        return view('personas/formpersona', compact('respuesta', $respuesta));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ciudades = Ciudades::all();

        $respuesta = [
            'ciudades' => $ciudades
        ];

        return view('personas/tablePersona', compact('respuesta', $respuesta));
    }

    public function getBarrio($idCiudad)
    {
        $barrios = Barrios::where('ciudad_id', '=', $idCiudad)->get();
        if (sizeof($barrios) > 0) {
            echo "<option>Seleccione un barrio</option>";
            foreach ($barrios as $barrio) {
                echo"<option value='".$barrio->id_barrio."'>".$barrio->nombre_barrio."</option>";
            }
        }else{
            echo "no se encuentran resultados";
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_persona'=>'required',
            'apellido_persona' =>'required',
            'ciudad_id' => 'required',
            'barrio_id' => 'required',
            'user_id' => 'required'
        ]);

        $persona = new Personas([
            'nombre' => $request->get('nombre_persona'),
            'apellido' => $request->get('apellido_persona'),
            'celular' => $request->get('celular'),
            'user_id' => $request->get('user_id'),
            'ciudad_id' => $request->get('ciudad_id'),
            'barrio_id' => $request->get('barrio_id'),
        ]);

        $persona->save();
        return redirect('registro')->with('success', 'Información personal saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
