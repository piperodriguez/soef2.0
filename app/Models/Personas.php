<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Personas;

class Personas extends Model
{
	public $timestamps = false;
	protected $primaryKey = 'id';
	protected $table = 'personas';
	protected $fillable = ['nombre','apellido','celular','email','direccion','user_id','ciudad_id','barrio_id'];


	public function getIdPersona($id)
	{
		$idPersona =  Personas::select('id')->where('user_id', $id)->get();
		$arrResponse = $idPersona->toArray();

		return $arrResponse[0]['id'];
	}

}
