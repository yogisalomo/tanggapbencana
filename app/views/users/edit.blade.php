@extends('layouts.master')

@section('content')

	<div class="row">
		<div class="col-lg-6 col-lg-offset-3">
			<h1>Edit User</h1>
			
			<div class="well">
			@if (@Auth::user()->role == 'Admin')
				{{Form::model($user, ['route'=>['users.update', $user->id], 'method' => 'PUT'])}}
			@else
				{{Form::model($user, ['url'=>'user/update'])}}
			@endif
				
				<div class="form-group">
					{{Form::label('username', 'Username')}}
					{{Form::text('username', null, ['class'=>'form-control'])}}
					{{$errors->first('username')}}
				</div>

				<div class="form-group">
					{{Form::label('password', 'Password')}}
					{{Form::password('password', ['class'=>'form-control'])}}
					{{$errors->first('password')}}
				</div>

				<div class="form-group">
					{{Form::label('password_confirmation', 'Password Confirmation')}}
					{{Form::password('password_confirmation', ['class'=>'form-control'])}}
					{{$errors->first('password_confirmation')}}
				</div>

				@if (@Auth::user()->role == 'Admin')
					<div class="form-group">
						{{Form::label('salesperson_id', 'Sales Person')}}
						{{Form::select('salesperson_id', Salesperson::lists('name', 'id'), null, [
							'class'=>'form-control'
						])}}
					</div>
				@endif


				@if (@Auth::user()->role == 'Admin')
					<div class="form-group">
						<a href="{{url('salespersons/create')}}" target="_blank" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-plus-sign"></span> New Sales Person</a> 
						<a href="{{url('salespersons/'.$user->salesperson_id.'/edit')}}" target="_blank" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-pencil"></span> Edit Sales Person</a>
						{{$errors->first('salesperson_id')}}
					</div>
				@endif
				
				@if (@Auth::user()->role == 'Admin')
					<div class="form-group">
						{{Form::label('role', 'Role')}}
						{{Form::select('role', [
							'Sales'=>'Sales',
							'Manager'=>'Manager',
							'Admin'=>'Admin',
						], null, [
							'class'=>'form-control'
						])}}
						{{$errors->first('role')}}
					</div>
				@endif

				<div class="form-group">
					{{Form::submit('Save', ['class'=>'btn btn-primary', 'style'=>'width:100%'])}}
				</div>

			{{Form::close()}}
			</div>

		</div>
	</div>
@stop