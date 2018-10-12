<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use Auth;

use App\Projekt;

class ProjektController extends Controller
{

    	
	public function projektwahlView()
	{
		$projekte = Projekt::get();
		return view('pages.projekt.projektwahl', compact('projekte'));
	}
	
	public function newProjekt(Request $request)
	{
		$validator = Validator::make($request->all(), [
				'name' => 'required',
		]);
		if ($validator->fails()) {
			return redirect('projektwahl')->withErrors($validator)->withInput();
		}
		
		$projekt = Projekt::create(['name' => $request->name]);
		$user = Auth::user()->update(['projekt_id' => $projekt->id]);
		return redirect('projektwahl')->with('status', 'Projekt erstellt');
	}
	
	public function changeProjekt(Request $request)
	{
		$user = Auth::user()->update(['projekt_id' => $request->projekt]);
		return redirect('projektwahl')->with('status', 'Projekt ausgewählt');
		
	}
}
