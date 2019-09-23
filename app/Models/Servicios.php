<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
	public $timestamps = false;
	protected $primaryKey = 'id_servicio';
	protected $table = 'servicios';
	protected $fillable = ['id_servicio','nombre_servicio'];

}
