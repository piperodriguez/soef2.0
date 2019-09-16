<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function tablero(Request $request)
    {
    	$request->user()->authorizeRoles(['admin']);
    	return view('admin/listaUsuarios');
    }
}
