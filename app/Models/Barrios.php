<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Ciudades;

class Barrios extends Model
{
    public $timestamps = false;
	protected $primaryKey = 'id_barrio';
	protected $table = 'barrios';
	protected $fillable = ['id_barrio','nombre_barrio','ciudad_id'];
	public function ciudad()
	{
	    return $this->belongsTo(Ciudades::class, 'ciudad_id');
	}
}
S