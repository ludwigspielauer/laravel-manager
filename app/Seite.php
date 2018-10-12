<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seite extends Model
{
	protected $fillable = [
			'titel', 'projekt_id'
	];
	
	public function listen()
	{
		return $this->hasMany('App\Liste', 'seite_id', 'id');
	}
	
	public function formulare()
	{
		return $this->hasMany('App\Formular', 'seite_id', 'id');
	}
}
