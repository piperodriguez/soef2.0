<?php

namespace App\Http\Controllers\Admin;

use App\Models\Servicios;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;


class ServiciosController extends Controller
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
        $data['servicios'] = Servicios::orderBy('id_servicio','asc')->paginate(3);
        return view('admin/servicios')->with('data', $data);
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
        $servicioId = $request->id_servicio;

        $servicio   = Servicios::updateOrCreate(['id_servicio' => $servicioId],
                    ['nombre_servicio' => $request->nombre_servicio]);

        return Response::json($servicio);

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

        $where = array('id_servicio' => $id);
        $servicio  = Servicios::where($where)->first();
        return Response::json($servicio);
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
        $servicio = Servicios::where('id_servicio',$id)->delete();
        return Response::json($servicio);
    }
}
