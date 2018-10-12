<div class="row" style="background-color: lightgrey;">
	<div class="col">
		{{@$pagetitle}}
	</div>
	<div class="col-8">

	</div>
	<div class="col">
		<a href="{{ URL::previous() }}">Back</a>
	</div>
</div>
		@if (session('status'))
			<div class="alert alert-success" role="alert">
				{{ session('status') }}
			</div>
		@endif
<br>