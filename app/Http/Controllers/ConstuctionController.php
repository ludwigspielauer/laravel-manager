<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Validator;

use App\Projekt;
use App\Seite;
use App\Liste;
use App\Formular;
use App\Input;

class ConstuctionController extends Controller
{
	public function seitenView()
	{
		$projekt = Projekt::with('seiten')->where('id', Auth::user()->projekt_id)->first();
		return view('pages.aufbau.seiten', compact('projekt'))->with('pagetitle', 'Seitenübersicht');
	}
	
	public function newSeite(Request $request)
	{
		$validator = Validator::make($request->all(), [
				'titel' => 'required|max:255',
		]);
		if ($validator->fails()) {
			return redirect('/aufbau/seiten')->withErrors($validator)->withInput();
		}
		
		$seite = Seite::create(['projekt_id' => Auth::user()->projekt->id, 'titel' => $request->titel]);
		
		return redirect('/aufbau/seiten')->with('status', 'Seite erstellt');
	}
	
	public function pageView(Seite $seite) {
		$seite = Seite::with('listen', 'formulare', 'formulare.inputs')->where('id', $seite->id)->first();
		return view('pages.aufbau.seite', compact('seite'))->with('pagetitle', 'Seitendetails');
	}
	
	public function newListe(Request $request, Seite $seite)
	{
		$validator = Validator::make($request->all(), [
				'titel' => 'required|max:255',
		]);
		if ($validator->fails()) {
			return redirect('/aufbau/seite/'.$seite->id)->withErrors($validator)->withInput();
		}
		
		$liste = Liste::create(['seite_id' => $seite->id, 'titel' => $request->titel]);
		
		return redirect('/aufbau/seite/'.$seite->id)->with('status', 'Liste hinzugefügt');
	}
	
	public function newFormular(Request $request, Seite $seite)
	{
		$validator = Validator::make($request->all(), [
				'titel' => 'required|max:255',
		]);
		if ($validator->fails()) {
			return redirect('/aufbau/seite/'.$seite->id)->withErrors($validator)->withInput();
		}
		
		$formular = Formular::create(['seite_id' => $seite->id, 'titel' => $request->titel]);
		
		return redirect('/aufbau/seite/'.$seite->id)->with('status', 'Formular hinzugefügt');
	}
	
	public function newInput(Request $request, Seite $seite, Formular $formular)
	{
		$validator = Validator::make($request->all(), [
				'titel' => 'required|max:255',
		]);
		if ($validator->fails()) {
			return redirect('/aufbau/seite/'.$seite->id)->withErrors($validator)->withInput();
		}
		
		$input = Input::create(['formular_id' => $formular->id, 'titel' => $request->titel]);
		
		return redirect('/aufbau/seite/'.$seite->id)->with('status', 'Formular hinzugefügt');
	}
}
