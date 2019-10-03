<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ciudades;
use App\Models\Barrios;
class BarriosController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barrios = Barrios::all();
        return view('admin/barrios/barrios', compact('barrios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ciudades = Ciudades::all();
        return view('admin/barrios/create', compact('ciudades'));
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
            'nombre_barrio'=>'required',
            'ciudad_id' =>'required'

        ]);

        $barrio = new Barrios([
            'ciudad_id' => $request->get('ciudad_id'),
            'nombre_barrio' => $request->get('nombre_barrio'),
        ]);

        $barrio->save();
        return redirect('/barrios')->with('success', 'Barrio saved!');

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
        $barrio = Barrios::find($id);
        $ciudad_id = $barrio->ciudad_id;

        $ciudades = Ciudades::where('id_ciudad', '!=', $barrio->ciudad_id)->get();
        return view('admin/barrios/edit', compact('barrio', 'ciudad_id', 'ciudades'));
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
        $request->validate([
            'nombre_barrio'=>'required',
        ]);


        $ciudad = Barrios::find($id);
        $ciudad->nombre_barrio =  $request->get('nombre_barrio');
        $ciudad->ciudad_id = $request->get('ciudad_id');
        $ciudad->save();

        return redirect('/barrios')->with('success', 'Barrio updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ciudad = Barrios::find($id);
        $ciudad->delete();

        return redirect('/barrios')->with('success', 'Contact deleted!');
    }
}
