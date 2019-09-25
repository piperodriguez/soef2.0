<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Servicios;

class Profesiones extends Model
{
	public $timestamps = false;
	protected $primaryKey = 'id_profesion';
	protected $table = 'profesion';
	protected $fillable = []; // add branch_id
	// or
	protected $guarded = [];
	public function servicio()
	{
	    return $this->belongsTo(Servicios::class, 'servicio_id');
	}
}
