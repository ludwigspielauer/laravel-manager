@extends('layouts.app')

@section('content')

<h1>Benutzer</h1>
@if (session('status'))
	<div class="alert alert-success" role="alert">
		{{ session('status') }}
	</div>
@endif

<form method="POST" action="{{ url('/projekt/'.Auth::user()->projekt->id.'/benutzer/save') }}">
	@csrf
                        
	<h3>Rollen</h3>
	<p>
		Welche Benutzer wird die Webseite haben?
	</p>
	<div class="form-group row">
		<div class="col-xs-2 col-md-8 text-left">
			<input type="checkbox" name="rolle_guest" id="rolle_guest" value="1" {{ (old('rolle_guest') == '1' ? 'checked="checked"' : '') }} >
			<label for="rolle_guest" class="text-left">Gast</label><br>
		
			<input type="checkbox" name="rolle_user" id="rolle_user" value="1" {{ (old('rolle_user') == '1' ? 'checked="checked"' : '') }} >
			<label for="rolle_user" class="text-left">User</label><br>		
		
			<input type="checkbox" name="rolle_admin" id="rolle_admin" value="1" {{ (old('rolle_admin') == '1' ? 'checked="checked"' : '') }} >
			<label for="rolle_admin" class="text-right">Admin</label><br>
		
		</div>

		@if ($errors->has('rolle'))
			<div class="alert alert-danger" role="alert">
				{{ $errors->first('rolle_admin') }}
			</div>
		@endif
	</div> 
	
	
	<h3>Multiuserbetrieb</h3>
	<p>
		Können mehrere Benutzer die selben Daten parallel bearbeiten?
	<p>
	<div class="form-group row">
		<div class="col-xs-2 col-md-8 text-left">
			<input type="radio" name="multiuser" id="no" value="0" {{ (old('multiuser', $projekt->benutzerSettings->multiuser) == '0' ? 'checked="checked"' : '') }} >
			<label for="no" class="text-left">Nein</label><br>
			<input type="radio" name="multiuser" id="firstedit" value="1" {{ (old('multiuser', $projekt->benutzerSettings->multiuser) == '1' ? 'checked="checked"' : '') }} >
			<label for="firstedit" class="text-left">Bevorzugung erster Bearbeiter</label><br>
			<input type="radio" name="multiuser" id="firstsave" value="2" {{ (old('multiuser', $projekt->benutzerSettings->multiuser) == '2' ? 'checked="checked"' : '') }} >
			<label for="firstsave" class="text-left">Bevorzugung erster Speicherer</label><br>
			
			@if ($errors->has('multiuser'))
				<div class="alert alert-danger" role="alert">
					{{ $errors->first('multiuser') }}
				</div>
			@endif
		</div>
	</div> 
	

	
	

	<div class="form-group row">
			<button type="submit" class="btn btn-primary">
				{{ __('Speichern') }}
			</button>
	</div>
                        
</form>


      <div class="panel panel-default">
        <div class="panel-heading">
          <button type="button" class="btn btn-default btn-xs spoiler-trigger" data-toggle="collapse">Spoiler</button>
        </div>
        <div class="panel-collapse collapse out">
          <div class="panel-body">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias rerum harum et, earum placeat tempore maiores. Beatae repudiandae aspernatur quae explicabo minus quos tempora illum sed consequuntur? Cumque, est impedit?</p>
          </div>
        </div>
      </div>
    </div>

@endsection











		
	
	
