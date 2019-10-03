<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ciudades;

class CiudadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ciudades = Ciudades::all();
        return view('admin/ciudades/ciudades', compact('ciudades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/ciudades/create');
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
            'nombre_ciudad'=>'required',
        ]);

        $ciudad = new Ciudades([
            'nombre_ciudad' => $request->get('nombre_ciudad'),
        ]);

        $ciudad->save();
        return redirect('/ciudades')->with('success', 'Ciudad saved!');

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
        $ciudad = Ciudades::find($id);
        return view('admin/ciudades/edit', compact('ciudad'));
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
            'nombre_ciudad'=>'required',
        ]);

        $ciudad = Ciudades::find($id);
        $ciudad->nombre_ciudad =  $request->get('nombre_ciudad');
        $ciudad->save();

        return redirect('/ciudades')->with('success', 'Ciudad updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ciudad = Ciudades::find($id);
        $ciudad->delete();

        return redirect('/ciudades')->with('success', 'Contact deleted!');
    }
}
