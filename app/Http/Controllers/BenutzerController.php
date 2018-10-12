<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use Auth;

use App\Projekt;
use App\BenutzerSettings;


class BenutzerController extends Controller
{
	public function benutzerView()
	{
		$projekt = Projekt::with('benutzerSettings')->where('id', Auth::user()->projekt_id)->first();
		return view('pages.benutzer.benutzer', compact('projekt'));
	}
	
	public function authentifizierungView()
	{
		$projekt = Projekt::with('benutzerSettings')->where('id', Auth::user()->projekt_id)->first();
		return view('pages.benutzer.authentifizierung', compact('projekt'));
	}
	
	public function saveAuthentifizierung(Request $request, Projekt $projekt)
	{
		$validator = Validator::make($request->all(), [
				
		]);
		if ($validator->fails()) {
			return redirect('/projekt/'.$projekt->id.'/authentifizierung')->withErrors($validator)->withInput();
		}
		
		$settings = BenutzerSettings::firstOrCreate(['projekt_id' => $projekt->id]);
		$settings->update($request->all());
		
		return redirect('/projekt/'.$projekt->id.'/authentifizierung')->with('status', 'Änderungen gespeichert');
	}
	


}