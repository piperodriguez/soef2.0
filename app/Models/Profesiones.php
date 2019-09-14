<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Servicios;

class Profesiones extends Model
{
	public $timestamps = false;
	protected $primaryKey = 'id_profesion';
	protected $table = 'profesion';

	public function servicio()
	{
	    return $this->belongsTo(Servicios::class, 'servicio_id');
	}
}
