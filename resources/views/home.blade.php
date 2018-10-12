@extends('layouts.app')

@section('content')

<div>Dashboard</div>


@if (session('status'))
	<div class="alert alert-success" role="alert">
		{{ session('status') }}
	</div>
@endif

You are logged in!


@endsection


