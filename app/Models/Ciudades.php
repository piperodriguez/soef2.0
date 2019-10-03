<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ciudades extends Model
{
    public $timestamps = false;
	protected $primaryKey = 'id_ciudad';
	protected $table = 'ciudades';
	protected $fillable = ['id_ciudad','nombre_ciudad','ciudad_id'];
}
