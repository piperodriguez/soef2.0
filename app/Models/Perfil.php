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
		$perfil = Perfil::find($idPersona);
		$arrResponse = $perfil->toArray();

		echo "<pre>";

		foreach ($arrResponse as $key => $value) {
			print_r($key);
		}

		echo "</pre>";

		die();
		return $arrResponse;
	}
}
