<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
	public $timestamps = false;
	protected $primaryKey = 'id';
	protected $table = 'perfil';
	protected $fillable = ['persona_id','profesion_id','titulo','descripción'];


	public function getDataPerfil($idPersona)
	{
		$query = Perfil::where('persona_id', $idPersona)->get();
		return $query;
	}
}
