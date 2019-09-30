<?php

namespace App\Http\Controllers\Admin;
use App\Models\Profesiones;
use App\Models\Servicios;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;
class ProfesionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['profesiones'] = Profesiones::orderBy('id_profesion','asc')->paginate(3);
        $data['servicios'] = Servicios::all();
        return view('admin/profesiones')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $profesionId = $request->id_profesion;
        $servicioId = $request->id_servicio;
        $nameProfesion = $request->nombre_profesion;
        $profesion   = Profesiones::updateOrCreate(
          ['id_profesion' => $profesionId],
          [
            'nombre_profesion' => $nameProfesion,
            'servicio_id' => $servicioId
          ],
        );


        return Response::json($profesion);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $where = array('id_profesion' => $id);
        $profesion  = Profesiones::where($where)->first();

        $where2 = array('id_servicio' => $profesion->servicio_id);

        $servicio = Servicios::where($where2)->first();

        $repuesta = [
            'profesion' => $profesion,
            'servicio' => $servicio
        ];

        return Response::json($repuesta);
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
