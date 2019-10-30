<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HojaVidaController extends Controller
{

    public function index()
    {

    	return view('personas/hojaVida');
    }
}
