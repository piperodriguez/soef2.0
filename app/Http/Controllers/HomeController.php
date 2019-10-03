<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personas;


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

       $msg = null;

       if (sizeof($personal) == 0) {
            $msg = true;
       } else {
            $msg = false;
       }


        return view('home', compact('msg'));
    }

}
