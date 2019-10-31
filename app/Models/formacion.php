<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class formacion extends Model
{
    public $timestamps = false;
	protected $primaryKey = 'id_formacion';
	protected $table = 'formacion';
}
