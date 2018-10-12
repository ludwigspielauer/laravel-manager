<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.seite_top', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<h1><?php echo e($seite->titel); ?></h1>


<form>

	<div class="form-group row">
		<label for="inputTitle" class="col-sm-2 col-form-label">Titel</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputTitle" name="titel" placeholder="" value="<?php echo e((old('titel', @$seite->titel))); ?>">
		</div>
	</div>
	
	<div class="form-group row">
		<label for="inputUrl" class="col-sm-2 col-form-label">Url</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputUrl" name="url" placeholder="" value="<?php echo e((old('url', @$seite->url))); ?>">
		</div>
	</div>
	
	<div class="form-group row">
		<label for="textareaBeschreibung" class="col-sm-2 col-form-label">Beschreibung</label>
		<div class="col-sm-10">
			<textarea class="form-control" id="textareaBeschreibung" rows="3"><?php echo e((old('beschreibung', @$seite->beschreigung))); ?></textarea>
		</div>
	</div>
	
</form>

<hr>
<form method="POST" class="float-right" action="<?php echo e(url('/aufbau/seite/'.$seite->id.'/listen/neu')); ?>">
	<?php echo csrf_field(); ?>
	<div class="input-group mb-3">
		<input id="titel" type="text" class="form-control<?php echo e($errors->has('listtitel') ? ' is-invalid' : ''); ?>" name="titel" value="<?php echo e(old('listtitel')); ?>" placeholder="Liste hinzufügen" required>
		<div class="input-group-append">
			<button type="submit" class="btn btn-primary">
				<i class="fas fa-plus"></i>
			</button>
		</div>
		<?php if($errors->has('listtitel')): ?>
			<span class="invalid-feedback" role="alert">
				<strong><?php echo e($errors->first('listtitel')); ?></strong>
			</span>
		<?php endif; ?>
	</div>      
