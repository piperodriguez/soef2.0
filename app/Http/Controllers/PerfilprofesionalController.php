<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicios;
use App\Models\Profesiones;
use App\Models\Personas;
class PerfilprofesionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $servicios = Servicios::all();

        $respuesta = [
            'servicios' => $servicios
        ];

        return view('personas/table_perfil_profesional', compact('respuesta', $respuesta));
    }

    public function getProfesion($idServicio)
    {
        $profesiones = Profesiones::where('servicio_id', '=', $idServicio)->get();
        if (sizeof($profesiones) > 0) {
            echo "<option>Seleccione una profesión</option>";
            foreach ($profesiones as $profesion) {
                echo"<option value='".$profesion->id_profesions."'>".$profesion->nombre_profesion."</option>";
            }
        } else {
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

        $id = auth()->user()->id;
        $persona = Personas::where('user_id', '=', $id)->get();



        $request->validate([
            'servicio'=>'required',
            'profesion_id' =>'required',
            'servicio_id' =>'required',
        ]);

        return redirect('registro')->with('success', 'Perfil Profesional saved!');
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
