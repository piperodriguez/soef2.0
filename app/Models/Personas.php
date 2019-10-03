<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
	public $timestamps = false;
	protected $primaryKey = 'id';
	protected $table = 'personas';
	protected $fillable = ['nombre','apellido','celular','email','direccion','user_id','ciudad_id','barrio_id','profesion_id'];

}
