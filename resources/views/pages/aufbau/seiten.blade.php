@extends('layouts.app')

@section('content')


@include('layouts.seite_top')


<form method="POST" action="{{ url('/aufbau/seiten/neu') }}">
	@csrf
	<div class="input-group mb-3">
		<input id="titel" type="text" class="form-control{{ $errors->has('titel') ? ' is-invalid' : '' }}" name="titel" value="{{ old('titel') }}" required>
		<div class="input-group-append">
			<button type="submit" class="btn btn-primary">
				{{ __('Seite hinzufügen') }}
			</button>
		</div>
		@if ($errors->has('titel'))
			<span class="invalid-feedback" role="alert">
				<strong>{{ $errors->first('titel') }}</strong>
			</span>
		@endif
	</div>      
</form>

<br>
<div class="list-group">
	@FOREACH ($projekt->seiten as $seite)
		<a href="{{ url('/aufbau/seite/'.$seite->id) }}" class="list-group-item list-group-item-action list-group-item-light">
			<i class="far fa-file fa-3x"></i>{{$seite->titel}}
		</a>
	@ENDFOREACH
</div>






@endsection
