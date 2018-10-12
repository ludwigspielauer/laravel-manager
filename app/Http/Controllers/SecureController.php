<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecureController extends Controller
{
	public function sicherheitView()
	{
		return view('pages.secure.grundlagen');
	}
}
