@extends('layouts.app')

@section('content')

@include('layouts.seite_top')


<h1>{{$seite->titel}}</h1>


<form>

	<div class="form-group row">
		<label for="inputTitle" class="col-sm-2 col-form-label">Titel</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputTitle" name="titel" placeholder="" value="{{ (old('titel', @$seite->titel))}}">
		</div>
	</div>
	
	<div class="form-group row">
		<label for="inputUrl" class="col-sm-2 col-form-label">Url</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputUrl" name="url" placeholder="" value="{{ (old('url', @$seite->url))}}">
		</div>
	</div>
	
	<div class="form-group row">
		<label for="textareaBeschreibung" class="col-sm-2 col-form-label">Beschreibung</label>
		<div class="col-sm-10">
			<textarea class="form-control" id="textareaBeschreibung" rows="3">{{ (old('beschreibung', @$seite->beschreigung))}}</textarea>
		</div>
	</div>
	
</form>

<hr>
<form method="POST" class="float-right" action="{{ url('/aufbau/seite/'.$seite->id.'/listen/neu') }}">
	@csrf
	<div class="input-group mb-3">
		<input id="titel" type="text" class="form-control{{ $errors->has('listtitel') ? ' is-invalid' : '' }}" name="titel" value="{{ old('listtitel') }}" placeholder="Liste hinzufügen" required>
		<div class="input-group-append">
			<button type="submit" class="btn btn-primary">
				<i class="fas fa-plus"></i>
			</button>
		</div>
		@if ($errors->has('listtitel'))
			<span class="invalid-feedback" role="alert">
				<strong>{{ $errors->first('listtitel') }}</strong>
			</span>
		@endif
	</div>      
