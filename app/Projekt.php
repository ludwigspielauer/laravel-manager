<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projekt extends Model
{
	protected $fillable = [
			'name', 'beschreibung'
	];
	
	public function benutzerSettings()
	{
		return $this->hasOne('App\BenutzerSettings', 'projekt_id', 'id');
	}
	
	public function seiten()
	{
		return $this->hasMAny('App\Seite', 'projekt_id', 'id');
	}
}
