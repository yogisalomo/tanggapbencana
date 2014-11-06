@if (Session::has('alert'))
	<div class="alert alert-info">
		<div class="container">
			{{Session::get('alert')}}
		</div>
	</div>
@endif

@if (Session::has('alert-danger'))
	<div class="alert alert-danger">
		<div class="container">
			{{Session::get('alert-danger')}}
		</div>
	</div>
@endif