</form>
<h3>Listen</h3>
<br>
@FOREACH ($seite->listen as $liste)
<div class="card" >
	<div class="card-header">
		{{$liste->titel}}
	</div>
	<div class="card-body">
	
	<ul class="list-group list-group-flush">
	
		<li class="list-group-item">
			<div class="form-group row">
				<label for="listetitel_{{$liste->id}}" class="col-sm-2 col-form-label">Titel</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="listetitel_{{$liste->id}}" name="titel" placeholder="" value="{{ (old('listetitel', $liste->titel))}}">
				</div>
			</div>
			<div class="form-group row">
				<label for="textareaLiseBeschreibung_{{$liste->id}}" class="col-sm-2 col-form-label">Beschreibung</label>
				<div class="col-sm-10">
					<textarea class="form-control" id="textareaLiseBeschreibung_{{$liste->id}}" rows="2">{{ (old('listebeschreibung', @$liste->beschreigung))}}</textarea>
				</div>
			</div>
		</li>
		
		<li class="list-group-item">
			<strong>Aktionen pro Listenelement</strong>
			<br>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="checkbox" id="list_action_details_{{$liste->id}}" value="1">
				<label class="form-check-label" for="list_action_details_{{$liste->id}}">Detailansicht</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="checkbox" id="list_action_edit_{{$liste->id}}" value="1">
				<label class="form-check-label" for="list_action_edit_{{$liste->id}}">Bearbeiten</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="checkbox" id="list_action_delete_{{$liste->id}}" value="1">
				<label class="form-check-label" for="list_action_delete_{{$liste->id}}">Löschen</label>
			</div>
			<div class="form-group row">
				<label for="list_action_sonstige_{{$liste->id}}" class="col-sm-2 col-form-label">Sonstige:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="list_action_sonstige_{{$liste->id}}" name="list_action_sonstige_{{$liste->id}}" placeholder="" value="{{ (old('list_action_sonstige_'.$liste->id, @$liste->action_sonstige))}}">
				</div>
			</div>
		</li>
		

		<li class="list-group-item">
			<div class="container">
				<div class="row">
				  	<div class="col-sm" style="padding-right:20px; border-right: 1px solid #ccc;">
				 		<strong>Art der Liste</strong>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="listen_art_{{$liste->id}}" id="list_art_table_{{$liste->id}}" value="1">
							<label class="form-check-label" for="list_art_table_{{$liste->id}}">Tabelle</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="listen_art_{{$liste->id}}" id="list_art_datatabe_{{$liste->id}}" value="2">
							<label class="form-check-label" for="list_art_datatabe_{{$liste->id}}">Data-Table</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="listen_art_{{$liste->id}}" id="list_art_container_{{$liste->id}}" value="3">
							<label class="form-check-label" for="list_art_container_{{$liste->id}}">Container</label>
						</div>
						
						<div class="form-check" style="margin-left: 30px;">
						  <input class="form-check-input" type="checkbox" value="" id="list_art_container_liste_{{$liste->id}}">
						  <label class="form-check-label" for="list_art_container_liste_{{$liste->id}}">Liste</label>
						</div>
						<div class="form-check" style="margin-left: 30px;">
						  <input class="form-check-input" type="checkbox" value="" id="list_art_container_gallery_{{$liste->id}}">
						  <label class="form-check-label" for="list_art_container_gallery_{{$liste->id}}">Gallery</label>
						</div>
					</div>
					<div class="col-sm" style="padding-right:20px; border-right: 1px solid #ccc;">
				 		<strong>Anzahl der Ergebnisse</strong>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="listen_art_{{$liste->id}}" id="list_size_no_{{$liste->id}}" value="1">
							<label class="form-check-label" for="list_size_no_{{$liste->id}}">Alles laden</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="listen_art_{{$liste->id}}" id="list_size_paging_{{$liste->id}}" value="2">
							<label class="form-check-label" for="list_size_paging_{{$liste->id}}">Paging</label>
						</div>
						<div class="form-group row" style="margin-left: 30px;">
							<label for="pagination_page_{{$liste->id}}" class="col-sm-7 col-form-label">Anzahl\Seite</label>
							<div class="col-sm-5">
								<input type="number" class="form-control form-control-sm" id="pagination_page_{{$liste->id}}" name="pagination_page_{{$liste->id}}" placeholder="" value="{{ (old('pagination_page_'.$liste->id, @$liste->pagination_page))}}">
							</div>
						</div>
						<div class="form-group row" style="margin-left: 30px;">
							<label for="pagination_links_{{$liste->id}}" class="col-sm-7 col-form-label">Anzahl\Links</label>
							<div class="col-sm-5">
								<input type="number" class="form-control form-control-sm" id="pagination_links_{{$liste->id}}" name="pagination_links_{{$liste->id}}" placeholder="" value="{{ (old('pagination_links_'.$liste->id, @$liste->pagination_links))}}">
							</div>
						</div>								
						<div class="form-check">
							<input class="form-check-input" type="radio" name="listen_art_{{$liste->id}}" id="list_size_scroll_{{$liste->id}}" value="2">
							<label class="form-check-label" for="list_size_scroll_{{$liste->id}}">Scrollen</label>
						</div>
					</div>
					<div class="col-sm">
						<strong>Einstellungen speichern</strong>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="list_settingsave_alle_{{$liste->id}}">
							<label class="form-check-label" for="list_settingsave_alle_{{$liste->id}}">Alle</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="list_settingsave_user_{{$liste->id}}">
							<label class="form-check-label" for="list_settingsave_user_{{$liste->id}}">User</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="list_settingsave_rolle_{{$liste->id}}">
							<label class="form-check-label" for="list_settingsave_rolle_{{$liste->id}}">Rolle / Gruppe</label>
						</div>
					</div>
				</div>
			</div>
		</li>
		
		<li class="list-group-item">
			<div class="container">
				<div class="row">
				  	<div class="col-sm">
				 		<strong>Suche / Filter</strong>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="list_search_{{$liste->id}}">
							<label class="form-check-label" for="list_search_{{$liste->id}}">Textsuche</label>
						</div>
						<div class="form-check" style="margin-left: 30px;">
							<input class="form-check-input" type="checkbox" value="" id="list_search_autosuggest{{$liste->id}}">
							<label class="form-check-label" for="list_search_autosuggest{{$liste->id}}">Autosuggest</label>
						</div>
						<div class="form-group row" style="margin-left: 10px; margin-right: 10px;">
							<textarea class="form-control" id="list_search_spalten_{{$liste->id}}" name="list_search_spalten_{{$liste->id}}" rows="2">{{ (old('list_search_spalten_'.$liste->id, @$seite->list_search_spalten))}}</textarea>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="list_filter_{{$liste->id}}">
							<label class="form-check-label" for="list_filter_{{$liste->id}}">Auswahl</label>
						</div>
						<div class="form-group row" style="margin-left: 10px; margin-right: 10px;">
							<textarea class="form-control" id="list_filter_spalten_{{$liste->id}}" name="list_filter_spalten_{{$liste->id}}" rows="2">{{ (old('list_filter_spalten_'.$liste->id, @$seite->list_filter_spalten_))}}</textarea>
						</div>
					</div>
					<div class="col-sm">
						<strong>Sortierung</strong>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="list_art_sort_spalten_{{$liste->id}}">
							<label class="form-check-label" for="list_art_sort_spalten_{{$liste->id}}">Spalten</label>
						</div>
						<div class="form-check" style="margin-left: 30px;">
							<input class="form-check-input" type="checkbox" value="" id="list_art_sort_head_{{$liste->id}}">
							<label class="form-check-label" for="list_art_sort_head_{{$liste->id}}">Tabellenkopf</label>
						</div>
						<div class="form-check" style="margin-left: 30px;">
							<input class="form-check-input" type="checkbox" value="" id="list_art_sort_dropdown_{{$liste->id}}">
							<label class="form-check-label" for="list_art_sort_dropdown_{{$liste->id}}">Dropdown</label>
						</div>
						<br>
						Sortierungsspalten
						<div class="form-group row" style="margin-left: 10px; margin-right: 10px;">
							<textarea class="form-control" id="textareaSortierung_{{$liste->id}}" name="sortierung_{{$liste->id}}" rows="2">{{ (old('textareaSortierung_'.$liste->id, @$seite->sortierung))}}</textarea>
						</div>
					</div>
					
					<div class="col-sm">
						<strong>Ansicht</strong>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="list_ansicht_spalten_{{$liste->id}}">
							<label class="form-check-label" for="list_ansicht_spalten_{{$liste->id}}">Spalten ausblenden</label>
						</div>
						<div class="form-group row" style="margin-left: 10px; margin-right: 10px;">
							<textarea class="form-control" id="list_ansicht_spalten_text_{{$liste->id}}" name="list_ansicht_spalten_text_{{$liste->id}}" rows="2">{{ (old('list_ansicht_spalten_text_'.$liste->id, @$seite->list_ansicht_spalten_text))}}</textarea>
						</div>
					</div>
					
				</div>
			</div>
		</li>
		
		
	</ul>



	</div>
