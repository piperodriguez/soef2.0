<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
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

	public function getinfoPerson($id)
	{
		$data = DB::table('personas')
				->select(
					'personas.nombre',
					'personas.apellido',
					'personas.celular',
					'u.email',
					'c.nombre_ciudad',
					'b.nombre_barrio')
				->join('users as u', 'u.id', '=', 'personas.user_id')
				->join('ciudades as c', 'c.id_ciudad', '=', 'personas.ciudad_id')
				->join('barrios as b', 'b.id_barrio', '=', 'personas.barrio_id')
				->where('personas.id', '=', $id)->first();

		return $data;
	}

}
