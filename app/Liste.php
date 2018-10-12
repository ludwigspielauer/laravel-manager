<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Liste extends Model
{
	protected $fillable = [
			'titel', 'beschreibung', 'seite_id'
	];
	

}
