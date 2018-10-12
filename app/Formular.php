<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formular extends Model
{
	protected $fillable = [
			'titel', 'url', 'seite_id'
	];
	
	public function inputs()
	{
		return $this->hasMany('App\Input', 'formular_id', 'id');
	}
}
