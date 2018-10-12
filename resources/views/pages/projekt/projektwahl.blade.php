

@extends('layouts.app')

@section('content')

<h2>Projekt</h2>

@if (session('status'))
	<div class="alert alert-success" role="alert">
		{{ session('status') }}
	</div>
@endif

<h3>Projekt wählen</h3>
<form method="POST" action="{{ url('projekt/change') }}">
	@csrf
                        
	<div class="form-group row">
	    <label for="lmh" class="col-md-4 col-form-label text-md-right">{{ __('Projekt wählen') }}</label>
	
	    <div class="col-md-6">
			<select id="projekt" class="form-control{{ $errors->has('projekt') ? ' is-invalid' : '' }}" name="projekt">
				@FOREACH ($projekte as $projekt)
					<option value="{{$projekt->id}}" 
						{{ (old('projekt', Auth::user()->projekt_id) == $projekt->id) ? 'selected' : '' }} >
						
						{{ $projekt->name }}
					</option>
				@ENDFOREACH
			</select>
	        @if ($errors->has('projekt'))
	            <span class="invalid-feedback" role="alert">
	                <strong>{{ $errors->first('projekt') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

      
	<div class="form-group row mb-0">
		<div class="col-md-6 offset-md-4">
			<button type="submit" class="btn btn-primary">
				{{ __('Auswählen') }}
			</button>
		</div>
	</div>
                        
</form>


<h3>Neues Projekt</h3>
<form method="POST" action="{{ url('projekt/neu') }}">
	@csrf
                        
	<div class="form-group row">
		<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

		<div class="col-md-6">
			<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>

			@if ($errors->has('name'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('name') }}</strong>
				</span>
			@endif
		</div>
	</div>

      
	<div class="form-group row mb-0">
		<div class="col-md-6 offset-md-4">
			<button type="submit" class="btn btn-primary">
				{{ __('Erstellen') }}
			</button>
		</div>
	</div>
                        
</form>

@endsection