</form>
<h3>Listen</h3>
<br>
<?php $__currentLoopData = $seite->listen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $liste): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="card" >
	<div class="card-header">
		<?php echo e($liste->titel); ?>

	</div>
	<div class="card-body">
	
	<ul class="list-group list-group-flush">
	
		<li class="list-group-item">
			<div class="form-group row">
				<label for="listetitel_<?php echo e($liste->id); ?>" class="col-sm-2 col-form-label">Titel</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="listetitel_<?php echo e($liste->id); ?>" name="titel" placeholder="" value="<?php echo e((old('listetitel', $liste->titel))); ?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="textareaLiseBeschreibung_<?php echo e($liste->id); ?>" class="col-sm-2 col-form-label">Beschreibung</label>
				<div class="col-sm-10">
					<textarea class="form-control" id="textareaLiseBeschreibung_<?php echo e($liste->id); ?>" rows="2"><?php echo e((old('listebeschreibung', @$liste->beschreigung))); ?></textarea>
				</div>
			</div>
		</li>
		
		<li class="list-group-item">
			<strong>Aktionen pro Listenelement</strong>
			<br>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="checkbox" id="list_action_details_<?php echo e($liste->id); ?>" value="1">
				<label class="form-check-label" for="list_action_details_<?php echo e($liste->id); ?>">Detailansicht</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="checkbox" id="list_action_edit_<?php echo e($liste->id); ?>" value="1">
				<label class="form-check-label" for="list_action_edit_<?php echo e($liste->id); ?>">Bearbeiten</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="checkbox" id="list_action_delete_<?php echo e($liste->id); ?>" value="1">
				<label class="form-check-label" for="list_action_delete_<?php echo e($liste->id); ?>">Löschen</label>
			</div>
			<div class="form-group row">
				<label for="list_action_sonstige_<?php echo e($liste->id); ?>" class="col-sm-2 col-form-label">Sonstige:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="list_action_sonstige_<?php echo e($liste->id); ?>" name="list_action_sonstige_<?php echo e($liste->id); ?>" placeholder="" value="<?php echo e((old('list_action_sonstige_'.$liste->id, @$liste->action_sonstige))); ?>">
				</div>
			</div>
		</li>
		

		<li class="list-group-item">
			<div class="container">
				<div class="row">
				  	<div class="col-sm" style="padding-right:20px; border-right: 1px solid #ccc;">
				 		<strong>Art der Liste</strong>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="listen_art_<?php echo e($liste->id); ?>" id="list_art_table_<?php echo e($liste->id); ?>" value="1">
							<label class="form-check-label" for="list_art_table_<?php echo e($liste->id); ?>">Tabelle</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="listen_art_<?php echo e($liste->id); ?>" id="list_art_datatabe_<?php echo e($liste->id); ?>" value="2">
							<label class="form-check-label" for="list_art_datatabe_<?php echo e($liste->id); ?>">Data-Table</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="listen_art_<?php echo e($liste->id); ?>" id="list_art_container_<?php echo e($liste->id); ?>" value="3">
							<label class="form-check-label" for="list_art_container_<?php echo e($liste->id); ?>">Container</label>
						</div>
						
						<div class="form-check" style="margin-left: 30px;">
						  <input class="form-check-input" type="checkbox" value="" id="list_art_container_liste_<?php echo e($liste->id); ?>">
						  <label class="form-check-label" for="list_art_container_liste_<?php echo e($liste->id); ?>">Liste</label>
						</div>
						<div class="form-check" style="margin-left: 30px;">
						  <input class="form-check-input" type="checkbox" value="" id="list_art_container_gallery_<?php echo e($liste->id); ?>">
						  <label class="form-check-label" for="list_art_container_gallery_<?php echo e($liste->id); ?>">Gallery</label>
						</div>
					</div>
					<div class="col-sm" style="padding-right:20px; border-right: 1px solid #ccc;">
				 		<strong>Anzahl der Ergebnisse</strong>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="listen_art_<?php echo e($liste->id); ?>" id="list_size_no_<?php echo e($liste->id); ?>" value="1">
							<label class="form-check-label" for="list_size_no_<?php echo e($liste->id); ?>">Alles laden</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="listen_art_<?php echo e($liste->id); ?>" id="list_size_paging_<?php echo e($liste->id); ?>" value="2">
							<label class="form-check-label" for="list_size_paging_<?php echo e($liste->id); ?>">Paging</label>
						</div>
						<div class="form-group row" style="margin-left: 30px;">
							<label for="pagination_page_<?php echo e($liste->id); ?>" class="col-sm-7 col-form-label">Anzahl\Seite</label>
							<div class="col-sm-5">
								<input type="number" class="form-control form-control-sm" id="pagination_page_<?php echo e($liste->id); ?>" name="pagination_page_<?php echo e($liste->id); ?>" placeholder="" value="<?php echo e((old('pagination_page_'.$liste->id, @$liste->pagination_page))); ?>">
							</div>
						</div>
						<div class="form-group row" style="margin-left: 30px;">
							<label for="pagination_links_<?php echo e($liste->id); ?>" class="col-sm-7 col-form-label">Anzahl\Links</label>
							<div class="col-sm-5">
								<input type="number" class="form-control form-control-sm" id="pagination_links_<?php echo e($liste->id); ?>" name="pagination_links_<?php echo e($liste->id); ?>" placeholder="" value="<?php echo e((old('pagination_links_'.$liste->id, @$liste->pagination_links))); ?>">
							</div>
						</div>								
						<div class="form-check">
							<input class="form-check-input" type="radio" name="listen_art_<?php echo e($liste->id); ?>" id="list_size_scroll_<?php echo e($liste->id); ?>" value="2">
							<label class="form-check-label" for="list_size_scroll_<?php echo e($liste->id); ?>">Scrollen</label>
						</div>
					</div>
					<div class="col-sm">
						<strong>Einstellungen speichern</strong>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="list_settingsave_alle_<?php echo e($liste->id); ?>">
							<label class="form-check-label" for="list_settingsave_alle_<?php echo e($liste->id); ?>">Alle</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="list_settingsave_user_<?php echo e($liste->id); ?>">
							<label class="form-check-label" for="list_settingsave_user_<?php echo e($liste->id); ?>">User</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="list_settingsave_rolle_<?php echo e($liste->id); ?>">
							<label class="form-check-label" for="list_settingsave_rolle_<?php echo e($liste->id); ?>">Rolle / Gruppe</label>
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
							<input class="form-check-input" type="checkbox" value="" id="list_search_<?php echo e($liste->id); ?>">
							<label class="form-check-label" for="list_search_<?php echo e($liste->id); ?>">Textsuche</label>
						</div>
						<div class="form-check" style="margin-left: 30px;">
							<input class="form-check-input" type="checkbox" value="" id="list_search_autosuggest<?php echo e($liste->id); ?>">
							<label class="form-check-label" for="list_search_autosuggest<?php echo e($liste->id); ?>">Autosuggest</label>
						</div>
						<div class="form-group row" style="margin-left: 10px; margin-right: 10px;">
							<textarea class="form-control" id="list_search_spalten_<?php echo e($liste->id); ?>" name="list_search_spalten_<?php echo e($liste->id); ?>" rows="2"><?php echo e((old('list_search_spalten_'.$liste->id, @$seite->list_search_spalten))); ?></textarea>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="list_filter_<?php echo e($liste->id); ?>">
							<label class="form-check-label" for="list_filter_<?php echo e($liste->id); ?>">Auswahl</label>
						</div>
						<div class="form-group row" style="margin-left: 10px; margin-right: 10px;">
							<textarea class="form-control" id="list_filter_spalten_<?php echo e($liste->id); ?>" name="list_filter_spalten_<?php echo e($liste->id); ?>" rows="2"><?php echo e((old('list_filter_spalten_'.$liste->id, @$seite->list_filter_spalten_))); ?></textarea>
						</div>
					</div>
					<div class="col-sm">
						<strong>Sortierung</strong>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="list_art_sort_spalten_<?php echo e($liste->id); ?>">
							<label class="form-check-label" for="list_art_sort_spalten_<?php echo e($liste->id); ?>">Spalten</label>
						</div>
						<div class="form-check" style="margin-left: 30px;">
							<input class="form-check-input" type="checkbox" value="" id="list_art_sort_head_<?php echo e($liste->id); ?>">
							<label class="form-check-label" for="list_art_sort_head_<?php echo e($liste->id); ?>">Tabellenkopf</label>
						</div>
						<div class="form-check" style="margin-left: 30px;">
							<input class="form-check-input" type="checkbox" value="" id="list_art_sort_dropdown_<?php echo e($liste->id); ?>">
							<label class="form-check-label" for="list_art_sort_dropdown_<?php echo e($liste->id); ?>">Dropdown</label>
						</div>
						<br>
						Sortierungsspalten
						<div class="form-group row" style="margin-left: 10px; margin-right: 10px;">
							<textarea class="form-control" id="textareaSortierung_<?php echo e($liste->id); ?>" name="sortierung_<?php echo e($liste->id); ?>" rows="2"><?php echo e((old('textareaSortierung_'.$liste->id, @$seite->sortierung))); ?></textarea>
						</div>
					</div>
					
					<div class="col-sm">
						<strong>Ansicht</strong>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="list_ansicht_spalten_<?php echo e($liste->id); ?>">
							<label class="form-check-label" for="list_ansicht_spalten_<?php echo e($liste->id); ?>">Spalten ausblenden</label>
						</div>
						<div class="form-group row" style="margin-left: 10px; margin-right: 10px;">
							<textarea class="form-control" id="list_ansicht_spalten_text_<?php echo e($liste->id); ?>" name="list_ansicht_spalten_text_<?php echo e($liste->id); ?>" rows="2"><?php echo e((old('list_ansicht_spalten_text_'.$liste->id, @$seite->list_ansicht_spalten_text))); ?></textarea>
						</div>
					</div>
					
				</div>
			</div>
		</li>
		
		
	</ul>



	</div>
