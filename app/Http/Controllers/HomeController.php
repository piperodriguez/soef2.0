<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personas;
use App\Models\Perfil;
use App\Models\formacion;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->_modelFormacion = new formacion();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
       $request->user()->authorizeRoles(['user', 'admin']);

       $id = auth()->user()->id;

       $personal = Personas::where('user_id', '=', $id)->get();

       $msg =0;
       if (sizeof($personal) == 0) {
            $msg = 0;
       } else {

            $msg = 33.3;
            $perfil = Perfil::where('persona_id', '=', $personal[0]['id'])->get();
            if (sizeof($perfil) == 0) {
              $msg = 33.3;
            } else {
              $infoAcademica = $this->_modelFormacion::where('id_persona', '=', $personal[0]['id'])->get();
              if (sizeof($infoAcademica) == 0) {
                $msg = 66;
              } else {
                $msg = 100;
              }
            }
       }
        return view('home', compact('msg'));
    }

}