</div>
<br>
@ENDFOREACH
<hr>

<form method="POST" class="float-right" action="{{ url('/aufbau/seite/'.$seite->id.'/formulare/neu') }}">
	@csrf
	<div class="input-group mb-3">
		<input id="titel" type="text" class="form-control{{ $errors->has('formtitel') ? ' is-invalid' : '' }}" name="titel" value="{{ old('formtitel') }}" placeholder="Formular hinzufügen" required>
		<div class="input-group-append">
			<button type="submit" class="btn btn-primary">
				<i class="fas fa-plus"></i>
			</button>
		</div>
		@if ($errors->has('formtitel'))
			<span class="invalid-feedback" role="alert">
				<strong>{{ $errors->first('formtitel') }}</strong>
			</span>
		@endif
	</div>      
</form>
<h3>Formulare</h3>
<br>
@FOREACH ($seite->formulare as $formular)
<div class="card" >
	<div class="card-header">
		{{$formular->titel}}
	</div>
	<div class="card-body">
	
		<div class="form-group row">
			<label for="formtitle_{{$formular->id}}" class="col-sm-2 col-form-label">Titel</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="formtitle_{{$formular->id}}" name="formtitle_{{$formular->id}}" placeholder="" value="{{ (old('formtitle_'.$formular->id, @$formular->titel))}}">
			</div>
		</div>
		
		<div class="form-group row">
			<label for="formUrl_{{$formular->id}}" class="col-sm-2 col-form-label">Url</label>
			<div class="input-group col-sm-10">
								<div class="input-group-prepend">
						<div class="input-group-text">POST</div>
					</div>
				<input type="text" class="form-control" id="formUrl_{{$formular->id}}" name="url" placeholder="" value="{{ (old('formUrl_'.$formular->id, @$form->url))}}">

			</div>
		</div>
	
		<form method="POST" class="float-right" action="{{ url('/aufbau/seite/'.$seite->id.'/formulare/'.$formular->id.'/input/neu') }}">
			@csrf
			<div class="input-group mb-3">
				<input id="titel" type="text" class="form-control{{ $errors->has('inputtitel') ? ' is-invalid' : '' }}" name="titel" value="{{ old('inputtitel') }}" placeholder="Input hinzufügen" required>
				<div class="input-group-append">
					<button type="submit" class="btn btn-primary">
						<i class="fas fa-plus"></i>
					</button>
				</div>
				@if ($errors->has('inputtitel'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('inputtitel') }}</strong>
					</span>
				@endif
			</div>      
		</form>	
		<br>	
		
		
<table class="table table-striped">
	<thead>
		<tr>
			<th scope="col">Titel</th>
			<th scope="col">Typ</th>
			<th scope="col">Beschreibung</th>
			<th scope="col">Eigenschaften</th>
		</tr>
	</thead>
	<tbody>
		@FOREACH ($formular->inputs as $input)
		<tr>
			<th>{{$input->titel}}</th>
			<td>
				<select class="form-control" name="input_typ" id="input_typ" size="1">
					@foreach(Config::get('constants.list_input_typs') as $typ => $typ_name)
						<option id="typ_{{ $typ }}" value="{{ $typ }}" {{ old('typ', @$input->typ_id) == $typ ? 'selected="selected"' : '' }}>{{ $typ_name }}</option>
					@endforeach
				</select>
			</td>
			<td>
				<textarea class="form-control" id="textareaInput_{{$input->id}}" name="textareaInput_{{$input->id}}" rows="1">{{ (old('textareaInput_'.$input->id, @$input->beschreibung))}}</textarea>
			</td>
			<td>
				<div class="form-check">
					<input class="form-check-input" type="checkbox" value="" id="input_required_{{$input->id}}">
					<label class="form-check-label" for="input_required_{{$input->id}}">Pflichtfeld</label>
				</div>
			</td>
		</tr>
		@ENDFOREACH
  </tbody>
</table>
		



	</div>
</div>
<br>
@ENDFOREACH





-Navigation
	- Zurück (Wenn kein Post), Breadcrumbs, Menü
	
-Bilder/Text/Doumente

-Extras
	-Google Maps
	
- Funktionen
	- Dropzone






@endsection