</div>
<br>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<hr>

<form method="POST" class="float-right" action="<?php echo e(url('/aufbau/seite/'.$seite->id.'/formulare/neu')); ?>">
	<?php echo csrf_field(); ?>
	<div class="input-group mb-3">
		<input id="titel" type="text" class="form-control<?php echo e($errors->has('formtitel') ? ' is-invalid' : ''); ?>" name="titel" value="<?php echo e(old('formtitel')); ?>" placeholder="Formular hinzufügen" required>
		<div class="input-group-append">
			<button type="submit" class="btn btn-primary">
				<i class="fas fa-plus"></i>
			</button>
		</div>
		<?php if($errors->has('formtitel')): ?>
			<span class="invalid-feedback" role="alert">
				<strong><?php echo e($errors->first('formtitel')); ?></strong>
			</span>
		<?php endif; ?>
	</div>      
</form>
<h3>Formulare</h3>
<br>
<?php $__currentLoopData = $seite->formulare; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formular): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="card" >
	<div class="card-header">
		<?php echo e($formular->titel); ?>

	</div>
	<div class="card-body">
	
		<div class="form-group row">
			<label for="formtitle_<?php echo e($formular->id); ?>" class="col-sm-2 col-form-label">Titel</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="formtitle_<?php echo e($formular->id); ?>" name="formtitle_<?php echo e($formular->id); ?>" placeholder="" value="<?php echo e((old('formtitle_'.$formular->id, @$formular->titel))); ?>">
			</div>
		</div>
		
		<div class="form-group row">
			<label for="formUrl_<?php echo e($formular->id); ?>" class="col-sm-2 col-form-label">Url</label>
			<div class="input-group col-sm-10">
								<div class="input-group-prepend">
						<div class="input-group-text">POST</div>
					</div>
				<input type="text" class="form-control" id="formUrl_<?php echo e($formular->id); ?>" name="url" placeholder="" value="<?php echo e((old('formUrl_'.$formular->id, @$form->url))); ?>">

			</div>
		</div>
	
		<form method="POST" class="float-right" action="<?php echo e(url('/aufbau/seite/'.$seite->id.'/formulare/'.$formular->id.'/input/neu')); ?>">
			<?php echo csrf_field(); ?>
			<div class="input-group mb-3">
				<input id="titel" type="text" class="form-control<?php echo e($errors->has('inputtitel') ? ' is-invalid' : ''); ?>" name="titel" value="<?php echo e(old('inputtitel')); ?>" placeholder="Input hinzufügen" required>
				<div class="input-group-append">
					<button type="submit" class="btn btn-primary">
						<i class="fas fa-plus"></i>
					</button>
				</div>
				<?php if($errors->has('inputtitel')): ?>
					<span class="invalid-feedback" role="alert">
						<strong><?php echo e($errors->first('inputtitel')); ?></strong>
					</span>
				<?php endif; ?>
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
		<?php $__currentLoopData = $formular->inputs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $input): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<tr>
			<th><?php echo e($input->titel); ?></th>
			<td>
				<select class="form-control" name="input_typ" id="input_typ" size="1">
					<?php $__currentLoopData = Config::get('constants.list_input_typs'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $typ => $typ_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<option id="typ_<?php echo e($typ); ?>" value="<?php echo e($typ); ?>" <?php echo e(old('typ', @$input->typ_id) == $typ ? 'selected="selected"' : ''); ?>><?php echo e($typ_name); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>
			</td>
			<td>
				<textarea class="form-control" id="textareaInput_<?php echo e($input->id); ?>" name="textareaInput_<?php echo e($input->id); ?>" rows="1"><?php echo e((old('textareaInput_'.$input->id, @$input->beschreibung))); ?></textarea>
			</td>
			<td>
				<div class="form-check">
					<input class="form-check-input" type="checkbox" value="" id="input_required_<?php echo e($input->id); ?>">
					<label class="form-check-label" for="input_required_<?php echo e($input->id); ?>">Pflichtfeld</label>
				</div>
			</td>
		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>
		



	</div>
</div>
<br>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





-Navigation
	- Zurück (Wenn kein Post), Breadcrumbs, Menü
	
-Bilder/Text/Doumente

-Extras
	-Google Maps
	
- Funktionen
	- Dropzone






<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>