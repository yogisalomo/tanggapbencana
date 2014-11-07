@extends('layouts.master')

@section('script')

@stop

@section('content')

	<div class="row">
		<div class="col-lg-6 col-lg-offset-3">
			<h1>New User</h1>
			
			<div class="well">
			{{Form::open(['route'=>'admin.users.store'])}}
				
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
					{{Form::label('first_name', 'First Name')}}
					{{Form::text('first_name', null, ['class'=>'form-control'])}}
					{{$errors->first('first_name')}}
				</div>
				
				<div class="form-group">
					{{Form::label('last_name', 'Last Name')}}
					{{Form::text('last_name', null, ['class'=>'form-control'])}}
					{{$errors->first('last_name')}}
				</div>
				
				<div class="form-group">
					{{Form::label('phone', 'Phone')}}
					{{Form::text('phone', null, ['class'=>'form-control'])}}
					{{$errors->first('phone')}}
				</div>
				
				<div class="form-group">
					{{Form::label('address', 'Address')}}
					{{Form::textarea('address', null, ['class'=>'form-control'])}}
					{{$errors->first('address')}}
				</div>
				
				<div class="form-group">
					{{Form::label('email', 'Email')}}
					{{Form::text('email', null, ['class'=>'form-control'])}}
					{{$errors->first('email')}}
				</div>

				<div class="form-group">
					{{Form::label('role', 'Role')}}
					{{Form::select('role', [
						'user'=>'user',
						'admin'=>'admin',
					], null, ['class'=>'form-control'])}}
					{{$errors->first('role')}}
				</div>

				<div class="form-group">
					{{Form::submit('Save', ['class'=>'btn btn-primary'])}}
				</div>

			{{Form::close()}}

			</div>

		</div>
	</div>
@stop